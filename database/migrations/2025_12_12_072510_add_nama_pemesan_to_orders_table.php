<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('nama_pemesan')->after('event_id');
            $table->string('email')->after('nama_pemesan');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['nama_pemesan', 'email']);
        });
    }

};
