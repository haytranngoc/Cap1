<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesSubjectsSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches_subjects_set', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subject_set_id');
            $table->unsignedInteger('branch_id');
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
        Schema::dropIfExists('branches_subjects_set');
    }
}
