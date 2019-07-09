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
  php artisan migrate
  php artisan serve
```


## Cambiar diseño paginas nativas de laravel

Para cambiar el diseño en elas paginas nativas de laravel ejemplo **login** asegurarse lo siguiente:

1 - Respetar todos los campos inputs
2 - Respetar todos los codigos de laravel que le presedan @ ejemplo los ifs