<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">List Slider</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group" role="group">
                        <a href="<?php echo site_url('cpanel_slider/tambah_data'); ?>" class="btn btn-primary btn-flat btn-sm">Tambah Data</a>
                        <a href="<?php echo site_url('cpanel_slider/kosongkan_data'); ?>" class="btn btn-danger btn-flat btn-sm">Kosongkan Data</a>
                        <button type="button" title="Refresh" onclick="reload_table();" class="btn btn-primary btn-flat btn-sm">Refresh</button>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <table id="table" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Slider</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('cpanel_slider/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ 0 ], //first column
                "orderable": false, //set not orderable
            },
            {
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },

        ],

    });

    //check all
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
    });
});

function deleteItem(i,a)
{
    if (confirm("Anda yakin menghapus data "+a+"?"))
    {
        window.location = "<?php echo site_url('cpanel_slider/hapus_data/'); ?>"+i;
    }
    return false;
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}
</script>
