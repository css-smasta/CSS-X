<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            // Penting untuk autentikasi
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            // Penting untuk CSS-X
            $table->integer('score')->default(0);
            $table->integer('role_lvl')->default(0);

            // Avatar + Cover Image + HTML Frontpage
            $table->boolean('is_avatar_set')->default(false);
            $table->boolean('is_cover_image_set')->default(false);
            $table->boolean('is_frontpage_set')->default(false);


            $table->string('class', 10);
            $table->integer('gender');
            $table->integer('class_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
