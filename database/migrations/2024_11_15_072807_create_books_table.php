<?php

use App\Models\BookTitle;
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
            $table->integer('quantity')->default(0);
            $table->integer('unit_price');
            $table->integer('expense');
            $table->year('publishing_year');
            $table->integer('page_number')->nullable();
            $table->enum('cover', ['Bìa cứng', 'Bìa mềm']);
            $table->foreignIdFor(BookTitle::class);
            $table->timestamps();
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
