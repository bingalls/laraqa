# LaraQA testing demo

A tiny demo on how to mock databases & test email 

## Getting Started

[Laravel site](http://laravel.com) has details. Here's the quick guide:
``` bash
git clone https://github.com/bingalls/laraqa
cd laraqa
composer install
yarn
```
Configure .env for database. Note that PHP 7.3 may have issues writing to sqlite
[Configure .env for gmail](https://www.justinsilver.com/technology/osx/send-emails-mac-os-x-postfix-gmail-relay/)
or other email provider.
``` bash
php artisan key:generate
php artisan migrate
./vendor/bin/phpunit
php artisan serve
```

## What's Provided

The home page uses Twitter Bootstrap Greyscale theme, and includes Open Street Map.

## The Essentials

This project includes a validated email form. Clicking *Submit* saves to the database.
It also emails to the MAIL_TO in .env.
The point of LaraQA is to show off a Repository-like pattern, which allows unit testing
minimizing database writes for performance and isolation.

In the future, I hope to add https://laravel.com/docs/7.x/mocking#mail-fake
The alternative is to use a service like mailtrap.io for end-to-end testing.

## Design

* All HTML and code is highly validated with static analysis.
* Contact form data is validated, and unit tested
* Email is HTML format, but mixed or plain text is a simple change
* Tested with MySQL & sqlite for Unit Tests. Postgres should also work. Mongo is untested.
* Sending email brings up a success or error page.
