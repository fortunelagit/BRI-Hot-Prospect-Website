<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->timestamps();
        });

        DB::table('roles')->insert(
            array(
                [
                    'id' => '1',
                    'role' => 'revoked_access',
                ],
                [
                    'id' => '2',
                    'role' => 'rm',
                ],
                [
                    'id' => '3',
                    'role' => 'sbm/pincapem',
                ],
                [
                    'id' => '4',
                    'role' => 'sb',
                ],
                [
                    'id' => '5',
                    'role' => 'ro/smec',
                ]
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
        Schema::dropIfExists('roles');
    }
};
