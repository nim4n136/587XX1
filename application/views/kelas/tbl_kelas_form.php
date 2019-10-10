<div class="content-wrapper">

    <section class="content">
        <div class="box box-primary ">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA KELAS</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">

                <table class='table table-bordered'>

                    <tr>
                        <td width='200'>Nama <?php echo form_error('nama') ?></td>
                        <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>" />
                            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('admin/kelas') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td>
                    </tr>
                </table>
            </form>
        </div>
</div>
</div>