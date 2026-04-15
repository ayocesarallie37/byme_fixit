#!/bin/bash

echo "🔍 Verificando entorno..."

docker ps | grep byme_fixit_app > /dev/null

if [ $? -ne 0 ]; then
  echo "❌ Error: contenedor no está corriendo"
  exit 1
fi

echo "✅ Entorno funcionando correctamente"