<?php
require_once("{$_SERVER['DOCUMENT_ROOT']}/router.php");

get('/', 'index.php');
get('/about', 'about.php');
get('/e-shop', 'e-shop.php');
get('/login', 'login.php');
get('/logout', 'logout.php');
post('/auth', 'auth.php');
get('/order-item', 'order-item.php');
post('/make-order', 'make-order.php');

get('/admin/admin_index', 'admin/admin_index.php');
get('/admin/admin_about', 'admin/admin_about.php');
post('/admin/admin_about_update', 'admin/admin_about_update.php');
get('/admin/admin_manage-orders', 'admin/admin_manage-orders.php');
post('/admin/admin_change-order-status', 'admin/admin_change-order-status.php');
get('/admin/admin_e-shop', 'admin/admin_e-shop.php');

get('/admin/admin_add-item', 'admin/admin_add-item.php');
post('/admin/admin_db-insert', 'admin/admin_db-insert.php');

get('/admin/admin_edit-item', 'admin/admin_edit-item.php');
post('/admin/admin_db-update', 'admin/admin_db-update.php');

get('/admin/admin_delete-item', 'admin/admin_delete-item.php');


any('/404','errors/404.php');