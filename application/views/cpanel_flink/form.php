<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$fl_id = isset($res_flink) ? $res_flink->fl_id : "";
$fl_ket = isset($res_flink) ? $res_flink->fl_ket : "";
$fl_link = isset($res_flink) ? $res_flink->fl_link : "";
$fl_fhl = isset($res_flink) ? $res_flink->fl_fhl : "";
$btn = isset($res_flink) ? "ubah" : "simpan";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Form Footer Link</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group" role="group" aria-label="...">
                        <a href="<?php echo site_url('cpanel_flink'); ?>" class="btn btn-primary btn-sm btn-flat">List Footer Link</a>
                        <a href="<?php echo site_url('cpanel_fheader/tambah_data'); ?>" class="btn btn-primary btn-sm btn-flat">Tambah Footer Header</a>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_flink/simpan'); ?>" method="post">
                    <input type="hidden" name="fl_id" value="<?php echo $fl_id; ?>">
                    <div class="form-group">
                        <label for="fl_ket" class="control-label col-sm-2">Ket</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" name="fl_ket" id="fl_ket" value="<?php echo $fl_ket; ?>" placeholder="Ket" class="form-control" autofocus="autofocus" required="required">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fl_link" class="control-label col-sm-2">Link</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" name="fl_link_ext"id="fl_link_ext" value="<?php echo $fl_link; ?>" class="form-control">
                                </div>
                                <div class="col-sm-5">
                                    <select class="form-control" name="fl_link_int" id="fl_link_int">
                                        <option value="">Pilih Pages</option>
                                        <?php
                                        if ( ! empty($res_pages))
                                        {
                                            foreach ($res_pages as $val_pages)
                                            {
                                                $url_page = site_url("pages/".$val_pages->pages_slug);
                                                $sel_page = $url_page === $fl_link ? "selected=\"selected\"" : "";
                                                ?>
                                                <option value="<?php echo $url_page; ?>" <?php echo $sel_page; ?>><?php echo $val_pages->pages_title; ?></option>
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
                        <label for="fl_fhl" class="control-label col-sm-2">Header</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <select class="form-control" name="fl_fhl" id="fl_fhl">
                                        <option>Pilih Header</option>
                                        <?php
                                        if ($res_fhl !== FALSE)
                                        {
                                            foreach ($res_fhl as $val_fhl)
                                            {
                                                $sel_fhl = $val_fhl->fhl_id === $fl_fhl ? "selected=\"selected\"" : "";
                                                ?>
                                                <option value="<?php echo $val_fhl->fhl_id; ?>" <?php echo $sel_fhl; ?>><?php echo ucwords($val_fhl->fhl_header); ?></option>
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
                        <label for="" class="control-label col-sm-2"></label>
                        <div class="col-sm-10">
                            <button type="submit" name="simpan" value="<?php echo $btn; ?>" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
