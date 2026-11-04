# ==============================================================================
# Cardic Store - 1-Click Fast Zip & Unzip Deployment Script
# ==============================================================================
# Uploads a single compressed archive instead of 20,000 files, then triggers
# instantaneous server-side extraction and Laravel cache optimization.
# ==============================================================================

param(
    [string]$FtpServer = "cardicstore.com",
    [string]$FtpUser   = "software@cardicstore.com",
    [string]$FtpPass   = "yuwvpXXXUMy5zDheFxvt",
    [string]$RemoteDir = "/home/arutmwht/public_html",
    [string]$AppUrl    = "https://cardicstore.com"
)

$ErrorActionPreference = "Stop"

Write-Host "`n🚀 Starting Cardic Store Fast Deployment..." -ForegroundColor Cyan

# 1. Compile frontend assets
if (Test-Path "package.json") {
    Write-Host "📦 Building production frontend assets (npm run build)..." -ForegroundColor Yellow
    npm run build
}

# 2. Generate secure token
$deployToken = "crdc_deploy_" + [DateTimeOffset]::UtcNow.ToUnixTimeSeconds()

# 3. Create deploy extractor in public
$extractorPath = "public\deploy_extract.php"
$extractorContent = @"
<?php
header('Content-Type: application/json');
ini_set('max_execution_time', 300);
ini_set('memory_limit', '256M');

`$expectedToken = '$deployToken';
`$givenToken = `$_GET['token'] ?? `$_SERVER['HTTP_X_DEPLOY_TOKEN'] ?? '';

if (empty(`$expectedToken) || !hash_equals(`$expectedToken, `$givenToken)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Unauthorized deploy token']);
    exit;
}

`$candidates = [
    __DIR__ . '/release.zip',
    dirname(__DIR__) . '/release.zip',
    realpath(__DIR__ . '/..') . '/release.zip',
];

`$zipFile = null;
foreach (`$candidates as `$c) {
    if (file_exists(`$c)) {
        `$zipFile = `$c;
        break;
    }
}

