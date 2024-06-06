<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](https://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.


[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

# Youtube Clone

Youtube Clone es una aplicación web desarollada en PHP utilizando el framework Yii2. Esta aplicación imita las funcionalidades básicas de Youtube, permitiendo ver a los usuarios subir, visualizar y gestionar videos.

## Características

- Registro e inicio de sesión de usuarios
- Subida y gestión de videos
- Busqueda de videos
- Sistema de likes y dislikes
- Sistema de suscripciones a canales
- Página del perfil de usuario
- Registro del historial

### 1. Clonar el Repositorio

```sh
git clone https://github.com/tu-usuario/Youtube_Clone.git
cd Youtube_Clone
```

### 2. Instalar Dependencias

```sh
composer install
```

### 3. Configurar la Base de Datos

> **Nota:** Este proyecto fue hecho con MySQL Workbench

#### Crear la Base de Datos con MySQL Workbench

1. **Abrir MySQL Workbench**.
2. **Crear una nueva conexión** (si aún no tienes una conexión configurada):
   - Haz clic en el botón `+` al lado de "MySQL Connections".
   - Llena los detalles de tu conexión (nombre de la conexión, host, puerto, usuario, contraseña).
   - Haz clic en `Test Connection` para asegurarte de que los detalles son correctos.
   - Guarda la conexión.

3. **Crear la base de datos**:
   - Conéctate a tu servidor MySQL usando la conexión que acabas de crear.
   - Haz clic en el icono `Create a new schema in the connected server`.
   - Dale un nombre a tu base de datos (por ejemplo, `youtube_clone`).
   - Haz clic en `Apply` y luego en `Apply` nuevamente en la ventana que aparece para ejecutar el script de creación de la base de datos.

#### Configurar Yii2 para Usar la Base de Datos


1. **Copiar el archivo de ejemplo de configuración**:
   - Dentro del directorio de tu proyecto, copia `config/db.php.example` a `config/db.php`.

2. **Editar `config/db.php`**:
   - Abre `config/db.php` en tu editor de texto o IDE favorito.
   - Ajusta la configuración para que coincida con los detalles de tu base de datos creada en MySQL Workbench.

Por ejemplo, si creaste una base de datos llamada `youtube_clone` y tu usuario es `root` con la contraseña `tu_contraseña`, tu `config/db.php` debería verse así:

```php
<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=youtube_clone',
    'username' => 'root',
    'password' => 'tu_contraseña',
    'charset' => 'utf8',
];
```

### 4. Aplicar Migraciones
```sh
php yii migrate
```

### 5. Configurar el Servidor Web
1. **Si estás usando XAMPP, puedes configurar un host virtual en el archivo `httpd-vhosts.conf` (C:\xampp\apache\conf\extra\httpd-vhosts.conf)**
```
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot "C:/xampp/htdocs/Youtube_Clone/web"
    ServerName youtubeclone.test
    <Directory "C:/xampp/htdocs/Youtube_Clone/web">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

2. **Agregar `youtubeclone.test` a `hosts` (C:\Windows\System32\drivers\etc\hosts)**
```
127.0.0.1 youtubeclone.test
```

3. **Repetir los dos úlitmos pasos para el frontend**

