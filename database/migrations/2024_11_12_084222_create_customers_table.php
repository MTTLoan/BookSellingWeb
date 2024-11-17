<?php

use App\Models\User;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->date('birthday');
            $table->string('address', 100);
            $table->string('ward', 100);
            $table->string('district', 100);
            $table->string('province', 100);
            $table->enum('sex', ['Nam', 'Nữ']);
            $table->string('phone_number', 11);
            $table->string('total_revenue')->default(0);
            $table->foreignIdFor(User::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
