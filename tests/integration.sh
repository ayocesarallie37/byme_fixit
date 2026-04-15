#!/bin/bash

echo "🔗 Ejecutando Integration Test..."

docker exec byme_fixit-app-1 bash -c "
cp .env.example .env &&
php artisan key:generate &&
touch database/database.sqlite &&
echo 'DB_CONNECTION=sqlite' >> .env &&
echo 'DB_DATABASE=/var/www/html/database/database.sqlite' >> .env &&
php artisan migrate &&
php artisan test
"

if [ $? -ne 0 ]; then
  echo "❌ Integration test falló"
  exit 1
fi

echo "✅ Integration test OK"