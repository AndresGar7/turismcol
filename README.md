## Inicialización del proyecto

1. Instalar Laragon para iniciar con mas facilidad esta pagina web
2. Abrir una terminal en la ruta C:/laragon/www/ 
3. Descargar o clonar este repositorio en C:/laragon/www/turismcol con el siguiente comando:
git clone https://github.com/AndresGar7/turismcol.git
4. Abrir el terminal que ofrece el Panel de Laragon
5. En el terminal ingresar a la ruta del proyecto descargado con: cd turismcol
6. Al estar dentro de la carpeta del proyecto, se deben de ejecutar los siguientes comandos
7. composer install
8. cp .env.example .env
9. php artisan key:generate  
10. php artisan storage:link 
11. Se debe de abrir la base datos en el panel de laragon y crear una DB con el nombre de turismcol, 
con usuario= root y constraseña= (vacia). O configurar el .env segun la configuracion que se tenga en mysql
12. Luego se debe de ejecutar en el terminal de laragon el siguiente comando:
php artisan migrate:fresh --seed  --> para crear las tablas del proyecto e insertar algunos datos de pruebas en la DB.
13. Escribir en el navegador http://turismcol.test

## Como loguearse en la aplicacion

Se puede registrar en la pagina como un nuevo usuario, en el apartado de registrarse.

O si quiere tener el control total de la pagina se debe de loguear con el siguiente usuario que es el Master:

Usuario: admin@admin  
Contraseña: admin1234