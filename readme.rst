###################
Dashboard para jueces en línea
###################

El proyecto se compone de dos partes: los ficheros fuente que corren la aplicación y su base datos.  Es por ello que en el entregable figuren éstos distribuidos en la carpeta instalación:
- Una con los ficheros fuente comprimidos en un .zip
- Otra con el archivo .sql necesario para montar la base de datos.

************
Installation
************

El proceso de instalación es sencillo y se resume en cuatro pasos:

-  PASO 1: Descomprimir el .zip con los ficheros fuente. Una vez descomprimido el .zip, el resultado serán varias carpetas y ficheros (adjuntar captura con el filesystem)

-  PASO 2: Subir las carpetas descomprimidas a la raíz del servidor web. Por defecto, cada carpeta incluye un fichero .htaccess para prevenir un acceso directo vía navegador.

-  PASO 3: Desplegar la base de datos en el servidor. La base de datos (MySQL), se facilita en un fichero de tipo .sql, por lo que puede desplegarse con cualquier herramienta de gestión (SGBD) como phpMyAdmin. Para conocer los detalles sobre el modelo relacional de la base de datos, se puede consultar el Apéndice C - Base de datos.

-  PASO 4: Configurar los "ficheros application/config/config.php" y "application/config/database.php" según los parámetros del servidor. Una vez conozcamos los detalles del servidor que alojará el proyecto, es necesario configurar los dos ficheros arriba señalados para su correcta ejecución. Ambos ficheros son auto explicativos, pero se enumeran a continuación los cambios más importantes que deben realizarse.

- config.php: Este fichero multipropósito permite configurar los aspectos más pormenorizados del proyecto, siendo la mayoría opcionales. Se encuentran aquí recogidos temas como la seguridad, la codificación de caracteres o las cookies. Para nuestro propósito, el único campo que deberemos comprobar es el relativo a la URL base del proyecto:
$config['base_url'] = $root;
Donde deberemos sustituir la raíz del servidor, por una URL personalizada si así lo deseamos.  Por ejemplo:
$config['base_url']    = 'http://example.com/';
- database.php: Este fichero es el encargado de realizar la conexión con la base de datos por lo que su correcta configuración es esencial para poder levantar el sistema. Los campos relevantes son:
 $db['default'] = [
	...
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => 'yourpassword',
	'database' => 'tfg',
	...
];
Donde 'hostname', 'username', 'password', y 'database' deben corresponderse con los datos de nuestro servicio MySQL previamente desplegado.
Para cualquier configuración adicional, así como para la búsqueda de soluciones a problemas eventuales, se remite a la Guía Oficial de Instalación del framework base, el cual se mantenido inalterado para la realización de este proyecto:
https://www.codeigniter.com/user_guide/installation/index.html#

 NOTA: Como se comentó en la sección Capítulo 4 - Infraestructura y requisitos mínimos, el sistema está idealmente planificado para ejecutarse sobre un servidor Apache. Si se desea utilizar un Nginx, se recomienda adaptar el recetario que figura en la Wiki del proyecto redactado a tal efecto: https://www.nginx.com/resources/wiki/start/topics/recipes/codeigniter/
Tras la configuración anterior, el proyecto debería estar disponible y navegable a través de la URL, ya sea local o externa, definida por el servidor.
