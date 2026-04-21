#!/bin/bash

echo "Health Check..."

curl -f http://localhost:8080

if [ $? -ne 0 ]; then
  echo "Servicio caído"
  exit 1
fi

echo "Servicio saludable"