<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->

\***\*---RECURSOS OPCIONALES PARA ESCALABILIDAD DEL PROYECTO---\*\***

## --

-𝗘𝗻𝗹𝗮𝗰𝗲 𝗱𝗲𝗹 𝗦𝗶𝘁𝗶𝗼 𝗱𝗲 𝗹𝗮 𝗣𝗹𝗮𝗻𝘁𝗶𝗹𝗹𝗮: https://demos.creative-tim.com/argon-dashboard/docs/components/buttons.html

(Esto nos da una serie de componentes que podemos utilizar en nuestra plantilla así como clases para estilizar)

## --

// Crear migraciones automaticamente a partir de una base de datos existente: https://www.youtube.com/watch?v=baQNTofu7CI

(esta tecnica facilita la creación de migraciones al no tener que ir deficinedo las tablas y sus estructuras de manera manual, tambien nos genera automaticamente las relaciones que existen con las diferentes entidades) en otras palabras (Esto nos va a permitir mantener versionada nuestra base de datos de modo que si queremos pasar el proyecto a otro computador o colaborador bastará con correr las migraciones)

\***\*-----INSTRUCCIONES PARA EJECUTAR EL PROYECTO (SISTEMA MEDICO)-----\*\***

## --

//OBLIGATORIO

-Instalaciones necesarias

1. WAMP(se ejecuta en windows) o XAMPP(es multiplataforma) - proporcionan un entorno Apache-MySQL-PHP.
2. Composer - (pueden ocurrri errores cuando ya se tiene instalado componser pero no se ha actualizado la versión)

(-Creamos la base de datos

1. )

## --

-   Conexión a la base de datos

1. en el archivo .env cambiamos las credenciales para con nuestra información
   Ejemplo:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=citamedica
   DB_USERNAME=root
   DB_PASSWORD=moimariii

## --

-   Comandas para el sistema de autenticación (en el CMD)

1. composer require laravel/ui
2. php artisan ui vue --auth

-   Corremos las migraciones (en el CMD) (crea la tabla users y password para el sistema de auth)

1. php artisan migrate

## --

OPCIONAL
//PROBLEMAS AL EJECUTAR EL PROYECTO EN OTRO DISPOSITIVO

-   Solución con artisan (Error grave: no se encontró la clase 'Illuminate\Foundation\Aplication') -- en el CMD :

1. composer install --no-scripts
2. composer update

-   Solución para error con (Laravel No application encryption key has been specified) -- en el CMD :

1. php artisan key:generate

-   Solución para laravel/ui (versión incorrecta) -- en el CMD :

1. composer require laravel/ui:\* (Esto instala la versión necesaria)

## --

OPCIONAL

-   Volver a ejecutar las migraciones haciendo un fresh de las tablas(modelos)

1. php artisan migrate:fresh
2. o utilice este comando php artisan migrate:refresh
   (esto nos sirve para eliminar los datos de prueba o para solucionar algún error en las migraciones)

## --

OPCIONAL

/_PROBLEMAS QUE SURGIERON AL EJECUTAR LAS MIGRACIONES_/
!!! si esxiste un error al ejecutar las migraciones es posible que se deba a la versión desactualizada de Mysql que busca añadir emoticones con el nuevo sistema utf .

1. Otra solución: https://stackoverflow.com/questions/56308178/sqlstate42000-syntax-error-or-access-violation-1071-specified-key-was-too-lo
   {
   /_En resumen_/
   // nosdirigimos a la ruta \nombreDelProyecto\app\Providers\AppServiceProvider.php y añadimos la linea:
   use Illuminate\Support\Facades\Schema;

//Luego en el metodo boot establecemos la longitud 191:

        public function boot()
    {
        Schema::defaultStringLength(191);
    }

}

2. Es probable que al ejecutar las migraciones tenga que hacer un php artisan migrate:fresh

3. Si lo anterior no funcionó continue con Actualizar Mysql a versiones superiores de 5.0

## --

/**ERROR**/
//otro problema puede ser cuando sale un error: ( Cannot declare class CreatePersonalAccessTokensTable, because the name is already in use):
Este error puede suceder cuando hacemos un refresh o un fresh en las migraciones
esto quiere decir que ya existe la clase de la migración y su metodo- (aunque en realidad no existe un duplicado) solución:

1. Cambiamos el nombre del archivo de migracion que nos está causando problemas
2. Cambiamos el nombre de su clase y el nombre de la tabla en los metodos

## --

//OJO **\*\***
Cuando modificamos tablas ya existentes con las migraciones, al migrar los datos se pueden borrar , para evitar esto es necesario que las actualizaciones o modificaciones sean echas desde una nueva migración. aquí el enlace para seguir los pasos (Modificar migraciones): https://styde.net/modificar-tablas-ya-existentes-con-las-migraciones-de-laravel/

## --

/\***\*\*\*\*\*\*\***UTILIDADES PARA ADMINISTRADOR**\*\***\***\*\***/

-   Cambiar la contraseña del usuario mediante la línea de comandos (En el CMD)

    1.Desde la ruta del proyecto Ingrese al entorno de Tinker ejecutando el comando: php artisan tinker

2. Añada el correo del usuario al que se le quiere actualizar la contraseña: $user = User::where('email', 'correUsuario@gmail.com')->first();
3. Añada la nueva contraseña: $user->password = Hash::make('nuevaContraseña');
4. Finalmente, llame al método save() de Eloquent ORM de la siguiente manera: $user->save();

mas información: https://themewp.inform.click/es/como-cambiar-la-contrasena-del-usuario-en-laravel/

## --

-Acceso a los usuarios /\***\*\*\*\***/

Por defecto los usuarios registrados no tendrán acceso a la aplicación, el administrador podrá darle acceso a través del cambio de status que es un campo de la tabla users, donde 0 representa a un usuario baneado o sin acceso, mientras que 1 permite el acceso. (Por ahora este cambio es manual con la base de datos)
