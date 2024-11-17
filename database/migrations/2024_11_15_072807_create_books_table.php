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
        //
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('author', 50);
            $table->integer('quantity')->default(0);
            $table->integer('unit_price');
            $table->integer('expense');
            $table->year('publishing_year');
            $table->integer('page_number');
            $table->string('description', 800);
            //Khoá ngoại BookType (loại sách)
            // $table->foreignIdFor(BookType::class);
            //Khoá ngoại Supplier (nhà cung cấp)
            // $table->foreignIdFor(Supplier::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('books');
    }
};
