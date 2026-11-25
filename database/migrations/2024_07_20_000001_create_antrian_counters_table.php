<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('antrian_counters', function (Blueprint $table) {
            $table->id();
            $table->string('layanan', 20);
            $table->date('tanggal_antrian');
            $table->unsignedInteger('last_number')->default(0);
            $table->timestamps();
            $table->unique(['layanan', 'tanggal_antrian'], 'antrian_counters_service_date_unique');
        });
    }

    public function down()
    {
        Schema::dropIfExists('antrian_counters');
    }
};
