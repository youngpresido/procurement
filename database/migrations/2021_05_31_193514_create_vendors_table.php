<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string("organisation_name")->nullable();
            $table->string("organisation_address")->nullable();
            $table->string("organisation_email")->nullable();
            $table->string("website")->nullable();
            $table->string("contact_name")->nullable();
            $table->string("contact_email")->nullable();
            $table->string("contact_phone")->nullable();
            $table->string("supply")->nullable();
            $table->string("quotation")->nullable();
            $table->string("logo")->nullable();
            $table->string("invoice")->nullable();
            $table->string("signature")->nullable();
            $table->enum('status',['pending','accepted','rejected'])->default('pending');
            $table->text('reason')->nullable();
            $table->softdeletes();
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
        Schema::dropIfExists('vendors');
    }
}
