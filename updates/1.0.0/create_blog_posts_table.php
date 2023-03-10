<?php

use UrsacoreLab\StaticVars\Classes\Statuses;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Winter\Storm\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('ursacorelab_blog_posts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id');
            $table->string('name');
            $table->string('keywords')->nullable();
            $table->string('title');
            $table->text('introductory');
            $table->longText('content');
            $table->string('slug');
            $table->integer('status')->default(Statuses::ACTIVE);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('ursacorelab_blog_posts');
    }
};
