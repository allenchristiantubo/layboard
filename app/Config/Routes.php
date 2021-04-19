<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PagesController',);
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function($message = null){
	$data = array(
		'title' => 'Error 404 - Page not found',
		'message' => $message,
		'load_css' => array("bootstrap/bootstrap.min.css", "style.css"),
		'load_js' => array("jquery/jquery-3.5.1.min.js", "bootstrap/popper.min.js", "bootstrap/bootstrap.min.js")
	);

	

	echo view('templates/header', $data);
	echo view('templates/error_404', $data);
	echo view('templates/footer', $data);
});
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// -- link -- controller::function
$routes->get('/', 'PagesController::index');

$routes->get('/dashboard', 'PagesController::dashboard');

$routes->get('/jobs', 'PagesController::jobs');

$routes->get('/privacy', 'PagesController::privacy');

$routes->get('/terms', 'PagesController::terms');

$routes->get('/logout', 'PagesController::logout');

$routes->get('/profile/(:alpha)/(:alphanum)', 'PagesController::profile/$1/$2');

$routes->get('/admin/dashboard_employerslist', 'PagesController::dashboard_employerslist');

$routes->get('/admin/dashboard_freelancerslist', 'PagesController::dashboard_freelancerslist');

$routes->get('/admin/dashboard_calendar', 'PagesController::dashboard_calendar');

$routes->get('/admin/dashboard_inbox', 'PagesController::dashboard_inbox');

$routes->get('/admin/dashboard_compose', 'PagesController::dashboard_compose');

$routes->get('/admin/dashboard_read', 'PagesController::dashboard_read');

$routes->get('/admin/dashboard_projects', 'PagesController::dashboard_projects');

$routes->get('/admin/dashboard_projectsimpsearch', 'PagesController::dashboard_projectsimpsearch');

$routes->get('/admin/dashboard_projectensearch', 'PagesController::dashboard_projectensearch');
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
