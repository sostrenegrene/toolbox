<?php
/** Database tables
 */

//System head fields
define("SYS_HEADER_LOGIN_USERNAME","sys_username");
define("SYS_HEADER_LOGIN_PASSWORD","sys_password");
define("SYS_HEADER_LOGIN_TOKEN","sys_token");

//System tables
define("DB_TABLE_MENUS","toolbox_sys_menu");
define("DB_TABLE_MODULES","toolbox_sys_modules");
define("DB_TABLE_USERS","toolbox_sys_users");
define("DB_TABLE_SETTINGS","toolbox_sys_settings");

//Module tables
define("TABLE_GRENES_COUNTRIES","grenes_countries");
define("TABLE_GRENES_FRANCHISERS","grenes_franchisers");
define("TABLE_GRENES_STORES","grenes_stores");
define("TABLE_GRENES_POS","grenes_pos");

/** Form data
 */
define("FORM_ACTION","form_action");
define("FORM_ACTION_SAVE","form_save");
define("FORM_ACTION_DELETE","form_delete");
define("FORM_ACTION_UPDATE","form_update");
define("FORM_ACTION_CREATE","form_create");
define("FORM_ACTION_SEARCH","form_search");
define("FORM_ACTION_LOGIN","form_login");
define("FORM_ACTION_LOGOUT","form_logout");

/** OAuth & Firmafon API
 */
define("APPLICATION_ID","26e6e84ff4cdf32055a6c31e7e81c9a2f47b322c5d3e31e3c81e2998277d724d");
define("APPLICATION_SECRET","dba9353aa52b0343ff0260ac6a0766ec5b0d06f66c7605fc34a4f1c6a5853d83");
define("FIRMAFON_API_URL","https://app.firmafon.dk/api/v2");
define("FIRMAFON_CALLBACK_URL","http://beta.pos.grenes.dk/auth.php");

/** POSMON
 * 
 */
define("POSMON_TIMER_WARNING", (1 * 60) );
define("POSMON_TIMER_OFFLINE", (2 * 60) );
//define("POSMON_TIMER_INACTIVE_TIMEOUT", (2880 * 60) );//2 Days
define("POSMON_TIMER_INACTIVE_TIMEOUT", (3 * 60) );//2 Days
?>