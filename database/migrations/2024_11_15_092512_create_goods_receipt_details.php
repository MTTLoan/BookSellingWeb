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
        Schema::create('goods_receipt_details', function(Blueprint $table) {
            $table->id();
            //Khoá ngoại GoodsReceipt
            //Khoá ngoại Book
            $table->integer('sl');
            $table->integer('SoTien');   
            $table->primary(['MaPN', 'MaS']);      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_receipt_details');
    }
};

