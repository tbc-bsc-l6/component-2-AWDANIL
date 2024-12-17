<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Team name
            $table->string('coach')->nullable(); // Coach name
            $table->string('city')->nullable(); // City
            $table->timestamps(); // Created at and Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams'); // Drops the teams table
    }
}
