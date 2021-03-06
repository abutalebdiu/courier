<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPickupDeliveryReschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_pickup_delivery_reschedules', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('manpower_id')->nullable();
            $table->integer('order_pickup_delivery_holding_reason_id')->nullable();
            $table->integer('parcel_owner_type_id')->nullable();
            $table->integer('order_processing_type_id')->nullable();
            $table->integer('merchant_client_id')->nullable();
            $table->integer('branch_id')->nullable();

            $table->string('next_schedule',35)->nullable();
            $table->integer('created_by')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_verified')->default(1);
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('order_pickup_delivery_reschedules');
    }
}
