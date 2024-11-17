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
        Schema::create('goods_receipts', function(Blueprint $table) {
            $table->id();
            $table->date('import_date');
            $table->enum('status', ['Phiếu tạm', 'Đã nhập hàng', 'Đã huỷ']);
            $table->integer('total_quantity');
            $table->integer('total_price');
            //Khoá ngoại Branch (chi nhánh)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_receipts');
    }
};
