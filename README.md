

# DOCUMENTACION VIP2CARS
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
3. **Configurar variables de entorno: Renombra el archivo (`.env.example`) a (`.env`) y configura las credenciales que se requieren**

4. **Configura las credenciales de tu base de datos en el (`.env`) (DB_DATABASE, DB_USERNAME, DB_PASSWORD).**

5. **Generar la clave de seguridad**
    ```
    php artisan key:generate
    ```
4. **Migraciones y datos iniciales Seed**
    ```sh
    php artisan migrate:fresh --seed
    ```

5. **Desplegar en local**
    ```sh
    php artisan serve
    ```