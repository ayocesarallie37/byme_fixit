#!/bin/bash

echo "🚀 Deploy a PRODUCCIÓN..."

# Descargar últimos cambios
git pull origin main

# Construir imagen limpia
docker compose down
docker compose up -d --build

# Esperar servicios
sleep 10

# Migraciones en producción
docker exec byme_fixit-app-1 php artisan migrate --force

echo "✅ Deploy PRODUCCIÓN completado"