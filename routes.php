<?php

use Illuminate\Support\Facades\Route;
use UrsacoreLab\Blog\Controllers\CategoryController;
use UrsacoreLab\Blog\Controllers\PostController;

Route::prefix('api')->group(function () {
    Route::prefix('blog')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'category_list']);
            Route::get('{category}', [CategoryController::class, 'category_single']);
        });

        Route::prefix('posts')->group(function () {
            Route::get('/', [PostController::class, 'post_list']);
            Route::get('{slug}', [PostController::class, 'post_single']);
        });
    });
});
