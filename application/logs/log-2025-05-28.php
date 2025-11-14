<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-05-28 00:16:34 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 01:06:21 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 01:09:19 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 01:17:21 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 04:13:00 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 04:38:45 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 04:57:14 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 07:11:28 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 07:11:37 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 07:11:38 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 07:11:46 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 07:11:46 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 07:14:43 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 07:14:44 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 07:23:41 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 07:23:41 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 07:47:27 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 07:47:27 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:11:30 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:15:13 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:16:17 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:16:18 --> Severity: Warning --> pg_query(): Query failed: ERROR:  invalid UNION/INTERSECT/EXCEPT ORDER BY clause
LINE 14:     order by coalesce(parent_order, menu_order)
                      ^
DETAIL:  Only result column names can be used, not expressions or functions.
HINT:  Add the expression/function to every SELECT, or move the UNION into a FROM clause. /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/system/database/drivers/postgre/postgre_driver.php 234
ERROR - 2025-05-28 09:16:18 --> Query error: ERROR:  invalid UNION/INTERSECT/EXCEPT ORDER BY clause
LINE 14:     order by coalesce(parent_order, menu_order)
                      ^
DETAIL:  Only result column names can be used, not expressions or functions.
HINT:  Add the expression/function to every SELECT, or move the UNION into a FROM clause. - Invalid query: 
    select m.menu_id, m.menu_name, m.menu_icon, m.menu_url, m.menu_path, m.menu_parent, null parent_order, m.menu_order 
    from admin a
    inner join role_menu rm on a.role_id = rm.role_id 
    inner join menu m on rm.menu_id = m.menu_id 
    where a.id = '5'
    union 
    select mc.menu_id, mc.menu_name, mc.menu_icon, mc.menu_url, mc.menu_path, mc.menu_parent, m.menu_order parent_order, mc.menu_order
    from admin a
    inner join role_menu rm on a.role_id = rm.role_id 
    inner join menu m on rm.menu_id = m.menu_id 
    inner join menu mc on m.menu_id = mc.menu_parent 
    where a.id = '5'
    order by coalesce(parent_order, menu_order)
      , case when parent_order is null then 0 else menu_order end

    
