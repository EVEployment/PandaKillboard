<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKillmailItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('killmail_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('killmail_victim_id')->constrained();
            $table->foreignId('container_id')->nullable();
            $table->integer('flag');
            $table->integer('item_type_id');
            $table->bigInteger('quantity_destroyed')->nullable();
            $table->bigInteger('quantity_dropped')->nullable();
            $table->integer('singleton');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('killmail_items');
    }
}
