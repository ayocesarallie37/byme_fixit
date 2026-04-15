#!/bin/bash

echo "🚀 Deploy a STAGING..."

# Construir contenedores
docker compose down
docker compose up -d --build

# Esperar servicios
sleep 10

# Migraciones
docker exec byme_fixit-app-1 php artisan migrate --force

echo "✅ Deploy STAGING completado"