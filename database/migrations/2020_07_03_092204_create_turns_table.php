<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turns', function (Blueprint $table) {
            $table->integer('id');
            $table->unsignedBigInteger('player_id')->nullable();
            $table->unsignedBigInteger('game_id')->nullable();
            $table->enum('location',[1,2,3,4,5,6,7,8,9])->nullable();
            $table->enum('type', ['x', 'o']);
            $table->timestamps();

            $table->foreign('player_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('game_id')
            ->references('id')
            ->on('games')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turns');
    }
}
