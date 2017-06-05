<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$peserta_photo = $res_peserta->peserta_foto === NULL ? "placeholder_200x100.svg" : $res_peserta_peserta_foto;
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Upload</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group" role="group">
                        <a href="<?php echo site_url("cpanel_peserta/edit_data/".$res_peserta->peserta_id); ?>" class="btn btn-primary btn-flat btn-sm">Kembali</a>
                        <a href="<?php echo site_url("cpanel_peserta"); ?>" class="btn btn-primary btn-flat btn-sm">List Peserta</a>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-widget widget-user">
                            <div class="widget-user-header bg-aqua-active">
                                <h3 class="widget-user-username"><?php echo ucwords($res_peserta->peserta_nama); ?></h3>
                                <h5 class="widget-user-desc">Peserta</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?php echo base_url("upload/photo/".$peserta_photo); ?>" alt="User Avatar">
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header"><?php echo $res_peserta->peserta_sex === "l" ? "Ikhwan" : "Akhwat"; ?></h5>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header"><?php echo ucwords($res_peserta->peserta_tempat_lahir); ?></h5>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header"><?php echo $res_peserta->peserta_tanggal_lahir; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <?php echo isset($error) ? $error : ""; ?>
                <?php echo form_open_multipart('cpanel_peserta/do_upload_photo/'.$res_peserta->peserta_id);?>
                    <fieldset>
                        <legend>Upload Photo</legend>
                        <input type="file" name="userFileFoto" size="20" />

                        <br /><br />

                        <input type="submit" value="upload"class="btn btn-primary" />
                    </fieldset>
                </form>

                <?php echo form_open_multipart('cpanel_peserta/do_upload_ktp/'.$res_peserta->peserta_id);?>
                    <fieldset>
                        <legend>Upload Kartu Identitas</legend>
                        <input type="file" name="userFileKtp" size="20" />

                        <br /><br />

                        <input type="submit" value="upload" class="btn btn-primary" />
                    </fieldset>
                </form>
        </div>
    </div>
</div>
