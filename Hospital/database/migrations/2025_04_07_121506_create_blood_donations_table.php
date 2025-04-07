<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodDonationsTable extends Migration
{
    public function up()
    {
        Schema::create('blood_donations', function (Blueprint $table) {
            $table->id();
            $table->date('donation_date');
            $table->integer('volume'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blood_donations');
    }
}
