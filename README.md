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

  
  
  
