<?php


use App\User;
use App\Address;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/insert', function()
{
    $user = User::findOrFail(1);

    $address = new Address(['name' => 'asddasd iela 39a']);
    $user->address()->save($address);
});

Route::get('/update', function()
{
    $address = Address::whereUserId(1)->first();
    $address->name = "Updated new address";
    $address->save();
});

Route::get('/read', function()
{
    $address = Address::whereUserId(1)->first();
    echo $address->name;

    $userAddress = User::findOrFail(1);
    echo $userAddress->address->name;
});

Route::get('/delete', function()
{
    // $deleteAddress = Address::whereUserId(1)->first();
    // $deleteAddress->delete();

    $deleteAddress2 = User::findOrFail(1);
    $deleteAddress2->address()->delete();
});