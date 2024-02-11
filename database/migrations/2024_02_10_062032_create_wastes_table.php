<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWastesTable extends Migration
{
    public function up()
    {
        Schema::create('wastes', function (Blueprint $table) {
            $table->id();
            $table->string('WasteID');
            $table->string('WasteName');
            $table->string('WasteType');
            $table->dateTime('TimeCollected');
            $table->decimal('MassCollected', 8, 2);
            $table->string('AreaCollected');
            $table->string('DisposalLocation');

            $table->boolean('Solid')->default(false);
            $table->boolean('Liquid')->default(false);
            $table->boolean('Biodegradable')->default(false);
            $table->boolean('NonBiodegradable')->default(false); 
            $table->boolean('Recyclable')->default(false);
            $table->boolean('Hazardous')->default(false);
            $table->boolean('Corrosive')->default(false)->nullable();
            $table->boolean('Ignitable')->default(false)->nullable();
            $table->boolean('Reactive')->default(false)->nullable();
            $table->boolean('Toxic')->default(false)->nullable();

            $table->string('WasteCategory')->nullable(); // New column for waste category
            $table->string('OtherDescription')->nullable(); // New column for other description

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wastes');
    }
};
