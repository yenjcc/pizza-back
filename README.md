# <p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


# Getting started

## Pizza backend

Pizza is a php Laravel example

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/7.x)


Clone the repository

    git clone https://github.com/yenjcc/pizza-back.git

Switch to the repo folder

    cd pizza-back

Install all the dependencies using [composer](https://getcomposer.org/).

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate --seed

Generate Passport key

    php artisan passport:install

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)


Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
