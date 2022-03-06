<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaryStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diary_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diary_date_id')->nullable()->constrained('diary_dates')->nullOnDelete();
            $table->enum('type',['in','out']);
            $table->string('price');
            $table->enum('currency_type',['NIS','$'])->default('NIS');
            $table->string('bond_no');
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diary_students');
    }
}
