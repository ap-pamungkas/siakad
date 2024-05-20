<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class kepalaSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kepala_sekolah')->insert([
            'id'=>str::uuid(),
    'nama' => 'Kepala Sekolah Baru',
    'nip' => 12345678,

    'password' => Hash::make('password'),
    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
    'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

        ]);
    }
}
