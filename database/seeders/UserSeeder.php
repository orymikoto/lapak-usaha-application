<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Bank;
use App\Models\DeskripsiUsaha;
use App\Models\JenisUsaha;
use App\Models\PemilikUsaha;
use App\Models\Pendana;
use App\Models\StatusPengajuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Admin::create([
      'username' => 'admin',
      'email' => 'admin@vestry.com',
      'password' => Hash::make('admin123'),
    ]);
    StatusPengajuan::insert(array(
      ['status_pengajuan' => 'Belum Terkonfirmasi'],
      ['status_pengajuan' => 'Terkonfirmasi'],
    ));
    Bank::insert(array(
      ['nama_bank' => 'Bank Rakyat Indonesia'],
      ['nama_bank' => 'Bank Tabungan Negara'],
      ['nama_bank' => 'Bank Central Asia'],
      ['nama_bank' => 'Bank Mandiri']
    ));
    JenisUsaha::insert(array(
      ['nama_jenis_usaha' => 'Website Bussiness'],
      ['nama_jenis_usaha' => 'Teknologi Jaringan'],
      ['nama_jenis_usaha' => 'Software House'],
      ['nama_jenis_usaha' => 'Wifi Provider'],
      ['nama_jenis_usaha' => 'Rumah Makan'],
      ['nama_jenis_usaha' => 'Tempat Wisata']
    ));
    Pendana::create([
      'nama' => 'Tester Pendana',
      'username' => 'pendana 1',
      'email' => 'pendana@vestry.com',
      'password' => Hash::make('12345678'),
      'id_bank' => 2,
      'no_hp' => '0855513266',
      'no_ktp' => '011224433666',
      'kota' => '3509',
      'kecamatan' => '350921',
      'pekerjaan' => 'code',
      'no_rekening' => '777888999',
      'alamat_rumah' => 'Jalan Mangkubumi no 7'
    ]);
    PemilikUsaha::insert(array(
      [
        'nama' => 'Tester Pengusaha 1',
        'username' => 'pengusaha1',
        'email' => 'pengusaha1@vestry.com',
        'password' => Hash::make('12345678'),
        'id_bank' => 2,
        'no_hp' => '0855513266',
        'no_ktp' => '011224433666',
        'kota' => '3509',
        'kecamatan' => '350921',
        'pekerjaan_sampingan' => 'code',
        'no_rekening' => '777888999',
        'alamat_rumah' => 'Jalan Mangkubumi no 7'
      ],
      [
        'nama' => 'Tester pengusaha 2',
        'username' => 'pengusaha2',
        'email' => 'pengusaha2@vestry.com',
        'password' => Hash::make('12345678'),
        'id_bank' => 2,
        'no_hp' => '0855513266',
        'no_ktp' => '011224433666',
        'kota' => '3509',
        'kecamatan' => '350921',
        'pekerjaan_sampingan' => 'code',
        'no_rekening' => '777888999',
        'alamat_rumah' => 'Jalan Mangkubumi no 7'
      ],
    ));
    DeskripsiUsaha::insert(
      array(
        [
          'nama_usaha' => 'Vestry Application',
          'tahun_berdiri' => 2023,
          'periode_produksi' => 6,
          'deskripsi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, autem.',
          'target_dana' => 20000000,
          'foto_usaha' => '/upload/foto_usaha/usaha_1.jpg',
          'proposal' => '/upload/proposal/usaha_1.pdf',
          'id_pemilik_usaha' => 1,
          'id_jenis_usaha' => 1,
          'id_status_pengajuan' => 1,
        ],
        [
          'nama_usaha' => 'Miko Coorporation',
          'tahun_berdiri' => 2021,
          'periode_produksi' => 7,
          'deskripsi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, autem.',
          'target_dana' => 21000000,
          'foto_usaha' => '/upload/foto_usaha/usaha_2.jpg',
          'proposal' => '/upload/proposal/usaha_2.pdf',
          'id_pemilik_usaha' => 2,
          'id_jenis_usaha' => 3,
          'id_status_pengajuan' => 2,
        ],
        [
          'nama_usaha' => 'Miko Restaurant',
          'tahun_berdiri' => 2022,
          'periode_produksi' => 7,
          'deskripsi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, autem.',
          'target_dana' => 77000000,
          'foto_usaha' => '/upload/foto_usaha/usaha_3.jpg',
          'proposal' => '/upload/proposal/usaha_3.pdf',
          'id_pemilik_usaha' => 2,
          'id_jenis_usaha' => 5,
          'id_status_pengajuan' => 1,
        ]
      )
    );
  }
}
