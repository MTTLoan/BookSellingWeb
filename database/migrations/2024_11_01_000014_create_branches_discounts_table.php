<?php

use App\Models\Branch;
use App\Models\Discount;
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
        Schema::create('branches_discounts', function(Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Branch::class, 'branch_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Discount::class, 'discount_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches_discounts');
    }
};
