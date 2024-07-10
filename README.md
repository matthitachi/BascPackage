# Bacs Resonse Service

This package allows an eCommerce store to make monetary refunds and for that reason we implement the HSBC BACS Standard 18 for direct bank transactions.

## Usage
* You need to publish the config and migrations using
```bash
php artisan vendor:publish --provider="Matthitachi\BacsApi\BacsApiServiceProvider"
```
