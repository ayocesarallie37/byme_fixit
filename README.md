# Byme Fixit

## Integrantes

* Pérez Hernández César Alejandro.
* Alan David Péch Mex.
* Reyes Sanchez Kevin Jair.
* Zetina Arias Brian Daniel.
* Pech Santis Miguel Ángel.
* Hernández Buenrostro Luis Felipe.
* De la Cruz Celis Jose Adiel.

---

## Descripción

Byme Fixit es una aplicación desarrollada en Laravel que permite gestionar servicios técnicos, implementando un flujo completo de integración y despliegue continuo (CI/CD) utilizando Docker y GitHub Actions.

---

## Requisitos previos

* Docker
* Docker Compose
* Git
* Node.js (opcional)
* PHP 8.2 (si se ejecuta sin Docker)

---

## Instalación

```bash
git clone https://github.com/ayocesarallie37/byme_fixit.git
cd byme_fixit
docker compose up -d --build
```

---

## Ejecución

Abrir en navegador:

```
http://localhost:8080
```

---

## Pruebas

### Smoke Test

```bash
bash tests/smoke.sh
```

### Integration Test

```bash
bash tests/integration.sh
```

### Health Check

```bash
bash tests/healthcheck.sh
```

---

## Pipeline CI/CD

El pipeline incluye:

* Build
* Test
* Publish (Docker)
* Deploy

Se ejecuta automáticamente con:

* push a `main`
* pull request

---

## Despliegue

### Deploy a staging

```bash
bash scripts/deploy/deploy_staging.sh
```

### Deploy a producción

```bash
bash scripts/deploy/deploy_production.sh
```

---

## Rollback

```bash
bash scripts/deploy/rollback.sh
```

---

## Variables de entorno

Archivo `.env.example` incluye:

* DB_CONNECTION
* DB_HOST
* DB_DATABASE
* DB_USERNAME
* DB_PASSWORD

---

## Evidencia

Pipeline ejecutado correctamente en GitHub Actions:

* Build ✔️
* Tests ✔️
* Deploy ✔️

---

## Notas

El proyecto utiliza Docker para garantizar portabilidad y reproducibilidad del entorno.

---
