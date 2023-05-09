<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use App\Models\PencairanDana;
use App\Models\ProgresPendanaan;
use App\Models\ProyekPendanaan;
use App\Models\RiwayatProyek;
use App\Models\StatusPendanaan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyekPendanaanSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    StatusPendanaan::insert(array(
      ['nama_status' => 'Menunggu Disetujui'],
      ['nama_status' => 'Sedang Berjalan'],
      ['nama_status' => 'Telah Selesai'],
    ));
    ProyekPendanaan::insert(array(
      [
       'jumlah_dana' => 25000000,
       'id_deskripsi_usaha' => 1,
       'id_pemilik_usaha' => 1,
       'id_pendana' => 1,
       'id_status_pendanaan' => 1,
      ],
      [
        'jumlah_dana' => 10000000,
        'file_kontrak_admin' => '/storage/upload/file_kontrak_admin/proyek_pendanaan1.pdf',
        'id_deskripsi_usaha' => 2,
        'id_pemilik_usaha' => 2,
        'id_pendana' => 2,
        'id_status_pendanaan' => 2,
      ],
      [
        'jumlah_dana' => 10000000,
        'file_kontrak_admin' => '/storage/upload/file_kontrak_admin/proyek_pendanaan2.pdf',
        'file_kontrak_pengusaha' => '/storage/upload/file_kontrak_pengusaha/proyek_pendanaan2.pdf',
        'file_kontrak_pendana' => '/storage/upload/file_kontrak_pendana/proyek_pendanaan2.pdf',
        'id_deskripsi_usaha' => 2,
        'id_pemilik_usaha' => 2,
        'id_pendana' => 1,
        'id_status_pendanaan' => 4,
      ],
    ));
    Pembayaran::insert(array(
      [
        'tanggal_pembayaran' => '2022-01-15',
        'bukti_pembayaran' => '/storage/upload/bukti_pembayaran/bukti_pembayaran_1.jpg',
        'status_pembayaran' => false,
        'id_proyek_pendanaan' => 1,
      ],
      [
        'tanggal_pembayaran' => '2022-02-20',
        'bukti_pembayaran' => '/storage/upload/bukti_pembayaran/bukti_pembayaran_2.jpg',
        'status_pembayaran' => false,
        'id_proyek_pendanaan' => 2,
      ],
      [
        'tanggal_pembayaran' => '2022-03-25',
        'bukti_pembayaran' => '/storage/upload/bukti_pembayaran/bukti_pembayaran_3.jpg',
        'status_pembayaran' => true,
        'id_proyek_pendanaan' => 3,
      ]
    ));
    ProgresPendanaan::insert(array(
      [
        'tanggal_laporan_progres_pendanaan' => '2023-03-09',
        'keterangan' => 'Proyek masih berjalan dan sudah mencapai 25% dari target',
        'laporan_keuangan' => '/storage/upload/progres_pendanaan/laporan_keuangan_2023_03_09.pdf',
        'id_proyek_pendanaan' => 3,
      ],
      [
        'tanggal_laporan_progres_pendanaan' => '2023-03-21',
        'keterangan' => 'Proyek sudah mencapai 50% dari target yang ditentukan',
        'laporan_keuangan' => '/storage/upload/progres_pendanaan/laporan_keuangan_2023_03_21.pdf',
        'id_proyek_pendanaan' => 3,
      ],
      [
        'tanggal_laporan_progres_pendanaan' => '2023-04-05',
        'keterangan' => 'Proyek telah selesai dan berhasil mencapai target',
        'laporan_keuangan' => '/storage/upload/progres_pendanaan/laporan_keuangan_2023_04_05.pdf',
        'id_proyek_pendanaan' => 3,
      ],
  ));
  for ($i = 1; $i <= 3; $i++) {
    RiwayatProyek::insert([
        'tanggal_mulai' => now()->subDays($i * 7),
        'tanggal_selesai' => now()->subDays($i * 7 - 5),
        'id_proyek_pendanaan' => $i
    ]);
  };
  PencairanDana::insert(array(
      [
        'tanggal_pencairan_dana' => Carbon::now()->subDays(15),
        'nominal_pencairan' => 100000,
        'status_pencairan' => true,
        'id_proyek_pendanaan' => 3,
      ],
      [
        'tanggal_pencairan_dana' => Carbon::now()->subDays(10),
        'nominal_pencairan' => 250000,
        'status_pencairan' => true,
        'id_proyek_pendanaan' => 3,
      ],
      [
        'tanggal_pencairan_dana' => Carbon::now()->subDays(3),
        'nominal_pencairan' => 5000000,
        'status_pencairan' => false,
        'id_proyek_pendanaan' => 3,
      ]
    ));
  }
}
