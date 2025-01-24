<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('home/check_login', 'Home::check_login');
$routes->get('home/check_login', 'Home::check_login');

$routes->get('manager_dashboard', 'Home::manager');
$routes->get('add_manager', 'Home::add_manager');
$routes->post('save_manager', 'Home::save_manager');
$routes->get('save_manager', 'Home::save_manager');
$routes->get('edit_manager', 'Home::edit_manager');
$routes->get('edit_manager/(:num)', 'Home::edit_manager/$1');
$routes->get('delete_manager/(:num)', 'Home::delete_manager/$1');
$routes->post('update_manager/(:num)', 'Home::update_manager/$1');
$routes->get('list_manager', 'Home::list_manager');

$routes->get('supervisor_dashboard', 'Home::supervisor');
$routes->get('add_supervisor', 'Home::add_supervisor');
$routes->post('save_supervisor', 'Home::save_supervisor');
$routes->get('save_supervisor', 'Home::save_supervisor');
$routes->get('edit_supervisor', 'Home::edit_supervisor');
$routes->get('edit_supervisor/(:num)', 'Home::edit_supervisor/$1');
$routes->get('delete_supervisor/(:num)', 'Home::delete_supervisor/$1');
$routes->post('update_supervisor/(:num)', 'Home::update_supervisor/$1');
$routes->get('list_supervisor', 'Home::list_supervisor');

$routes->get('vendor_dashboard', 'Vendor::vendor');
$routes->get('add_vendor', 'Home::add_vendor');
$routes->post('save_vendor', 'Home::save_vendor');
$routes->get('save_vendor', 'Home::save_vendor');
$routes->get('edit_vendor', 'Home::edit_vendor');
$routes->get('edit_vendor/(:num)', 'Home::edit_vendor/$1');
$routes->get('delete_vendor/(:num)', 'Home::delete_vendor/$1');
$routes->post('update_vendor/(:num)', 'Home::update_vendor/$1');
$routes->get('list_vendor', 'Home::list_vendor');

$routes->get('superadmin_dashboard', 'Home::superadmin');

$routes->get('list_order', 'Vendor::list_order');
$routes->get('add_order', 'Vendor::add_order');
$routes->post('save_order', 'Vendor::save_order');
$routes->get('save_order', 'Vendor::save_order');
$routes->get('delete_order/(:num)', 'Vendor::delete_order/$1');
$routes->get('edit_order/(:num)', 'Vendor::edit_order/$1');
$routes->post('update_order/(:num)', 'Vendor::update_order/$1');
$routes->get('order_report', 'Vendor::order_report');
$routes->post('vendor/generate_report', 'Vendor::generateReport');
$routes->post('vendor/download_report', 'Vendor::downloadReport');

$routes->get('client_dashboard', 'Vendor::vendor');