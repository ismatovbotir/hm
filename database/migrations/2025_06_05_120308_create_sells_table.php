<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->foreignId("shop_id")->constrained();
            $table->foreignId("item_id")->constrained();
            $table->double("qty",8,3);
            $table->double("cost",10,2)->nullable();
            $table->double("total",10,2)->nullable();
            $table->double("discount",10,2)->nullable();
            $table->date("sell_date");
            $table->unique(['shop_id', 'item_id', 'sell_date']);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sells');
    }
};
