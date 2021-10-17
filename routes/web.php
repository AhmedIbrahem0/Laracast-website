<?php

use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

use function PHPUnit\Framework\fileExists;

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

Route::get('register',[AuthController::class,'create']);
Route::post('register',[AuthController::class,'store']);
Route::get("login",[AuthController::class,'login']);
Route::post("login",[AuthController::class,'loginCheck']);

Route::get("users", function () {
   $users = User::get();
   return view("users", ["users" => $users]);
});
Route::resource('posts',PostController::class);
