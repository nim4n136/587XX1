<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA KATEGORI GAYA BELAJAR</h3>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <?= anchor(site_url('admin/gayabelajar/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm"'); ?>
                        </div>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Kode</th>
                                    <th>Kategori Gaya Belajar</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                        
                        </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };

    var t = $("#mytable").dataTable({
        initComplete: function() {
            var api = this.api();
            $(' #mytable_filter input') .off('.DT') .on('keyup.DT', function(e) { if (e.keyCode==13) { api.search(this.value).draw(); } }); }, oLanguage: { sProcessing: "loading..." }, processing: true, serverSide: true, ajax: {"url": "gayabelajar/json" , "type" : "POST" }, columns: [ { "data" : "id_gaya" , "orderable" : false },{"data": "kode" },{"data": "nama" }, { "data" : "action" , "orderable" : false, "className" : "text-center" } ], order: [[0, 'desc' ]], rowCallback: function(row, data, iDisplayIndex) { var info=this.fnPagingInfo(); var page=info.iPage; var length=info.iLength; var index=page * length + (iDisplayIndex + 1); $('td:eq(0)', row).html(index); } }); 
            }); 
</script>