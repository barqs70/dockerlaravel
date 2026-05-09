#!/bin/bash

# 1. Handle the .env file
if [ ! -f ./src/.env ]; then
    echo "Creating .env from .env.example..."
    cp ./src/.env.example ./src/.env
    else
        echo ".env already exists. Skipping copy."
        fi

        echo "Starting Docker containers..."
        docker compose up -d --build

        echo "Installing Composer dependencies..."
        docker compose exec app composer install

        echo "Generating Laravel app key..."
        docker compose exec app php artisan key:generate

        echo "Running database migrations..."
        docker compose exec app php artisan migrate --force

        echo "------------------------------------------------"
        echo "Running at http://localhost"

