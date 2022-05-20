<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id');
            $table->foreignId('region_id');
            $table->foreignId('rank_id');
            $table->foreignId('avatar_id');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
            // $table->foreign('avatar_id')->references('product_id')->on('inventory'); hay que hacer que este funcione

        });
        /* Schema::table('users', function($table){
            //si eliminamos el post o los usuarios los comentarios se eliminarán para que no haya problemas
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
            $table->foreign('avatar_id')->nullable()->references('id')->on('inventory')->onDelete('cascade')->unsigned;
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropForeign('rank_id');
        Schema::dropForeign('avatar_id');
    }
}
