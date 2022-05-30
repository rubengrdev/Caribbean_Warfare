<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id1');
            $table->foreignId('user_id2');
            $table->string('user1_boats')->nullable();
            $table->string('user2_boats')->nullable();
            $table->string('user1_shots')->nullable();
            $table->string('user2_shots')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->foreign('user_id1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id2')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('current_games');
    }
}
