<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->boolean('permit');
            $table->boolean('value');
            $table->timestamps();
        });
        DB::table('permissions')->insert(
            array(
                ['id' => 1, 'permit' => 'add_prospect', 'value' => 1],
                ['id' => 2, 'permit' => 'edit_prospect', 'value' => 1]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};
