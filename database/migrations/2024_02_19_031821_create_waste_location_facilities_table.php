<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWasteLocationFacilitiesTable extends Migration
{
    public function up()
    {
        Schema::create('waste_location_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('facility_id');
            $table->string('facility_name');
            $table->string('facility_address');
            $table->text('facility_description')->nullable();
            $table->enum('facility_status', ['Active', 'Under Maintenance', 'Under Renovation', 'Temporarily Closed', 'Permanently Closed', 'Demolished']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('waste_location_facilities');
    }
};
