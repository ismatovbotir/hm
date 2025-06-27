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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->contrained();
            $table->foreignId('item_id')->constrained();
            $table->double('qty',8,3);
            $table->double('total',10,2)->default(0);
            $table->date('stock_date');
            $table->unique(['shop_id', 'item_id', 'stock_date']);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
