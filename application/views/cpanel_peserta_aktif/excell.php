<?php
/*
 * @author Zulyantara <zulyantara@gmail.com>
 */

header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=peserta_aktif.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h3>Daftar Peserta I'tikaf Tahun <?php echo date("Y"); ?></h3>
        <table border="0" cellpadding="1" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Status Pernikahan</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Kartu Identitas</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>HP</th>
                <th>Pendidikan</th>
                <th>Jurusan</th>
                <th>Organisasi</th>
                <th>Posisi</th>
                <th>Mulai I'tikaf</th>
                <th>Pengaturan Konsumsi</th>
                <th>Sumber Informasi</th>
                <th>Tanggal Daftar</th>
            </tr>
            <?php
            if (isset($res_peserta))
            {
                if ( ! empty($res_peserta))
                {
                    $no = 0;
                    foreach ($res_peserta as $val_peserta)
                    {
                        if ($val_peserta->peserta_status_pernikahan === "1")
                        {
                            $sts_pernikahan = "Menikah";
                        }
                        elseif ($val_peserta->peserta_status_pernikahan === "0")
                        {
                            $sts_pernikahan = "Belum Menikah";
                        }
                        elseif ($val_peserta->peserta_status_pernikahan === "2")
                        {
                            $sts_pernikahan = "Duda";
                        }
                        elseif ($val_peserta->peserta_status_pernikahan === "3")
                        {
                            $sts_pernikahan = "Janda";
                        }
                        ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $val_peserta->peserta_nama; ?></td>
                            <td><?php echo $val_peserta->peserta_sex === "l" ? "Ikhwan" : "Akhwat"; ?></td>
                            <td><?php echo $val_peserta->peserta_tempat_lahir; ?></td>
                            <td><?php echo $val_peserta->peserta_tanggal_lahir; ?></td>
                            <td><?php echo $sts_pernikahan; ?></td>
                            <td><?php echo $val_peserta->peserta_alamat; ?></td>
                            <td><?php echo $val_peserta->kota_ket; ?></td>
                            <td><?php echo $val_peserta->peserta_no_kartu_identitas; ?></td>
                            <td><?php echo $val_peserta->peserta_email; ?></td>
                            <td><?php echo $val_peserta->peserta_telepon; ?></td>
                            <td><?php echo $val_peserta->peserta_hp; ?></td>
                            <td><?php echo $val_peserta->peserta_pendidikan; ?></td>
                            <td><?php echo $val_peserta->peserta_jurusan; ?></td>
                            <td><?php echo $val_peserta->peserta_organisasi; ?></td>
                            <td><?php echo $val_peserta->peserta_posisi; ?></td>
                            <td><?php echo $val_peserta->itikaf_mulai; ?></td>
                            <td><?php echo $val_peserta->konsumsi_ket; ?></td>
                            <td><?php echo $val_peserta->si_ket; ?></td>
                            <td><?php echo $val_peserta->peserta_insert_date; ?></td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
    </body>
</html>
