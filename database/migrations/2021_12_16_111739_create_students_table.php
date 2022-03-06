<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('father_name');
            $table->string('grandfather_name');
            $table->string('last_name');
            $table->enum('status',['new','active','stopped','pending'])->default('new');
            $table->string('state');
            $table->string('address');
            $table->string('social_status');
            $table->string('college');
            $table->string('specialization');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('age');
            $table->string('qualification');
            $table->string('telephone_number')->nullable();
            $table->string('mobile_number');
            $table->string('identification');
            $table->string('right_time');
            $table->string('trining_day')->nullable();
            $table->string('trining_time')->nullable();
            $table->string('how_to_know_us')->nullable();
            $table->string('previous_courses')->nullable();
            $table->string('courses');
            $table->foreignId('group_id')->nullable()->constrained('groups')->nullOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}
