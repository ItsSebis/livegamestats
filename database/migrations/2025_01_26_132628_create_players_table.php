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
            $table->foreignId("gameId");                          // which game
            $table->text("name");                                 // name of player
            $table->foreignId("teamId");                          // which team?
            $table->integer("number");                            // back number
            $table->integer("shots")->default(0);           // number of tries to score
            $table->integer("goals")->default(0);           // goals by player
            $table->integer("shotsOnGoal")->default(0);     // shots on goaly
            $table->integer("saves")->default(0);           // saves by goaly
            $table->integer("sevenShots")->default(0);      // 7m throws
            $table->integer("sevenGoals")->default(0);      // 7m goals
            $table->boolean("goalkeeper")->default(0);      // is this a goalkeeper?
            $table->boolean("yellowCard")->default(0);      // yes | no
            $table->tinyInteger("twoMinutes")->default(0);  // just count up
            $table->tinyInteger("redCard")->default(0);     // 0 = no; 1 = direct; 2 = 3x2min; 3 = red+blue;
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
