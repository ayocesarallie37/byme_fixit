# ByMe FixIt

![Laravel CI](https://github.com/ayocesarallie37/byme_fixit/actions/workflows/ci.yml/badge.svg)

![License](https://img.shields.io/badge/license-MIT-green)

![Laravel](https://img.shields.io/badge/Laravel-10-red)

![PHP](https://img.shields.io/badge/PHP-8.2-blue)

## Descripción
ByMe FixIt es una aplicación web diseñada para gestionar solicitudes de mantenimiento y soporte técnico dentro de una organización.

## Objetivo
Automatizar el registro, seguimiento y resolución de incidencias técnicas.

## Stack tecnológico
- Backend: Laravel
- Frontend: Blade + Vite
- Base de datos: MySQL / SQLite
- Control de versiones: Git + GitHub
- CI/CD: GitHub Actions

## Tipo de aplicación
Aplicación web.

## Roles del sistema
- Administrador
- Técnico
- Residente

## Funcionalidades principales
- Registro de usuarios
- Gestión de incidencias
- Asignación de técnicos
- Seguimiento de solicitudes

## Documentation

Project documentation can be found in the `/docs` directory.

- Architecture
- API
- Installation Guide

## Estructura de pruebas

El proyecto cuenta con diferentes tipos de pruebas organizadas de la siguiente manera:

tests/
├── Unit/
├── Feature/
│ ├── Aceptacion/
│ ├── Esfuerzo/
│ └── Integracion/

### Tipos de pruebas:
- **Unitarias:** Validan funciones individuales.
- **Integración:** Validan interacción entre módulos.
- **Esfuerzo:** Evalúan rendimiento del sistema.
- **Aceptación:** Validan que el sistema cumple con los requisitos del usuario.

## Ejecución de pruebas

### 1. Ejecutar todas las pruebas
```bash
php artisan test

## Instalación

```bash
git clone https://github.com/tuusuario/byme_fixit.git
cd byme_fixit
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
