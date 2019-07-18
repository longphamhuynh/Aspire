<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## MiniAspire - Laravel Project
- The project focuses on creating a mini version of Aspire so that the
candidate can think about the systems and architecture the real project
would have. The task is defined below:
- Build a simple API that allows to handle user loans. Necessary entities will
have to be (but not limited to): users, loans, and repayments.
- The API should allow simple use cases, which include (but are not limited
to): creating a new user, creating a new loan for a user, with different
attributes (e.g. duration, repayment frequency, interest rate, arrangement
fee, etc.), and allowing a user to make repayments for the loan.
The app logic should figure out and not allow obvious errors. For example a
user cannot make a repayment for a loan that’s already been repaid.

## MiniAspire - Setup (step by step)
```
1. Run install vendor.

composer install
```
```
2. copy new file .env and replace database connection.

cp .env.example .env
```
```
3. Run database migration, generate new laravel passport config and start server.
php artisan migrate:fresh && php artisan passport:install --force && php artisan serve

```

## MiniAspire - API Post Man Collecton
<a href="https://www.getpostman.com/collections/7a0d0a7fa206e95b1909">API Post Man Collecton</a>