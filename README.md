# Project Title

E-Book system API

## Description

Website application that used to handle E-Book data from api and web platform

## Getting Started

### Dependencies

* Composer
* Php >= 8
* Mysql
* Internet

### Installing
Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/master/installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone git@github.com:sleepy4k/laravel-ebook.git

Switch to the repo folder

    cd laravel-ebook

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:sleepy4k/laravel-ebook.git
    cd laravel-ebook
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate:fresh --seed
    php artisan serve

## Help

Any advise for common problems or issues.
```
Please create issue for detail information
```

## Authors

Contributors names and contact info

[@benjamin4kk](https://instagram.com/benjamin4kk)

## Version History

* 1.0-beta
    * Various bug fixes and optimizations
    * Add web interface with simple authenticate system
* 1.0-alpha
    * Initial Release
    * Add plain api
