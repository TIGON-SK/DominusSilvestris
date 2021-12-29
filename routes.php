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
get('/admin/admin_manage-orders', 'admin/admin_manage-orders.php');
get('/admin/admin_e-shop', 'admin/admin_e-shop.php');


any('/404','errors/404.php');
