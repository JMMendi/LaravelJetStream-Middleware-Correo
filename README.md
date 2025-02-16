## Proyecto Laravel con Jetstream

Para instalar y usar este proyecto, puedes hacer un fork del proyecto o clonarlo desde la opción de Code e incluso puedes descargar el archivo ZIP y abrirlo usando un IDE como Visual Studio Code

### Qué configurar

Al abrir el proyecto con el IDE, hay que hacer una copia del .env.example, renombrarlo a .env y modificar el archivo para que coja la base de datos a su elección, la URL, y la aplicación que se vaya a usar para emular la mensajería email.
Tras esto, debes hacer un composer update para que se descarguen las librerias usadas en el proyecto (se almacenan en la carpeta vendor).

Si se va a usar una base de datos sqlite, en la carpeta database hay que crear el archivo database.sqlite para que funcionen las migraciones.

Finalmente, para ejecutar el proyecto se requiere ejecutar las líneas de comandos:

    - npm run dev
    - php artisan serve

O en su defecto solo:


    - composer dev

Tras esto solo tendrá que poner la URL en su navegador y ya podrá usar el proyecto.

## Autor
Juan Manuel Mendizábal Amat

## Version
1.0

## Programas y Frameworks usados
    - Visual Studio Code
    - Composer
    - NPM
    - Laravel
    - Jetstream
    - Livewire

## Aplicaciones externas
    - Mailtrap
