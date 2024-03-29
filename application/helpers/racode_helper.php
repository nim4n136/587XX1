<?php
function cmb_dinamis($name, $table, $field, $pk, $selected = null, $order = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    if ($order) {
        $ci->db->order_by($field, $order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function select2_dinamis($name, $table, $field, $placeholder)
{
    $ci = get_instance();
    $select2 = '<select name="' . $name . '" class="form-control select2 select2-hidden-accessible" multiple="" 
               data-placeholder="' . $placeholder . '" style="width: 100%;" tabindex="-1" aria-hidden="true">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $select2 .= ' <option>' . $row->$field . '</option>';
    }
    $select2 .= '</select>';
    return $select2;
}

function datalist_dinamis($name, $table, $field, $value = null)
{
    $ci = get_instance();
    $string = '<input value="' . $value . '" name="' . $name . '" list="' . $name . '" class="form-control">
    <datalist id="' . $name . '">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $string .= '<option value="' . $row->$field . '">';
    }
    $string .= '</datalist>';
    return $string;
}

function rename_string_is_aktif($string)
{
    return $string == 'y' ? 'Aktif' : 'Tidak Aktif';
}


/**
 * 
 * check login dan check hak akses
 */

function is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id_users')) {
        redirect('admin/auth');
    } else {
        $modul = $ci->uri->segment(1) . "/" . $ci->uri->segment(2);

        $id_user_level = $ci->session->userdata('id_user_level');
        // dapatkan id menu berdasarkan nama controller
        $menu = $ci->db->get_where('tbl_menu', array('url' => $modul))->row_array();
        $id_menu = $menu['id_menu'];
        // chek apakah user ini boleh mengakses modul ini
        $hak_akses = $ci->db->get_where('tbl_hak_akses', array('id_menu' => $id_menu, 'id_user_level' => $id_user_level));
        if ($hak_akses->num_rows() < 1) {
            redirect('admin/blokir');
            exit;
        }
    }
}

function alert($class, $title, $description)
{
    return "<div class='alert {$class} alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-ban'></i> {$title} </h4> {$description} 
            </div>";
}

// untuk chek akses level pada modul peberian akses
function checked_akses($id_user_level, $id_menu)
{
    $ci = get_instance();
    $ci->db->where('id_user_level', $id_user_level);
    $ci->db->where('id_menu', $id_menu);
    $data = $ci->db->get('tbl_hak_akses');
    if ($data->num_rows() > 0) {
        return "checked='checked'";
    }
}


function autocomplate_json($table, $field)
{
    $ci = get_instance();
    $ci->db->like($field, $_GET['term']);
    $ci->db->select($field);
    $collections = $ci->db->get($table)->result();
    foreach ($collections as $collection) {
        $return_arr[] = $collection->$field;
    }
    echo json_encode($return_arr);
}


function config($name)
{
    $ci = get_instance();
    return $ci->config->item($name);
}


function get_gaya_belajar($ids)
{
    $ci = get_instance();
    $ci->load->model('Gaya_belajar_model');

    $hasil = [];
    $data = json_decode($ids);
    foreach ($data as $value) {
        $get = $ci->Gaya_belajar_model->where_data(array("id_gaya" => $value));
        $hasil[] = $get->nama;
    }
    $extract = implode(", ", $hasil);
    return $extract;
}



function methode_gaya_belajar($ids)
{
    $ci = get_instance();
    $ci->load->model('Gaya_belajar_model');

    $hasil = [];
    $data = json_decode($ids);
    foreach ($data as $value) {
        $get = $ci->Gaya_belajar_model->where_data(array("id_gaya" => $value));
        $hasil[] = $get->metode_cocok;
    }
    $extract = implode(", ", $hasil);
    return $extract;
}



function get_persent_gaya($persent, $plain_text = false)
{
    $ci = get_instance();

    $persent = json_decode($persent, true);
    usort($persent, function ($a, $b) {
        return $a['persent'] < $b['persent'];
    });
    $string = '<table class="table table-condensed table-striped" style="margin:1px;">';
    foreach ($persent as $per) {
        $string .='<tr>
        <td>'.$per['gaya'].'</td>
        <th><span class="">'.$per['persent'].' %</span></th>
      </tr>';
      
    }
    $string .= ' </table>';
    if($plain_text)
        return $persent;
    return $string;
}
