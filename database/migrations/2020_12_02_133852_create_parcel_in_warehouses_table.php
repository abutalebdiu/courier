<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelInWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcel_in_warehouses', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->tinyInteger('parcel_in_or_out_warehouse_status')->default(1);
            $table->integer('branch_id')->nullable();
            $table->integer('parcel_in_warehouse_assigner_id')->nullable();
            $table->integer('parcel_out_warehouse_assigner_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_verified')->default(1);
        	$table->dateTime('deleted_at')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('parcel_in_warehouses');
    }
}
