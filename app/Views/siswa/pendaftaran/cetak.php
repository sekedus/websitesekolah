<?php  
use App\Libraries\Website;
$this->website          = new Website(); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title ?></title>
<link href="<?php echo base_url('assets/css/css-print.css') ?>" rel="stylesheet" media="print">
<link href="<?php echo base_url('assets/css/css-print.css') ?>" rel="stylesheet" media="screen">
</head>

<body>
<page size="A4" layout="portrait">
<div class="cetak">
<table>
    <tbody>
      <tr>
        <td style="width: 1.8cm;">
          <img src="<?php echo $this->website->icon() ?>" style="width: 1.5cm; height: auto;">
        </td>
        <td>
          <h1>INFORMASI PENDAFTARAN PESERTA DIDIK BARU
            <br><?php echo $konfigurasi->namaweb ?>
          </h1>
        </td>
      </tr>
    </tbody>
  </table>
  <hr><br>
<table class="table table-bordered table-sm printer">
    <thead>
      <tr>
        <th colspan="2" class="bg-secondary text-white text-center">DATA DASAR SISWA</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="font-bold" width="35%">Nama lengkap</td>
        <td><?php echo strtoupper($siswa->nama_siswa) ?></td>
      </tr>
      <tr>
        <td class="font-bold">Nama panggilan</td>
        <td><?php echo $siswa->nama_panggilan ?></td>
      </tr>
      <tr>
        <td class="font-bold">NIS / NISN</td>
        <td><?php echo $siswa->nis ?> / <?php echo $siswa->nisn ?></td>
      </tr>
      <tr>
        <td class="font-bold">Jenis Kelamin</td>
        <td><?php if($siswa->jenis_kelamin=='L') { echo 'Laki-laki'; }else{ echo 'Perempuan'; } ?></td>
      </tr>
      <tr>
        <td class="font-bold">Tempat, tanggal lahir</td>
        <td><?php echo $siswa->tempat_lahir ?>, <?php echo $this->website->tanggal_id($siswa->tanggal_lahir) ?></td>
      </tr>
      <tr>
        <td class="font-bold">Kode Pendaftaran</td>
        <td><?php echo $siswa->kode_siswa ?></td>
      </tr>
      <tr>
        <td class="font-bold">Periode Pendaftaran</td>
        <td><?php echo $siswa->judul ?></td>
      </tr>
      <tr>
        <td class="font-bold">Tahun Ajaran</td>
        <td><?php echo $siswa->tahun_ajaran ?></td>
      </tr>
      <tr>
        <td class="font-bold">Program/Jenjang</td>
        <td><?php echo $siswa->judul_jenjang_pendidikan ?></td>
      </tr>
      <tr>
        <td class="font-bold">Status Anak</td>
        <td><?php echo $siswa->nama_hubungan ?></td>
      </tr>
      <tr>
        <td class="font-bold">Anak ke</td>
        <td><?php echo $siswa->anak_ke ?> dari <?php echo $siswa->jumlah_saudara ?> Saudara</td>
      </tr>
      <tr>
        <td class="font-bold">Alamat</td>
        <td><?php echo nl2br($siswa->alamat) ?></td>
      </tr>
      
      <tr>
        <td class="font-bold">Telepon</td>
        <td><?php echo $siswa->telepon ?></td>
      </tr>
       <tr>
        <td class="font-bold">Email</td>
        <td><?php echo $siswa->email ?></td>
      </tr>
    </tbody>
  </table>
  
   <table class="table table-bordered table-sm printer mt-2">
    <thead>
      <tr>
        <th colspan="2" class="bg-secondary text-white text-center">DATA PENERIMAAN DI SEKOLAH</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="font-bold" width="35%">Jenis Masuk Siswa</td>
        <td><?php echo $siswa->jenis_siswa ?></td>
      </tr>
      <tr>
        <td class="font-bold">Nama Sekolah Asal</td>
        <td><?php echo $siswa->asal_sekolah ?></td>
      </tr>
      <tr>
        <td class="font-bold">Tanggal Pindah (Sesuai Surat Pindah)</td>
        <td><?php echo $this->website->tanggal_id($siswa->tanggal_pindah) ?></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-bordered table-sm printer mt-2">
    <thead>
      <tr>
        <th colspan="2" class="bg-secondary text-white text-center">DATA KESEHATAN DAN INFORMASI SISWA LAINNYA</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="font-bold" width="35%">Golongan Darah</td>
        <td><?php echo $siswa->goldar_siswa ?></td>
      </tr>
      <tr>
        <td class="font-bold">Tinggi / Berat</td>
        <td><?php echo $siswa->tinggi ?> cm / <?php echo $siswa->berat ?> kg</td>
      </tr>
      <tr>
        <td class="font-bold">Penyakit yang pernah/sedang diderita Siswa</td>
        <td><?php echo $siswa->penyakit_siswa ?></td>
      </tr>
      <tr>
        <td class="font-bold">Hobi Siswa</td>
        <td><?php echo $siswa->hobi_siswa ?></td>
      </tr>
      <tr>
        <td class="font-bold">Apakah Siswa Berkebutuhan Khusus?</td>
        <td><?php echo $siswa->berkebutuhan_khusus ?></td>
      </tr>
      <tr>
        <td class="font-bold">Deskripsi Ringkas Tentang Siswa</td>
        <td><?php echo $siswa->isi ?></td>
      </tr>
    </tbody>
  </table>
  
  <table class="table table-bordered table-sm printer mt-2">
    <thead>
      <tr>
        <th colspan="2" class="bg-secondary text-white text-center">DATA ORANG TUA SISWA - AYAH</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="font-bold" width="35%">Nama Ayah</td>
        <td><?php echo $siswa->nama_ayah ?></td>
      </tr>
      <tr>
        <td class="font-bold">Agama Ayah</td>
        <td><?php echo $siswa->agama_ayah ?></td>
      </tr>
      <tr>
        <td class="font-bold">Pekerjaan Ayah</td>
        <td><?php echo $siswa->nama_pekerjaan ?></td>
      </tr>
      <tr>
        <td class="font-bold">Pendidikan Ayah</td>
        <td><?php echo $siswa->jenjang_ayah ?></td>
      </tr>
      <tr>
        <td class="font-bold">Alamat Ayah</td>
        <td><?php echo $siswa->alamat_ayah ?></td>
      </tr>
      <tr>
        <td class="font-bold">Telepon/HP Ayah</td>
        <td><?php echo $siswa->telepon_ayah ?></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-bordered table-sm printer mt-2">
    <thead>
      <tr>
        <th colspan="2" class="bg-secondary text-white text-center">DATA ORANG TUA SISWA - IBU</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="font-bold" width="35%">Nama Ibu</td>
        <td><?php echo $siswa->nama_ibu ?></td>
      </tr>
      <tr>
        <td class="font-bold">Agama Ibu</td>
        <td><?php echo $siswa->agama_ibu ?></td>
      </tr>
      <tr>
        <td class="font-bold">Pekerjaan Ibu</td>
        <td><?php echo $siswa->pekerjaan_ibu ?></td>
      </tr>
      <tr>
        <td class="font-bold">Pendidikan Ibu</td>
        <td><?php echo $siswa->jenjang_ibu ?></td>
      </tr>
      <tr>
        <td class="font-bold">Alamat Ibu</td>
        <td><?php echo $siswa->alamat_ibu ?></td>
      </tr>
      <tr>
        <td class="font-bold">Telepon/HP Ibu</td>
        <td><?php echo $siswa->telepon_ibu ?></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-bordered table-sm printer mt-2">
    <thead>
      <tr>
        <th colspan="2" class="bg-secondary text-white text-center">DATA ORANG TUA SISWA - WALI</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="font-bold" width="35%">Nama Wali</td>
        <td><?php echo $siswa->nama_wali ?></td>
      </tr>
      <tr>
        <td class="font-bold">Agama Wali</td>
        <td><?php echo $siswa->agama_wali ?></td>
      </tr>
      <tr>
        <td class="font-bold">Pekerjaan Wali</td>
        <td><?php echo $siswa->pekerjaan_wali ?></td>
      </tr>
      <tr>
        <td class="font-bold">Pendidikan Wali</td>
        <td><?php echo $siswa->jenjang_wali ?></td>
      </tr>
      <tr>
        <td class="font-bold">Alamat Wali</td>
        <td><?php echo $siswa->alamat_wali ?></td>
      </tr>
      <tr>
        <td class="font-bold">Telepon/HP Wali</td>
        <td><?php echo $siswa->telepon_wali ?></td>
      </tr>
    </tbody>
  </table>
</div>
</page>
</body>
</html>