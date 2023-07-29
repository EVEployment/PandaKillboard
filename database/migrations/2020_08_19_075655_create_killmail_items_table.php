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
            $table->ulid('id')->primary();
            $table->timestamps();
            $table->date('date'); // used to calculate price
            $table->foreignId('killmail_id')->constrained();
            $table->ulid('container_id')->nullable();
            $table->integer('flag');
            $table->integer('item_type_id');
            $table->bigInteger('quantity_destroyed')->nullable();
            $table->bigInteger('quantity_dropped')->nullable();
            $table->integer('singleton');

            $table->index('killmail_id');
            $table->index('container_id');
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
