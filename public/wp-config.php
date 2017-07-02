<?php
define('COOKIE_DOMAIN', 'www.visasamericanascolombia.com'); // Added by W3 Total Cache

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
 //Added by WP-Cache Manager
//define( 'WPCACHEHOME', '/home/visasame/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'visasame_web');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'visasame_user');

/** Tu contraseña de MySQL 2r?hqd*%Wr-_ */
define('DB_PASSWORD', 'caremico');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'RQSa~-j;?v5:m 0_f-4kjj]?gjy^u&%ug)M]!!46E0`O1*18q&lUl|i]`po-aP.I');
define('SECURE_AUTH_KEY', 'ZH1ld1rf|],7{JVy[1!8aw8B!2|/zv)6j{EvCH3KY0as/2D9_%z+v(lKCO8+2q&I');
define('LOGGED_IN_KEY', 'R=)`O2;jjZ-lEqjVvh2+|K*aT?Ydbe(F6{w6iy5k-zED:i8TZt|[DhJl#Jzlk:i?');
define('NONCE_KEY', 's2)VR$XStuVTgFV|i1XZv|y;++~|2B9;~E#~v3%{(_^niQcaSdR$a1w+Oh[n$).{');
define('AUTH_SALT', '8cov/_JV3h^NwMpbOqt>/ >Pj>U T}f|Zp(#||dX:-(0|bN+8RppHg3{w{gC=. C');
define('SECURE_AUTH_SALT', '%/knDI-(p8k|DF71R}wu:OQ2@A)xDy-ye#Yu9.9}Yh7*wM(%x([VFGGg0Uzz|zH2');
define('LOGGED_IN_SALT', '}n{*vups[G~%7J<f37SQK5Y+tVa9L:a rVJMfV^OE_|!jCp/9u;~*JWI3q T-mv(');
define('NONCE_SALT', '-I-/KrapWaiE01NFV`ZxXb|8|H15_ =A9QGDx:aE<+ocmVep)yz)X|(o2Um/K/kG');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'visawpme_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

