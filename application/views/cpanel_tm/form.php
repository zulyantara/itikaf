<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$tm_id = isset($res_tm) ? $res_tm->tm_id : "";
$tm_ket = isset($res_tm) ? $res_tm->tm_ket : "";
$tm_url = isset($res_tm) ? $res_tm->tm_url : "";
$btn = isset($res_tm) ? "ubah" : "simpan";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Top Menu</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group" role="group" aria-label="...">
                        <a href="<?php echo site_url('cpanel_tm'); ?>" class="btn btn-primary btn-sm btn-flat">List Top Menu</a>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_tm/simpan'); ?>" method="post">
                    <input type="hidden" name="tm_id" value="<?php echo $tm_id; ?>">
                    <div class="form-group">
                        <label for="tm_ket" class="control-label col-sm-2">Ket</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" name="tm_ket" id="tm_ket" value="<?php echo $tm_ket; ?>" placeholder="Ket" class="form-control" autofocus="autofocus" required="required">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tm_url" class="control-label col-sm-2">URL</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-5">
                                    <select class="form-control" name="tm_url" id="tm_url" required="required">
                                        <option>Pilih Pages</option>
                                        <?php
                                        if ( ! empty($res_pages))
                                        {
                                            foreach ($res_pages as $val_pages)
                                            {
                                                $url_page = site_url("pages/".$val_pages->pages_slug);
                                                $sel_page = $url_page === $tm_url ? "selected=\"selected\"" : "";
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
