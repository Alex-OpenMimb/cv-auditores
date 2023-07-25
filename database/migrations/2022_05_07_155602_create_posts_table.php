<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('phone')->nullable();
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('city')->nullable();
            $table->string('description')->nullable();
            $table->enum('status',['ACTIVO','DESACTIVADO'])->default('ACTIVO');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('services_has_clients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');

            $table->text('message')->nullable();
            $table->enum('status',['LEIDO','NOT_LEIDO'])->default('NOT_LEIDO');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('slug')->unique();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->enum('status',['ACTIVO','DESACTIVADO'])->default('ACTIVO');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description');

            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->enum('status',['ACTIVO','DESACTIVADO'])->default('ACTIVO');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('comment_response', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description');

            $table->unsignedBigInteger('comment_id');
            $table->foreign('comment_id')->references('id')->on('comments');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->enum('status',['ACTIVO','DESACTIVADO'])->default('ACTIVO');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('services_has_clients');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('comments');
    }
}
