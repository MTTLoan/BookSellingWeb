<?php

use App\Models\Branch;
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
        //
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->enum('sex', ['Nam', 'Nữ']);
            $table->date('birthday')->nullable();
            $table->string('address', 100)->nullable();
            $table->string('ward', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('province', 100)->nullable();
            $table->date('starting_date');
            $table->integer('salary')->default(0);
            $table->enum('position', ['Giám đốc', 'Trưởng chi nhánh', 'Nhân viên', 'Admin']);
            $table->foreignIdFor(Branch::class, 'branch_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignIdFor(User::class,'user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
