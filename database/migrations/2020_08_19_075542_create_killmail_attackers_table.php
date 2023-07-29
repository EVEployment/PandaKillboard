<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('killmail_attackers', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->timestamps();
            $table->foreignId('killmail_id')->constrained();
            $table->integer('alliance_id')->nullable()->index();
            $table->integer('corporation_id')->nullable()->index();
            $table->integer('character_id')->nullable()->index();
            $table->integer('damage_done');
            $table->integer('faction_id')->nullable()->index();
            $table->boolean('final_blow')->default(false);
            $table->decimal('security_status', 3, 1);
            $table->integer('ship_type_id')->nullable()->index();
            $table->integer('weapon_type_id')->nullable()->index();

            $table->index('killmail_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('killmail_attackers');
    }
};