if (!`$zipFile) {
    http_response_code(404);
    echo json_encode(['success' => false, 'error' => 'release.zip not found on server']);
    exit;
}

`$targetDir = realpath(dirname(`$zipFile)) ?: dirname(`$zipFile);

`$zip = new ZipArchive();
if (`$zip->open(`$zipFile) !== true) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Unable to open release.zip']);
    exit;
}

`$numFiles = `$zip->numFiles;
`$zip->extractTo(`$targetDir);
`$zip->close();

@unlink(`$zipFile);
@chmod(`$targetDir . '/storage', 0775);
@chmod(`$targetDir . '/bootstrap/cache', 0775);

`$artisanLog = [];
`$php = defined('PHP_BINARY') && strpos(PHP_BINARY, 'fpm') === false ? PHP_BINARY : 'php';
`$artisan = `$targetDir . '/artisan';

foreach (['optimize:clear', 'config:cache', 'route:cache', 'view:cache'] as `$cmd) {
    `$out = @shell_exec("`$php `$artisan `$cmd 2>&1");
    if (`$out) {
        `$artisanLog[`$cmd] = trim(`$out);
    }
}

if (empty(`$artisanLog) && file_exists(`$targetDir . '/bootstrap/app.php')) {
    try {
        require_once `$targetDir . '/vendor/autoload.php';
        `$app = require_once `$targetDir . '/bootstrap/app.php';
        `$kernel = `$app->make(Illuminate\Contracts\Console\Kernel::class);
        `$kernel->call('optimize:clear');
        `$kernel->call('config:cache');
        `$kernel->call('route:cache');
        `$kernel->call('view:cache');
        `$artisanLog['kernel'] = 'Artisan cache optimized via Laravel Kernel';
    } catch (Throwable `$e) {
        `$artisanLog['kernel_error'] = `$e->getMessage();
    }
}

@unlink(__FILE__);
if (file_exists(`$targetDir . '/public/deploy_extract.php')) { @unlink(`$targetDir . '/public/deploy_extract.php'); }
if (file_exists(`$targetDir . '/deploy_extract.php')) { @unlink(`$targetDir . '/deploy_extract.php'); }

echo json_encode([
    'success' => true,
    'files_extracted' => `$numFiles,
    'artisan' => `$artisanLog,
    'target_directory' => `$targetDir,
    'timestamp' => date('Y-m-d H:i:s')
]);
"@
Set-Content -Path $extractorPath -Value $extractorContent -Encoding UTF8

# 4. Package release.zip
Write-Host "🗜️ Packaging release.zip..." -ForegroundColor Yellow
if (Test-Path "release.zip") { Remove-Item "release.zip" -Force }

$zipExclude = @(".git", ".github", "node_modules", "tests", "release.zip", ".env", "ftp_stage")
$filesToZip = Get-ChildItem -Path . | Where-Object { $zipExclude -notcontains $_.Name }
Compress-Archive -Path $filesToZip -DestinationPath "release.zip" -CompressionLevel Optimal

$zipSize = (Get-Item "release.zip").Length / 1MB
Write-Host ("   Archive created: {0:N2} MB" -f $zipSize) -ForegroundColor Green

# 5. Upload release.zip and deploy_extract.php via FTP
Write-Host "📡 Uploading single release archive to FTP server..." -ForegroundColor Yellow

$cleanRemoteDir = $RemoteDir.TrimEnd('/')
$ftpZipUri = "ftp://$FtpServer$cleanRemoteDir/release.zip"
$ftpExtractorRootUri = "ftp://$FtpServer$cleanRemoteDir/deploy_extract.php"
$ftpExtractorPubUri  = "ftp://$FtpServer$cleanRemoteDir/public/deploy_extract.php"

$wc = New-Object System.Net.WebClient
$wc.Credentials = New-Object System.Net.NetworkCredential($FtpUser, $FtpPass)

try {
    Write-Host "   -> Uploading release.zip..." -ForegroundColor Gray
    $wc.UploadFile($ftpZipUri, (Resolve-Path "release.zip").Path)
    Write-Host "   -> Uploading deploy_extract.php..." -ForegroundColor Gray
    $wc.UploadFile($ftpExtractorRootUri, (Resolve-Path $extractorPath).Path)
    try { $wc.UploadFile($ftpExtractorPubUri, (Resolve-Path $extractorPath).Path) } catch {}
    Write-Host "   Upload complete!" -ForegroundColor Green
} catch {
    Write-Host "FTP upload notice: $_" -ForegroundColor DarkYellow
    Write-Host "Trying curl fallback..." -ForegroundColor Gray
    curl.exe -T "release.zip" "$ftpZipUri" --user "$FtpUser`:$FtpPass"
    curl.exe -T "$extractorPath" "$ftpExtractorRootUri" --user "$FtpUser`:$FtpPass"
}

# 6. Trigger remote server-side extraction
Write-Host "⚡ Triggering remote instant unzip on server..." -ForegroundColor Yellow
$urls = @(
    "$AppUrl/deploy_extract.php?token=$deployToken",
    "$AppUrl/public/deploy_extract.php?token=$deployToken"
)

$success = $false
foreach ($u in $urls) {
    try {
        $res = Invoke-RestMethod -Uri $u -TimeoutSec 60 -Method Get
        if ($res.success) {
            Write-Host "`n✅ DEPLOYMENT COMPLETE!" -ForegroundColor Green
            Write-Host "   Files Extracted: $($res.files_extracted)" -ForegroundColor Cyan
            Write-Host "   Target Dir:     $($res.target_directory)" -ForegroundColor Cyan
            Write-Host "   Artisan:        $($res.artisan | Out-String)" -ForegroundColor Cyan
            $success = $true
            break
        }
    } catch {}
}

if (-not $success) {
    Write-Host "Notice: The release.zip is on your server at $RemoteDir. You can unzip it in cPanel File Manager if web trigger didn't respond." -ForegroundColor Yellow
}

# 7. Cleanup local release.zip and local temporary extractor
if (Test-Path "release.zip") { Remove-Item "release.zip" -Force }
if (Test-Path $extractorPath) { Remove-Item $extractorPath -Force }

Write-Host "`n🎉 Done!`n" -ForegroundColor Green
