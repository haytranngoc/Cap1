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
            $table->string('avatar')->default('default.jpg');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->bigInteger('numbers_cmnd')->unique();
            $table->date('graduation_year')->nullable();
            $table->date('date_of_birth');
            $table->string('address')->nullable();
            $table->boolean('confirm')->default(false);
            $table->unsignedInteger('apply_id');
            $table->unsignedInteger('candidate_type_id');
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('school_id');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('set_id');
            $table->unsignedInteger('specialized_id');
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
