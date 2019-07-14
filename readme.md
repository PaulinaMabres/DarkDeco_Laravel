# DarkDeco_Laravel

## Como ejecutar el proyecto.

Una vez clonado el proyecto ejecutar:

1 - Instalar las dependencias con composer
```
  composer install
```
2 - Copiar el archivo **.env.example**  como **.env** y configurar los parametros.

3 - Iniciar el proyecto
```
  php artisan key:generate
  // php artisan migrate:fresh  Usar unicamente si se desea borrar las tablas
  php artisan migrate
  php artisan db:seed
  php artisan serve
```


## Cambiar diseño paginas nativas de laravel

Para cambiar el diseño en elas paginas nativas de laravel ejemplo **login** asegurarse lo siguiente:

1 - Respetar todos los campos inputs
2 - Respetar todos los codigos de laravel que le presedan @ ejemplo los ifs


## Generar un nuevo seed 

**Links utiles**
- [Modelo](https://laravel.com/docs/5.8/eloquent#eloquent-model-conventions)

1 - Crear el modelo para la tabla
```php
  php artisan make:model TuModelo
```
> Tambien se puede generar junto con un archivo de migratacioon
```php
  php artisan make:model TuModelo --migration
```

2 - Crear el seed para el modelo
```php
  php artisan make:seeder NombreDeLaTabla
```


## Limpiar cache laravel
```
php artisan optimize `
php artisan cache:clear 
composer dump-autoload
```