<?php

use Illuminate\Database\Seeder;

class reimbursement_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reimbursement')->insert([
        	'nama_reimbursement' => 'Beli barang operasional',
        	'deskripsi' => 'Belanja kebutuhan kantor',
        	'file' => 'coba',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
