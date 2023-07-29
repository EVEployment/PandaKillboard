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
        Schema::create('corporations', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->timestamps();
            $table->string('name');
            $table->string('ticker');
            $table->foreignId('alliance_id')->nullable();
            $table->foreignId('ceo_id')->nullable();
            $table->integer('member_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporations');
    }
};
