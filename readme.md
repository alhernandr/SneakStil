# ***SNEAKSTIL*** ![image](https://github.com/alhernandr/SneakStil/assets/116368055/539af187-2c83-46d5-a508-42436639a14b)


***DOCUMENTACIÓN***

## ***Índice***
**Nombre del proyecto**
**Descripción del proyecto 
Objetivos del proyecto**
 
**Diagramas**
*Diagrama de Clase
Diagrama de Casos de Uso*
1. Cliente
1. Administrador

***Estructura del proyecto***
1. General
1. Controllers
1. Includes
1. Models
1. Public
1. Views

***Instrucciones de Uso***
1. Requisitos previos

**Autoría**


## ***Nombre del Proyecto:***
“SNEAKSTIL” derivado de la palabra Sneaker y Stil en alemán que significa estilo.*

## ***Descripción del Proyecto:***
“SNEAKSTIL” es una tienda en línea especializada en sneakers de moda de alta calidad. Nuestro objetivo es proporcionar a los amantes de las sneakers una experiencia de compra en línea excepcional, ofreciendo una amplia gama de productos de las mejores marcas, desde las icónicas zapatillas de deporte hasta los modelos más exclusivos y de edición limitada.

## ***Objetivos del Proyecto:***

***Crear una Plataforma de Comercio Electrónico:*** Desarrollar una plataforma de comercio electrónico atractiva y fácil de usar que permita a los clientes navegar, buscar, seleccionar y comprar productos de manera conveniente.

***Amplia Selección de Productos:*** Ofrecer una amplia variedad de zapatillas de moda, incluyendo zapatillas para correr, baloncesto, skate, estilo de vida y más. Incluir modelos de las principales marcas y también opciones de edición limitada.

***Experiencia de Usuario Óptima:*** Proporcionar una experiencia de usuario intuitiva y personalizada, incluyendo funciones como recomendaciones de productos, búsquedas avanzadas y un carrito de compras fácil de usar.

***Gestión de Inventario Eficiente:*** Mantener un sistema de gestión de inventario eficiente para asegurarse de que los productos estén disponibles y actualizados en tiempo real.

***Promociones y Descuentos:*** Ofrecer promociones especiales, descuentos y programas de fidelización para atraer y retener a los clientes.

***Atención al Cliente de Calidad: ***Proporcionar un excelente servicio de atención al cliente para resolver consultas, manejar devoluciones y garantizar la satisfacción del cliente.


## ***DIAGRAMAS***
1. ***Diagrama de Clases***

