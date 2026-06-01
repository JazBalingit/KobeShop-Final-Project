<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Show register form
Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');

// Register function
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');

// Show login form
Route::get('/login', [AuthController::class, 'showLogIn'])->name('login');

// Login function
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout function
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Show home page
Route::get('/home', [LandingController::class, 'showHomePage'])->name('home');

// Show about page
Route::get('/about', [LandingController::class, 'showAboutPage'])->name('about');

// Show contact page
Route::get('/contact', [LandingController::class, 'showContactPage'])->name('contact');

// Show contact page
Route::post('/sendcontact', [LandingController::class, 'sendContact'])->name('contact.send');

// Show profile page
Route::get('/profile', [LandingController::class, 'showProfilePage'])->name('profile');

// Profile information function
Route::post('/profile', [LandingController::class, 'profile'])->name('profile.submit');

// Profile picture uplaod function
Route::post('/profileupload', [LandingController::class, 'profileUpload'])->name('profile.upload');

// Show dashboard
Route::get('/dashboard', [DashboardController::class, 'ShowDashboardPage'])->name('dashboard');

// Get user data
Route::get('/dashboard/userdata', [DashboardController::class, 'GetUserData'])->name('userdata');

// add user
Route::post('/adduser', [DashboardController::class, 'AddUser'])->name('adduser.submit');

// edit user
Route::post('/dashboard/edituser', [DashboardController::class, 'EditUser'])->name('edituser.submit');

// delete user
Route::post('/dashboard/deleteuser', [DashboardController::class, 'DeleteUser'])->name('deleteuser.submit');

// show products design
Route::get('/products', [ProductController::class, 'ShowProductPage'])->name('products');

// add products
Route::post('/products/addproducts', [ProductController::class, 'AddProducts'])->name('productsadd.submit');

// edit products
Route::post('/products/editproducts', [ProductController::class, 'EditProducts'])->name('editproducts.submit');

// delete products
Route::post('/products/deleteproducts', [ProductController::class, 'DeleteProducts'])->name('deleteproducts.submit');
