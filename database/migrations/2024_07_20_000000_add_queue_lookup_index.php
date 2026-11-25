<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->index(['layanan', 'tanggal_antrian', 'id'], 'antrians_service_date_id_idx');
            $table->index(['user_id', 'tanggal_antrian'], 'antrians_user_date_idx');
            $table->index(['is_call', 'tanggal_antrian'], 'antrians_status_date_idx');
        });
    }

    public function down()
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->dropIndex('antrians_service_date_id_idx');
            $table->dropIndex('antrians_user_date_idx');
            $table->dropIndex('antrians_status_date_idx');
        });
    }
};
