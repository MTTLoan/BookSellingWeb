<?php

use App\Models\Customer;
use App\Models\Discount;
use App\Models\Employee;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Website', 'Cửa hàng']);
            $table->enum('status', ['Phiếu tạm', 'Đã xác nhận', 'Đang giao hàng', 'Hoàn thành', 'Đã huỷ']);
            $table->string('address', 100);
            $table->string('ward', 100);
            $table->string('district', 100);
            $table->string('province', 100);
            $table->date('date_received')->nullable();
            $table->integer('total_price');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
        
            $table->timestamps();
        
            $table->foreign('discount_id')
                  ->references('id')
                  ->on('discounts')
                  ->onDelete('set null');
        
            $table->foreign('customer_id')
                  ->references('id')
                  ->on('customers')
                  ->onDelete('set null');
        
            $table->foreign('employee_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('set null');
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
