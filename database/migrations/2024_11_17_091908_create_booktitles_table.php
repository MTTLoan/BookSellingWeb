<?php

use App\Models\BookType;
use App\Models\Supplier;
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
        Schema::create('booktitles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('author', 50);
            $table->string('description', 800);
            //Khoá ngoại BookType (loại sách)
            $table->foreignIdFor(BookType::class);
            //Khoá ngoại Supplier (nhà cung cấp)
            $table->foreignIdFor(Supplier::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booktitles');
    }
};
