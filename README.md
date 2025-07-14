
Este repositorio contiene dos carpetas:

legacy/: Código monolítico PHP original (no tocar).

project/: Nuevo backend Laravel (API-first).

📂 Estructura
SC502-2C2025-GRU10/
├── legacy/ # Código viejo (monolito PHP)
└── project/ # Nuevo Laravel API
    ├── app/
    ├── config/
    ├── database/
    │ ├── migrations/
    │ └── seeders/
    ├── public/
    ├── resources/
    ├── routes/
    ├── storage/
    ├── tests/
    ├── vendor/
    ├── composer.json
└── README.md

Prerrequisitos
macOS / Linux
PHP 8.0+

Composer

MySQL (MAMP, Homebrew, sistema nativo)

Windows
PHP 8.0+ (XAMPP)

Composer (instalador oficial)

MySQL (incluido en XAMPP)

Instalación (macOS, Linux y Windows)
Ejecuta estos comandos dentro de /project

Instalar dependencias:
composer install

Generar la clave de aplicación:
php artisan key:generate

Configurar base de datos
En project/.env, ajustar:

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306       # O 8889 en MAMP  
DB_DATABASE=proyecto_awcs  
DB_USERNAME=root  
DB_PASSWORD=root     
Crear la base de datos vacía proyecto_awcs 

Migraciones y datos de ejemplo

php artisan migrate  
php artisan db:seed    # opcional, si tienes seeders  

⚙️ Levantar servidor
Opción A: Artisan 
php artisan serve  
# -> http://127.0.0.1:8000  

Opción B: MAMP / XAMPP 
Apuntar el DocumentRoot a:
/ruta/a/SC502-2C2025-GRU10/project/public

Accede con el host configurado

📑 Uso de la API
Todas las rutas JSON deberan estar en project/routes/api.php, por ejemplo:

POST /api/login

POST /api/register

GET /api/specialists

POST /api/appointments

Las peticiones y respuestas usan JSON.

Añadir migraciones en database/migrations, por ejemplo:
# Para una tabla “specialties”:
php artisan make:migration create_specialties_table --create=specialties
En el archivo creado database/migrations/ , dentro del up(), definir las columnas de la tabla, por ejemplo:
Schema::create('specialties', function (Blueprint $table) {
    $table->id();
    $table->string('name', 100)->unique();
    $table->text('description')->nullable();
    $table->timestamps();
});

ejecutar la migracion: 
php artisan migrate

por ejemplo en mysql workbench se deberan ver las tablas creadas en la db 
