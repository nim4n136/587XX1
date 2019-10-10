<div class="content-wrapper">
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA GAYA BELAJAR</h3>
            </div>
            <form action="<?= $action; ?>" method="post">
                <table class='table table-bordered'>
                    <tr>
                        <td width='200'>Kode <?= form_error('kode') ?></td>
                        <td><input type="text" class="form-control" name="kode" id="nama" placeholder="Kode" value="<?= $kode; ?>" /></td>
                    <tr>
                        <td width='200'>Nama <?= form_error('nama') ?></td>
                        <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $nama; ?>" /></td>
                    </tr>

                    <tr>
                        <td width='200'>Keterangan <?= form_error('keterangan') ?></td>
                        <td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?= $keterangan; ?></textarea></td>
                    </tr>
                    <tr>
                        <td width='200'>Saran <?= form_error('saran') ?></td>
                        <td> <textarea class="form-control" rows="3" name="saran" id="saran" placeholder="Saran"><?= $saran; ?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id_gaya" value="<?= $id_gaya; ?>" />
                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                            <a href="<?= site_url('admin/gayabelajar') ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
</div>