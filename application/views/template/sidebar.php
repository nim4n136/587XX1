<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?= base_url() ?>assets/foto_profil/<?= $this->session->userdata('images'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?= $this->session->userdata('full_name'); ?> </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php
        // chek settingan tampilan menu
        $setting = $this->db->get_where('tbl_setting', array('id_setting' => 1))->row_array();
        if ($setting['value'] == 'ya') {
            // cari level user
            $id_user_level = $this->session->userdata('id_user_level');
            $sql_menu = "SELECT * 
            FROM tbl_menu 
            WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu=0 and is_aktif='y' order by urut asc";
        } else {
            $sql_menu = "select * from tbl_menu where is_aktif='y' and is_main_menu=0 order by urut asc";
        }

        $main_menu = $this->db->query($sql_menu)->result();

        foreach ($main_menu as $menu):
            // chek is have sub menu
            $this->db->where('is_main_menu', $menu->id_menu);
            $this->db->where('is_aktif', 'y');
            $submenu = $this->db->get('tbl_menu');
            if ($submenu->num_rows() > 0):
        ?>  
                <li class='treeview'>
                    <a href='#'>
                        <i class='<?= $menu->icon ?>'></i> <span><?= strtoupper($menu->title) ?></span>
                        <span class='pull-right-container'>
                            <i class='fa fa-angle-left pull-right'></i>
                        </span>
                    </a>
                    <ul class='treeview-menu' style='display: none;'>
                        <?php foreach ($submenu->result() as $sub) :  ?>
                            <li><?= anchor($sub->url, "<i class='$sub->icon'></i> " . strtoupper($sub->title)) ?> </li>
                        <?php endforeach; ?>

                    </ul>
                </li>
            <?php else: ?>
                <li>
                    <?= anchor($menu->url, "<i class='" . $menu->icon . "'></i> " . strtoupper($menu->title)) ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</section>