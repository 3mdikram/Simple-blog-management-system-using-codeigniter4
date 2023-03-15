<?php

namespace Config;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();

namespace App\Controllers\Auth;

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
//Routes
$routes->get('/', 'Home::index');
$routes->group("/",['filter' => 'guest'], function ($routes) {
    $routes->get('signup', 'Signup::index');
    $routes->post('signup/register', 'Signup::register');
    $routes->get('login', 'LoginController::index');
    $routes->post('login', 'LoginController::loginAuth');
});
// Admin Controll Route
$routes->group("Auth", ['namespace' => 'App\Controllers\Auth', 'filter' => 'isLoggedIn'], function ($routes) {
    $routes->get('Dashboard', 'Dashboard::index');
    $routes->get('Profile', 'Profile::index');
    $routes->post('Update', 'Profile::profileUpdate');
    $routes->post('Profile/PassUpdate', 'Profile::passwordUpdate');
    $routes->get('Bank', 'Bank::index');
    $routes->post('Bank/Addbank', 'Bank::AddNewBank');
    $routes->post('Bank/updateBank', 'Bank::UpdateBankData');
    $routes->post('Bank/deleteBank', 'Bank::BankDeleted');
    $routes->get('Logout', 'Logout::index');
    $routes->get('Show_Users', 'Users::index');
    $routes->post('Profile/Proupdate', 'Profile::updateFile');
    $routes->get('Update_Profile/(:num)', 'Users::updateUserData/$1');
    $routes->post('Update_User_Profile', 'Users::userProfileDataUpdate');
    $routes->post('Delete_Users', 'Users::usersDeleted');
    $routes->get('Add_User', 'AddNewUsers::index');
    $routes->post('Add_User/New_User', 'AddNewUsers::addNewUsers');
    $routes->get('Salary', 'Salary::index');
    $routes->get('Salary/(:num)', 'Salary::showUserSalary/$1');
    $routes->get('Salary/Add_Salary', 'Salary::addNewSalary');
    $routes->post('Salary/Users_New_Salary', 'Salary::salaryDataAddeDb');
    $routes->get('User_Attendence', 'Attendence::index');
    $routes->post('User_Attendence/Add_attendence', 'Attendence::userAddAttendece');
    $routes->get('User_Attendence/Details/(:num)', 'Attendence::userAttendetails/$1');
    $routes->get('Search', 'SearchUsers::index');
    $routes->post('Search/User_Details', 'SearchUsers::showDetailData');
    $routes->get('Post_News', 'PostNews::index');
    $routes->get('New_Users', 'NewUsers::index');
    $routes->get('Users', 'NewUsers::index');
    $routes->post('New_Add/Store', 'NewUsers::storeData');
    $routes->get('ToDoList', 'ToDoList::index');
    $routes->post('ToDoList/AddItem', 'ToDoList::AdData');
    $routes->get('ToDoList/delete/(:num)', 'ToDoList::deleteToDo/$1');
    $routes->get('New_Add', 'NewUsers::addNu');
});
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
