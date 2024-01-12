<p align="center"><a href="" target="_blank"><img src="/img/logo.png" width="400" alt="Logo"></a></p>

## Getting Started for Promocode Management System

*Run the commands below to install the composer and view*

- composer install
- npm i vue-loader
- npm run build

### Set up database
- replace the .env.example to .env

### Seeder the data into your database
- php artisan db:seed

### Run the commands below to use the print pdf function and import excel function
- composer require barryvdh/laravel-dompdf
- composer require maatwebsite/excel
