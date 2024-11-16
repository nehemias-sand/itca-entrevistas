<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# ITCA Entrevistas API - Configuración y Ejecución

Este proyecto es una API desarrollada con Laravel 11. A continuación, se detallan las instrucciones para levantar la API en entornos de desarrollo y producción.

## Requisitos Previos

-   **PHP >= 8.1**
-   **Composer**
-   **MySQL**
-   **Servidor Web** (como Apache o Nginx para producción)

## Instalación

1. Clona el repositorio:

    ```bash
    git clone https://github.com/tu_usuario/tu_repositorio.git
    cd tu_repositorio
    ```

2. Instala las dependencias de PHP usando Composer:

    ```bash
    composer install
    ```

3. Copia el archivo `.env.example` a `.env` y configura las variables de entorno según tus necesidades:

    ```bash
    cp .env.example .env
    ```

4. Genera una clave de aplicación:

    ```bash
    php artisan key:generate
    ```

5. Genera la clave secreta del paquete Tymon JWTAuth:

    ```bash
    php artisan jwt:secret
    ```

6. Configura la base de datos y el servicio de correos en el archivo `.env`:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=usuario
    DB_PASSWORD=contraseña

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=tu_correo@gmail.com
    MAIL_PASSWORD=tu_contraseña
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=tu_correo@gmail.com
    MAIL_FROM_NAME="${APP_NAME}"
    ```

## Migraciones y Seeds

1. Ejecuta las migraciones para crear las tablas en la base de datos:

    ```bash
    php artisan migrate
    ```

2. Ejecuta los seeders para poblar la base de datos con datos iniciales:

    ```bash
    php artisan db:seed
    ```

## Modo Desarrollo

En el modo de desarrollo, Laravel usa el servidor de desarrollo integrado de PHP.

1. Inicia el servidor de desarrollo:

    ```bash
    php artisan serve
    ```

    El servidor se ejecutará en `http://localhost:8000`.
