<div class="content-wrapper">

    <section class="content">
        <?php if ($this->session->userdata("message")) : ?>
            <div class="alert alert-success">
                <p><?= $this->session->userdata("message") ?></p>
            </div>
        <?php endif; ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">PROFILE SAYA</h3>
            </div>
            <form action="<?= $action; ?>" method="post" enctype="multipart/form-data">

                <table class='table table-bordered'>
                    <tr>
                        <td width='200'>Nama Lengkap <?= form_error('full_name') ?></td>
                        <td><input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?= $full_name; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Email <?= form_error('email') ?></td>
                        <td>

                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= $email; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Foto Profile <?= form_error('images') ?></td>
                        <td> <input type="file" name="images"></td>
                    </tr>
                    <tr>
                        <td width='200'>Password <?= form_error('password') ?></td>
                        <td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Konfirmasi Password <?= form_error('confirm_password') ?></td>
                        <td><input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password" value="" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id_users" value="<?= $id_users; ?>" />
                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                    </tr>
                </table>
            </form>
        </div>
</div>
</div>