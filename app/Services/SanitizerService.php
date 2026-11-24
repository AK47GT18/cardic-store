<?php

namespace App\Services;

class SanitizerService
{
    /**
     * Sanitize a single text string by stripping tags, removing control characters, and trimming.
     */
    public static function cleanString(?string $value, int $maxLength = 1000): string
    {
        if ($value === null) {
            return '';
        }

        // Remove NULL bytes and non-printable control characters (except common whitespace)
        $clean = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', (string) $value) ?? '';

        // Strip HTML and PHP tags to prevent XSS
        $clean = strip_tags($clean);

        // Normalize multiple spaces and newlines
        $clean = trim($clean);

        if (mb_strlen($clean) > $maxLength) {
            $clean = mb_substr($clean, 0, $maxLength);
        }

        return $clean;
    }

    /**
     * Sanitize an email address.
     */
    public static function cleanEmail(?string $email): string
    {
        if ($email === null) {
            return '';
        }

        $clean = filter_var(trim($email), FILTER_SANITIZE_EMAIL);

        return is_string($clean) ? mb_strtolower($clean) : '';
    }

    /**
     * Sanitize a phone number (retains digits, +, -, space, parentheses).
     */
    public static function cleanPhone(?string $phone): string
    {
        if ($phone === null) {
            return '';
        }

        $clean = preg_replace('/[^\d\+\-\(\)\s]/', '', $phone) ?? '';

        return trim(mb_substr($clean, 0, 30));
    }

    /**
     * Sanitize array payloads recursively.
     *
     * @param  array<string|int, mixed>  $data
     * @return array<string|int, mixed>
     */
    public static function cleanArray(array $data): array
    {
        $cleaned = [];

        foreach ($data as $key => $value) {
            $safeKey = is_string($key) ? self::cleanString($key, 100) : $key;

            if (is_array($value)) {
                $cleaned[$safeKey] = self::cleanArray($value);
            } elseif (is_string($value)) {
                $cleaned[$safeKey] = self::cleanString($value, 2000);
            } else {
                $cleaned[$safeKey] = $value;
            }
        }

        return $cleaned;
    }
}
