<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success tara-no-radius">
            <div class="panel-heading tara-no-radius panel-tara">
                <h3 class="panel-title">Form Pendaftaran I'tikaf</h3>
            </div>
            <div class="panel-body">

                <?php echo isset($error) ? "<div class=\"alert alert-danger\" role=\"alert\">".$error."</div>" : ""; ?>
                <form class="form-horizontal" action="<?php echo site_url('pendaftaran/proses_pendaftaran'); ?>" method="post" enctype="multipart/form-data" id="frmPendaftaran">
                    <div class="panel panel-success">
                        <div class="panel-heading panel-heading-tara">
                            <h3 class="panel-title">Personal Detail</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" autofocus="autofocus" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sex" class="col-sm-2 control-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <select class="form-control" name="sex" id="sex">
                                                <option value="l">Ikhwan</option>
                                                <option value="p">Akhwat</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="tempat_lahir">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="thn_lahir">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <select class="form-control" name="thn_lahir">
                                                <?php
                                                for($i=date('Y')-70; $i < date('Y')-1; $i++)
                                                {
                                                    ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="bln_lahir">
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
                                                    ?>
                                                    <option value="<?php echo $key_bln; ?>"><?php echo $val_bln; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="tgl_lahir" id="tgl_lahir">
                                                <?php
                                                for($t=1; $t <= 31; $t++)
                                                {
                                                    ?>
                                                    <option value="<?php echo $t; ?>"><?php echo $t; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="status_pernikahan">Status Pernikahan</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <select class="form-control" name="status_pernikahan" id="status_pernikahan">
                                                <option value="1">Menikah</option>
                                                <option value="0">Belum Menikah</option>
                                                <option value="2">Duda</option>
                                                <option value="3">Janda</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="alamat">Alamat Sekarang</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <textarea name="alamat" rows="3" cols="80" placeholder="Alamat Sekarang" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="kota">Kota</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="form-control" name="kota" id="kota">
                                                <option>Pilih Kota</option>
                                                <?php
                                                if ($res_kota !== FALSE)
                                                {
                                                    foreach ($res_kota as $val_kota)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $val_kota->kota_id; ?>"><?php echo ucwords($val_kota->kota_ket); ?></option>
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
                                <label class="col-sm-2 control-label" for="kartu_identitas">Kartu Identitas</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="form-control" name="kartu_identitas" id="kartu_identitas">
                                                <option>Pilih Kartu Identitas</option>
                                                <?php
                                                if ($res_ki !== FALSE)
                                                {
                                                    foreach ($res_ki as $val_ki)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $val_ki->ki_id; ?>"><?php echo ucwords($val_ki->ki_ket); ?></option>
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
                                <label class="col-sm-2 control-label" for="no_kartu_identitas">No Kartu Identitas</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="text" name="no_kartu_identitas" id="no_kartu_identitas" placeholder="No Kartu Identitas" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-success">
                        <div class="panel-heading panel-heading-tara">
                            <h3 class="panel-title">Kontak</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="email">Email</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                                            <span id="helpEmail" class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="telepon">Telepon</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="text" name="telepon" id="telepon" placeholder="Telepon" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="hp">HP</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="text" name="hp" id="hp" placeholder="HP" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-success">
                        <div class="panel-heading panel-heading-tara">
                            <h3 class="panel-title">Latar Belakang Pendidikan</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="pendidikan">Sekolah/Institut/Universitas</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="text" name="pendidikan" id="pendidikan" placeholder="Sekolah/Institut/Universitas" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="jurusan">Jurusan</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-success">
                        <div class="panel-heading panel-heading-tara">
                            <h3 class="panel-title">Pengalaman Organisasi</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="organisasi">Partai/Ormas</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" name="organisasi" id="organisasi" placeholder="Partai/Ormas" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="posisi">Posisi</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" name="posisi" id="posisi" placeholder="Posisi" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-success">
                        <div class="panel-heading panel-heading-tara">
                            <h3 class="panel-title">Informasi I'tikaf</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="mulai_itikaf">Mulai I'itikaf pada Hari ke-</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <select class="form-control" name="mulai_itikaf" id="mulai_itikaf">
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="konsumsi">Pengaturan Konsumsi</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="form-control" name="konsumsi" id="konsumsi">
                                                <option>Pilih Pengaturan Konsumsi</option>
                                                <?php
                                                if ($res_konsumsi !== FALSE)
                                                {
                                                    foreach ($res_konsumsi as $val_konsumsi)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $val_konsumsi->konsumsi_id; ?>"><?php echo ucwords($val_konsumsi->konsumsi_ket); ?></option>
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
                                <label class="col-sm-2 control-label" for="sumber_informasi">Sumber Informasi</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="form-control" name="sumber_informasi" id="sumber_informasi">
                                                <option>Pilih Sumber Informasi</option>
                                                <?php
                                                if ($res_si !== FALSE)
                                                {
                                                    foreach ($res_si as $val_si)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $val_si->si_id; ?>"><?php echo ucwords($val_si->si_ket); ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="panel panel-success">
                        <div class="panel-heading panel-heading-tara">
                            <h3 class="panel-title">Kelengkapan Data (Wajib)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="upload_photo" class="control-label col-sm-2">Upload Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="upload_photo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="upload_ktp" class="control-label col-sm-2">Upload Kartu Identitas</label>
                                <div class="col-sm-10">
                                    <input type="file" name="upload_ktp">
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="panel panel-success">
                        <div class="panel-heading panel-heading-tara">
                            <h3 class="panel-title">Informasi Login</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="username">Username</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                                            <span id="helpUsername" class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="password">Password</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="col-sm-12">
                                            <span id="helpPassword" class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="confirm_password">Repeat Password</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="password" id="confirm_password" placeholder="Repeat Password" class="form-control">
                                            <span id="helpRepeatPassword" class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label"></label>
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Replace data-sitekey with your own one, generated at https://www.google.com/recaptcha/admin -->
                                    <div class="g-recaptcha" data-sitekey="6LfLJSQUAAAAAJ-1wo7-Rgmz2jgTfiFh5mdurL2e"></div>
                                    <br>
                                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Simpan</button>
                                </div>
                                <div class="col-sm-12">
                                    <div class="alert alert-warning tara-margin-top" role="alert">
                                        Dengan mengisi formulir ini, Anda menyatakan bahwa telah mengerti atas kepentingan seluruh informasi yang telah diberikan. <br>Dan setuju terhadap segala syarat dan ketentuan yang telah diberlakukan organisasi -MUTAN- selama menjalankan I’itikaf pada bulan Ramadhan.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript">
$(document).ready(function () {
    // cek email exist
    $("#email").blur(function(){
        var txt_email = $("#email").val();

        $.ajax({
            data: {email : txt_email},
            url: "<?php echo site_url("pendaftaran/check_email"); ?>",
            type: "POST",
            success : function(data) {
                $("#helpEmail").html(data);
                if (data != "")
                {
                    $("#email").focus();
                }
            }
        });
    });

    //  cek username exist
    $("#username").blur(function(){
        var uname = $("#username").val();

        $.ajax({
            data: {username : uname},
            url: "<?php echo site_url("pendaftaran/check_username"); ?>",
            type: "POST",
            success : function(data) {
                $("#helpUsername").html(data);
                if (data != "")
                {
                    $("#username").focus();
                }
            }
        });
    });

    // cek repeat password
    $("#frmPendaftaran").validate({
        rules:{
            username: {
                required: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            username: {
                required: "Please enter a username"
            },
            password: {
                required: "Please provide a password"
            },
            confirm_password: {
                required: "Please provide a password",
                equalTo: "Please enter the same password as above"
            },
        }
    });
});
</script>
