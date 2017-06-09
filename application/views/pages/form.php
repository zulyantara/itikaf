<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$pages_id = isset($res_pages) ? $res_pages->pages_id : "";
$pages_title = isset($res_pages) ? $res_pages->pages_title : "";
$pages_content = isset($res_pages) ? html_entity_decode($res_pages->pages_content) : "";
$btn = isset($res_pages) ? "ubah" : "simpan";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Form Pages</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo site_url('cpanel_pages'); ?>" class="btn btn-primary btn-sm btn-flat">List pages</a>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_pages/simpan'); ?>" method="post">
                    <input type="hidden" name="pages_id" value="<?php echo $pages_id; ?>">
                    <div class="form-group">
                        <label for="pages_title" class="control-label col-sm-2">Title</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" name="pages_title" id="pages_title" value="<?php echo $pages_title; ?>" placeholder="Title" class="form-control" autofocus="autofocus" required="required">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- <label for="pages_content" class="control-label col-sm-2">Content</label> -->
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea name="pages_content" id="pages_content" rows="8" cols="40" required="required" class="form-control"><?php echo $pages_content; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- <label for="" class="control-label col-sm-2"></label> -->
                        <div class="col-sm-12">
                            <button type="submit" name="simpan" value="<?php echo $btn; ?>" class="btn btn-primary btn-flat">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        CKEDITOR.replace('pages_content');
    });
</script>
