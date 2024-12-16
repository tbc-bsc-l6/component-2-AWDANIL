<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Player's name
            $table->string('role'); // Player's role (e.g., Batsman, Bowler)
            $table->decimal('batting_average', 5, 2)->nullable(); // Batting average
            $table->timestamps(); // Created at and Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players'); // Drops the players table
    }
};
