<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::apiResource('/categories', CategoryController::class);

Route::post('/login', function() {
    $email = request()->email;
    $password = request()->password;

    if($email == "" or $password == "" ) {
        return response(['msg' => 'email and password required'], 400);
    }

    $user = User::where("email", $email)->first();
    if($user) {
        if(Hash::check($password, $user->password)) {
            return $user->createToken('token')->plainTextToken;
        }
    }

    return response(['msg' => 'email or password is incorrect'], 401);
});

// Route::get('/categories', [CategoryController::class, 'index']);
// Route::post('/categories', [CategoryController::class, 'store']);
// Route::get('/categories/{id}', [CategoryController::class, 'show']);
// Route::put('/categories/{id}', [CategoryController::class, 'update']);
// Route::delete('/categories/{id}', [CategoryController::class, 'destory']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
