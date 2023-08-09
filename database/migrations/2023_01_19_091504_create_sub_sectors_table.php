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
        Schema::create('sub_sectors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id')->references('id')->on('sectors');
            $table->string('industrial_sub_sector');
        });

        DB::table('sub_sectors')->insert(
            array(
                ['id' =>1, 'sector_id' => 1, 'industrial_sub_sector' => 'Perkebunan Kelapa Sawit'],
                ['id' =>2, 'sector_id' => 1, 'industrial_sub_sector' => 'Industri Kelapa Sawit'],
                ['id' =>3, 'sector_id' => 1, 'industrial_sub_sector' => 'Perdagangan Kelapa Sawit'],
                ['id' =>4, 'sector_id' => 2, 'industrial_sub_sector' => 'Pertanian Padi'],
                ['id' =>5, 'sector_id' => 2, 'industrial_sub_sector' => 'Industri Padi'],
                ['id' =>6, 'sector_id' => 2, 'industrial_sub_sector' => 'Perdagangan Padi'],
                ['id' =>7, 'sector_id' => 3, 'industrial_sub_sector' => 'Perkebunan Tembakau'],
                ['id' =>8, 'sector_id' => 3, 'industrial_sub_sector' => 'Industri Tembakau'],
                ['id' =>9, 'sector_id' => 3, 'industrial_sub_sector' => 'Perdagangan Tembakau'],
                ['id' =>10, 'sector_id' => 4, 'industrial_sub_sector' => 'Perkebunan Teh'],
                ['id' =>11, 'sector_id' => 4, 'industrial_sub_sector' => 'Industri Teh'],
                ['id' =>12, 'sector_id' => 4, 'industrial_sub_sector' => 'Perdagangan Teh'],
                ['id' =>13, 'sector_id' => 5, 'industrial_sub_sector' => 'Perkebunan Kopi'],
                ['id' =>14, 'sector_id' => 5, 'industrial_sub_sector' => 'Industri Kopi'],
                ['id' =>15, 'sector_id' => 5, 'industrial_sub_sector' => 'Perdagangan Kopi'],
                ['id' =>16, 'sector_id' => 6, 'industrial_sub_sector' => 'Perkebunan Karet'],
                ['id' =>17, 'sector_id' => 6, 'industrial_sub_sector' => 'Industri Karet'],
                ['id' =>18, 'sector_id' => 6, 'industrial_sub_sector' => 'Perdagangan Karet'],
                ['id' =>19, 'sector_id' => 7, 'industrial_sub_sector' => 'Pertanian Hortikultura'],
                ['id' =>20, 'sector_id' => 8, 'industrial_sub_sector' => 'Pertanian Buah-Buahan'],
                ['id' =>21, 'sector_id' => 8, 'industrial_sub_sector' => 'Industri Pengolahan Buah Dan Sayuran'],
                ['id' =>22, 'sector_id' => 9, 'industrial_sub_sector' => 'Perkebunan Kelapa'],
                ['id' =>23, 'sector_id' => 9, 'industrial_sub_sector' => 'Industri Kelapa'],
                ['id' =>24, 'sector_id' => 9, 'industrial_sub_sector' => 'Industri Kopra'],
                ['id' =>25, 'sector_id' => 9, 'industrial_sub_sector' => 'Perdagangan Kopra'],
                ['id' =>26, 'sector_id' => 10, 'industrial_sub_sector' => 'Perkebunan Cengkeh'],
                ['id' =>27, 'sector_id' => 10, 'industrial_sub_sector' => 'Perdagangan Cengkeh'],
                ['id' =>28, 'sector_id' => 11, 'industrial_sub_sector' => 'Perkebunan Coklat'],
                ['id' =>29, 'sector_id' => 11, 'industrial_sub_sector' => 'Industri Coklat'],
                ['id' =>30, 'sector_id' => 12, 'industrial_sub_sector' => 'Pertanian Kedelai'],
                ['id' =>31, 'sector_id' => 12, 'industrial_sub_sector' => 'Industri Bahan Dari Kedelai'],
                ['id' =>32, 'sector_id' => 12, 'industrial_sub_sector' => 'Perdagangan Kedelai'],
                ['id' =>33, 'sector_id' => 13, 'industrial_sub_sector' => 'Pertanian Jagung'],
                ['id' =>34, 'sector_id' => 13, 'industrial_sub_sector' => 'Perdagangan Jagung'],
                ['id' =>35, 'sector_id' => 14, 'industrial_sub_sector' => 'Pertanian Palawija'],
                ['id' =>36, 'sector_id' => 15, 'industrial_sub_sector' => 'Perkebunan Minyak Atsiri'],
                ['id' =>37, 'sector_id' => 15, 'industrial_sub_sector' => 'Industri Minyak Atsiri'],
                ['id' =>38, 'sector_id' => 15, 'industrial_sub_sector' => 'Perkebunan Rempah Dan Pertanian Lainnya'],
                ['id' =>39, 'sector_id' => 15, 'industrial_sub_sector' => 'Jasa Pertanian, Perkebunan Dan Peternakan'],
                ['id' =>40, 'sector_id' => 15, 'industrial_sub_sector' => 'Industri Penggilingan'],
                ['id' =>41, 'sector_id' => 15, 'industrial_sub_sector' => 'Perdagangan Rempah Dan Pertanian Lainnya'],
                ['id' =>42, 'sector_id' => 16, 'industrial_sub_sector' => 'Industri Mesin'],
                ['id' =>43, 'sector_id' => 16, 'industrial_sub_sector' => 'Jasa Persewaan & Perawatan Mesin'],
                ['id' =>44, 'sector_id' => 17, 'industrial_sub_sector' => 'Perkebunan Tekstil Dan Sandang'],
                ['id' =>45, 'sector_id' => 18, 'industrial_sub_sector' => 'Kehutanan Kayu'],
                ['id' =>46, 'sector_id' => 18, 'industrial_sub_sector' => 'Kehutanan Selain Kayu'],
                ['id' =>47, 'sector_id' => 18, 'industrial_sub_sector' => 'Industri Kayu'],
                ['id' =>48, 'sector_id' => 18, 'industrial_sub_sector' => 'Perdagangan Kayu'],
                ['id' =>49, 'sector_id' => 18, 'industrial_sub_sector' => 'Perdagangan Selain Kayu'],
                ['id' =>50, 'sector_id' => 18, 'industrial_sub_sector' => 'Jasa Kehutanan'],
                ['id' =>51, 'sector_id' => 19, 'industrial_sub_sector' => 'Industri Kertas'],
                ['id' =>52, 'sector_id' => 20, 'industrial_sub_sector' => 'Perdagangan Makanan Dan Minuman'],
                ['id' =>53, 'sector_id' => 20, 'industrial_sub_sector' => 'Industri Makanan Dan Minuman'],
                ['id' =>54, 'sector_id' => 21, 'industrial_sub_sector' => 'Perkebunan Bahan Baku Gula'],
                ['id' =>55, 'sector_id' => 21, 'industrial_sub_sector' => 'Industri Gula'],
                ['id' =>56, 'sector_id' => 21, 'industrial_sub_sector' => 'Perdagangan Gula'],
                ['id' =>57, 'sector_id' => 22, 'industrial_sub_sector' => 'Penangkapan Ikan'],
                ['id' =>58, 'sector_id' => 22, 'industrial_sub_sector' => 'Penangkapan Udang'],
                ['id' =>59, 'sector_id' => 22, 'industrial_sub_sector' => 'Penangkapan Selain Ikan Dan Udang'],
                ['id' =>60, 'sector_id' => 22, 'industrial_sub_sector' => 'Budidaya Ikan'],
                ['id' =>61, 'sector_id' => 22, 'industrial_sub_sector' => 'Budidaya Udang'],
                ['id' =>62, 'sector_id' => 22, 'industrial_sub_sector' => 'Budidaya Selain Ikan Dan Udang'],
                ['id' =>63, 'sector_id' => 22, 'industrial_sub_sector' => 'Jasa Perikanan'],
                ['id' =>64, 'sector_id' => 22, 'industrial_sub_sector' => 'Industri Hasil Perikanan'],
                ['id' =>65, 'sector_id' => 22, 'industrial_sub_sector' => 'Perdagangan Hasil Perikanan'],
                ['id' =>66, 'sector_id' => 23, 'industrial_sub_sector' => 'Pembibitan Dan Budidaya Hewan Ternak'],
                ['id' =>67, 'sector_id' => 23, 'industrial_sub_sector' => 'Industri Pengolahan Bahan Baku Dari Hewan Ternak'],
                ['id' =>68, 'sector_id' => 23, 'industrial_sub_sector' => 'Perdagangan Hewan Ternak'],
                ['id' =>69, 'sector_id' => 24, 'industrial_sub_sector' => 'Industri Pupuk Dan Obat Hama'],
                ['id' =>70, 'sector_id' => 24, 'industrial_sub_sector' => 'Perdagangan Pupuk Dan Obat Hama'],
                ['id' =>71, 'sector_id' => 25, 'industrial_sub_sector' => 'Perkebunan Bahan Farmasi'],
                ['id' =>72, 'sector_id' => 26, 'industrial_sub_sector' => 'Pertambangan Logam'],
                ['id' =>73, 'sector_id' => 26, 'industrial_sub_sector' => 'Industri Logam'],
                ['id' =>74, 'sector_id' => 26, 'industrial_sub_sector' => 'Perdagangan Logam'],
                ['id' =>75, 'sector_id' => 27, 'industrial_sub_sector' => 'Pertambangan Bukan Logam'],
                ['id' =>76, 'sector_id' => 27, 'industrial_sub_sector' => 'Industri Dari Bahan Baku Pertambangan Bukan Logam'],
                ['id' =>77, 'sector_id' => 27, 'industrial_sub_sector' => 'Perdagangan Dari Hasil Tambang Bukan Logam'],
                ['id' =>78, 'sector_id' => 28, 'industrial_sub_sector' => 'Industri Mesin'],
                ['id' =>79, 'sector_id' => 28, 'industrial_sub_sector' => 'Perdagangan Mesin'],
                ['id' =>80, 'sector_id' => 28, 'industrial_sub_sector' => 'Jasa Persewaan & Perawatan Mesin'],
                ['id' =>81, 'sector_id' => 29, 'industrial_sub_sector' => 'Industri Kendaraan & Perlengkapannya'],
                ['id' =>82, 'sector_id' => 29, 'industrial_sub_sector' => 'Penjualan Kendaraan'],
                ['id' =>83, 'sector_id' => 30, 'industrial_sub_sector' => 'Penyiapan Lahan'],
                ['id' =>84, 'sector_id' => 30, 'industrial_sub_sector' => 'Konstruksi Gedung'],
                ['id' =>85, 'sector_id' => 30, 'industrial_sub_sector' => 'Konstruksi Perumahan'],
                ['id' =>86, 'sector_id' => 30, 'industrial_sub_sector' => 'Insfrastruktur'],
                ['id' =>87, 'sector_id' => 30, 'industrial_sub_sector' => 'Instalasi Gedung Dan Bangunan Sipil'],
                ['id' =>88, 'sector_id' => 30, 'industrial_sub_sector' => 'Perdagangan Bahan-Bahan Konstruksi'],
                ['id' =>89, 'sector_id' => 31, 'industrial_sub_sector' => 'Real Estate Perumahan'],
                ['id' =>90, 'sector_id' => 31, 'industrial_sub_sector' => 'Real Estate Gedung Dan Lainnya'],
                ['id' =>91, 'sector_id' => 32, 'industrial_sub_sector' => 'Industri Peralatan Listrik'],
                ['id' =>92, 'sector_id' => 32, 'industrial_sub_sector' => 'Pembangkit Tenaga Listrik'],
                ['id' =>93, 'sector_id' => 33, 'industrial_sub_sector' => 'Perdagangan Keperluan Rumah Tangga'],
                ['id' =>94, 'sector_id' => 33, 'industrial_sub_sector' => 'Industri Keperluan Rumah Tangga'],
                ['id' =>95, 'sector_id' => 33, 'industrial_sub_sector' => 'Jasa Keperluan Rumah Tangga'],
                ['id' =>96, 'sector_id' => 33, 'industrial_sub_sector' => 'Pengadaan Dan Penyaluran Air Bersih'],
                ['id' =>97, 'sector_id' => 34, 'industrial_sub_sector' => 'Industri Perfilman'],
                ['id' =>98, 'sector_id' => 34, 'industrial_sub_sector' => 'Jasa Perfilman & Periklanan'],
                ['id' =>99, 'sector_id' => 35, 'industrial_sub_sector' => 'Industri Tekstil Dan Sandang'],
                ['id' =>100, 'sector_id' => 35, 'industrial_sub_sector' => 'Perdagangan Tekstil Dan Sandang'],
                ['id' =>101, 'sector_id' => 36, 'industrial_sub_sector' => 'Industri Kertas'],
                ['id' =>102, 'sector_id' => 36, 'industrial_sub_sector' => 'Industri Penerbitan Dan Percetakan'],
                ['id' =>103, 'sector_id' => 36, 'industrial_sub_sector' => 'Perdagangan Kertas'],
                ['id' =>104, 'sector_id' => 37, 'industrial_sub_sector' => 'Industri Alat Angkutan'],
                ['id' =>105, 'sector_id' => 37, 'industrial_sub_sector' => 'Angkutan Darat'],
                ['id' =>106, 'sector_id' => 37, 'industrial_sub_sector' => 'Angkutan Air'],
                ['id' =>107, 'sector_id' => 37, 'industrial_sub_sector' => 'Angkutan Udara'],
                ['id' =>108, 'sector_id' => 38, 'industrial_sub_sector' => 'Pertambangan Batubara'],
                ['id' =>109, 'sector_id' => 38, 'industrial_sub_sector' => ' Industri Batubara'],
                ['id' =>110, 'sector_id' => 38, 'industrial_sub_sector' => 'Perdagangan Batubara'],
                ['id' =>111, 'sector_id' => 39, 'industrial_sub_sector' => 'Pertambangan Minyak & Gas Bumi'],
                ['id' =>112, 'sector_id' => 39, 'industrial_sub_sector' => 'Jasa Pertambangan Minyak & Gas Bumi'],
                ['id' =>113, 'sector_id' => 39, 'industrial_sub_sector' => 'Industri Minyak & Gas Bumi'],
                ['id' =>114, 'sector_id' => 39, 'industrial_sub_sector' => 'Pedagangan Minyak & Gas Bumi'],
                ['id' =>115, 'sector_id' => 40, 'industrial_sub_sector' => 'Penyediaan Akomodasi'],
                ['id' =>116, 'sector_id' => 41, 'industrial_sub_sector' => 'Penyediaan Makanan & Minuman'],
                ['id' =>117, 'sector_id' => 41, 'industrial_sub_sector' => 'Perdagangan Makanan Dan Minuman'],
                ['id' =>118, 'sector_id' => 41, 'industrial_sub_sector' => 'Industri Makanan Dan Minuman'],
                ['id' =>119, 'sector_id' => 42, 'industrial_sub_sector' => 'Industri Plastik'],
                ['id' =>120, 'sector_id' => 42, 'industrial_sub_sector' => 'Industri Daur Ulang Dan Barang Bekas'],
                ['id' =>121, 'sector_id' => 42, 'industrial_sub_sector' => 'Industri Bahan Bakar Nuklir'],
                ['id' =>122, 'sector_id' => 42, 'industrial_sub_sector' => 'Industri Barang-Barang Dari Bahan Kimia'],
                ['id' =>123, 'sector_id' => 42, 'industrial_sub_sector' => 'Perdagangan Daur Ulang Dan Barang Bekas'],
                ['id' =>124, 'sector_id' => 43, 'industrial_sub_sector' => 'Jasa Keuangan'],
                ['id' =>125, 'sector_id' => 44, 'industrial_sub_sector' => 'Jasa Pendidikan'],
                ['id' =>126, 'sector_id' => 44, 'industrial_sub_sector' => 'Jasa Perusahaan'],
                ['id' =>127, 'sector_id' => 44, 'industrial_sub_sector' => 'Jasa Komputer'],
                ['id' =>128, 'sector_id' => 44, 'industrial_sub_sector' => 'Jasa Sosial & Kebudayaan'],
                ['id' =>129, 'sector_id' => 44, 'industrial_sub_sector' => 'Jasa Pengiriman'],
                ['id' =>130, 'sector_id' => 44, 'industrial_sub_sector' => 'Jasa Penyimpanan Dan Bongkar Muat'],
                ['id' =>131, 'sector_id' => 44, 'industrial_sub_sector' => 'Jasa Organisasi'],
                ['id' =>132, 'sector_id' => 45, 'industrial_sub_sector' => 'Industri Semen'],
                ['id' =>133, 'sector_id' => 45, 'industrial_sub_sector' => 'Perdagangan Semen'],
                ['id' =>134, 'sector_id' => 46, 'industrial_sub_sector' => 'Telekomunikasi'],
                ['id' =>135, 'sector_id' => 47, 'industrial_sub_sector' => 'Industri Farmasi'],
                ['id' =>136, 'sector_id' => 47, 'industrial_sub_sector' => 'Jasa Kesehatan'],
                ['id' =>137, 'sector_id' => 47, 'industrial_sub_sector' => 'Perdagangan Farmasi'],
                ['id' =>138, 'sector_id' => 48, 'industrial_sub_sector' => 'Administrasi Pemerintahan'],
                ['id' =>139, 'sector_id' => 49, 'industrial_sub_sector' => 'Perdagangan Eceran Non Komoditas'],
                ['id' =>140, 'sector_id' => 49, 'industrial_sub_sector' => 'Perdagangan Besar Non Komoditas']

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
        Schema::dropIfExists('sub_sectors');
    }
};
