<?php

use App\Models\Book;
use App\Models\Branch;
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
        Schema::create('books_branches', function(Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Book::class, 'book_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Branch::class, 'branch_id')->constrained()->cascadeOnDelete();
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_branches');
    }
};
