<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# OverLoad Admin

OverLoad es un foro sobre videojuegos que permite a los administradores:

- Agregar juegos y catalogarlos por categoría.
- Ver imágenes de los juegos publicados.

# OverLoad Usuario

OverLoad es un foro sobre videojuegos que permite a los Usuarios:

- Agregar comentarios a las publicaciones.
- Dar 'me gusta' a las publicaciones.
- Ver y buscar juegos por categorias.

Este proyecto está desarrollado con **Laravel** y **TailwindCSS** y utiliza **MySQL** como base de datos.

## Instalación

1. Clonar el repositorio:

```bash
 git clone https://github.com/NicolasBosak/Overload.git
```

2. Instalar las dependencias de Composer:

```bash
 composer install
```

3. Crear una copia del archivo .env:

```bash
 cp .env.example .env
```

4. Generar la clave de la aplicación:

```bash
 php artisan key:generate
```

5. Configurar las variables de entorno en el archivo `.env` (Base de datos, credenciales de correo, etc.)

6. Ejecutar las migraciones y seeders:

```bash
 php artisan migrate --seed
```

7. Ejecutar el servidor:

```bash
 php artisan serve
```

## Características

- Gestión de juegos y categorías.
- Sistema de comentarios por publicación.
- Sistema de 'me gusta' por publicación.
- Visualización de imágenes por publicación.
- Autenticación de usuarios.

## Tecnologías Utilizadas

- **Laravel 10.x** - Framework Backend.
- **TailwindCSS** - Framework CSS.
- **MySQL** - Base de datos relacional.
- **Composer** - Gestión de dependencias PHP.
- **Laravel Sanctum** - Autenticación.
- **Intervention Image** - Manipulación de imágenes.