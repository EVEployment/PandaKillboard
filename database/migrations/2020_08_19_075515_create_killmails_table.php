<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('killmails', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->timestamps();
            $table->string('hash');
            $table->foreignId('source')->nullable();
            $table->boolean('pulled');
            $table->dateTime('killmail_time');
            $table->integer('moon_id')->nullable();
            $table->integer('solar_system_id')->index();
            $table->integer('war_id')->nullable();
            $table->bigInteger('nearest_celestial_id');
            $table->double('nearest_celestial_distance');
            $table->bigInteger('nearest_structure_id')->nullable();
            $table->double('nearest_structure_distance')->nullable();
            $table->bigInteger('points')->nullable();
            $table->boolean('npc');
            $table->boolean('solo');
            $table->boolean('padding')->nullable();
            $table->boolean('ganked')->nullable();
            $table->boolean('awox')->nullable();
            $table->decimal('aggregated_shipfit', 30, 2)->nullable();
            $table->decimal('aggregated_dropped', 30, 2)->nullable();
            $table->decimal('aggregated_destroyed', 30, 2)->nullable();
            $table->decimal('aggregated_value', 30, 2)->nullable();
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
};
