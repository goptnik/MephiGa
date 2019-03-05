<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'goptnik_1' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'goptnik_1' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'ifkfdf21' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ':E*DJ>/FfYeRbfu#kH2N~;_?cGA<iw)=]TaEklL,i).E$<rVlNY/6CaT>g=RR+11' );
define( 'SECURE_AUTH_KEY',  ']xh:I?W=wgTeE8GTyg;-x|}dqM5Uu>7oNQ;,J4i1[tKm/PE+V>964|Zy}UFB]?nA' );
define( 'LOGGED_IN_KEY',    'G,`*Y|5M3r=yr@Bg-s.|`seP+%IQIrtZ?XAn20iz%|i,Y6cNl c^d kX)S%;wT_c' );
define( 'NONCE_KEY',        'OCr|9T#E_na#:gwE6C !_-54D[YZ1`%kTyRIb#+FVE=sj`mH|P>eSQ?S#t{Jf=p-' );
define( 'AUTH_SALT',        'ocu|&=v@n#!+]9EL$24))0%h__0|LQ;w)_`!EZ-{L7g~X|EL!hPa&q-A~MnjJjX^' );
define( 'SECURE_AUTH_SALT', '>DNnn0!*VpmT=~L& z{B?WD`E.TjW~A^i}tnMEV*j3[s}>i@F0|?IAX/xHrsK7!y' );
define( 'LOGGED_IN_SALT',   'KCL<97Pi>,J|rH]16H4ev@q p@aG6[Rxd7pqi=J<:*NmC},0?eIl-3,HrJ1ai0bb' );
define( 'NONCE_SALT',       '{2q4h><5?x=uA?TI^fjm1=|xmx%s-[!4@%,<V>0/-WdFz#6+b=rNZc{M8_n0L$&V' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
