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
        <h3>Daftar Peserta</h3>
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
                <th>HP</th>
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
                            <td><?php echo $val_peserta->peserta_kota; ?></td>
                            <td><?php echo $val_peserta->peserta_hp; ?></td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
    </body>
</html>
