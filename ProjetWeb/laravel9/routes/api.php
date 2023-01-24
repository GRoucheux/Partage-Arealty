<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CommentsLikedByController;
use App\Http\Controllers\PostsLikedByController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/user/{id}', function ($id)
// {
//     return new UserController(User::findOrFail($id));
// });

/////////////////////////////////////////////////////////////
/////////////////Gestion Utilisateurs////////////////////////
/////////////////////////////////////////////////////////////

Route::post('/register', [UserController::class, 'register']); //ok

Route::get('/seeAll', [UserController::class, 'show']); //ok

Route::post('/delUser', [UserController::class, 'delUser']); //ok

Route::post('/verifyUserExist', [UserController::class, 'verifyUserExist']); //ok

Route::post('/modifyUser', [UserController::class, 'modifyUser']); //ok

Route::post('/verifyUser', [UserController::class, 'verifyUser']); //ok

Route::post('/showOneUser', [UserController::class, 'getUser']); //ok

Route::post('/showOneUserA', [UserController::class, 'getUser']);


////////////////////////////////////////////////////////////////////////////////
//////////////////////////////Gestion des Posts/////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

Route::post('/createPost', [PostsController::class, 'create']); //ok

Route::post('/deletePost', [PostsController::class, 'destroy']); //ok

Route::post('/modifyPost', [PostsController::class, 'update']); //ok

Route::get('/seeAllPosts', [PostsController::class, 'seeAll']); //ok

Route::post('/seePost', [PostsController::class, 'show']); //ok

Route::post('/showByAuthor', [PostsController::class, 'showByAuthor']);

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////Gestion des commentaires////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

Route::post('/createCom', [CommentsController::class, 'create']); //ok

Route::post('/deleteCom', [CommentsController::class, 'destroy']); //ok

Route::post('/modifyCom', [CommentsController::class, 'update']); //ok

Route::get('/seeAllCom', [CommentsController::class, 'seeAll']); //ok

Route::get('/seeCom', [CommentsController::class, 'show']); 


/////////////////////////////////////////////////////////////////////////////////
//////////////////////////Gestion des like posts/////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

Route::post('/likePost', [PostsLikedByController::class, 'create']);

Route::post('/delLikePost', [PostsLikedByController::class, 'delete']);

Route::get('/seeAllLikePost', [PostsLikedByController::class, 'seeAll']);




//////////////////////////////////////////////////////////////////////////////////
//////////////////////////Gestion des like comments///////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

Route::post('/likeCom', [CommentsLikedByController::class, 'create']);

Route::post('/delLikeCom', [CommentsLikedByController::class, 'create']);

Route::get('/seeAllLikeCom', [CommentsLikedByController::class, 'seeAll']);










