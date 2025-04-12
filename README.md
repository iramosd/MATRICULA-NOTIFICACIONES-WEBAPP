# Proyecto Laravel con MySQL

Este proyecto ha sido desarrollado utilizando **Laravel v12**, **PHP 8.2** y **MySQL**, con herramientas modernas como **Node.js v22**.

## 🚀 Requisitos

- PHP 8.2
- Laravel v12
- Node.js v22
- MySQL (con base de datos previamente creada)
- Composer
- Docker (opcional)

## ⚙️ Configuración del Proyecto

Antes de iniciar, asegúrate de haber creado la base de datos necesaria para el proyecto.

### Opción 1: Usando Docker

1. Colócate en la raíz del proyecto.
2. Ejecuta el siguiente comando:

```bash
docker compose up --build -d
```

### Opción 2: Instalación Manual

#### Frontend (Node.js)

```bash
npm install
npm run build
npm run dev
```

#### Backend (PHP y Laravel)

```bash
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

## 📂 Estructura del Proyecto

- `/app` - Código principal de la aplicación Laravel
- `/resources` - Archivos de vistas y frontend
- `/database` - Migraciones, factories y seeders
- `/routes` - Definiciones de rutas

##  RestFul API Endpoints

Según lo solicitado se crearon los siguientes endpoints: 

http://localhost:8000/api/v1/academies/
http://localhost:8000/api/v1/courses/
http://localhost:8000/api/v1/payments/
http://localhost:8000/api/v1/communications/
http://localhost:8000/api/v1/enrollments/

### Los endpoints están protegidos, para acceder se debe generar el bearer token ingresando el correo y contraseña en: ###

http://localhost:8000/api/login/

correo: ramosdumas_ismael@hotmail.com
contraseña: password12345


## 📝 Notas

- Asegúrate de tener configurado tu archivo `.env` correctamente antes de correr las migraciones.
- Puedes modificar las credenciales de la base de datos directamente en el archivo `.env`.
- En el archivo DatabaseSeeder encontrará los usuarios para el uso de la API como del web app
