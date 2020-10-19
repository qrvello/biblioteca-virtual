# **Biblioteca virtual**

## Requerimientos

- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Composer

***

## Instalación

- Ubicarse en la carpeta raíz del proyecto  y ejecutar el comando:

~~~bash
composer install
~~~

- Copiar .env.example y guardarlo como .env.
- Configurar base de datos y luego ejecutar:
  
~~~~bash
php artisan migrate --seed
~~~~

***

## Ejecución

- Ejecutar:
  
~~~bash
php artisan serve
~~~

- Ir a /admin y loguearse con user `admin` y password `admin`.
