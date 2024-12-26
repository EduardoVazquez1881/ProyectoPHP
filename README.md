# ProyectoPHP

- Primero tenemos que descargar todo lo necesario como php, composer, symfony, node.js, etc.
  
# Crear Proyecto

- Tenemos que dirigirnos a la ruta en donde crearemos nuestro proyecto para ingresar el siguiendo comando:
  ```
  symfony new nombre_proyecto --webapp
  ```
  Nos descargara gran parte de dependencias necesarias
  
  # Instalacion de Tailwindcss

  Hay dos formas de descarga para descargar tailwindcss, la primera como nos indica la documentacion oficial solo que de esta forma tendremos que configurar el css y las rutas de forma manual. Tambien se puede descargar desde composer mediante el siguiente comando
  ```
  composer require symfonycasts/tailwind-bundle
  ```

  Esto nos descargara tailwind para despues crear el archivo config
  ```
  php bin/console tailwind:init
  ```

  Y por ultimo para ejecutar Tailwindcss escribiriamos
  ```
  php bin/console tailwind:build -w
  ```

  # Conexion
  En este caso usaremos mysql, tenemos que configurar el archivo .env, buscamos la opcion de "DATABASE_URL" y descomentamos la de nuestra base de datos. Modificamos el nombre de usuario, contraeña y el nombre de la base de datos.
  Tambien es necesario que en el archivo de configuracion php, tenemos que habilitar las siguientes opciones.
  ```
  extension=mysqli
  extension=openssl
  extension=pdo_mysql
  ```

  # Entidades 
  Comenzamos con la creacion de las entidades mediante el comando
  
  ```  
  php bin/console doctrine:database:create
  php bin/console make:entity
  ```
  Nos pedira ingresar nombre, variables, tipo de datos, etc.

  # Creacion de usuarios
  ```
  php bin/console make:user
  ```

  # Migraciones
  Despues de crear las entidades, debemos de comenzar generando las migraciones
  ```
  php bin/console doctrine:migrations:generate
  ```
  Aplicamos las migraciones
  ```
  php bin/console make:migration
  php bin/console doctrine:migrations:migrate
  ```
  Verificamos si la migracion se realizo correctamente y verificamos si en la base de datos se realizaron los cambios (Recuerda que el nombre de la base de datos debe de ser la misma de la configuracion de symfony y mysql)
  ```
  php bin/console doctrine:migrations:status
  ```
  

  
  
  
