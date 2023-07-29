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
        Schema::create('structures', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->timestamps();
            $table->string('name');
            $table->decimal('x', 24, 6);
            $table->decimal('y', 24, 6);
            $table->decimal('z', 24, 6);
            $table->foreignId('owner_id');
            $table->foreignId('type_id');
            $table->foreignId('solar_system_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('structures');
    }
};
