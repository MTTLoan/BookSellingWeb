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
        Schema::create('orders', function(Blueprint $table) {
            $table->id();
            $table->enum('type', ['Website', 'Shop']);
            $table->enum('status', ['Phiếu tạm', 'Đã xác nhận', 'Đang giao hàng', 'Hoàn thành', 'Đã huỷ']);
            $table->string('address', 100);
            $table->string('ward', 100);
            $table->string('district', 100);
            $table->string('province', 100);
            $table->date('date_received');
            $table->integer('total_price');
            //Khoá ngoại Discount
            //Khoá ngoại Customer
            //Khoá ngoại Employee
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
