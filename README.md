# Cardic Store

<p align="center">
  <a href="https://cardicstore.com" target="_blank">
    <img src="https://cardicstore.com/images/logos/cardic-store-logo.svg" alt="Cardic Store Logo" width="220" onerror="this.src='public/images/logos/cardic-store-logo.svg'; this.onerror=null;">
  </a>
</p>

<p align="center">
  <strong>Instant, Pre-Verified Global Digital Gift Cards & Vouchers</strong><br>
  <em>Bridging the international payment divide for Malawi, Africa, and global buyers.</em>
</p>

<p align="center">
  <a href="https://cardicstore.com"><strong>🌐 cardicstore.com</strong></a> •
  <a href="https://cardicstore.com/marketplace">Browse Catalog</a> •
  <a href="https://cardicstore.com/how-it-works">How It Works</a> •
  <a href="https://cardicstore.com/about">About Us</a> •
  <a href="https://cardicstore.com/contact">Contact Support</a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.5-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP 8.5">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel 12">
  <img src="https://img.shields.io/badge/TailwindCSS-v4-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Vite-Bundled-646CFF?style=flat-square&logo=vite&logoColor=white" alt="Vite">
  <img src="https://img.shields.io/badge/Fulfillment-Reloadly_API-00B4D8?style=flat-square" alt="Reloadly">
  <img src="https://img.shields.io/badge/Payments-PayChangu_MWK-10B981?style=flat-square" alt="PayChangu">
</p>

---

## 🚀 About Cardic Store

[Cardic Store](https://cardicstore.com) is a high-speed digital gift card and voucher clearinghouse engineered to eliminate regional payment barriers. 

In many emerging markets—including **Malawi and wider Sub-Saharan Africa**—local bank cards face severe overseas limits ($50–$200/month), high forex markups, or outright payment declines by international merchants. Cardic Store solves this by enabling customers to purchase 100% verified digital gift cards using local payment methods (**Airtel Money, TNM Mpamba, Visa/Mastercard via PayChangu**) with real-time MWK conversion and automated, sub-60-second delivery.

### Official Links
* **Live Storefront**: [https://cardicstore.com](https://cardicstore.com)
* **Marketplace Catalog**: [https://cardicstore.com/marketplace](https://cardicstore.com/marketplace)
* **Customer Support Email**: [support@cardicstore.com](mailto:support@cardicstore.com)
* **Live WhatsApp Desk**: [+265 997 73 52 36](https://wa.me/265997735236?text=Hello%20Cardic%20Store%20Support)
* **Facebook**: [facebook.com/profile.php?id=61592826425687](https://www.facebook.com/profile.php?id=61592826425687)
* **Instagram**: [@cardicstore](https://www.instagram.com/cardicstore?cnvx=ODhvbHA1d3p6d2dl)

---

## ✨ Key Features

* **500+ Top International Brands**: Steam Wallet, PlayStation PSN, Xbox Gift Cards & Game Pass, Binance USDT Vouchers, Apple & iTunes, Google Play, Amazon, Netflix, Spotify, Visa Virtual Prepaid, Uber, Airbnb, Roblox, and more.
* **Malawi Regional Availability Insights**: Transparent indicators showing whether a card is **GLOBAL** (native support in Malawi without VPN) or requires regional profile alignment, paired with step-by-step redemption guides prior to checkout.
* **PayChangu Gateway Integration**: Frictionless local checkout supporting Malawian Kwacha (MWK), Airtel Money, TNM Mpamba, and local bank cards with automated webhook settlement.
* **Automated Reloadly Fulfillment**: Sub-60-second encrypted code provisioning via Reloadly gift card API with order escrow protection.
* **Transactional Email Engine (Gmail SMTP)**: Instant order confirmation with formatted digital codes, admin alert notifications, and customer contact receipts.
* **Live Multi-Currency Picker**: Instant pricing in USD ($), MWK (MK), and EUR (€) with dynamic cart & checkout calculations.
* **Strict Security & OWASP Compliant**: Sanitized input boundaries, parameterized queries, CSRF token exclusion on webhooks, rate-limiting on submission routes, and encrypted storage.

---

## 🛠️ Technology Stack

* **Backend Framework**: Laravel 12 (PHP 8.5)
* **Frontend Architecture**: Blade Components + Alpine.js 3 + Tailwind CSS (Vite bundle)
* **Payment Gateways**:
  * [PayChangu](https://paychangu.com) — African Mobile Money & Card Rail
* **Fulfillment Service**:
  * [Reloadly](https://www.reloadly.com) — Global Gift Card API
* **Mailing**: Gmail SMTP (`websmtp47@gmail.com`)
* **Database**: MySQL / SQLite (development)

---

## 📦 Getting Started

### Prerequisites
* PHP >= 8.2 (PHP 8.5 recommended)
* Composer 2.x
* Node.js >= 18.x & NPM

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/AK47GT18/cardic-store.git
   cd cardicstore
   ```

2. **Install PHP and Node dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Configure Environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Set Required Keys in `.env`**:
   ```env
   APP_NAME="Cardic Store"
   APP_URL=https://cardicstore.com

   # PayChangu Gateway
   PAYCHANGU_SECRET_KEY=SEC-TEST-xxxxxxxxxxxxxxxxxxxxxxxxxx
   PAYCHANGU_PUBLIC_KEY=PUB-TEST-xxxxxxxxxxxxxxxxxxxxxxxxxx
   PAYCHANGU_ENV=sandbox

   # Reloadly Fulfillment
   RELOADLY_CLIENT_ID=your_client_id
   RELOADLY_CLIENT_SECRET=your_client_secret
   RELOADLY_ENV=sandbox

   # Gmail SMTP
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USERNAME=websmtp47@gmail.com
   MAIL_PASSWORD=your_app_password
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=support@cardicstore.com
   MAIL_FROM_NAME="Cardic Store"
   ADMIN_NOTIFICATION_EMAIL=support@cardicstore.com
   ```

5. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

6. **Build Frontend Assets**:
   ```bash
   npm run build
   # Or for local live reload:
   npm run dev
   ```

7. **Start Local Development Server**:
   ```bash
   php artisan serve
   ```
   Visit [http://localhost:8000](http://localhost:8000) in your browser.

---

## 🧪 Testing & Code Style

Run the automated PHPUnit test suite:
```bash
vendor/bin/phpunit
```

Format PHP code according to Laravel standards using Pint:
```bash
vendor/bin/pint --dirty --format agent
```

---

## 📄 License

Proprietary software. All rights reserved &copy; Cardic Store Inc. ([cardicstore.com](https://cardicstore.com)).
