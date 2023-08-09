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
        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->string('industrial_sector');
        });

        DB::table('sectors')->insert(
            array(
                ['id' =>1, 'industrial_sector' => 'Kelapa Sawit'],
                ['id' =>2, 'industrial_sector' => 'Padi'],
                ['id' =>3, 'industrial_sector' => 'Tembakau'],
                ['id' =>4, 'industrial_sector' => 'Teh'],
                ['id' =>5, 'industrial_sector' => 'Kopi'],
                ['id' =>6, 'industrial_sector' => 'Karet'],
                ['id' =>7, 'industrial_sector' => 'Hortikultura'],
                ['id' =>8, 'industrial_sector' => 'Buah-buahan'],
                ['id' =>9, 'industrial_sector' => 'Kelapa dan Kopra'],
                ['id' =>10, 'industrial_sector' => 'Cengkeh'],
                ['id' =>11, 'industrial_sector' => 'Coklat'],
                ['id' =>12, 'industrial_sector' => 'Kedelai'],
                ['id' =>13, 'industrial_sector' => 'Jagung'],
                ['id' =>14, 'industrial_sector' => 'Palawija'],
                ['id' =>15, 'industrial_sector' => 'Rempah, Minyak Atsiri dan Komoditas Lainnya'],
                ['id' =>16, 'industrial_sector' => 'Mesin'],
                ['id' =>17, 'industrial_sector' => 'Tekstil dan Sandang'],
                ['id' =>18, 'industrial_sector' => 'Kehutanan dan Kayu'],
                ['id' =>19, 'industrial_sector' => 'Kertas'],
                ['id' =>20, 'industrial_sector' => 'Makanan dan Minuman'],
                ['id' =>21, 'industrial_sector' => 'Gula'],
                ['id' =>22, 'industrial_sector' => 'Perikanan'],
                ['id' =>23, 'industrial_sector' => 'Peternakan'],
                ['id' =>24, 'industrial_sector' => 'Bahan Kimia'],
                ['id' =>25, 'industrial_sector' => 'Farmasi dan Kesehatan'],
                ['id' =>26, 'industrial_sector' => 'Logam'],
                ['id' =>27, 'industrial_sector' => 'Bukan Logam'],
                ['id' =>28, 'industrial_sector' => 'Mesin'],
                ['id' =>29, 'industrial_sector' => 'Kendaraan'],
                ['id' =>30, 'industrial_sector' => 'Konstruksi'],
                ['id' =>31, 'industrial_sector' => 'Real Estate'],
                ['id' =>32, 'industrial_sector' => 'Kelistrikan'],
                ['id' =>33, 'industrial_sector' => 'Keperluan Rumah Tangga'],
                ['id' =>34, 'industrial_sector' => 'Perfilman dan Periklanan'],
                ['id' =>35, 'industrial_sector' => 'Tekstil dan Sandang'],
                ['id' =>36, 'industrial_sector' => 'Kertas'],
                ['id' =>37, 'industrial_sector' => 'Transportasi'],
                ['id' =>38, 'industrial_sector' => 'Batubara'],
                ['id' =>39, 'industrial_sector' => 'Minyak & Gas Bumi'],
                ['id' =>40, 'industrial_sector' => 'Perhotelan'],
                ['id' =>41, 'industrial_sector' => 'Makanan dan Minuman'],
                ['id' =>42, 'industrial_sector' => 'Bahan Kimia'],
                ['id' =>43, 'industrial_sector' => 'Jasa Keuangan'],
                ['id' =>44, 'industrial_sector' => 'Jasa Non Keuangan'],
                ['id' =>45, 'industrial_sector' => 'Semen'],
                ['id' =>46, 'industrial_sector' => 'Telekomunikasi'],
                ['id' =>47, 'industrial_sector' => 'Farmasi dan Kesehatan'],
                ['id' =>48, 'industrial_sector' => 'Administrasi pemerintahan'],
                ['id' =>49, 'industrial_sector' => 'Perdagangan Eceran & Besar Non Komoditas']

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
        Schema::dropIfExists('sectors');
    }
};
