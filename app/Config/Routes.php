<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//login
$routes->match(['get', 'post'], 'login', 'LoginController::login', ["filter" => "noauth"],['as' => 'login']);

//Register
$routes->match(['get', 'post'], 'register', 'RegisterController::register', ["filter" => "noauth"], ['as' => 'register']);
$routes->match(['get', 'post'], 'register/get_class', 'RegisterController::get_class', ["filter" => "noauth"], ['as' => 'register.get_class']);
$routes->match(['get', 'post'], 'register/get_city', 'RegisterController::get_city', ["filter" => "noauth"], ['as' => 'register.get_city']);
$routes->match(['get', 'post'], 'register/get_districts', 'RegisterController::get_districts', ["filter" => "noauth"], ['as' => 'register.get_districts']);
$routes->match(['get', 'post'], 'register/get_school', 'RegisterController::get_school', ["filter" => "noauth"], ['as' => 'register.get_school']);

//Email Verification
$routes->get('/verify-email/(:any)', 'RegisterController::email_verif', ["filter" => "noauth"]);
$routes->get('/sendverification/(:any)', 'RegisterController::send_verif', ["filter" => "noauth"]);

//Reset Password
$routes->match(['get', 'post'], 'reset', 'RegisterController::reset', ["filter" => "noauth"], ['as' => 'reset']);

//Forget Password
$routes->match(['get', 'post'], 'forgetpassword', 'RegisterController::forgetPassword', ["filter" => "noauth"], ['as' => 'forgetpassword']);
$routes->match(['get', 'post'], 'resetpassword/(:any)', 'RegisterController::resetpassword', ["filter" => "noauth"], ['as' => 'resetpassword']);

//Logout
$routes->get('logout', 'LoginController::logout');

$routes->group("", ["filter" => "isuser", "namespace" => "App\Controllers\user"], function($routes){
    // URL - /user
    $routes->get("/", "usercontroller::index", ['as' => 'user.dashboard']);
    // URL - /user/test
    $routes->group("test", function($routes){
        // URL - /user
        $routes->get("/", "testcontroller::index", ['as' => 'user.test.index']);
        $routes->match(["get", "post"], "index", "testcontroller::index");
        $routes->match(["get", "post"], "detail", "testcontroller::detail", ['as' => 'user.test.view']);;
        $routes->match(["get", "post"], "sheet", "testcontroller::sheet", ['as' => 'user.test.sheet']);;
    });
    $routes->group("profil", function($routes){
        // URL - /user
        $routes->get("/", "profilcontroller::index", ['as' => 'user.profil.index']);
        $routes->match(["get", "post"], "index", "profilcontroller::index");
    });
    $routes->group("performance", function($routes){
        // URL - /user
        $routes->get("/", "performancecontroller::index", ['as' => 'user.performance.index']);
        $routes->match(["get", "post"], "index", "performancecontroller::index");
    });
    $routes->group("transaksi", function($routes){
        // URL - /user
        $routes->get("/", "transaksicontroller::index", ['as' => 'user.transaksi.index']);
        $routes->match(["get", "post"], "index", "transaksicontroller::index");
    });
    
});
$routes->group("admin",["filter" => "isadmin", "namespace" => "App\Controllers\Admin"], function($routes){
    // URL - /admin
    $routes->get("/", "AdminController::index",['as' => 'admin.dashboard']);
    // URL - /admin/add-user
    $routes->group("class", function($routes){
        // URL - /admin
        $routes->get("/", "ClassController::index", ['as' => 'admin.class.index']);
        $routes->match(["get", "post"], "dt_class", "ClassController::dt_class",['as' => 'admin.class.dt_class']);
        $routes->match(["get", "post"], "add_class", "ClassController::create",['as' => 'admin.class.add_class']);
        $routes->match(["get", "post"], "remove_class", "ClassController::delete",['as' => 'admin.class.remove_class']);
        $routes->match(["get", "post"], "get_subject", "SubjectController::get_subject",['as' => 'admin.class.get_subject']);
        $routes->match(["get", "post"], "update_class", "ClassController::update",['as' => 'admin.class.edit_class']);
    });
    $routes->group("subject", function($routes){
        // URL - /admin
        $routes->get("/", "SubjectController::index", ['as' => 'admin.subject.index']);
        $routes->match(["get", "post"], "dt_subject", "SubjectController::dt_subject",['as' => 'admin.subject.dt_subject']);
        $routes->match(["get", "post"], "add_subject", "SubjectController::create",['as' => 'admin.subject.add_subject']);
        $routes->match(["get", "post"], "remove_subject", "SubjectController::delete",['as' => 'admin.subject.remove_subject']);
        $routes->match(["get", "post"], "update_subject", "SubjectController::update",['as' => 'admin.subject.edit_subject']);
    });
    $routes->group("topic", function($routes){
        // URL - /admin
        $routes->get("/", "TopicController::index", ['as' => 'admin.topic.index']);
        $routes->match(["get", "post"], "dt_topic", "TopicController::dt_topic",['as' => 'admin.topic.dt_topic']);
        $routes->match(["get", "post"], "add_topic", "TopicController::create",['as' => 'admin.topic.add_topic']);
        $routes->match(["get", "post"], "remove_topic", "TopicController::delete",['as' => 'admin.topic.remove_topic']);
        $routes->match(["get", "post"], "update_topic", "TopicController::update",['as' => 'admin.topic.edit_topic']);
    });
    $routes->group("test", function($routes){
        // URL - /admin
        $routes->get("/", "TestController::index", ['as' => 'admin.test.index']);
        $routes->match(["get", "post"], "index", "TestController::index");
        $routes->match(["get", "post"], "dt_test", "TestController::dt_test", ['as' => 'admin.test.dt_test']);
        $routes->match(["get", "post"], "add_test", "TestController::create",['as' => 'admin.test.add_test']);
        $routes->match(["get", "post"], "edit_test", "TestController::update",['as' => 'admin.test.edit_test']);
        $routes->match(["get", "post"], "remove_test", "TestController::delete",['as' => 'admin.test.remove_test']);
        $routes->match(["get", "post"], "get_test", "TestController::detail",['as' => 'admin.test.get_test']);
        $routes->match(["get", "post"], "get_edit_test", "TestController::get_detail",['as' => 'admin.test.get_edit']);
    });
    $routes->group("bank-soal", function($routes){
        // URL - /admin
        $routes->get("/", "BankSoalController::index", ['as' => 'admin.bank-soal.index']);
        $routes->match(["get", "post"], "dt_banksoal", "BankSoalController::dt_bank_soal", ['as' => 'admin.bank-soal.dt_banksoal']);
        $routes->match(["get", "post"], "get_subject", "BankSoalController::get_subject", ['as' => 'admin.bank-soal.get_subject']);
        $routes->match(["get", "post"], "get_topic", "BankSoalController::get_topic", ['as' => 'admin.bank-soal.get_topic']);
        $routes->match(["get", "post"], "delete_question", "BankSoalController::delete", ['as' => 'admin.bank-soal.delete-question']);
        $routes->match(["get", "post"], "insert_question", "BankSoalController::create", ['as' => 'admin.bank-soal.insert-question']);
    });
});



/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}