# Prueba de desarrollo de una tienda

_Prueba de desarrollo para Shoppin._


### Pre-requisitos 馃搵

_Ambiente requerido_

- Php 7.2.0 con phpCli habilitado para la ejecuci贸n de comando.
- Mysql 5.7.19.
- Composer 
- Extensi贸n pdo_sqlite habilitada.

### Instalaci贸n 馃敡

1. Clonar el repositorio en el folder del servidor web en uso o en el de su elecci贸n, **este folder debe tener permisos para que php se pueda ejecutar por CLI y permisos de lectura y escritura para el archivo .env**.

```sh 
git clone https://github.com/jovel882/evertec.git 
```

2. Instalar paquetes ejecutando en la ra铆z del folder.

```sh 
composer install
```

3. Duplique el archivo `.env.example` incluido en uno de nombre `.env` y dentro de este ingrese los valores de las variables de entorno necesarias, las b谩sicas ser铆an las siguientes:
- `DB_HOST="value"` Variable de entorno para el host de BD.
- `DB_PORT="value"` Variable de entorno para el puerto de BD.
- `DB_DATABASE="value"` Variable de entorno para el nombre de BD.
- `DB_USERNAME="value"` Variable de entorno para el usuario de BD.
- `DB_PASSWORD="value"` Variable de entorno para la contrase帽a de BD.
- `PLACE_TO_PAY_LOGIN="value"` Variable de entorno para el id del login de la cuenta Place To Pay.
- `PLACE_TO_TRAN_KEY="value"` Variable de entorno para el TranKey de la cuenta Place To Pay.
- `PLACE_TO_TRAN_URL="value"` Variable de entorno para la URL de la cuenta Place To Pay.
- `PRODUCT_PRICE="value"` Variable de entorno para el precio del producto. Entero valido.
- `PRODUCT_NAME="value"` Variable de entorno para el nombre del producto.
- `EXPIRED_MINUTES_PTP="value"` Variable de entorno que especifica la cantidad de minutos para expirar la transacci贸n. Entero valido.
- `MINUTES_VERIFY_PAY="value"` Variable de entorno que especifica cada cuantos minutos se ejecuta la validaci贸n de estado de los pagos, no debe sobrepasar los 60.
- `EXPIRED_DAYS_ORDER="value"` Variable de entorno que especifica la cantidad de d铆as para expirar la orden. Entero valido.
- `TIME_EXPIRED_ORDERS="value"` Variable de entorno que especifica la hora del d铆a en la que se ejecuta la expiraci贸n de ordenes debe estar en formato de hora y minutos ejemplo a las 7 de la noche seria 19:00, y a las 7 de la ma帽ana seria 07:00 .

4. En la ra铆z del sitio ejecutar.
- `php artisan key:generate && php artisan config:cache && php artisan config:clear` Genera la llave para el cifrado de proyecto y refresca las configuraciones.
- `php artisan migrate` Crea la estructura de BD. 
- `php artisan db:seed` Carga los datos de ejemplo, en este caso el 谩rbol inicial enviado en la prueba.
- `php artisan storage:link` Genera el link simb贸lico entre "public/storage" y "storage/app/public".
- `php artisan permission:cache-reset` Limpia la cache de los permisos.
- `php artisan serve` Arranca el servidor web bajo la url [http://127.0.0.1:8000](http://127.0.0.1:8000).

5. Accede al sitio usando la url [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Descripci贸n general de las URL's 鈿欙笍

M茅todo|URL|Descripci贸n
 ------ | ------ | ------ 
 GET|/|Url de inicio del sitio.
GET|login|Formulario de ingreso.
POST|login|Autentica.
POST|logout|Logout.
GET|notification/unread/__{id}__|Marca una notificaci贸n como leida.
GET|orders|Vista con el listado de ordenes y acciones disponibles.
POST|orders|Crea una orden.
GET|orders/__{order}__|Vista con el detalle de la compa帽铆a.
GET|orders/__{order}__/pay|Crea una transacci贸n para pago.
GET|register|Formulario de registro.
POST|register|Registra usuario.
GET|transactions/receive/__{gateway}__/__{uuid}__|Recibe una notificaci贸n de cambio de estado en transacci贸n.

##### Nota: 
- El par谩metro __{id}__ Id de la notificaci贸n, debe ser num茅rico.
- El par谩metro __{order}__ Id de la orden, debe ser num茅rico.
- El par谩metro __{gateway}__ Nombre de la plataforma de pago.
- El par谩metro __{uuid}__ UUID de la transacci贸n.

## Usuarios de prueba disponibles. 馃攽

Email|Password|Rol|Permisos
 ------ | ------ | ------ | ------ 
admin@evertec.com|password|SuperAdministrator|Puede realizar todas las acciones disponibles.
admin_ordenes@evertec.com|password|Ordenes|Tiene permiso para ver todas las ordenes.
andresdino9ster@gmail.com|123456789|(Ninguno)| Tiene solo acceso a sus ordenes.

##### Nota: 
Todos los usuarios que se registren solo pueden interactuar con sus ordenes.

## Autor 鉁掞笍 

* **Hector Andres Sanchez** [hasanchezt@misena.edu.co](Andresdino:hasanchezt@misena.edu.co.com)


------------------------
