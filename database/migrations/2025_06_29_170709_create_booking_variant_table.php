<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingVariantTable extends Migration
{
    public function up()
    {
        Schema::create('booking_variant', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('booking_id');
            $table->unsignedBigInteger('variant_id');
            $table->timestamps();

            $table->foreign('booking_id')->references('id_booking')->on('tb_booking')->onDelete('cascade');
            $table->foreign('variant_id')->references('id')->on('variants')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('booking_variant');
    }
}
