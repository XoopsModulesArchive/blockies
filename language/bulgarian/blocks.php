<?php

// $Id: blocks.php,v 1.1.1.1 2003/11/14 04:10:03 creep Exp $
// Blocks

// PPhlogger block
define('_BK_PPH_TITLE', 'Статистики');
define('_BK_PPH_SHOW_4', 'Общо посещения:');
define('_BK_PPH_SHOW_5', 'Общо прегледа:');
define('_BK_PPH_SHOW_6', 'Посещения днес:');
define('_BK_PPH_SHOW_7', 'Прегледа днес:');
define('_BK_PPH_SHOW_8', 'Посещения вчера:');
define('_BK_PPH_SHOW_9', 'Прегледа вчера:');
define('_BK_PPH_SHOW_10', 'Посещения за месеца:');
define('_BK_PPH_SHOW_11', 'Прегледа за месеца:');
define('_BK_PPH_SHOW_12', 'Потребители на линия:');

// block options
define(
    '_BK_PPH_URL',
    'URL of your PPhlogger host WITHOUT trailing slash:<br>(e.g. http:
define("_BK_PPH_ID", "PPhlogger ID: '
);
define('_BK_PPH_ID', 'PPhlogger ID: ');
define('_BK_PPH_COUNTERYPE', 'Тип на брояча: ');
define('_BK_PPH_FRAME', 'Track referrers on a framed site ');
define('_BK_PPH_SHOW_TOTAL_HITS', 'Показва общо посещенията ');
define('_BK_PPH_SHOW_TOTAL_VIEWS', 'Показва общо прегледите ');
define('_BK_PPH_SHOW_TODAY_HITS', 'Показва днешните посещения ');
define('_BK_PPH_SHOW_TODAY_VIEWS', 'Показва днешните прегледи ');
define('_BK_PPH_SHOW_YESTERDAY_HITS', 'Показва вчерашните посещения ');
define('_BK_PPH_SHOW_YESTERDAY_VIEWS', 'Показва вчерашните прегледи ');
define('_BK_PPH_SHOW_MONTH_HITS', 'Показва посещенията за месеца ');
define('_BK_PPH_SHOW_MONTH_VIEWS', 'Показва прегледите за месеца ');
define('_BK_PPH_SHOW_ONLINE_USERS', 'Показва потребителите на линия ');
define('_BK_PPH_SHOW_STATS_ADMIN_ONLY', 'Показва статистиките само за администратора ');

//	Module menu block
define('_BK_MODMENU_MAIN_NAME', 'Начало');
define('_BK_MODMENU_ADMIN_NAME', 'Администрация');
// block options
define('_BK_MODMENU_SHOWADMINLINK', 'Показва админ. връзка? ');
define('_BK_MODMENU_SHOWIFNOSUBMENU', 'Да показва ли блока, ако модула няма под-меню? ');

//	Login/user menu block
define('_BK_USER_LOGIN', 'Вход');
define('_BK_USER_NAME', 'Потребител');
define('_BK_USER_PASS', 'Парола');
define('_BK_USER_LOSTPASS', 'Забравена парола');
define('_BK_USER_REGISTER', 'Регистрация');
define('_BK_USER_MENU', 'Меню за %s');
define('_BK_USER_ACCOUNT', 'Профил');
define('_BK_USER_LOGOUT', 'Изход');
define('_BK_USER_INBOX', 'Входящи');
define('_BK_USER_ADMIN', 'Админ');
define('_BK_USER_OPTION_AVATAR_WIDTH', 'Размер на потреб. аватари: %s пиксели ( 0 = ползва актлуаният размер )');

//	Random News Heading block
define('_BK_RN_NUM', 'Брой новини които да показва');
define('_BK_RN_DAY', 'Лимит за дните (0 = без лимит)');
define('_BK_RN_TIME', 'Време за смяна на заглавията в секунди');

//	Search block
//	admin
define('_BK_SCH_GOOGLE_OPT', 'Настройки на Google търсачката');
define('_BK_SCH_CHAR', 'Кодова таблица');
define('_BK_SCH_CHAR_UNICODE', 'Уникод');
define('_BK_SCH_LANG', 'Предпочитания за езика');
define('_BK_SCH_LANG_ANY', 'Който и да е');
define('_BK_SCH_USE_SITE', 'Същият като на портала (%s)');
define('_BK_SCH_DEFAULT', 'Търсене по подразбиране');
define('_BK_SCH_DEFAULT_SITE', 'Търсене в портала');
define('_BK_SCH_DEFAULT_WWW', 'Търсене в WWW');
define('_BK_SCH_KEY', 'Ключ за достъп');
define('_BK_SCH_GOOGLE_URL', 'Google URL');
define('_BK_SCH_NEWWIN', 'Да отваря ли резултатите в нов прозорец');
//	front end
define('_BK_SEARCH_WWW', 'Търсене в WWW');
define('_BK_SEARCH_SITE', 'Търсене в %s');
define('_BK_SEARCH_GO', 'Напред');
