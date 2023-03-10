<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use \Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Common Resource Routes:
//index - Show all listings
//show - Show single listing
//create - show form to create new listing
//store - store new listing
//edit - show form to edit listing
//update - update listing
//destroy - delete listing

Auth::routes();

// Listings Section

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth:company');

// Create new Listing / Store
Route::post('/listings/', [ListingController::class, 'store'])->middleware('auth:company');

// Show Edit form
Route::get('listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth:company');

// Update Listing
Route::put('listings/{listing}', [ListingController::class, 'update'])->middleware('auth:company');

// Delete Listing
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth:company');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth:company');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


//User Section

// Show Register/Create User Form
Route::get('/register/user', [UserController::class, 'create'])->middleware('guest');

// Create/Store New User
Route::post('/users', [UserController::class, 'store']);

// Show Login Form
Route::get('/login/user', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Logout
Route::post('/logout', [UserController::class, 'logout']);

// Show User Edit Form
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');

// Show User Details View
Route::get('users/{user}', [UserController::class, 'show'])->middleware('auth');

// Update User
Route::put('users/{user}/', [UserController::class, 'update'])->middleware('auth');

// Delete User Account
Route::delete('users/{user}', [UserController::class, 'destroy'])->middleware('auth');


// Company Section

// Show Register/Create Company Form
Route::get('/register/company', [CompanyController::class, 'create'])->middleware('guest:company');

// Create/Store New Company
Route::post('/companies', [CompanyController::class, 'store']);

// Show Company Login Form
Route::get('/login/company', [CompanyController::class, 'login'])->name('login')->middleware('guest:company');

// Log In Company
Route::post('/companies/authenticate', [CompanyController::class, 'authenticate']);

// Company Edit Form
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->middleware('auth:company');

// Update Company
Route::put('companies/{company}/', [CompanyController::class, 'update'])->middleware('auth:company');

// Show Company Details View
Route::get('companies/{company}', [CompanyController::class, 'show']);

// Delete Company Account
Route::delete('companies/{company}', [CompanyController::class, 'destroy'])->middleware('auth:company');
