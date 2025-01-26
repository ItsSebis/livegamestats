<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId("gameId");        // which game
            $table->text("name");               // name of player
            $table->foreignId("teamId");        // which team?
            $table->integer("number");          // back number
            $table->integer("shots");           // number of tries to score
            $table->integer("goals");           // goals by player
            $table->integer("shotsOnGoal");     // shots on goaly
            $table->integer("saves");           // saves by goaly
            $table->integer("sevenShots");      // 7m throws
            $table->integer("sevenGoals");      // 7m goals
            $table->boolean("goalkeeper");      // is this a goalkeeper?
            $table->boolean("yellowCard");      // yes | no
            $table->tinyInteger("twoMinutes");  // just count up
            $table->tinyInteger("redCard");     // 0 = no; 1 = direct; 2 = 3x2min; 3 = red+blue;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
