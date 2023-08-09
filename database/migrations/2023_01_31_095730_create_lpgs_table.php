<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lpgs', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreign('code')->references('industrial_code')->on('definitions');
            $table->string('warna_lpg');
            $table->double('persen_MS');
            $table->double('persen_DPK');
            $table->double('persen_NPL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lpgs');
    }
};
