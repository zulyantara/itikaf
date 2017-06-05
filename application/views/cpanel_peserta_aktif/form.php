<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$peserta_id = isset($res_peserta) ? $res_peserta->peserta_id : "";
$peserta_nama = isset($res_peserta) ? $res_peserta->peserta_nama : "";
$peserta_sex = isset($res_peserta) ? $res_peserta->peserta_sex : "";
$peserta_tempat_lahir = isset($res_peserta) ? $res_peserta->peserta_tempat_lahir : "";
$peserta_tanggal_lahir = isset($res_peserta) ? $res_peserta->peserta_tanggal_lahir : "";
$peserta_status_pernikahan = isset($res_peserta) ? $res_peserta->peserta_status_pernikahan : "";
$peserta_alamat = isset($res_peserta) ? $res_peserta->peserta_alamat : "";
$peserta_kota = isset($res_peserta) ? $res_peserta->peserta_kota : "";
$peserta_kartu_identitas = isset($res_peserta) ? $res_peserta->peserta_kartu_identitas : "";
$peserta_no_kartu_identitas = isset($res_peserta) ? $res_peserta->peserta_no_kartu_identitas : "";
$peserta_email = isset($res_peserta) ? $res_peserta->peserta_email : "";
$peserta_website = isset($res_peserta) ? $res_peserta->peserta_website : "";
$peserta_telepon = isset($res_peserta) ? $res_peserta->peserta_telepon : "";
$peserta_hp = isset($res_peserta) ? $res_peserta->peserta_hp : "";
$peserta_pendidikan = isset($res_peserta) ? $res_peserta->peserta_pendidikan : "";
$peserta_jurusan = isset($res_peserta) ? $res_peserta->peserta_jurusan : "";
$peserta_organisasi = isset($res_peserta) ? $res_peserta->peserta_organisasi : "";
$peserta_posisi = isset($res_peserta) ? $res_peserta->peserta_posisi : "";
$peserta_foto = isset($res_peserta) ? $res_peserta->peserta_foto : "";
$peserta_ktp = isset($res_peserta) ? $res_peserta->peserta_ktp : "";
$btn = isset($res_peserta) ? "ubah" : "simpan";

