<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptocurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cryptocurrencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->decimal('price',8,3);
            $table->string('image');
            $table->decimal('percent_change_1h',8,2);
            $table->decimal('percent_change_24h',8,2);
            $table->decimal('percent_change_7d',8,2);
            $table->decimal('percent_change_30d',8,2);
            $table->decimal('volume_24h',16,3)->nullable();
            $table->decimal('market_cap',16,3);
            $table->string('date_added')->nullable();
            $table->string('id_coinmarket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cryptocurrencies');
    }
}
