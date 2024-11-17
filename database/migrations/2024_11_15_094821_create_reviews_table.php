<?php

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderDetail;
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
        Schema::create('reviews', function(Blueprint $table) {
            $table->id();
            $table->integer('score');
            $table->string('description', 1000);
            //Khoá ngoại Order
            $table->foreignIdFor(Order::class);
            //Khoá ngoại Book
            $table->foreignIdFor(Book::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

