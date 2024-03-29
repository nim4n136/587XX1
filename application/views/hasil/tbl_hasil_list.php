<div class="content-wrapper">
    <section class="content">
    <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title" style="padding-bottom:1rem">PILIH KELAS PESERTA</h3>
                        <form actions="">
                            <div class="form-group">
                                <select name="id_kelas" class="form-control">
                                    <option value="" disabled selected> -- Silahkan Pilih Kelas --</option>
                                    <?php foreach ($data_kelas as $kelas) : ?>
                                        <option <?=  $kelas->id_kelas == $id_kelas ? "selected" : "" ?> value="<?= $kelas->id_kelas ?>"><?= $kelas->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php if($id_kelas){ ?>
                            <div class="form-group">
                                <select name="input_gaya" class="form-control">
                                    <option value="" disabled selected> -- Silahkan Pilih Gaya Belajar --</option>
                                    <?php foreach ($gaya_belajar as $gaya) : ?>
                                        <option <?=  $gaya->id_gaya == $input_gaya ? "selected" : "" ?> value="<?= $gaya->id_gaya ?>"><?= $gaya->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!$id_kelas) return; ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">HASIL TEST PESERTA</h3>
                    </div>
                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <!-- <?= anchor(site_url('admin/hasil/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?> -->
                            <?= anchor(site_url('admin/hasil/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export data', 'class="btn btn-primary btn-sm"'); ?></div>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Nama Peserta</th>
                                    <th>Alamat Email</th>
                                    <th>Gaya Belajar</th>
                                    <th>Metode Belajar</th>
                                    <th>Persentasi</th>
                                    <th width="200px">Aksi</th>
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
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
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
                $(' #mytable_filter input').off('.DT').on('keyup.DT', function(e) {
                    if (e.keyCode == 13) {
                        api.search(this.value).draw();
                    }
                });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "hasil/json",
                "type": "POST",
                "data" : {
                    "id_kelas" : <?= $id_kelas ?>,
                    "input_gaya" : <?= $input_gaya ?  $input_gaya : '""' ?>
                }
            },
            columns: [{
                "data": "id_hasil",
                "orderable": false
            }, {
                "data": "nama"
            },
            {
                "data" : "email"
            }, {
                "data": "gaya_belajar"
            },
            {
                "data": "methode"
            }, {
                "data": "persent"
            }, {
                "data": "action",
                "orderable": false,
                "className": "text-center"
            }],
            order: [
                [0, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>