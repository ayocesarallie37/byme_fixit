#!/bin/bash

echo "Deploy a PRODUCCIÓN..."

# Deploy en Railway
railway up

# Ejecutar migraciones
railway run php artisan migrate --force

echo "Deploy PRODUCCIÓN completado"