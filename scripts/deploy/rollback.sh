#!/bin/bash

echo "⏪ Ejecutando ROLLBACK..."

# Volver al commit anterior
git reset --hard HEAD~1

# Reconstruir contenedores
docker compose down
docker compose up -d --build

echo "✅ Rollback completado"