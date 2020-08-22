<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKillmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('killmails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('hash');
            $table->timestamp('time');
            $table->integer('moon_id')->nullable();
            $table->integer('solar_system_id')->index();
            $table->integer('war_id')->nullable();
            $table->double('position_x');
            $table->double('position_y');
            $table->double('position_z');
            $table->integer('nearest_celestial_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('killmails');
    }
}
