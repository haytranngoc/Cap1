<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('avatar')->nullable();
            $table->tinyInteger('numbers_cmnd')->unique();
            $table->date('graduation_year');
            $table->date('date_of_birth');
            $table->string('address')->nullable();
            $table->unsignedInteger('apply_type_id');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('candidate_type_id');
            $table->unsignedInteger('subject_set_id');
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('school_id');
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
        Schema::dropIfExists('candidates');
    }
}
