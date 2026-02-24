@php
    function prioritasStyle($label)
    {
        return match (strtolower(trim($label))) {
            'sangat tinggi' => 'background-color:#FF0000; color:white;',
            'tinggi' => 'background-color:#FF9900;',
            'sedang' => 'background-color:#FFFF00;',
            'rendah' => 'background-color:#92D050;',
            'sangat rendah' => 'background-color:#00B050; color:white;',
            default => '',
        };
    }
@endphp

<table border="1" style="border-collapse: collapse; font-family: Arial, sans-serif; font-size: 10px; width: 100%;">

    {{-- JUDUL --}}
    <tr style="background-color: #0088c7; color: white;">
        <td colspan="19" align="center" style="padding: 6px;">
            <strong>ANALISIS RESIKO</strong>
        </td>
    </tr>

    {{-- INFO HEADER --}}
    <tr style="background-color: #d0e8f5;">
        <td colspan="4" style="padding: 4px;"><strong>Nama Perusahaan</strong></td>
        <td colspan="15" style="padding: 4px;">: PERUMDA AIR MINUM TIRTA ALAM KOTA TARAKAN</td>
    </tr>
    <tr style="background-color: #d0e8f5;">
        <td colspan="4" style="padding: 4px;"><strong>Pemilik Resiko</strong></td>
        <td colspan="15" style="padding: 4px;">: U M U M / SUMBER DAYA MANUSIA (SDM)</td>
    </tr>
    <tr style="background-color: #d0e8f5;">
        <td colspan="4" style="padding: 4px;"><strong>Koordinator Manajemen Risiko</strong></td>
        <td colspan="15" style="padding: 4px;">: UNIT MANAJEMEN RESIKO &amp; P3DN</td>
    </tr>
    <tr style="background-color: #d0e8f5;">
        <td colspan="4" style="padding: 4px;"><strong>Periode</strong></td>
        <td colspan="15" style="padding: 4px;">: TRIWULAN IV</td>
    </tr>

    {{-- SPACER --}}
    <tr>
        <td colspan="19" style="padding: 2px; border: none;"></td>
    </tr>

    {{-- HEADER ROW 1 --}}
    <tr style="background-color: #0088c7; color: white; text-align: center; vertical-align: middle;">
        <th rowspan="3" style="padding: 5px; width:3%;">NO</th>
        <th rowspan="3" style="padding: 5px; width:7%;">KEGIATAN</th>
        <th rowspan="3" style="padding: 5px; width:7%;">TUJUAN KEGIATAN</th>
        <th rowspan="3" style="padding: 5px; width:4%;">KODE RESIKO</th>
        <th rowspan="3" style="padding: 5px; width:8%;">PERNYATAAN RESIKO</th>
        <th rowspan="3" style="padding: 5px; width:10%;">SEBAB RISIKO</th>
        <th rowspan="3" style="padding: 5px; width:3%;">UC / C</th>
        <th rowspan="3" style="padding: 5px; width:9%;">DAMPAK</th>
        <th colspan="6" style="padding: 5px;">PENGENDALIAN YANG ADA</th>
        <th colspan="4" style="padding: 5px;">ANALISIS RISIKO</th>
        <th rowspan="3" style="padding: 5px; width:9%;">PEMILIK RESIKO</th>
    </tr>

    {{-- HEADER ROW 2 --}}
    <tr style="background-color: #0088c7; color: white; text-align: center; vertical-align: middle;">
        <th rowspan="2" style="padding: 5px; width:9%;">URAIAN</th>
        <th colspan="2" style="padding: 5px;">DESAIN</th>
        <th colspan="3" style="padding: 5px;">EFEKTIFITAS</th>
        <th rowspan="2" style="padding: 5px; width:5%;">TINGKAT PROBABILITAS (P)</th>
        <th rowspan="2" style="padding: 5px; width:5%;">TINGKAT DAMPAK (D)</th>
        <th rowspan="2" style="padding: 5px; width:5%;">NILAI RESIKO (TR)</th>
        <th rowspan="2" style="padding: 5px; width:7%;">PRIORITAS RESIKO</th>
    </tr>

    {{-- HEADER ROW 3 --}}
    <tr style="background-color: #0088c7; color: white; text-align: center; vertical-align: middle;">
        <th style="padding: 5px; width:3%;">A</th>
        <th style="padding: 5px; width:3%;">T</th>
        <th style="padding: 5px; width:3%;">TE</th>
        <th style="padding: 5px; width:3%;">KE</th>
        <th style="padding: 5px; width:3%;">E</th>
    </tr>

    {{-- COLUMN NUMBERS --}}
    <tr style="background-color: #d0e8f5; text-align: center; font-weight: bold;">
        <td style="padding:3px;">1</td>
        <td style="padding:3px;">2</td>
        <td style="padding:3px;">3</td>
        <td style="padding:3px;">4</td>
        <td style="padding:3px;">5</td>
        <td style="padding:3px;">6</td>
        <td style="padding:3px;">7</td>
        <td style="padding:3px;">8</td>
        <td style="padding:3px;">9</td>
        <td style="padding:3px;">10</td>
        <td style="padding:3px;">11</td>
        <td style="padding:3px;">12</td>
        <td style="padding:3px;">13</td>
        <td style="padding:3px;">14</td>
        <td style="padding:3px;">15</td>
        <td style="padding:3px;">16</td>
        <td style="padding:3px;">17</td>
        <td style="padding:3px;">18</td>
        <td style="padding:3px;">19</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 1: Umum Sumber Daya Manusia --}}
    {{-- ============================================================ --}}

    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="5">1</td>
        <td style="padding:4px; vertical-align:top;" rowspan="5">Umum Sumber Daya Manusia</td>
        <td style="padding:4px; vertical-align:top;" rowspan="5">Manajemen pelayanan kepegawaian</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1.1</td>
        <td style="padding:4px; vertical-align:top;">Kesejahteraan SDM</td>
        <td style="padding:4px; vertical-align:top;">Kurangnya kedisplinan karyawan dalam pemberkasan, Rasio Pegawai
            terhadap jumlah karyawan</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Tidak Terdaftarnya Karyawan dalam program kesejahteraan karyawan,
            Kelebihan SDM, Kenaikan Gaji, Tunjangan Karyawan</td>
        <td style="padding:4px; vertical-align:top;">Himbauan kepada karyawan dalam mendisiplinkan pemberkasan,
            Menaikkan Tarif Sesuai dengan regulasi yang berlaku.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">14</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FFFF00;">Sedang</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;">1.2</td>
        <td style="padding:4px; vertical-align:top;">Efektivitas Kinerja SDM</td>
        <td style="padding:4px; vertical-align:top;">Kedisiplinan Karyawan dalam bekerja dan kurangnya pengetahuan
            tentang manajemen waktu.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Menurunnya Target Kinerja yang telah ditetapkan Perusahaan sesuai
            dengan RKAP.</td>
        <td style="padding:4px; vertical-align:top;">Surat Teguran, Telaahan Staf, Penundaan Berkala dan Pangkat,
            Pemotongan Gaji, Skorsing, dan Pemecatan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">7</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;">1.3</td>
        <td style="padding:4px; vertical-align:top;">Kinerja SDM yang tidak sesuai SOP</td>
        <td style="padding:4px; vertical-align:top;">Kurangnya Pengetahuan SDM dalam melaksanakan Tupoksi sesuai dengan
            SOP</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Terjadinya Kecelakaan Kerja, Hasil pekerjaan kurang maksimal</td>
        <td style="padding:4px; vertical-align:top;">Mengadakan Bimtek, Workshop, dan Pelatihan kepada SDM</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">17</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;">1.4</td>
        <td style="padding:4px; vertical-align:top;">Pengarsipan Administrasi SDM</td>
        <td style="padding:4px; vertical-align:top;">Human error, kurangnya perhatian dalam pengarsipan, wadah
            pengarsipan yang kurang memadai</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Hilangnya berkas dan pengarsipan yang tidak rapih.</td>
        <td style="padding:4px; vertical-align:top;">Pengadaan Wadah pengarsipan dan meningkatkan kesadaran dari SDM
            dalam pengarsipan</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;">1.5</td>
        <td style="padding:4px; vertical-align:top;">Absensi Karyawan</td>
        <td style="padding:4px; vertical-align:top;">Ketidakdisplinan dari karyawan dalam mengabsen (management waktu),
            kurangnya perhatian dari karyawan dalam melengkapi persuratan (ijin, sakit)</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Kurangnya jumlah absensi karyawan, adanya surat teguran, telaah
            staf sesuai dengan aturan yang telah ditentukan oleh perusahaan</td>
        <td style="padding:4px; vertical-align:top;">Himbauan kepada karyawan dalam mendisiplinkan absensi</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">18</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 2: Rekruitmen Pegawai --}}
    {{-- ============================================================ --}}
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="5">2</td>
        <td style="padding:4px; vertical-align:top;" rowspan="5">Rekruitmen Pegawai</td>
        <td style="padding:4px; vertical-align:top;">Manajemen Rekruitmen</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2.1</td>
        <td style="padding:4px; vertical-align:top;">Resiko Kualitas Karyawan</td>
        <td style="padding:4px; vertical-align:top;">Salah satu resiko utama dalam rekruitmen pegawai adalah memilih
            karyawan yang tidak sesuai dengan kualifikasi atau standar yang diinginkan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan karyawan yang kurang kompeten atau tidak cocok
            dengan pekerjaan yang diemban</td>
        <td style="padding:4px; vertical-align:top;">Melakukan proses seleksi yang cermat dan mempertimbangkan
            kualifikasi, pengalaman, dan kemampuan calon karyawan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">17</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2.2</td>
        <td style="padding:4px; vertical-align:top;">Resiko Kehilangan Karyawan</td>
        <td style="padding:4px; vertical-align:top;">Setelah melalui proses rekruitmen dan seleksi, ada kemungkinan
            karyawan yang baru direkrut meninggalkan perusahaan dalam waktu singkat karena ketidakcocokan dengan
            lingkungan kerja atau tawaran pekerjaan yang lebih baik.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Kekosongan posisi yang menyebabkan perusahaan harus kembali lakukan
            rekrutmen.</td>
        <td style="padding:4px; vertical-align:top;">Perusahaan dapat melakukan upaya retensi karyawan, seperti
            memberikan pelatihan dan pengembangan karir yang jelas. Ketegasan perusahaan dalam pembuatan kontrak kerja.
        </td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2.3</td>
        <td style="padding:4px; vertical-align:top;">Resiko Biaya</td>
        <td style="padding:4px; vertical-align:top;">Proses rekruitmen pegawai dapat menimbulkan resiko biaya yang
            tinggi.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Biaya terkait dengan iklan lowongan pekerjaan, seleksi, dan
            pelatihan dapat menjadi beban yang signifikan bagi perusahaan.</td>
        <td style="padding:4px; vertical-align:top;">Perusahaan dapat mempertimbangkan strategi rekruitmen yang efisien
            dan efektif, seperti memanfaatkan platform online atau menggunakan jasa agen tenaga kerja.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2.4</td>
        <td style="padding:4px; vertical-align:top;">Resiko Hukum</td>
        <td style="padding:4px; vertical-align:top;">Dalam proses rekruitmen pegawai, perusahaan perlu mematuhi
            peraturan dan undang-undang ketenagakerjaan yang berlaku.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Pelanggaran terhadap ketentuan hukum dapat mengakibatkan sanksi
            hukum dan reputasi perusahaan yang tercemar.</td>
        <td style="padding:4px; vertical-align:top;">Memahami dan mematuhi peraturan yang berlaku dalam proses
            rekruitmen.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">20</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF0000; color:white;">Sangat
            Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2.5</td>
        <td style="padding:4px; vertical-align:top;">Resiko Reputasi</td>
        <td style="padding:4px; vertical-align:top;">Proses rekruitmen yang tidak transparan atau tidak adil. Resiko
            reputasi dapat timbul jika ada dugaan diskriminasi, nepotisme, atau perlakuan tidak adil dalam proses
            rekruitmen.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat merusak reputasi perusahaan di mata calon karyawan dan
            masyarakat luas.</td>
        <td style="padding:4px; vertical-align:top;">Perusahaan perlu menjalankan proses rekruitmen yang transparan,
            objektif, dan adil.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">16</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 3: Pengangkatan Calon Pegawai --}}
    {{-- ============================================================ --}}
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="5">3</td>
        <td style="padding:4px; vertical-align:top;" rowspan="5">Pengangkatan Calon Pegawai dan Pegawai 100%</td>
        <td style="padding:4px; vertical-align:top;">Manajemen Pengangkatan</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3.1</td>
        <td style="padding:4px; vertical-align:top;">Resiko Ketidakcocokan Kualifikasi</td>
        <td style="padding:4px; vertical-align:top;">Salah satu resiko utama adalah mengangkat calon pegawai yang tidak
            sesuai dengan kualifikasi atau persyaratan yang dibutuhkan dalam jabatan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Kinerja yang kurang optimal dan ketidaksesuaian dengan tugas yang
            diemban.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan penilaian dan seleksi yang cermat berdasarkan kompetensi,
            kualifikasi, dan kebutuhan instansi pemerintah.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">17</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3.2</td>
        <td style="padding:4px; vertical-align:top;">Resiko Kinerja yang Buruk</td>
        <td style="padding:4px; vertical-align:top;">Pengangkatan calon pegawai yang tidak mampu memenuhi tuntutan
            pekerjaan dapat mengakibatkan kinerja yang buruk.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat berdampak negatif pada produktivitas dan efisiensi
            organisasi.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan penilaian kinerja secara objektif dan memberikan
            pelatihan yang sesuai untuk meningkatkan kemampuan calon pegawai.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">17</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3.3</td>
        <td style="padding:4px; vertical-align:top;">Resiko Kehilangan Calon Pegawai</td>
        <td style="padding:4px; vertical-align:top;">Setelah diangkat, ada kemungkinan calon pegawai meninggalkan
            pekerjaan dalam waktu singkat karena ketidakcocokan dengan lingkungan kerja atau tawaran pekerjaan yang
            lebih baik.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Kekosongan posisi yang menyebabkan perusahaan harus kembali lakukan
            rekrutmen.</td>
        <td style="padding:4px; vertical-align:top;">Perusahaan dapat melakukan upaya retensi karyawan, seperti
            memberikan peluang pengembangan karir dan insentif yang menarik.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3.4</td>
        <td style="padding:4px; vertical-align:top;">Resiko Hukum</td>
        <td style="padding:4px; vertical-align:top;">Dalam pengangkatan calon pegawai, perusahaan perlu mematuhi
            peraturan dan undang-undang ketenagakerjaan yang berlaku.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Pelanggaran terhadap ketentuan hukum dapat mengakibatkan sanksi
            hukum dan masalah hukum yang berpotensi merugikan perusahaan.</td>
        <td style="padding:4px; vertical-align:top;">Oleh karena itu, penting untuk memahami dan mematuhi peraturan yang
            berlaku dalam pengangkatan calon pegawai.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">20</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF0000; color:white;">Sangat
            Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3.5</td>
        <td style="padding:4px; vertical-align:top;">Resiko Keuangan</td>
        <td style="padding:4px; vertical-align:top;">Pengangkatan calon pegawai yang belum diperhitungkan pada anggaran
            perusahaan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Kurangnya anggaran sesuai dengan kebutuhan.</td>
        <td style="padding:4px; vertical-align:top;">Pengangkatan calon pegawai sesuai dengan waktunya, perhitungan
            anggaran yang tepat untuk pengangkatan pegawai.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">17</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 4: Pembuatan Daftar Gaji --}}
    {{-- ============================================================ --}}
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="5">4</td>
        <td style="padding:4px; vertical-align:top;" rowspan="5">Pembuatan Daftar Gaji</td>
        <td style="padding:4px; vertical-align:top;">Manajemen Penggajian</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4.1</td>
        <td style="padding:4px; vertical-align:top;">Resiko Kesalahan Perhitungan</td>
        <td style="padding:4px; vertical-align:top;">Kesalahan perhitungan dalam pembuatan daftar gaji, karena kurangnya
            ketelitian dalam pembuatan daftar gaji.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan pembayaran gaji yang tidak akurat atau tidak
            sesuai dengan ketentuan yang berlaku.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan verifikasi dan validasi data gaji secara teliti serta
            menggunakan sistem atau perangkat lunak yang dapat membantu menghindari kesalahan perhitungan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">11</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4.2</td>
        <td style="padding:4px; vertical-align:top;">Resiko Ketidaksesuaian dengan Peraturan Perusahaan</td>
        <td style="padding:4px; vertical-align:top;">Resiko ini dapat timbul jika tidak memperhatikan ketentuan
            peraturan terkait penggajian, seperti undang-undang ketenagakerjaan atau peraturan perusahaan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Tuntutan hukum dan dampak lainnya.</td>
        <td style="padding:4px; vertical-align:top;">Memahami dan mematuhi peraturan yang berlaku dalam pembuatan daftar
            gaji.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">8</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4.3</td>
        <td style="padding:4px; vertical-align:top;">Resiko Kebocoran Informasi</td>
        <td style="padding:4px; vertical-align:top;">Pembuatan daftar gaji yang tidak dilakukan dengan keamanan yang
            memadai dapat mengakibatkan kebocoran informasi sensitif, seperti data pribadi pegawai atau informasi gaji.
        </td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat merugikan pegawai dan merusak reputasi perusahaan.</td>
        <td style="padding:4px; vertical-align:top;">Menerapkan langkah-langkah keamanan yang tepat, seperti penggunaan
            sistem yang aman dan pembatasan akses terhadap informasi gaji.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">8</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4.4</td>
        <td style="padding:4px; vertical-align:top;">Resiko Tuntutan Hukum</td>
        <td style="padding:4px; vertical-align:top;">Jika terjadi ketidakpuasan atau ketidakadilan terkait dengan
            pembuatan daftar gaji, pegawai dapat mengajukan tuntutan hukum terhadap perusahaan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan biaya hukum yang tinggi dan merusak reputasi
            perusahaan.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan proses pembuatan daftar gaji dengan transparan, adil, dan
            sesuai dengan ketentuan yang berlaku.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">6</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4.5</td>
        <td style="padding:4px; vertical-align:top;">Resiko Ketidakpuasan Pegawai</td>
        <td style="padding:4px; vertical-align:top;">Jika pegawai merasa tidak puas dengan pembuatan daftar gaji, hal
            ini dapat berdampak negatif pada motivasi dan kinerja mereka.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan penurunan produktivitas dan retensi pegawai
            yang rendah.</td>
        <td style="padding:4px; vertical-align:top;">Menjalankan proses pembuatan daftar gaji dengan transparan,
            komunikatif, dan memberikan penjelasan yang jelas kepada pegawai terkait dengan perhitungan gaji.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">10</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 5: Pembuatan Insentif --}}
    {{-- ============================================================ --}}
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="5">5</td>
        <td style="padding:4px; vertical-align:top;" rowspan="5">Pembuatan Insentif</td>
        <td style="padding:4px; vertical-align:top;">Manajemen Insentif</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5.1</td>
        <td style="padding:4px; vertical-align:top;">Resiko Ketidakcocokan dengan Tujuan Organisasi</td>
        <td style="padding:4px; vertical-align:top;">Salah satu resiko utama adalah pembuatan insentif yang tidak sesuai
            dengan tujuan organisasi.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Jika insentif tidak dirancang dengan baik, dapat mengakibatkan
            ketidakselarasan antara motivasi karyawan dan tujuan perusahaan.</td>
        <td style="padding:4px; vertical-align:top;">Memastikan bahwa insentif yang ditawarkan sejalan dengan strategi
            dan tujuan jangka panjang perusahaan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5.2</td>
        <td style="padding:4px; vertical-align:top;">Resiko Ketidakadilan</td>
        <td style="padding:4px; vertical-align:top;">Pembuatan insentif yang tidak adil dapat menyebabkan ketidakpuasan
            dan konflik di antara karyawan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Jika insentif tidak didistribusikan secara objektif dan transparan,
            hal ini dapat merusak hubungan kerja dan motivasi karyawan.</td>
        <td style="padding:4px; vertical-align:top;">Menjalankan proses pembuatan insentif yang adil dan berdasarkan
            kriteria yang jelas dan terukur.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5.3</td>
        <td style="padding:4px; vertical-align:top;">Resiko Kesalahan Perhitungan</td>
        <td style="padding:4px; vertical-align:top;">Terdapat resiko kesalahan perhitungan dalam pembuatan insentif
            karena kurangnya ketelitian.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan pembayaran insentif yang tidak akurat atau
            tidak sesuai dengan ketentuan yang berlaku.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan verifikasi dan validasi data serta menggunakan sistem
            atau perangkat lunak yang dapat membantu menghindari kesalahan perhitungan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">8</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5.4</td>
        <td style="padding:4px; vertical-align:top;">Resiko Ketergantungan</td>
        <td style="padding:4px; vertical-align:top;">Jika insentif yang ditawarkan terlalu besar atau tidak
            berkelanjutan, dapat mendorong ketergantungan karyawan pada insentif tersebut.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Hal ini dapat mengurangi motivasi intrinsik dan kinerja jangka
            panjang.</td>
        <td style="padding:4px; vertical-align:top;">Merancang insentif yang seimbang antara insentif finansial dan
            non-finansial, serta mempertimbangkan faktor-faktor motivasi intrinsik.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">11</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5.5</td>
        <td style="padding:4px; vertical-align:top;">Resiko Pengabaian Kualitas</td>
        <td style="padding:4px; vertical-align:top;">Jika insentif hanya berfokus pada kuantitas atau hasil, dapat
            mengabaikan kualitas pekerjaan yang dilakukan oleh karyawan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Resiko ini dapat mengakibatkan penurunan kualitas produk atau
            layanan.</td>
        <td style="padding:4px; vertical-align:top;">Mempertimbangkan kriteria kualitas dalam pembuatan insentif dan
            memberikan penghargaan yang seimbang antara kuantitas dan kualitas.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 6: Kenaikan Pangkat/Gaji Berkala --}}
    {{-- ============================================================ --}}
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="4">6</td>
        <td style="padding:4px; vertical-align:top;" rowspan="4">Kenaikan Pangkat Golongan / Gaji Berkala</td>
        <td style="padding:4px; vertical-align:top;">Manajemen Kenaikan</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">6.1</td>
        <td style="padding:4px; vertical-align:top;">Kesalahan Perhitungan</td>
        <td style="padding:4px; vertical-align:top;">Salah satu resiko utama adalah terjadinya kesalahan perhitungan
            dalam penghitungan kenaikan pangkat dan gaji berkala karena kurangnya ketelitian.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan penetapan kenaikan yang tidak adil.</td>
        <td style="padding:4px; vertical-align:top;">Diperlukan verifikasi data secara teliti dan pemeriksaan ulang
            perhitungannya.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">6.2</td>
        <td style="padding:4px; vertical-align:top;">Ketidakadilan</td>
        <td style="padding:4px; vertical-align:top;">Kenaikan pangkat dan gaji berkala yang tidak adil.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat menimbulkan ketidakpuasan di antara pegawai.</td>
        <td style="padding:4px; vertical-align:top;">Diperlukan kriteria yang jelas dan proses yang transparan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">6.3</td>
        <td style="padding:4px; vertical-align:top;">Hukum</td>
        <td style="padding:4px; vertical-align:top;">Pelanggaran terhadap peraturan tentang kenaikan pangkat dan gaji
            berkala.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan sanksi hukum.</td>
        <td style="padding:4px; vertical-align:top;">Penting untuk mematuhi seluruh peraturan yang berlaku.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">8</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">6.4</td>
        <td style="padding:4px; vertical-align:top;">Reputasi</td>
        <td style="padding:4px; vertical-align:top;">Kenaikan pangkat dan gaji berkala yang tidak transparan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat merusak reputasi lembaga.</td>
        <td style="padding:4px; vertical-align:top;">Perlu dilakukan secara obyektif dan adil untuk menjaga reputasi.
        </td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 7: Pengajuan Tunjangan Keluarga --}}
    {{-- ============================================================ --}}
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="4">7</td>
        <td style="padding:4px; vertical-align:top;" rowspan="4">Pengajuan Tunjangan Keluarga</td>
        <td style="padding:4px; vertical-align:top;">Manajemen Tunjangan</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">7.1</td>
        <td style="padding:4px; vertical-align:top;">Kesalahan Pengisian Data</td>
        <td style="padding:4px; vertical-align:top;">Terjadi kesalahan dalam pengisian data dalam formulir pengajuan
            tunjangan keluarga.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan penggolongan tunjangan yang salah dan
            pembayaran yang tidak tepat.</td>
        <td style="padding:4px; vertical-align:top;">Perlu dilakukan pengisian data dengan benar dan melampirkan dokumen
            pendukung yang valid.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">7.2</td>
        <td style="padding:4px; vertical-align:top;">Ketidaksesuaian dengan Peraturan</td>
        <td style="padding:4px; vertical-align:top;">Pengajuan tunjangan keluarga tidak sesuai dengan aturan dan
            ketentuan yang berlaku.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat menimbulkan masalah hukum dan pembatalan pengajuan.</td>
        <td style="padding:4px; vertical-align:top;">Memahami dan memastikan kesesuaian dengan peraturan guna
            menghindari resiko ini.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">7.3</td>
        <td style="padding:4px; vertical-align:top;">Kesalahan Perhitungan</td>
        <td style="padding:4px; vertical-align:top;">Terdapat resiko terjadinya kesalahan perhitungan dalam penggolongan
            tunjangan maupun penetapan besaran tunjangan karena kurangnya ketelitian.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Penerimaan gaji yang tidak sesuai sehingga penggunaan anggaran
            perusahaan tidak tepat.</td>
        <td style="padding:4px; vertical-align:top;">Perlu dilakukan pengecekan ulang perhitungan secara teliti.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">7.4</td>
        <td style="padding:4px; vertical-align:top;">Reputasi</td>
        <td style="padding:4px; vertical-align:top;">Pengajuan tunjangan yang tidak sesuai aturan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat merusak reputasi lembaga.</td>
        <td style="padding:4px; vertical-align:top;">Menjalankan proses yang penuh tanggung jawab dan kepatuhan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">5</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 8: Mutasi, Demosi dan Promosi --}}
    {{-- ============================================================ --}}
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="5">8</td>
        <td style="padding:4px; vertical-align:top;" rowspan="5">Mutasi, Demosi dan Promosi</td>
        <td style="padding:4px; vertical-align:top;">Manajemen Mobilitas Pegawai</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">8.1</td>
        <td style="padding:4px; vertical-align:top;">Ketidakcocokan dengan Kualifikasi</td>
        <td style="padding:4px; vertical-align:top;">Ketidakcocokan antara kualifikasi pegawai dengan posisi yang dituju
            dalam mutasi, demosi, atau promosi karena pegawai tidak memiliki keterampilan atau kompetensi yang sesuai
            dengan tugas baru.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Mengakibatkan penurunan kinerja dan ketidakpuasan pegawai.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan penilaian kualifikasi yang cermat sebelum melakukan
            mutasi, demosi, atau promosi.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">17</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">8.2</td>
        <td style="padding:4px; vertical-align:top;">Ketidakpuasan Pegawai</td>
        <td style="padding:4px; vertical-align:top;">Mutasi, demosi, atau promosi yang tidak adil atau tidak transparan
            dapat menyebabkan ketidakpuasan di antara pegawai.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat berdampak negatif pada motivasi dan kinerja mereka.</td>
        <td style="padding:4px; vertical-align:top;">Menjalankan proses yang adil, transparan, dan memberikan penjelasan
            yang jelas kepada pegawai terkait dengan keputusan tersebut.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">17</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">8.3</td>
        <td style="padding:4px; vertical-align:top;">Perubahan Dinamika Tim</td>
        <td style="padding:4px; vertical-align:top;">Mutasi, demosi, atau promosi dapat mengubah dinamika tim kerja.
            Jika tidak dikelola dengan baik.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat menyebabkan ketidakharmonisan, konflik, atau penurunan
            produktivitas.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan komunikasi yang efektif, memfasilitasi adaptasi
            perubahan, dan membangun kerjasama tim yang baik.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">17</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">8.4</td>
        <td style="padding:4px; vertical-align:top;">Resiko Hukum</td>
        <td style="padding:4px; vertical-align:top;">Proses mutasi, demosi atau promosi yang tidak sesuai dengan hukum
            yang berlaku.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan sanksi hukum dan masalah hukum yang merugikan
            perusahaan.</td>
        <td style="padding:4px; vertical-align:top;">Memahami dan mematuhi peraturan undang-undang ketenagakerjaan yang
            berlaku dalam proses mutasi, demosi, atau promosi.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">8</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">8.5</td>
        <td style="padding:4px; vertical-align:top;">Resiko Kehilangan Pegawai</td>
        <td style="padding:4px; vertical-align:top;">Jika mutasi, demosi, atau promosi tidak dipertimbangkan dengan
            baik.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Menyebabkan kehilangan pegawai yang berpotensi berpengaruh pada
            penurunan keahlian dan pengetahuan dalam organisasi.</td>
        <td style="padding:4px; vertical-align:top;">Perlu dilakukan perencanaan yang matang dan komunikasi yang efektif
            kepada pegawai terkait perubahan posisi.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 9: Ijin dan Cuti Pegawai --}}
    {{-- ============================================================ --}}
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="6">9</td>
        <td style="padding:4px; vertical-align:top;" rowspan="6">Ijin dan Cuti Pegawai</td>
        <td style="padding:4px; vertical-align:top;">Manajemen Ijin &amp; Cuti</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">9.1</td>
        <td style="padding:4px; vertical-align:top;">Kinerja SDM</td>
        <td style="padding:4px; vertical-align:top;">Jika terlalu banyak pegawai yang mengajukan ijin atau cuti pada
            saat yang sama, dan kurangnya SDM mengakibatkan keterlambatan dalam pengurusan ijin dan cuti.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Mempengaruhi produktivitas dan kelancaran operasional.</td>
        <td style="padding:4px; vertical-align:top;">Perlu dilakukan perencanaan yang matang dan koordinasi yang baik
            dalam mengatur jadwal ijin dan cuti pegawai.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">9.2</td>
        <td style="padding:4px; vertical-align:top;">Gangguan pada Pekerjaan</td>
        <td style="padding:4px; vertical-align:top;">Ketika seorang pegawai mengajukan ijin atau cuti, pekerjaan yang
            biasanya dilakukan oleh pegawai tersebut harus dialihkan kepada pegawai lain atau ditangani oleh sisa tim.
        </td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Menyebabkan peningkatan beban kerja dan gangguan pada alur kerja.
        </td>
        <td style="padding:4px; vertical-align:top;">Melakukan perencanaan dan pengaturan tugas yang efektif, memberi
            pengertian pada pegawai yang akan cuti untuk terlebih dahulu menyelesaikan pekerjaan yang diperlukan segera.
        </td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">16</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">9.3</td>
        <td style="padding:4px; vertical-align:top;">Ketidakseimbangan Beban Kerja</td>
        <td style="padding:4px; vertical-align:top;">Jika ijin atau cuti pegawai tidak diatur dengan seimbang.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Menyebabkan ketidakseimbangan beban kerja di antara pegawai.</td>
        <td style="padding:4px; vertical-align:top;">Beban kerja yang tidak merata dapat mengakibatkan kelelahan, stres,
            dan penurunan produktivitas. Perlu dilakukan pengaturan ijin dan cuti yang adil dan seimbang.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">14</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FFFF00;">Sedang</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">9.4</td>
        <td style="padding:4px; vertical-align:top;">Gangguan pada Proyek atau Proses</td>
        <td style="padding:4px; vertical-align:top;">Jika seorang pegawai yang memiliki peran kunci dalam suatu proyek
            atau proses mengajukan ijin atau cuti.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Mengganggu kelancaran proyek atau proses tersebut.</td>
        <td style="padding:4px; vertical-align:top;">Perlu dilakukan perencanaan yang matang dan pengaturan jadwal ijin
            atau cuti yang mempertimbangkan kebutuhan proyek atau proses yang sedang berjalan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">14</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FFFF00;">Sedang</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">9.5</td>
        <td style="padding:4px; vertical-align:top;">Ketidaktersediaan Informasi atau Keterlambatan</td>
        <td style="padding:4px; vertical-align:top;">Jika pegawai yang memiliki informasi penting atau tanggung jawab
            tertentu mengajukan ijin atau cuti.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Menyebabkan ketidaktersediaan informasi atau keterlambatan dalam
            penyelesaian tugas.</td>
        <td style="padding:4px; vertical-align:top;">Perlu dilakukan pengaturan penggantian atau delegasi tanggung jawab
            dengan jelas dan memastikan tersedianya informasi yang diperlukan sebelum pegawai mengajukan ijin atau cuti.
        </td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">11</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">9.6</td>
        <td style="padding:4px; vertical-align:top;">Pengarsipan</td>
        <td style="padding:4px; vertical-align:top;">Pengarsipan yang kurang baik.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Data ijin dan cuti pegawai hilang sehingga pelaporan kehadiran akan
            terhambat dan tidak sesuai.</td>
        <td style="padding:4px; vertical-align:top;">Pengarsipan yang baik sesuai pada tempatnya.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">12</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FFFF00;">Sedang</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 10: Penilaian Pegawai Tetap --}}
    {{-- ============================================================ --}}
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="5">10</td>
        <td style="padding:4px; vertical-align:top;" rowspan="5">Penilaian Pegawai Tetap</td>
        <td style="padding:4px; vertical-align:top;">Manajemen Penilaian</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">10.1</td>
        <td style="padding:4px; vertical-align:top;">Ketidakobjektifan</td>
        <td style="padding:4px; vertical-align:top;">Terdapat resiko ketidakobjektifan dalam penilaian pegawai tetap.
        </td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Jika penilaian tidak didasarkan pada kriteria yang jelas dan
            objektif, hal ini dapat mengakibatkan ketidakadilan dan ketidakpuasan di antara pegawai.</td>
        <td style="padding:4px; vertical-align:top;">Menggunakan kriteria penilaian yang terukur dan obyektif.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">12</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FFFF00;">Sedang</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">10.2</td>
        <td style="padding:4px; vertical-align:top;">Ketidakakuratan</td>
        <td style="padding:4px; vertical-align:top;">Penilaian tidak didasarkan pada data yang akurat atau terdapat
            kesalahan dalam proses penilaian.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Membuahkan hasil yang tidak akurat dan tidak adil.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan verifikasi data dan memastikan proses penilaian yang
            akurat.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">12</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FFFF00;">Sedang</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">10.3</td>
        <td style="padding:4px; vertical-align:top;">Bias</td>
        <td style="padding:4px; vertical-align:top;">Penilaian dipengaruhi oleh faktor-faktor non-kinerja, seperti
            preferensi pribadi atau diskriminasi.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Hal ini dapat mengakibatkan ketidakadilan dan ketidakpuasan di
            antara pegawai.</td>
        <td style="padding:4px; vertical-align:top;">Menjalankan penilaian secara obyektif dan menghindari pengaruh
            faktor-faktor non-kinerja.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">12</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FFFF00;">Sedang</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">10.4</td>
        <td style="padding:4px; vertical-align:top;">Ketidaktransparanan</td>
        <td style="padding:4px; vertical-align:top;">Proses penilaian tidak transparan dan tidak memberikan umpan balik
            yang jelas kepada pegawai.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan ketidakpuasan dan ketidakpercayaan.</td>
        <td style="padding:4px; vertical-align:top;">Menjalankan proses penilaian yang transparan dan memberikan umpan
            balik yang konstruktif kepada pegawai.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">7</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">10.5</td>
        <td style="padding:4px; vertical-align:top;">Ketidakkonsistenan</td>
        <td style="padding:4px; vertical-align:top;">Penilaian dilakukan secara tidak konsisten antara satu pegawai
            dengan pegawai lainnya.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan ketidakadilan dan ketidakpuasan di antara
            pegawai.</td>
        <td style="padding:4px; vertical-align:top;">Menjalankan penilaian dengan konsistensi dan menggunakan kriteria
            yang sama untuk semua pegawai.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">10</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 11: Pendidikan dan Pelatihan Pegawai --}}
    {{-- ============================================================ --}}
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="5">11</td>
        <td style="padding:4px; vertical-align:top;" rowspan="5">Pendidikan dan Pelatihan Pegawai</td>
        <td style="padding:4px; vertical-align:top;">Manajemen Diklat</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">11.1</td>
        <td style="padding:4px; vertical-align:top;">Ketidaksesuaian dengan Kebutuhan</td>
        <td style="padding:4px; vertical-align:top;">Terdapat resiko ketidaksesuaian antara program pendidikan dan
            pelatihan dengan kebutuhan pegawai dan organisasi. Jika program yang diselenggarakan tidak relevan atau
            tidak memenuhi kebutuhan yang ada.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan pemborosan sumber daya dan ketidakefektifan
            dalam pengembangan pegawai.</td>
        <td style="padding:4px; vertical-align:top;">Penilaian kebutuhan yang komprehensif sebelum merencanakan program
            pendidikan dan pelatihan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">16</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">11.2</td>
        <td style="padding:4px; vertical-align:top;">Kualitas Pelatihan yang Rendah</td>
        <td style="padding:4px; vertical-align:top;">Kurangnya materi yang relevan, metode yang tidak efektif, atau
            fasilitas yang tidak memadai, akibatnya pelatihan tidak memberikan manfaat yang signifikan atau tidak
            memenuhi harapan pegawai.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengurangi motivasi dan kinerja karyawan.</td>
        <td style="padding:4px; vertical-align:top;">Perlu dilakukan penilaian terhadap penyelenggara pelatihan,
            termasuk reputasi, pengalaman, dan kualifikasi instruktur. SDM memastikan kembali jadwal pelatihan pada
            penyelenggara.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">14</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FFFF00;">Sedang</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">11.3</td>
        <td style="padding:4px; vertical-align:top;">Keterbatasan Sumber Daya</td>
        <td style="padding:4px; vertical-align:top;">Terdapat resiko keterbatasan sumber daya dalam menyelenggarakan
            program pendidikan dan pelatihan dikarenakan kurangnya informasi tentang pelatihan yang diperlukan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat membatasi akses pegawai terhadap pelatihan yang diperlukan.
        </td>
        <td style="padding:4px; vertical-align:top;">Melakukan penilaian terhadap ketersediaan sumber daya dan
            perencanaan yang matang dalam mengalokasikan sumber daya yang ada, pelatihan dan sertifikasi untuk SDM
            terkait.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">16</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">11.4</td>
        <td style="padding:4px; vertical-align:top;">Ketidakpartisipasian Pegawai</td>
        <td style="padding:4px; vertical-align:top;">Terdapat resiko ketidakpartisipasian pegawai dalam program
            pendidikan dan pelatihan. Jika pegawai tidak tertarik atau tidak termotivasi untuk mengikuti pelatihan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengurangi efektivitas program dan hasil yang diharapkan.
        </td>
        <td style="padding:4px; vertical-align:top;">Melakukan penilaian terhadap minat dan kebutuhan pegawai serta
            penyusunan program yang menarik dan relevan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">16</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">11.5</td>
        <td style="padding:4px; vertical-align:top;">Ketidakberlanjutan</td>
        <td style="padding:4px; vertical-align:top;">Terdapat resiko ketidakberlanjutan dalam program pendidikan dan
            pelatihan. Jika tidak ada upaya untuk memastikan kelanjutan dan penerapan hasil pelatihan dalam pekerjaan
            sehari-hari.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengurangi dampak jangka panjang dari program tersebut.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan penilaian terhadap mekanisme tindak lanjut dan dukungan
            yang diberikan setelah pelatihan selesai, pengetahuan SDM terkait pelaksanaan penilaian.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">16</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FF9900;">Tinggi</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

    {{-- ============================================================ --}}
    {{-- KEGIATAN 12: Pengakhiran Pegawai --}}
    {{-- ============================================================ --}}
    <tr>
        <td style="padding:4px; text-align:center; vertical-align:top;" rowspan="5">12</td>
        <td style="padding:4px; vertical-align:top;" rowspan="5">Pengakhiran Pegawai</td>
        <td style="padding:4px; vertical-align:top;">Manajemen Pengakhiran</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">12.1</td>
        <td style="padding:4px; vertical-align:top;">Ketidaksesuaian dengan Ketentuan Hukum</td>
        <td style="padding:4px; vertical-align:top;">Terdapat resiko ketidaksesuaian dengan ketentuan hukum dalam
            pengakhiran pegawai. Jika pengakhiran dilakukan tanpa mematuhi prosedur yang diatur oleh undang-undang atau
            peraturan perusahaan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Hal ini dapat mengakibatkan sengketa hukum dan tuntutan ganti rugi.
        </td>
        <td style="padding:4px; vertical-align:top;">Melakukan penilaian yang cermat terhadap ketentuan hukum yang
            berlaku sebelum melakukan pengakhiran pegawai.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">8</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">12.2</td>
        <td style="padding:4px; vertical-align:top;">Ketidakadilan</td>
        <td style="padding:4px; vertical-align:top;">Pengakhiran dilakukan tanpa alasan yang jelas atau tanpa memberikan
            kesempatan pegawai untuk membela diri.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mengakibatkan ketidakpuasan dan konflik.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan penilaian yang obyektif dan memberikan kesempatan pegawai
            untuk memberikan klarifikasi atau pembelaan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">12.3</td>
        <td style="padding:4px; vertical-align:top;">Dampak pada Reputasi</td>
        <td style="padding:4px; vertical-align:top;">Pengakhiran pegawai tidak dilakukan dengan hati-hati dan
            transparan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat berdampak negatif pada reputasi perusahaan. Dapat
            mempengaruhi citra perusahaan di mata pegawai lain, calon pegawai, dan masyarakat umum.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan penilaian terhadap dampak reputasi sebelum melakukan
            pengakhiran pegawai.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">1</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#00B050; color:white;">Sangat
            Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">12.4</td>
        <td style="padding:4px; vertical-align:top;">Gangguan pada Produktivitas</td>
        <td style="padding:4px; vertical-align:top;">Pengakhiran pegawai dapat mengakibatkan gangguan pada
            produktivitas, terutama jika pegawai yang diakhiri memiliki peran atau tanggung jawab penting dalam
            pekerjaan.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat mempengaruhi kelancaran operasional dan pencapaian tujuan
            perusahaan.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan perencanaan penggantian pegawai yang tepat dan pemindahan
            tanggung jawab dengan baik.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">4</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">12</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#FFFF00;">Sedang</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>
    <tr>
        <td style="padding:4px; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">12.5</td>
        <td style="padding:4px; vertical-align:top;">Dampak Psikologis</td>
        <td style="padding:4px; vertical-align:top;">Pengakhiran pegawai memiliki dampak psikologis yang signifikan pada
            pegawai yang diakhiri.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">C</td>
        <td style="padding:4px; vertical-align:top;">Dapat menyebabkan stres, kehilangan kepercayaan diri, dan kesulitan
            dalam mencari pekerjaan baru.</td>
        <td style="padding:4px; vertical-align:top;">Melakukan pendekatan yang sensitif dan memberikan dukungan
            psikologis kepada pegawai yang diakhiri.</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;"></td>
        <td style="padding:4px; text-align:center; vertical-align:top;">√</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">3</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">2</td>
        <td style="padding:4px; text-align:center; vertical-align:top;">10</td>
        <td style="padding:4px; text-align:center; vertical-align:top; background-color:#92D050;">Rendah</td>
        <td style="padding:4px; vertical-align:top;">Sumber Daya Manusia (SDM)</td>
    </tr>

