<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$fa_id = isset($res_fa) ? $res_fa->fa_id : "";
$fa_ket = isset($res_fa) ? $res_fa->fa_ket : "";
$fa_url = isset($res_fa) ? $res_fa->fa_url : "";
$btn = isset($res_fa) ? "ubah" : "simpan";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Additional Footer</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group" role="group" aria-label="...">
                        <a href="<?php echo site_url('cpanel_fa'); ?>" class="btn btn-primary btn-sm btn-flat">List Additional Footer</a>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_fa/simpan'); ?>" method="post">
                    <input type="hidden" name="fa_id" value="<?php echo $fa_id; ?>">
                    <div class="form-group">
                        <label for="fa_ket" class="control-label col-sm-2">Ket</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" name="fa_ket" id="fa_ket" value="<?php echo $fa_ket; ?>" placeholder="Ket" class="form-control" autofocus="autofocus" required="required">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fa_url" class="control-label col-sm-2">URL</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" name="fa_url_ext"id="fl_link_ext" value="<?php echo $fl_link; ?>" class="form-control">
                                </div>
                                <div class="col-sm-5">
                                    <select class="form-control" name="fa_url" id="fa_url" required="required">
                                        <option value="">Pilih Pages</option>
                                        <?php
                                        if ( ! empty($res_pages))
                                        {
                                            foreach ($res_pages as $val_pages)
                                            {
                                                $url_page = site_url("pages/".$val_pages->pages_slug);
                                                $sel_page = $url_page === $fa_url ? "selected=\"selected\"" : "";
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
