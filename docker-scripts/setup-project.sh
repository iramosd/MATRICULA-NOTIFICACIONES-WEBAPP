#!/bin/bash

# Install PHP dependencies
composer install

# Generate application key
php artisan key:generate

# Migrate the database
php artisan migrate:fresh --seed

# Install Node modules and build assets
npm install
npm run build
npm run dev &

# Run PHP server 
php artisan serve --host=0.0.0.0 --port=8000

# Fallback para mantener el contenedor en ejecución
tail -f /dev/null