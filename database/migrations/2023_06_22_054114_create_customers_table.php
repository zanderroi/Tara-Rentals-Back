<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_initial')->nullable();
            $table->string('ext_name')->nullable();
            $table->enum('gender',['Male','Female']);
            $table->date('birthday');
            $table->integer('house_no');
            $table->string('subdivision');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('region');
            $table->unsignedBigInteger('phone_number');
            $table->enum('account_status',['basic', 'verified', 'Deactivated'])->default('basic');
            $table->enum('booking_status',['Available', 'Pending'])->default('Available');
            $table->string('driverse_license');
            $table->string('supporting_id');
            $table->string('supporting_id_number');
            $table->binary('driverselicense_img');
            $table->binary('driverselicense_img2');
            $table->binary('supportingid_img');
            $table->binary('supportingid_img2');
            $table->binary('selfie_image');
            $table->string('contactperson1');
            $table->string('contactperson2'); 
            $table->unsignedBigInteger('contactperson1_number');
            $table->unsignedBigInteger('contactperson2_number');
            $table->softDeletes();
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
