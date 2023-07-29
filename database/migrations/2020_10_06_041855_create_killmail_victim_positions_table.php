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
        Schema::create('killmail_victim_positions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('x', 24, 6);
            $table->decimal('y', 24, 6);
            $table->decimal('z', 24, 6);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
