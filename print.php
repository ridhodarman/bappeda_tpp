<?php
    session_start();
    if(!isset($_SESSION['role'])) {
        die ('
            <script>alert("silahkan login terlebih dahulu")</script>
            <meta http-equiv="REFRESH" content="0.1;url=index.php">
        ');
    }
include('assets/koneksi.php') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style type="text/css" media="print">
@page {
  size: landscape;
}
</style>
<body>
<table id="example" class="table" style="width:100%; font-size: 75%; font-family: 'Times New Roman';" border="1">
        <thead style="text-align: center;">
            <tr>
                <th rowspan="3">No</th>
                <th rowspan="3">Nama</th>
                <th rowspan="3">Jabatan</th>
                <th rowspan="3">No. Rekening</th>
                <th rowspan="3">Gol.</th>
                <th rowspan="3">Jumlah TPP</th>
                <th colspan="2">Besaran TPP</th>
                <th colspan="2">Total Pemotongan Kehadiran</th>
                <th colspan="3">Nilai Penerimaan</th>
                <th rowspan="3">Jumlah TPP dari SKP dan Kehadiran</th>
                <th rowspan="3">Potongan BPJS</th>
                <th rowspan="3">Pajak</th>
                <th rowspan="3">TPP Bersih</th>
            </tr>
            <tr>
                <th rowspan="2">Berdasarkan Beban Kerja Pada SKP Online</th>
                <th rowspan="2">Berdasarkan Kehadiran</th>

                <th rowspan="2">%</th>
                <th rowspan="2">Jumlah</th>

                <th colspan="2">SKP</th>
                <th>Kehadiran</th>
            </tr>

            <tr>
                <th>%</th>
                <th>Rp</th>
                <th>Rp</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $periode = mysqli_real_escape_string($con, $_GET['periode']);
                $sql=mysqli_query($con, "
                    SELECT pegawai.nama, jabatan.nama_jabatan, pegawai.no_rekening, golongan.nama_gol_pangkat,
                    jabatan.beban_kerja_skp, jabatan.kehadiran,
                    penerimaan.pemotongan_kehadiran, penerimaan.skp,
                    jabatan.potongan_bpjs, golongan.pajak
                    FROM penerimaan
                    LEFT JOIN pegawai ON pegawai.nip=penerimaan.nip
                    LEFT JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan
                    LEFT JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
                    WHERE id_periode = '$periode'
                    ORDER BY jabatan.id_jabatan
                    ");
                $no=1;
                while ($data=mysqli_fetch_array($sql)) {
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$data['nama']."</td>";
                    echo "<td>".$data['nama_jabatan']."</td>";
                    echo "<td>".$data['no_rekening']."</td>";
                    echo "<td>".$data['nama_gol_pangkat']."</td>";

                    $bk_skp=$data['beban_kerja_skp'];
                    $kehadiran=$data['kehadiran'];
                    $jumlah_tpp=$bk_skp+$kehadiran;
                    echo "<td>Rp.".number_format($jumlah_tpp)."</td>";
                    echo "<td>Rp.".number_format($data['beban_kerja_skp'])."</td>";
                    echo "<td>Rp.".number_format($kehadiran)."</td>";

                    $potongan_kehadiran=$data['pemotongan_kehadiran'];
                    $jumlah_p_kehadiran=$kehadiran*$potongan_kehadiran/100;
                    echo "<td>".$potongan_kehadiran."</td>";
                    echo "<td>Rp.".number_format($jumlah_p_kehadiran)."</td>";

                    $skp=$data['skp'];
                    $total_skp=$skp/50*$bk_skp;
                    echo "<td>".$skp."</td>";
                    echo "<td>Rp.".number_format($total_skp)."</td>";
                    $total_kehadiran=$kehadiran-$jumlah_p_kehadiran;
                    echo "<td>Rp.".number_format($total_kehadiran)."</td>";

                    $tpp_skp_kehadiran=$total_kehadiran+$total_kehadiran;
                    echo "<td>Rp.".number_format($tpp_skp_kehadiran)."</td>";

                    $potongan_bpjs=$data['potongan_bpjs'];
                    $bpjs=$jumlah_tpp*$potongan_bpjs/100;
                    echo "<td>Rp".number_format($bpjs)." <font color='gray'>(".$potongan_bpjs."%)</font></td>";

                    $potongan_pajak=$data['pajak'];
                    $pajak=$tpp_skp_kehadiran*$potongan_pajak/100;
                    echo "<td>Rp.".number_format($pajak)." <font color='gray'>(".$potongan_pajak."%)</font></td>";

                    $tpp_bersih=$tpp_skp_kehadiran-$bpjs-$pajak;
                    echo "<td>Rp.".number_format($tpp_bersih)."</td>";

                    $no++;
                }
            ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>