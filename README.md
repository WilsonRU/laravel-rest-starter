## Laravel Rest Starter

- v8.6.11

## Installation

`git clone git@github.com:wilsonru/laravelreststarter.git` then `composer install`

## Setup

Copy `.env.example` to `.env` and tailor for your app, specifically the APP_URL
and any database settings.

- Execute `php artisan key:generate` to generate application key
- Execute `php artisan jwt:secret` to generate JWT key
- Execute `php artisan migrate` to run migration