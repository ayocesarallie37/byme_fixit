#!/bin/bash

echo "🚀 Iniciando entorno QA..."

docker compose -f infra/docker-compose.qa.yml up -d

echo "✅ QA listo en http://localhost:8000"