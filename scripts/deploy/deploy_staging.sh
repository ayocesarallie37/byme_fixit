#!/bin/bash

echo "🚀 Deploy a STAGING..."

railway up

railway run php artisan migrate --force

echo "✅ Deploy STAGING completado"