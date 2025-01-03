<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_log', function (Blueprint $table) {
            $table->id(); // ID tự động tăng
            $table->string('table_name'); // Tên bảng bị thay đổi
            $table->bigInteger('row_id'); // ID của dòng bị thay đổi
            $table->string('column_name')->nullable(); // Tên cột bị thay đổi (nullable nếu toàn bộ dòng)
            $table->text('old_value')->nullable(); // Giá trị cũ
            $table->text('new_value')->nullable(); // Giá trị mới
            $table->bigInteger('changed_by')->nullable(); // ID người sửa đổi
            $table->enum('operation_type', ['create', 'update', 'delete'])->default('update'); // Loại thay đổi
            $table->timestamp('changed_at')->useCurrent(); // Thời gian thay đổi
            $table->softDeletes();
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_log');
    }
}