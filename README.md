# Sobre el sistema

1. Prueba tecnica realizada en laravel 9 con la versión 8 de php, usando el motor de platillas Blade, propio del framework.
2. Se utiliza una plantilla integrada llamada AdminLTE, para tenero un optimo manejo de las vistas.
3. El servicio de API REST de los paises se consume con JavaScript nativo
4. El servidor de correo esta configirado en MailJet. un servicio gratuito hasta cierto limite.

# Modulos

1. Inicio: Descripcion general del sistema.
2. Usuarios: CRUD de usuarios. Posee un buscador por el cual se puede buscar por cualquier dato de un usuario.
3. Categorias: CRUD de categorias(ya tiene datos por defecto).
4. Parametros: Configuracion del email del administrador del sistema, con el mismo se inicia sesión(para tener en cuenta).

##### Nota:

Peticion de la prueba solo tiene un usuario registrado con el cual se realiza el inicio se sesión.

# Requisitos

1. Instalar laravel 9
2. Php ^8.0.2
3. Mysql
4. Servidor local, sugiero laragon

# Instalar dependencias (Opcional)

Laravel utiliza `[composer]` para administrar sus dependencias. Entonces, antes de usar Laravel, asegúrese de tener Composer instalado en su computador.
cd YourDirectoryName
composer install
[composer]: https://getcomposer.org/ "Composer"

# Base de datos

1. Migrar tabla a la base de datos `php artisan migrate --seed`
2. User: jguzmanpineda02@gmail.com pass:123456789

# Instalar dependencias de node

1. `npm install `para instalar dependencias de node
2. `npm run dev` para el desarrollo o npm run build para la producción

# Ejecutar servidor

`1.	php artisan serve `
