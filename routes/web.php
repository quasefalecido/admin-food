<?php

use App\Http\Controllers\Andes\ACL\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('andes')
  ->namespace('Andes')
  // ->middleware('auth')
  ->group(function () {
    /**
     * Dashboard
     */
    Route::get('/', 'DashboardController@index')->name('andes.dashboard.index');
    /**
     * Plan Controllers
     */
    Route::resource('plans', 'PlanController');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    /**
     * Routes Details Plans
     */
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');
    /**
     * Routers Profiles
     */
    Route::resource('profiles', 'ACL\ProfileController');
    Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    /**
     * Routers Profiles
     */
    Route::resource('permissions', 'ACL\PermissionController');
    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    /**
     * profile x permission
     */
    Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
    Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permission.detach');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
    Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');
    /**
     * Plan x Profile
     */
    Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
    Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');
  });

/**
 * Auth Routes
 */
Auth::routes();
