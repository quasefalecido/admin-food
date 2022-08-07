<?php

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
