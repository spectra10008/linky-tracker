# Linky Tracker Package

Linky Tracker is a Laravel package for automatic link visit tracking and donation reporting. It works out-of-the-box with Laravel 12+ and requires no JavaScript for tracking visits.

---

## 1️⃣ Installation

Install the package via Composer:

```bash
composer require sadah/linky-tracker

---

2️⃣ Publish Config

To customize the package settings, publish the configuration file:

php artisan vendor:publish --tag=config

This will create:

config/linky.php


3️⃣ Add Environment Variables
Add the following to your .env file:

LINKY_ENDPOINT=https://linky.sadah.io/api/webhook
LINKY_TOKEN=l76qYiQMpXotwgS6EPU5teFLibROSjXKNlJaChvh

4️⃣ Automatic Visit Tracking
	•	All GET requests to your site are automatically tracked.
	•	No JavaScript or extra code required.
	•	Visits are sent asynchronously via Laravel Queue for optimal performance.

5️⃣ Donation Tracking (One Line)

After a successful payment, you can send donation data using the Facade:

use Linky;

Linky::donation([
    'referral_code' => 'ABC123',          // Referral code
    'amount' => 500,                       // Donation amount
    'donor_name' => 'John Doe',            // Donor name
    'donor_email' => 'john@example.com',   // Donor email
    'transaction_id' => 'TXN123456789',   // Transaction ID
    'payment_method' => 'credit_card',     // Payment method
]);

One line is enough to record the donation; no JS is needed.
6️⃣ Queue Setup (Recommended)

To ensure visit tracking does not slow down page load:
1.	Configure a queue driver (database or Redis) in config/queue.php.
2.	Start the queue worker:
php artisan queue:work

7️⃣ Key Features
	•	Automatic visit tracking (no JS required)
	•	One-line donation reporting
	•	Async queue for performance
	•	Middleware auto-registered for all web routes
	•	Easy configuration via .env and config/linky.php

8️⃣ Usage Summary
	•	Install package: composer require sadah/linky-tracker
	•	Publish config: php artisan vendor:publish --tag=config
	•	Set .env variables
	•	Visits tracked automatically
	•	Donations reported in one line

This is ready to paste directly into your `README.md`.

If you want, I can also **add a small example section with sample routes and controller usage** so anyone using the package can see a working flow immediately.

Do you want me to add that?
```
