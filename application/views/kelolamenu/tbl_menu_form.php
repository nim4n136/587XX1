<div class="content-wrapper">

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA MENU</h3>
            </div>
            <form action="<?= $action; ?>" method="post">

                <table class='table table-bordered>' <tr>
                    <td width='200'>Title <?= form_error('title') ?></td>
                    <td><input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $title; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Url <?= form_error('url') ?></td>
                        <td><input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?= $url; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Icon <?= form_error('icon') ?></td>
                        <td><input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?= $icon; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Is Main Menu <?= form_error('is_main_menu') ?></td>
                        <td> <select name="is_main_menu" class="form-control">
                                <option value="0">MAIN MENU</option>
                                <?php
                                $menu = $this->db->get('tbl_menu')->result();
                                foreach ($menu as $m) :
                                    ?>
                                    <option value='$m->id_menu' <?= $m->id_menu == $is_main_menu ? 'selected' : '' ?>"> <?= strtoupper($m->title) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width='200'>Is Aktif <?= form_error('is_aktif') ?></td>
                        <td><?= form_dropdown('is_aktif', array('y' => 'AKTIF', 'n' => 'TIDAK'), $is_aktif, array('class' => 'form-control')) ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id_menu" value="<?= $id_menu; ?>" />
                            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                            <a href="<?= site_url('admin/kelolamenu') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td>
                    </tr>
                </table>
            </form>
        </div>
</div>
</div>