ERROR - 2025-05-28 09:24:59 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:25:56 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:26:06 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:26:06 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:26:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:26:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:26:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:26:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:34:11 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:34:12 --> Severity: Warning --> foreach() argument must be of type array|object, bool given /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/views/header.php 137
ERROR - 2025-05-28 09:34:51 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:34:51 --> Severity: Warning --> Undefined property: stdClass::$primary_key /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 101
ERROR - 2025-05-28 09:34:51 --> Severity: Warning --> Undefined property: stdClass::$primary_key /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 101
ERROR - 2025-05-28 09:34:51 --> Severity: Warning --> Undefined property: stdClass::$primary_key /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 101
ERROR - 2025-05-28 09:34:51 --> Severity: Warning --> Undefined property: stdClass::$primary_key /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 101
ERROR - 2025-05-28 09:34:51 --> Severity: Warning --> Undefined property: stdClass::$primary_key /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 101
ERROR - 2025-05-28 09:34:51 --> Severity: Warning --> Undefined property: stdClass::$primary_key /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 101
ERROR - 2025-05-28 09:34:51 --> Severity: Warning --> Undefined array key "ischeck" /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 255
ERROR - 2025-05-28 09:34:51 --> Severity: Warning --> foreach() argument must be of type array|object, null given /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 255
ERROR - 2025-05-28 09:34:51 --> Severity: Warning --> Undefined variable $sort_fields_arr2 /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 455
ERROR - 2025-05-28 09:34:51 --> Severity: error --> Exception: implode(): Argument #1 ($pieces) must be of type array, string given /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 455
ERROR - 2025-05-28 09:39:38 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:39:41 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:39:41 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:39:41 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:39:41 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:41:18 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 09:54:42 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 11:58:36 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 11:58:36 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 11:58:47 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 11:58:47 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 11:58:48 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 11:58:53 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 11:58:54 --> Severity: Warning --> foreach() argument must be of type array|object, bool given /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/views/header.php 137
ERROR - 2025-05-28 11:59:08 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 11:59:08 --> Severity: Warning --> Undefined array key "ischeck" /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 259
ERROR - 2025-05-28 11:59:08 --> Severity: Warning --> foreach() argument must be of type array|object, null given /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 259
ERROR - 2025-05-28 11:59:08 --> Severity: Warning --> Undefined variable $sort_fields_arr2 /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 459
ERROR - 2025-05-28 11:59:08 --> Severity: error --> Exception: implode(): Argument #1 ($pieces) must be of type array, string given /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 459
ERROR - 2025-05-28 12:00:01 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:00:01 --> Severity: Warning --> foreach() argument must be of type array|object, bool given /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/views/header.php 137
ERROR - 2025-05-28 12:10:02 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:12:45 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:12:45 --> Severity: Warning --> Undefined array key "tbl_name" /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 5553
ERROR - 2025-05-28 12:12:46 --> Severity: Warning --> Undefined variable $value /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 5845
ERROR - 2025-05-28 12:12:46 --> Severity: Warning --> Undefined variable $value /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 5853
ERROR - 2025-05-28 12:12:48 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:12:49 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:12:53 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:13:15 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:13:22 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:14:17 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:14:24 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:14:43 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:14:43 --> Severity: Warning --> Undefined variable $call_multi_add /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 465
ERROR - 2025-05-28 12:14:43 --> Severity: Warning --> Undefined variable $call_multi_edit /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 467
ERROR - 2025-05-28 12:14:43 --> Severity: Warning --> Undefined variable $multi_selected_id /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 471
ERROR - 2025-05-28 12:14:43 --> Severity: Warning --> Undefined variable $return_multi_selected_data /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 473
ERROR - 2025-05-28 12:14:43 --> Severity: Warning --> Undefined variable $list_tbl /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 485
ERROR - 2025-05-28 12:14:43 --> Severity: Warning --> Undefined variable $error /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 1067
ERROR - 2025-05-28 12:14:43 --> Severity: Warning --> mkdir(): File exists /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 1209
ERROR - 2025-05-28 12:14:43 --> Severity: Warning --> Undefined variable $error /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 1718
ERROR - 2025-05-28 12:14:43 --> Severity: Warning --> mkdir(): File exists /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 1870
ERROR - 2025-05-28 12:14:43 --> Severity: Warning --> mkdir(): File exists /var/www/vhosts/webview.cloud/admin-hipolinema.webview.cloud/application/controllers/admin/Module.php 2434
ERROR - 2025-05-28 12:14:43 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:15:27 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:15:27 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:15:27 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:15:27 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:15:27 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:15:28 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:15:28 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:47:21 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:47:22 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:47:22 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:47:22 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:47:22 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:50:11 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:50:11 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:50:11 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:50:11 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:50:11 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:50:11 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:50:14 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:50:14 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:18 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:18 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:18 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:18 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:18 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:18 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:18 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:23 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:24 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:24 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:24 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:24 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:24 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:40 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:51:40 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:52:33 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:52:33 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:52:33 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:52:34 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:52:34 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:53:13 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:53:13 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:56:05 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:56:06 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:56:06 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:56:26 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:56:26 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:58:06 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:58:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:58:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:58:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:58:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:58:30 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:58:31 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:58:31 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:58:31 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:58:31 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:59:51 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:59:51 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:59:51 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:59:51 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:59:51 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:59:56 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:59:56 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:59:56 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 12:59:57 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:00:01 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:00:01 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:01:16 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:01:16 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:01:17 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:01:17 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:01:17 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:03:35 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:03:49 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:03:49 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:03:49 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:03:50 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:07:23 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:07:23 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:07:23 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:07:24 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:08:49 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:08:50 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:08:50 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:08:50 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:09:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:09:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:09:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:09:07 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:10:00 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:10:01 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:10:01 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 13:10:01 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:15 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:32 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:45 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:54 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:55 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:55 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:56 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:56 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:57 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:57 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:58 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:58 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:58 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:59 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:29:59 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:30:00 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:30:00 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:30:00 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:30:01 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:30:02 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:30:02 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:30:03 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:30:03 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:42:53 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:42:53 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:43:38 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:43:39 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:43:39 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:43:49 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:43:49 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:43:50 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:45:35 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:45:37 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
ERROR - 2025-05-28 23:45:52 --> Could not find the specified $config['composer_autoload'] path: vendor/autoload.php
