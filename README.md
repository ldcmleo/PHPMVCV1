# PHPMVCV1
Un pequeño framework hecho en php con el MVC. Sacado de los cursos de render2web. Con ligeras modificaciones

# Como funciona
Solo debes colocar dentro de una carpeta o en la misma raiz de tu servidor (puede ser personal tipo wamp, xampp, etc.) y realizar unas configuraciones básicas.

El framework esta divido en una parte publica y la parte de la aplicación. Se redirecciona por medio de los htaccess

# Configuraciones básicas
--modificar el archivo app->config->configurar.php

Agregar las credenciales de la bd

Agregar el nombre de la aplicación

Definir la url de la aplicacion

--modificar el archivo public->.htaccess

En caso de no usar la raiz del htdocs modificar la parte donde dice: "Rewritebase" y agregar el nombre del folder donde colocó el framework
