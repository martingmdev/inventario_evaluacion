--Sistema de inventario para evaluación Técnica--

Las herramientas utilizadas para el desarrollo de éste proyecto son:

VS Code 1.87.2 - Como editor de código.
MX Linux 23 - Cómo sistema operativo (el sistema puede correr perfectamente en cualquier SO).
PHP 8.2.12 - Lenguaje utilizado.
Apache 2.4.58 - Como servidor web local.
MariaDB 10.4.32 - DBMS.
Navegador web Mozilla Firefox y Brave Browser.

------- Pasos para correr la aplicación --------
Para probar la aplicación en un entorno de desarrollo local como lo puede ser (XAMPP) con Apache, MariaDB, PHP los pasos a seguir son:

1. Tener previamente instalado nuestro servidor local y corriendo.

2. Clonar el repositorio hacía la carpeta htdocs o la carpeta predeterminada del servidor web que estemos utilzando (normalmente htdocs en Xampp). (/opt/lampp/htdocs) en Linux.

3. Dentro de la carpeta SCRIPTS hay dos archivos, con dos opciones para crear la base de datos.

    - Opción 1 directamente en MySQL archivo scriptdb.sql: contiene el script completo para crear la base de datos con el nombre necesario, solo ejecutar los scripts directamente en una consola con mysql iniciado y se creara automaticamente la base de datos así como las tablas necesarias.

    - Opción 2 mediante phpmyqdmin archivo sistema_inventario.sql: abrir phpmyadmin crear una base de datos nueva llamada sistema_inventario, una vez creada importar las tablas desde el archivo sistema_inventario.sql

NOTA: Se crearon dos usuarios predeterminados insertandolos directamente a la base de datos ya que no se solicita o no existe un modulo para alta de usuarios al sistema. 

Los usuarios son:

Administrador

Correo: admin@lorem.com
Contraseña: admin123

Almacenista

Correo: store@lorem.com
Contraseña: store123

4. En éste punto ya podemos ingresar al sistema en la direccion http://localhost/sistema_inventario.

5. Ingresamos alguna de las credenciales en el login dependiendo de si entrará en modo administrador o almacenista, una vez ingresadas las credenciales ya podemos acceder al sistema.
