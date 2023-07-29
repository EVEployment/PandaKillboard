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
    public function up()
    {
        Schema::create('killmail_victims', function (Blueprint $table) {
            $table->foreignId('id')->primary()->constrained('killmails');
            $table->timestamps();
            $table->integer('alliance_id')->nullable()->index();
            $table->integer('corporation_id')->nullable()->index();
            $table->integer('character_id')->nullable()->index();
            $table->integer('damage_taken');
            $table->integer('faction_id')->nullable();
            $table->integer('ship_type_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('killmail_victims');
    }
};