$peserta_foto = is_null($peserta_foto) ? "placeholder_200x100.svg" : $peserta_foto;
$peserta_ktp = is_null($peserta_ktp) ? "placeholder_200x100.svg" : $peserta_ktp;
$tgl = new DateTime($peserta_tanggal_lahir);
$thn_lahir = $tgl->format('Y');
$bln_lahir = $tgl->format('m');
$tgl_lahir = $tgl->format('d');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Peserta</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo site_url("cpanel_peserta_aktif"); ?>" class="btn btn-primary btn-flat btn-sm">List Peserta Aktif</a>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_peserta_aktif/simpan'); ?>" method="post">
                    <input type="hidden" name="peserta_id" value="<?php echo $peserta_id; ?>">
                    <fieldset>
                        <legend>Personal Detail</legend>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_nama">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="peserta_nama" id="peserta_nama" placeholder="Nama Lengkap" required="required" autofocus="autofocus" value="<?php echo $peserta_nama; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_sex">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="peserta_sex" id="peserta_sex" required="required">
                                            <?php
                                            $arr_sex = array('l'=>'Ikhwan', 'p'=>'Akhwat');
                                            foreach ($arr_sex as $key_sex => $val_sex)
                                            {
                                                $sel_sex = $key_sex==$peserta_sex ? "selected=\"selected\"" : "";
                                                ?>
                                                <option value="<?php echo $key_sex; ?>" <?php echo $sel_sex; ?>><?php echo $val_sex; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_tempat_lahir">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="peserta_tempat_lahir" id="peserta_tempat_lahir" placeholder="Tempat Lahir" required="required" value="<?php echo $peserta_tempat_lahir; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_thn_lahir">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="peserta_thn_lahir" required="required">
                                            <?php
                                            for($i=date('Y')-70; $i < date('Y')-1; $i++)
                                            {
                                                $sel_thn_lahir = $i == $thn_lahir ? "selected=\"selected\"" : "";
                                                ?>
                                                <option value="<?php echo $i; ?>" <?php echo $sel_thn_lahir; ?>><?php echo $i; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="peserta_bln_lahir">
                                            <?php
                                            $bln["01"] = "Januari";
                                            $bln["02"] = "Februari";
                                            $bln["03"] = "Maret";
                                            $bln["04"] = "April";
                                            $bln["05"] = "Mei";
                                            $bln["06"] = "Juni";
                                            $bln["07"] = "Juli";
                                            $bln["08"] = "Agustus";
                                            $bln["09"] = "September";
                                            $bln["10"] = "Oktober";
                                            $bln["11"] = "November";
                                            $bln["12"] = "Desember";
                                            foreach ($bln as $key_bln => $val_bln)
                                            {
                                                $sel_bln_lahir = $key_bln == $bln_lahir ? "selected=\"selected\"" : "";
                                                ?>
                                                <option value="<?php echo $key_bln; ?>" <?php echo $sel_bln_lahir; ?>><?php echo $val_bln; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="peserta_tgl_lahir" required="required" id="tgl_lahir">
                                            <?php
                                            for($t=1; $t <= 31; $t++)
                                            {
                                                $sel_tgl_lahir = $t == $tgl_lahir ? "selected=\"selected\"" : "";
                                                ?>
                                                <option value="<?php echo $t; ?>" <?php echo $sel_tgl_lahir; ?>><?php echo $t; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_status_pernikahan">Status Pernikahan</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="peserta_status_pernikahan" id="peserta_status_pernikahan" required="required">
                                            <?php
                                            $arr_sp = array("1"=>"Menikah","0"=>"Belum Menikah","2"=>"Duda","3"=>"Janda");
                                            foreach ($arr_sp as $key_sp => $val_sp)
                                            {
                                                $sel_sp = $key_sp==$peserta_status_pernikahan ? "selected=\"selected\"" : "";
                                                ?>
                                                <option value="<?php echo $key_sp; ?>" <?php echo $sel_sp; ?>><?php echo $val_sp; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_alamat">Alamat Sekarang</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <textarea name="peserta_alamat" rows="3" cols="80" placeholder="Alamat Sekarang" required="required" class="form-control"> <?php echo $peserta_alamat; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_kota">Kota</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="peserta_kota" id="peserta_kota" required="required">
                                            <option>Pilih Kota</option>
                                            <?php
                                            if ($res_kota !== FALSE)
                                            {
                                                foreach ($res_kota as $val_kota)
                                                {
                                                    $sel_kota = $val_kota->kota_id == $peserta_kota ? "selected=\"selected\"" : "";
                                                    ?>
                                                    <option value="<?php echo $val_kota->kota_id; ?>" <?php echo $sel_kota; ?>><?php echo ucwords($val_kota->kota_ket); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_kartu_identitas">Kartu Identitas</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="peserta_kartu_identitas" id="peserta_kartu_identitas" required="required">
                                            <option>Pilih Kartu Identitas</option>
                                            <?php
                                            if ($res_ki !== FALSE)
                                            {
                                                foreach ($res_ki as $val_ki)
                                                {
                                                    $sel_ki = $val_ki->ki_id == $peserta_kartu_identitas ? "selected=\"selected\"" : "";
                                                    ?>
                                                    <option value="<?php echo $val_ki->ki_id; ?>" <?php echo $sel_ki; ?>><?php echo ucwords($val_ki->ki_ket); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_no_kartu_identitas">No Kartu Identitas</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="peserta_no_kartu_identitas" id="peserta_no_kartu_identitas" placeholder="No Kartu Identitas" required="required" value="<?php echo $peserta_no_kartu_identitas; ?>"class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Kontak</legend>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_email">Email</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="email" name="peserta_email" id="peserta_email" placeholder="Email" value="<?php echo $peserta_email; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_website">Website</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="peserta_website" id="peserta_website" placeholder="Website" value="<?php echo $peserta_website; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_telepon">Telepon</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="peserta_telepon" id="peserta_telepon" placeholder="Telepon" value="<?php echo $peserta_telepon; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_hp">HP</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="peserta_hp" id="peserta_hp" placeholder="HP" required="required" value="<?php echo $peserta_hp; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Latar Belakang Pendidikan</legend>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_pendidikan">Sekolah/Institut/Universitas/Lembaga</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="peserta_pendidikan" id="peserta_pendidikan" placeholder="Sekolah/Institut/Universitas/Lembaga" class="form-control" value="<?php echo $peserta_pendidikan; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_jurusan">Jurusan</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="peserta_jurusan" id="peserta_jurusan" placeholder="Jurusan" class="form-control" value="<?php echo $peserta_jurusan; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Pengalaman Organisasi</legend>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_organisasi">Institusi/Partai/Ormas</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="peserta_organisasi" id="peserta_organisasi" placeholder="Institusi/Partai/Ormas" class="form-control" value="<?php echo $peserta_organisasi; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_posisi">Posisi</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="peserta_posisi" id="peserta_posisi" placeholder="Posisi" class="form-control" value="<?php echo $peserta_posisi; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Photo</legend>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_foto">Photo</label>
                            <div class="col-sm-10">
                                <img class="uk-thumbnail" src="<?php echo base_url("upload/photo/".$peserta_foto); ?>" alt="Photo">
                                <a href="<?php echo site_url("cpanel_peserta_aktif/form_upload/".$peserta_id); ?>" class="btn btn-primary btn-flat">Upload</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peserta_foto">Kartu Identitas</label>
                            <div class="col-sm-10">
                                <img class="uk-thumbnail" src="<?php echo base_url("upload/photo/".$peserta_ktp); ?>" alt="Kartu Identitas">
                                <a href="<?php echo site_url("cpanel_peserta_aktif/form_upload/".$peserta_id); ?>" class="btn btn-primary btn-flat">Upload</a>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="" class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="simpan" value="<?php echo $btn; ?>" class="btn btn-primary btn-flat">Simpan</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
