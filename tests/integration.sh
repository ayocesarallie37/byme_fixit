#!/bin/bash

echo "🔗 Ejecutando Integration Test..."

docker exec byme_fixit_app php artisan test

if [ $? -ne 0 ]; then
  echo "❌ Integration test falló"
  exit 1
fi

echo "✅ Integration test OK"