</table>

{{-- KETERANGAN / LEGENDA --}}
<table border="0"
    style="font-family: Arial, sans-serif; font-size: 10px; margin-top: 10px; border-collapse: collapse; width: 100%;">
    <tr>
        <td colspan="6" style="padding: 4px; font-weight: bold;">Catatan :</td>
    </tr>
    <tr>
        <td style="padding: 3px 8px;"><strong>A</strong> : Ada Kegiatan Pengendalian</td>
        <td style="padding: 3px 8px;"><strong>T</strong> : Tidak Ada Kegiatan Pengendalian</td>
        <td style="padding: 3px 8px;"><strong>KE</strong> : Kegiatan Pengendalian Yang Ada Kurang Efektif Mengurangi
            Risiko</td>
    </tr>
    <tr>
        <td style="padding: 3px 8px;"><strong>E</strong> : Kegiatan Pengendalian Yang Ada Telah Efektif Mengurangi
            Risiko</td>
        <td style="padding: 3px 8px;"><strong>P</strong> : Tingkat Probabilitas</td>
        <td style="padding: 3px 8px;"><strong>D</strong> : Tingkat Dampak &nbsp;&nbsp; <strong>TR</strong> : Tingkat
            Risiko</td>
    </tr>
    <tr>
        <td colspan="6" style="padding: 6px 8px;">
            <span style="background-color:#00B050; color:white; padding:2px 8px; margin-right:4px;">Sangat Rendah</span>
            <span style="background-color:#92D050; padding:2px 8px; margin-right:4px;">Rendah</span>
            <span style="background-color:#FFFF00; padding:2px 8px; margin-right:4px;">Sedang</span>
            <span style="background-color:#FF9900; padding:2px 8px; margin-right:4px;">Tinggi</span>
            <span style="background-color:#FF0000; color:white; padding:2px 8px;">Sangat Tinggi</span>
        </td>
    </tr>
</table>