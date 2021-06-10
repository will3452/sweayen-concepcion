<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('family_serial_number')->nullable();
            $table->string('date_of_registration')->nullable();
            $table->string('gender')->nullable();
            $table->string('name_of_school')->nullable();
            $table->string('purok')->nullable();
            $table->string('address')->nullable();
            $table->string('name_of_spouse')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('philhealth_member')->nullable();
            $table->string('fourp_benificiary')->nullable();
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
        Schema::dropIfExists('records');
    }
}
