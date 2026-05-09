#!/bin/bash

# 1. Handle the .env file

error_exit() {
    echo "❌ ERROR: $1 failed at line $2."
    exit 1
}

if [ ! -f ./src/.env ]; then
    echo "Creating .env from .env.example..."
    cp ./src/.env.example ./src/.env || error_exit "Copying .env file" $LINENO
    else
        echo ".env already exists. Skipping copy."
        fi

        echo "Starting Docker containers..."
        docker compose up -d --build || error_exit "Docker Compose Build" $LINENO

        echo "Installing Composer dependencies..."
        docker compose exec app composer install || error_exit "Composer Install" $LINENO

        echo "Generating Laravel app key..."
        docker compose exec app php artisan key:generate || error_exit "Artisan Key Generate" $LINENO

        echo "Running database migrations..."
        docker compose exec app php artisan migrate --force || error_exit "Database Migrations" $LINENO

        echo "------------------------------------------------"
        echo "Running at http://localhost"
        echo "Terminate: docker compose down"

