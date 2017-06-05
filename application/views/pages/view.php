<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success tara-no-radius">
            <div class="panel-heading panel-tara tara-no-radius">
                <h3 class="panel-title"><?php echo $pages_item["pages_title"]; ?></h3>
            </div>
            <div class="panel-body">
                <?php echo html_entity_decode($pages_item['pages_content']); ?>
            </div>
        </div>
    </div>
</div>
