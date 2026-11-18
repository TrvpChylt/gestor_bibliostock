# 📚 Gestor BiblioStock

Sistema de gestión e inventario bibliotecario desarrollado con **Laravel** y **PostgreSQL**, creado como parte del proyecto universitario de programación (Módulo 2).

---

## 👥 Guía de Instalación para el Equipo (Usuarios de Windows)

Si eres colaborador del proyecto y usas **Windows**, sigue estos pasos al pie de la letra para configurar tu entorno local y poner a correr la aplicación.

### Requisitos Previos
Asegúrate de tener instalado en tu PC:
1. **PHP** (Versión 8.3 con extensiones habilitadas: `pgsql`, `curl`, `xml`, `mbstring`, `zip`, `fileinfo`)
2. **Composer** (Gestor de dependencias de PHP)
3. **PostgreSQL** y **pgAdmin 4** (Motor de base de datos)
4. **Node.js y NPM** (Para el manejo de assets)
5. **Git for Windows** (Incluye la terminal **Git Bash**)

---

### Paso 1: Clonar el Repositorio
1. Abre **Git Bash** en tu computadora.
2. Ubícate en la carpeta donde desees guardar el proyecto (ej. Documentos):
   ```bash
   cd /c/Users/TuNombreDeUsuario/Documents

3. git clone https://github.com/TrvpChylt/gestor_bibliostock.git

    ```bash
    4. cd gestor-bibliostock


---

### Paso 2: Instalar Dependencias
1. Dentro de la carpeta del Proyecto Ejecuta estos comandos:
    ```bash
    composer install
    npm install


### Paso 3: Configurar la Base de Datos
1. Vamos a utilizar PostgreSQL, con la interfaz de pgAdmin 4
2. Descarga el instalador:
3. Entra a la página oficial: postgresql.org/download/windows
4. Haz clic en Download the installer y elige la versión más reciente (ej. versión 18 o 17) para Windows x86-64.

Ejecuta y Siguiente:

Abre el archivo descargado (.exe).

Haz clic en Next en las primeras ventanas de bienvenida y elige la carpeta de instalación por defecto.

Selecciona los componentes:

Asegúrate de que todas las casillas estén marcadas (especialmente PostgreSQL Server, pgAdmin 4 y Command Line Tools). Dale a Next.

Define una contraseña:

Te pedirá una contraseña para el superusuario (postgres). Escribe una clave fácil de recordar (por ejemplo, 1234 o postgres) y anótala, la vas a necesitar para conectar Laravel. Dale a Next.

Puerto por defecto:

Déjalo en el puerto estándar que viene marcado (5432). Dale a Next en todas las ventanas siguientes hasta que comience la instalación (Next -> Next -> Finish).

### Paso 4: Configurar el Archivo de Entorno
1. Abre el archivo .env con tu editor de texto favorito (como VS Code) y actualiza el bloque de base de datos con tus credenciales locales:

    ```bash
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=gestor_bibliostock
    DB_USERNAME=postgres
    DB_PASSWORD=tu_clave_segura_de_postgres

2. Genera la llave de encripción secreta de Laravel:

    ```bash
    php artisan key:generate

### Paso 5: Migraciones y Servidor Local
1. Ejecuta las migraciones para crear las tablas en la base de datos:

    ```bash
    php artisan migrate

2. Inicia el servidor de desarrollo local:

    ```bash
    php artisan serve