![image](https://github.com/alhernandr/SneakStil/assets/116368055/3783ccbb-1c6d-45dd-b4b8-9959994a5437)


1. ***Diagrama de Casos de Uso***

![image](https://github.com/alhernandr/SneakStil/assets/116368055/fcde6e7b-cc94-4f76-aadb-d2106ec50bb0)


## ***ESTRUCTURA DEL PROYECTO***

*El proyecto de PHP se ha desarrollado siguiendo los principios de la Programación Orientada a Objetos (POO), haciendo uso de patrones de diseño como Active Record y Model-View-Controller (MVC) para garantizar una estructura clara y mantenible del código. La gestión de dependencias y la carga automática de clases se manejan a través de Composer, lo que facilita la integración de bibliotecas externas y mejora la organización del proyecto mediante el uso de namespaces. Esto nos permite ahorrar código y aumentar la eficiencia en el desarrollo, al evitar la necesidad de incluir manualmente los archivos de clases y permitir una estructura de proyecto más modular.*


## ***Estructura General***

***Controllers***
*Actúan como intermediarios entre los modelos y las vistas para recibir las solicitudes del usuario y procesarlos con el objetivo de enviar los datos a las vistas que mostrarán la información especificada por el usuario.*


***Includes***
*El directorio includes incluye:
/config/database.php: directorio de configuración con conexión a la base de datos en PDO.
funciones.php: archivo que contiene funciones comunes utilizadas en varias partes del proyecto para mejorar la modularidad y el mantenimiento del código.
app.php: inicializa la aplicación cargando dependencias con Composer, estableciendo la conexión a la base de datos mediante conectarDB(), y configurando el patrón Active Record para el manejo de modelos con la base de datos. Con ello, se facilita la integración de bibliotecas y la gestión de la base de datos, simplificando el desarrollo, conectando componentes clave y pr*eparando el entorno de ejecución.


***Models***
*Equivalentes a las clases en la POO, los modelos en el patrón MVC gestionan la lógica de negocio y el acceso a datos, sirviendo como puente entre la base de datos y el controlador.*



***Clase Router*** 
*Gestiona las rutas de la aplicación, diferenciando entre solicitudes GET y POST a través de los arrays $getRoutes y $postRoutes. Con comprobarRutas, se determina la ruta actual y el método de solicitud, ejecutando la función asociada en caso de coincidencia. Por otro lado, render se encarga de la presentación, extrayendo los datos enviados a la vista y los encapsula dentro del layout especificado. Con esta estructura de enrutamiento se facilita la organización del flujo de navegación y la separación clara entre la lógica de procesamiento y la presentación visual en la aplicación.*



***ActiveRecord***
*Implementa el patrón de diseño Active Record en PHP, facilitando la interacción con la base de datos mediante operaciones CRUD de manera orientada a objetos. Principales características:
* Conexión a la Base de Datos: Utiliza setDB para compartir una conexión a la base de datos entre todas las instancias de clases derivadas de ActiveRecord.
* Manejo de Errores: A través de getErrores, gestiona y proporciona acceso a los errores de validación.
* Operaciones CRUD: Incluye métodos para crear (crear), leer (all, find, get), actualizar (actualizar), y eliminar (eliminar) registros, adaptándose automáticamente a las especificaciones de las clases hijas.
* Validación: El método validar permite la implementación de validaciones personalizadas para asegurar la integridad de los datos.
* Consulta y Manipulación de Datos: Métodos como consultarSQL y crearObjeto facilitan la ejecución de consultas personalizadas y la instanciación de objetos a partir de resultados de consultas, respectivamente.
* Sanitización de Atributos: Previene inyecciones SQL y otros problemas de seguridad sanitizando atributos antes de cualquier operación en la base de datos.
* Sincronización de Datos: sincronizar actualiza los atributos del objeto con nuevos valores, facilitando la gestión de formularios y actualizaciones de datos.*

***Descripción general de los modelos específicos***
*Todos los modelos (Producto y Usuario) heredan de ActiveRecord, compartiendo funcionalidades como conexión a la base de datos y operaciones CRUD. Representan tablas en la base, con protected static $tabla y protected static $columnasDB definiendo su estructura en la base de datos, facilitando la manipulación de datos.*

***Public***
La carpeta public de nuestro proyecto actúa como el punto de entrada para los usuarios, conteniendo el archivo index.php que inicializa la aplicación y un directorio build para el front-end. Dentro de build, se organizan los archivos estáticos como CSS, JavaScript, e imágenes, esenciales para el diseño y funcionalidad de la interfaz de usuario; el index.php, por otro lado, configura las dependencias, inicia el enrutador (Router) y define las rutas hacia distintos controladores (Controllers), gestionando así las solicitudes y respuestas dentro del patrón MVC. Este diseño separa claramente la lógica de presentación del manejo de la lógica de negocio, promoviendo una estructura organizada y modular para el desarrollo web.


***Views***
Incluye todas las vistas a las que tiene acceso el usuario. Además, el archivo en la carpeta views sirve como plantilla base para el contenido generado dinámicamente en la aplicación, incorporando un diseño consistente en todas las páginas. Inicia sesión automáticamente si no existe una previa, y determina si el usuario está autenticado para mostrar contenido personalizado en la barra de navegación. La estructura incluye un encabezado con enlaces de navegación, un área condicional para usuarios autenticados con opciones específicas según el tipo de usuario (Administrador o Usuario regular), y un pie de página con información de contacto y un formulario de suscripción al newsletter. Los recursos estáticos para el estilo y la funcionalidad (CSS y JavaScript) se cargan desde la carpeta build, asegurando una experiencia de usuario coherente y atractiva.



Las vistas están divididas en:

***Páginas:***
* index.php: página principal del sitio web. En esta página vemos la portada de la tienda y servicios que se ofrecen. Además, incluye secciones sobre la garantía de privacidad y enlaces a servicios adicionales.
* basket.php: pagina de la cesta de compra de la tienda. 
* shop.php: pagina que muestra todos los productos que se venden en la tienda

***Auth: Registro y Login***
* signin.php: formulario de registro de nuevos usuarios con validación de datos para garantizar la integridad de la información ingresada.
* login.php: página de inicio de sesión para usuarios registrados, donde los usuarios pueden acceder a sus cuentas proporcionando credenciales válidas. Si al loguearte se introducen las credenciales de un administrador la página que se cargará será la de administración.

***Admin:***
* index.php: muestra la página del CRUD del proyecto en la cual podemos crear, actualizar y borrar productos de la base de datos del proyecto.

***Sneakers:***
* actualizar.php: carga la página de actualización de datos que nos muestra los datos del producto para saber que vamos a cambiar.
* crear.php: carga la pagina de creacion con los campos necesarios de cada producto

## ***INSTRUCCIONES DE USO***

***Requisitos Previos***

1. Asegúrate de tener un servidor web configurado con soporte para PHP y una base de datos MySQL, como [XAMPP], que proporciona un entorno de desarrollo local que incluye Apache, MySQL, PHP y phpMyAdmin, facilitando la configuración y gestión del entorno de desarrollo.*
1. Importa la estructura de la base de datos desde el archivo SQL proporcionado en la carpeta docs (sneakstil.sql) utilizando la última versión.
1. Para visualizar las páginas, hay que ejecutar php -S localhost:<puerto> desde el directorio public del proyecto, reemplazando <puerto> con el número de puerto que se desea utilizar. Por ejemplo, para usar el puerto 3000, el comando sería php -S localhost:3000.*
    
## ***AUTORÍA***

Este proyecto fue desarrollado por @alhernandr y @lyonelgj


