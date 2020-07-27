
## Acerca de la API 

Hacer git clone del Proyecto

Ajustar el archivo.env en base a su base de datos

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=base_db
    DB_USERNAME=usuario
    DB_PASSWORD=

Iniciar el servidor 

	php artisan serve
    
Crea las tablas de bases de datos
	
	php artisan migrate
    
Ejecutar seed

    php artisan migrate:seed


