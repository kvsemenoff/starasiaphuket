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
// define('DB_NAME', 'starasia');

// /** Имя пользователя MySQL */
// define('DB_USER', 'root');

// /** Пароль к базе данных MySQL */
// define('DB_PASSWORD', '');

// /** Имя сервера MySQL */
// define('DB_HOST', 'localhost');

// /** Кодировка базы данных для создания таблиц. */
// define('DB_CHARSET', 'utf8');

// /** Схема сопоставления. Не меняйте, если не уверены. */
// define('DB_COLLATE', '');

// for db starasia
define('DB_NAME', 'starasia');
define('DB_USER', 'roott');
define('DB_PASSWORD', '1111');
define('DB_HOST', '192.168.1.189:3308'); 
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');


/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Ae?[I&Z%f/x(xfq+,qj@JR.@F.~d{OqmC+*-&lGR|mb*_.^DpTP^l[EY8.|/R^W!');
define('SECURE_AUTH_KEY',  '=YMuD4tl9oa1Tm-4=w?i+d|&:09eE4+5j8<HN}f*h4Yl~yn785Tt6_Efpw`rC9Iu');
define('LOGGED_IN_KEY',    'BUWE=8w^X+91(-=G[$!3h,(u}y,MRr@l}<hr~+yqeuP_s{c|D%@p/-TPdw8r#@_5');
define('NONCE_KEY',        'ctvd*K_(L^/9F2l :p0tt}@@r.#$f2h>W-2?^|9?RB#,NojnJkm8_QTzbz!N?y}f');
define('AUTH_SALT',        '!;Q294<)@M6]>Q|)-1da3?FlG3eyrgr=-}.A-  %&8^W1Og#ByN*<l,xR@g0~`m*');
define('SECURE_AUTH_SALT', 'v/-h+<n9E6I/47A_2+iJ!!]DUh2wBwXf*4Y@zu+#A#^Zpn5JI-r6(udg,@vo&Z6_');
define('LOGGED_IN_SALT',   'KLY-^0sMhB59}BV%jwX_-d|_f+5$y+>f1f5HD+qEF*I+N&MmamU58(_|PbCr;V09');
define('NONCE_SALT',       '2S;ts1&a&orfld+;:j6crz^+^&|nF87kOA^s2q}l9;o`TkIP5nT1SXQ -6wD5AbQ');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
