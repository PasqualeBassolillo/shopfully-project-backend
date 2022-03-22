# ShopFully backend application based on Laravel

## Introduction

ShopFully backend is an application that expose rest API endpoint that show a list of flyers

## Requirements

- PHP package: PHP 8.0.8 or higher.

## How to start

1. Open your terminal
2. Git clone this project && move into cloned folder
3. Execute the following command

```bash
$ cp .env.example .env # Create .env file copying .env.example
$ composer install # Install packages
$ php artisan key:generate # Generate key
$ php artisan storage:link # Link storage
$ php artisan serve # Start server
```

Wait a few seconds and check main page: http://localhost:8000 (or whatever port it choose)

## Endpoints

- [All flyers](http://localhost:8000/api/flyers)
- [Flyers with pagination and limit](http://localhost:8000/api/flyers?page=1&limit=100)