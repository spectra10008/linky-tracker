<div align="center">

# 🔗 Linky Tracker Package

### Automatic Link Visit Tracking & Donation Reporting for Laravel

[![Laravel](https://img.shields.io/badge/Laravel-12+-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

*Track visits and donations effortlessly — No JavaScript required!*

</div>

---

## ✨ Features

- 🚀 **Zero-Config Visit Tracking** — Automatically tracks all GET requests
- 📊 **One-Line Donation Reporting** — Simple facade for payment tracking
- ⚡ **Async Processing** — Uses Laravel Queue for optimal performance
- 🔧 **Fully Configurable** — Customize via environment variables
- 🎯 **No JavaScript** — Pure server-side tracking
- 🔄 **Auto-Registered Middleware** — Works immediately after installation

---

## 📦 Installation

### Option 1: Install from GitHub (Recommended)

Add the repository to your project's `composer.json`:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/spectra10008/linky-tracker.git"
        }
    ],
    "require": {
        "linky/tracker-package": "^1.0"
    }
}
```

Then install via Composer:

```bash
composer require linky/tracker-package:^1.0
```

### Option 2: Install from Packagist (Coming Soon)

```bash
composer require linky/tracker-package
```

---

## ⚙️ Configuration

### 1. Publish Configuration File

Publish the config file to customize settings:

```bash
php artisan vendor:publish --tag=config
```

This will create `config/linky.php`.

### 2. Environment Variables

Add these variables to your `.env` file:

```env
LINKY_ENDPOINT=https://linky.sadah.io/api/webhook
LINKY_TOKEN=l76qYiQMpXotwgS6EPU5teFLibROSjXKNlJaChvh
```

---

## 🎯 Usage

### Automatic Visit Tracking

**No code needed!** All GET requests are automatically tracked once the package is installed.

- ✅ Tracks page visits automatically
- ✅ Sends data asynchronously via Laravel Queue
- ✅ No performance impact on your application

### Donation Tracking

Report donations with a single line of code:

```php
use Linky;

Linky::donation([
    'referral_code' => 'ABC123',
    'amount' => 500,
    'donor_name' => 'John Doe',
    'donor_email' => 'john@example.com',
    'transaction_id' => 'TXN123456789',
    'payment_method' => 'credit_card',
]);
```

**That's it!** No JavaScript, no complex setup — just one line.

---

## 🔄 Queue Setup (Recommended)

To ensure tracking doesn't slow down your application:

1. **Configure a queue driver** in `config/queue.php`:
   ```env
   QUEUE_CONNECTION=database  # or redis
   ```

2. **Run migrations** (if using database queue):
   ```bash
   php artisan queue:table
   php artisan migrate
   ```

3. **Start the queue worker**:
   ```bash
   php artisan queue:work
   ```

---

## 📋 Quick Start Guide

| Step | Command |
|------|---------|
| **1. Install** | `composer require linky/tracker-package:^1.0` |
| **2. Publish Config** | `php artisan vendor:publish --tag=config` |
| **3. Set Environment** | Add `LINKY_ENDPOINT` and `LINKY_TOKEN` to `.env` |
| **4. Start Queue** | `php artisan queue:work` |
| **5. Done!** | Visits are tracked automatically ✅ |

---

## 💡 Example Usage

### In Your Controller

```php
<?php

namespace App\Http\Controllers;

use Linky;

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        // Process payment...
        
        // Track donation (one line)
        Linky::donation([
            'referral_code' => $request->referral_code,
            'amount' => $request->amount,
            'donor_name' => $request->name,
            'donor_email' => $request->email,
            'transaction_id' => $transaction->id,
            'payment_method' => 'stripe',
        ]);
        
        return redirect()->route('thank-you');
    }
}
```

---

## 🛠️ Requirements

- PHP 8.1 or higher
- Laravel 12.0 or higher
- Composer

---

## 📄 License

This package is open-sourced software licensed under the [MIT license](LICENSE).

---

<div align="center">

**Made with ❤️ for the Laravel Community**

[Report Bug](../../issues) · [Request Feature](../../issues)

</div>
```
