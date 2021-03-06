<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManpowerAssignToAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manpower_assign_to_areas', function (Blueprint $table) {
            $table->id();
            $table->integer('area_id')->nullable();
            $table->integer('district_id')->nullable();//district_id
            $table->integer('manpower_id')->nullable();//user id as delivery , picker man
            $table->integer('manpower_type_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_verified')->default(1);
            $table->dateTime('deleted_at')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('business_type_id')->nullable();
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
        Schema::dropIfExists('manpower_assign_to_areas');
    }
}
