

# DOCUMENTACION VIP2CARS LARAVEL-12
## Requisitos del Entorno

* PHP: 8.2 o superior.

* Base de Datos: MySQL

* Servidor Local: Laragon, XAMPP o similares.

* Composer: Para la gestión de dependencias de PHP.

* NPM: Para la compilación de estilos de Bootstrap y Vite.

## D. 🚀 Instalación y Ejecucion

1. **Clonar el proyecto:**
   ```bash
   git clone https...
   ```
   ```bash
   cd vip2cars
   ```
2. **Instalar dependencias:**
   ```bash
    composer install
    npm install && npm run build
   ```
3. **Configurar variables de entorno: Renombra el archivo (`.env.example`) a (`.env`) y configura las credenciales, (DB_DATABASE, DB_USERNAME, DB_PASSWORD, DB_PORT), se usa mysql como base de datos**


4. **Generar la clave de seguridad**
    ```
    php artisan key:generate
    ```
5. **Migraciones y datos iniciales Seed, se generan las tablas y el usuario admin**
    ```sh
    php artisan migrate:fresh --seed
    ```

6. **Desplegar en local**
    ```sh
    php artisan serve
    ```


7. **Usuario para Loguearse:**
    ```sh
    correo: admin@gmail.com
    password: 12345678
    ```