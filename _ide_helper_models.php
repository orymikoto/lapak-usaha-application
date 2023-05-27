<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id_admin
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string|null $no_rekening
 * @property int|null $id_bank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bank|null $bank
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIdAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIdBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereNoRekening($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUsername($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bank
 *
 * @property int $id_bank
 * @property string $nama_bank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Admin> $admin
 * @property-read int|null $admin_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PemilikUsaha> $pemilikUsaha
 * @property-read int|null $pemilik_usaha_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pendana> $pendana
 * @property-read int|null $pendana_count
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereIdBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereNamaBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereUpdatedAt($value)
 */
	class Bank extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeskripsiUsaha
 *
 * @property int $id_deskripsi_usaha
 * @property string $nama_usaha
 * @property int $tahun_berdiri
 * @property int $periode_produksi
 * @property string $deskripsi
 * @property int $target_dana
 * @property string $foto_usaha
 * @property string $proposal
 * @property int $id_pemilik_usaha
 * @property int|null $id_jenis_usaha
 * @property int|null $id_status_pengajuan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\JenisUsaha|null $jenisUsaha
 * @property-read \App\Models\PemilikUsaha $pemilikUsaha
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProyekPendanaan> $proyekPendanaan
 * @property-read int|null $proyek_pendanaan_count
 * @property-read \App\Models\StatusPengajuan|null $statusPengajuan
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereFotoUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereIdDeskripsiUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereIdJenisUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereIdPemilikUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereIdStatusPengajuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereNamaUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha wherePeriodeProduksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereProposal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereTahunBerdiri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereTargetDana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeskripsiUsaha whereUpdatedAt($value)
 */
	class DeskripsiUsaha extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\JenisUsaha
 *
 * @property int $id_jenis_usaha
 * @property string $nama_jenis_usaha
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeskripsiUsaha> $deskripsiUsaha
 * @property-read int|null $deskripsi_usaha_count
 * @method static \Illuminate\Database\Eloquent\Builder|JenisUsaha newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisUsaha newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisUsaha query()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisUsaha whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisUsaha whereIdJenisUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisUsaha whereNamaJenisUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisUsaha whereUpdatedAt($value)
 */
	class JenisUsaha extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pembayaran
 *
 * @property int $id_pembayaran
 * @property string|null $tanggal_pembayaran
 * @property string|null $bukti_pembayaran
 * @property int $status_pembayaran
 * @property int $id_proyek_pendanaan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProyekPendanaan $proyekPendanaan
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereBuktiPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereIdPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereIdProyekPendanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereStatusPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereTanggalPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereUpdatedAt($value)
 */
	class Pembayaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PemilikUsaha
 *
 * @property int $id_pemilik_usaha
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $nama
 * @property string|null $no_hp
 * @property string|null $no_ktp
 * @property string|null $pekerjaan_sampingan
 * @property string|null $alamat_rumah
 * @property string|null $kecamatan
 * @property string|null $kota
 * @property string|null $provinsi
 * @property string|null $no_rekening
 * @property int|null $id_bank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bank|null $bank
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeskripsiUsaha> $deskripsiUsaha
 * @property-read int|null $deskripsi_usaha_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProyekPendanaan> $proyekPendanaan
 * @property-read int|null $proyek_pendanaan_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha query()
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereAlamatRumah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereIdBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereIdPemilikUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereKota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereNoKtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereNoRekening($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha wherePekerjaanSampingan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereProvinsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemilikUsaha whereUsername($value)
 */
	class PemilikUsaha extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PencairanDana
 *
 * @property int $pencairan_dana
 * @property string $tanggal_pencairan_dana
 * @property int $nominal_pencairan
 * @property int $status_pencairan
 * @property int $id_proyek_pendanaan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProyekPendanaan|null $proyekPendanaan
 * @method static \Illuminate\Database\Eloquent\Builder|PencairanDana newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PencairanDana newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PencairanDana query()
 * @method static \Illuminate\Database\Eloquent\Builder|PencairanDana whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PencairanDana whereIdProyekPendanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PencairanDana whereNominalPencairan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PencairanDana wherePencairanDana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PencairanDana whereStatusPencairan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PencairanDana whereTanggalPencairanDana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PencairanDana whereUpdatedAt($value)
 */
	class PencairanDana extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pendana
 *
 * @property int $id_pendana
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $nama
 * @property string|null $no_hp
 * @property string|null $no_ktp
 * @property string|null $pekerjaan
 * @property string|null $alamat_rumah
 * @property string|null $kecamatan
 * @property string|null $kota
 * @property string|null $provinsi
 * @property string|null $no_rekening
 * @property int|null $id_bank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bank|null $bank
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProyekPendanaan> $proyekPendanaan
 * @property-read int|null $proyek_pendanaan_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereAlamatRumah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereIdBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereIdPendana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereKota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereNoKtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereNoRekening($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereProvinsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendana whereUsername($value)
 */
	class Pendana extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProgresPendanaan
 *
 * @property int $id_progres_pendanaan
 * @property string $tanggal_laporan_progres_pendanaan
 * @property string $keterangan
 * @property string $laporan_keuangan
 * @property int $id_proyek_pendanaan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProyekPendanaan $proyekPendanaan
 * @method static \Illuminate\Database\Eloquent\Builder|ProgresPendanaan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgresPendanaan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgresPendanaan query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgresPendanaan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgresPendanaan whereIdProgresPendanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgresPendanaan whereIdProyekPendanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgresPendanaan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgresPendanaan whereLaporanKeuangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgresPendanaan whereTanggalLaporanProgresPendanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgresPendanaan whereUpdatedAt($value)
 */
	class ProgresPendanaan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProyekPendanaan
 *
 * @property int $id_proyek_pendanaan
 * @property int $jumlah_dana
 * @property string|null $file_kontrak_admin
 * @property string|null $file_kontrak_pengusaha
 * @property string|null $file_kontrak_pendana
 * @property int $nominal_bagi_hasil
 * @property string|null $bukti_bagi_hasil
 * @property int $id_deskripsi_usaha
 * @property int $id_pemilik_usaha
 * @property int $id_pendana
 * @property int $id_status_pendanaan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pembayaran|null $Pembayaran
 * @property-read \App\Models\Pendana $Pendana
 * @property-read \App\Models\DeskripsiUsaha $deskripsiUsaha
 * @property-read \App\Models\PemilikUsaha $pemilikUsaha
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PencairanDana> $pencairanDana
 * @property-read int|null $pencairan_dana_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProgresPendanaan> $progresPendanaan
 * @property-read int|null $progres_pendanaan_count
 * @property-read \App\Models\RiwayatProyek|null $riwayatProyek
 * @property-read \App\Models\StatusPendanaan $statusPendanaan
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereBuktiBagiHasil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereFileKontrakAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereFileKontrakPendana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereFileKontrakPengusaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereIdDeskripsiUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereIdPemilikUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereIdPendana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereIdProyekPendanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereIdStatusPendanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereJumlahDana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereNominalBagiHasil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProyekPendanaan whereUpdatedAt($value)
 */
	class ProyekPendanaan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RiwayatProyek
 *
 * @property int $id_riwayat_proyek
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property int $id_proyek_pendanaan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProyekPendanaan|null $proyekPendanaan
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatProyek newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatProyek newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatProyek query()
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatProyek whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatProyek whereIdProyekPendanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatProyek whereIdRiwayatProyek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatProyek whereTanggalMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatProyek whereTanggalSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatProyek whereUpdatedAt($value)
 */
	class RiwayatProyek extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StatusPendanaan
 *
 * @property int $id_status_pendanaan
 * @property string $nama_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProyekPendanaan> $proyekPendaan
 * @property-read int|null $proyek_pendaan_count
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPendanaan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPendanaan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPendanaan query()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPendanaan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPendanaan whereIdStatusPendanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPendanaan whereNamaStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPendanaan whereUpdatedAt($value)
 */
	class StatusPendanaan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StatusPengajuan
 *
 * @property int $id_status_pengajuan
 * @property string $status_pengajuan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeskripsiUsaha> $deskripsiUsaha
 * @property-read int|null $deskripsi_usaha_count
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPengajuan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPengajuan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPengajuan query()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPengajuan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPengajuan whereIdStatusPengajuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPengajuan whereStatusPengajuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusPengajuan whereUpdatedAt($value)
 */
	class StatusPengajuan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

