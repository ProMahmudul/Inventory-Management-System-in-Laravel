
# ![Inventory Management System](logo.png)

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.8/installation)


Clone the repository or doanload the project from github

    git clone https://github.com/ProMahmudul/Inventory-Management-System-in-Laravel

Copy that project in htdocs folder and open the folder location in cmd.

Import database laravel_inventory.sql

Now rename the "env.example" file to ".env"

You can configure the database informations here.

Now open cmd and run some commands...

Install all the dependencies using composer

    composer install

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve
    
## Admin Login Credentials

email: mahmudul89277@gmail.com 

password: 1234

**you can change it from database as per your need.


## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php artisan serve


