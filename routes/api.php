<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => ['auth:api']], function() {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

});
Route::group(['middleware' => ['auth']], function() {
    Route::get('/cards','CardsController@apiList');
    Route::get('/cards/{card}', 'CardsController@apiRead');
    Route::get('/users', 'AdminController@apiUserList');
    Route::get('/users/names', 'AdminController@apiListAllUserByName');
    Route::get('/nodes', 'NodesController@apiList');
    Route::get('/schedules', 'SchedulesController@apiList');
    Route::get('/memberships', 'MembershipController@apiMembershipList');
    Route::get('/membership_types', 'MembershipController@apiMembershipTypeList');
    Route::get('/membership_credits', 'MembershipController@apiMembershipCreditList');
    Route::get('/membership_subscriptions', 'MembershipController@apiMembershipSubscriptionList');
});
    