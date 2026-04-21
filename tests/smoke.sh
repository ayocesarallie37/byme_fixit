#!/bin/bash

echo "Ejecutando Smoke Test..."

curl -f http://localhost:8080

if [ $? -ne 0 ]; then
  echo "Smoke test falló"
  exit 1
fi

echo "Smoke test OK"