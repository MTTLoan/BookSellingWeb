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
        //
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->enum('sex', ['Nam', 'Nữ']);
            $table->date('birthday');
            $table->string('address', 100);
            $table->string('ward', 100);
            $table->string('district', 100);
            $table->string('province', 100);
            $table->date('starting_date');
            $table->integer('salary');
            $table->enum('position', ['Director', 'Branch Manager', 'Staff', 'Admin']);
            //Khoá ngoại Branch (chi nhánh)
            // $table->foreignIdFor(Branch::class)
            //Khoá ngoại User (tài khoản)
            $table->foreignIdFor(User::class);
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
