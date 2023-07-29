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
        Schema::create('characters', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->timestamps();
            $table->string('name');
            $table->foreignId('corporation_id');
            $table->foreignId('alliance_id')->nullable();
            $table->foreignId('faction_id')->nullable();
            $table->dateTime('birthday');
            $table->double('security_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
};
