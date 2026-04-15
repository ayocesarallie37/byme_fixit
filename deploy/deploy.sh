#!/bin/bash

ENV=$1

echo "Deployando a $ENV..."

docker-compose down
docker-compose up -d

echo "Deploy completado ✔️"