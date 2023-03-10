<?php

use Illuminate\Support\Facades\Route;
use UrsacoreLab\Blog\Controllers\CategoryController;
use UrsacoreLab\Blog\Controllers\PostController;

Route::prefix('api')->group(function () {
    Route::prefix('blog')->group(function () {

        Route::get('categories', [CategoryController::class, 'category_list']);
        Route::get('category/{slug}', [CategoryController::class, 'category_single']);

        Route::prefix('posts')->group(function () {
            Route::get('/', [PostController::class, 'post_list']);
            Route::get('{slug}', [PostController::class, 'post_single']);
        });
    });
});
