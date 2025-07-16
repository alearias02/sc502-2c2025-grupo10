# SC502-2C2025-GRU10 - Documentación del Proyecto

Este repositorio contiene dos directorios:

* **legacy/**: Código monolítico PHP original.
* **project/**: Nuevo backend desarrollado con Laravel, siguiendo una arquitectura API-first.

La idea es utilizar API-first para el backend con Laravel, apoyado en Blade como motor de plantillas para las vistas y Axios para consumir la API desde el frontend. Este esquema permite:

Separación clara entre lógica de negocio y presentación.

Endpoints RESTful seguros protegidos con Laravel Sanctum.

Vistas iniciales generadas con Blade, manteniendo la facilidad de uso de plantillas de Laravel.

Interacciones dinámicas (CRUD, carga asíncrona de datos) gestionadas con Axios.

---

## 📂 Estructura del Proyecto

```
SC502-2C2025-GRU10/
├── legacy/           # Código antiguo (monolito PHP)
└── project/          # Nuevo Laravel API
    ├── app/
    ├── config/
    ├── database/
    │   ├── migrations/
    │   └── seeders/
    ├── public/
    ├── resources/
    ├── routes/
    ├── storage/
    ├── tests/
    ├── vendor/
    └── composer.json
└── README.md         # Documentación y guía de instalación
```

---

## 📋 Prerrequisitos

* **PHP 8.0+**
* **Composer**
* **MySQL** (MAMP o XAMPP)

---

## ⚙️ Instalación del Backend (Laravel)

1. **Moverse al directorio** `/project`:

   ```bash
   cd project
   ```

2. **Instalar dependencias**:

   ```bash
   composer install
   ```

3. **Generar clave de aplicación**:

   ```bash
   php artisan key:generate
   ```

4. **Instalar scaffolding de API (Laravel Sanctum)**:

   ```bash
   php artisan install:api
   ```

5. **Copiar archivo de entorno**:

   ```bash
   cp .env.example .env
   ```

6. **Configurar la base de datos** en `.env`:

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306        # O 8889 si usas MAMP
   DB_DATABASE=proyecto_awcs
   DB_USERNAME=root
   DB_PASSWORD=root
   ```

7. **Crear base de datos vacía** `proyecto_awcs` en MySQL.

8. **Ejecutar migraciones**:

   ```bash
   php artisan migrate
   ```

9. **Publicar recursos de Sanctum** (si no se hizo con el install):

   ```bash
   php artisan vendor:publish --provider="Laravel\\Sanctum\\SanctumServiceProvider"
   ```

---

## 🚀 Levantar el servidor

* **Opción A: Artisan**

  ```bash
  php artisan serve
  ```

  Se accederá en: `http://127.0.0.1:8000`.

* **Opción B: MAMP/XAMPP**

  Configurar DocumentRoot al directorio `project/public`.

---

## 📑 Uso de la API

Todas las rutas RESTful se definen en `project/routes/api.php` y usan el middleware de Sanctum, ejemplo:

* **Listar doctores**: `GET  /api/doctors`
* **Crear doctor**:  `POST /api/doctors`
* **Actualizar**:     `PUT  /api/doctors/{id}`
* **Eliminar**:       `DELETE /api/doctors/{id}` 

---

## ✍️ Guía para nuevas migraciones

1. **Crear migración**:

   ```bash
   php artisan make:migration create_<tabla>_table --create=<tabla>
   ```

2. **Definir columnas** en `database/migrations/...`:

   ```php
   Schema::create('<tabla>', function (Blueprint $table) {
       $table->id();
       $table->string('name',100)->unique();
       $table->text('description')->nullable();
       $table->timestamps();
   });
   ```

3. **Ejecutar migraciones**:

   ```bash
   php artisan migrate
   ```
