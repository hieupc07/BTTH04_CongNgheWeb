<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Tạo khóa chính
            $table->foreignId('computer_id')->constrained('computers'); // Khóa ngoại tham chiếu đến bảng computers
            $table->string('reported_by'); // Người báo cáo
            $table->dateTime('reported_date'); // Thời gian báo cáo
            $table->text('description'); // Mô tả sự cố
            $table->enum('urgency', ['Low', 'Medium', 'High']); // Mức độ sự cố
            $table->enum('status', ['Open', 'In Progress', 'Resolved']); // Trạng thái hiện tại
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('issues');
    }
};