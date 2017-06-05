<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('menu_model','mm');
    }

    function index()
    {
        $data['ch'] = 'Modul Menu';
        // $data["cho"] = "Dashboard I'tikaf";
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_menu/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $menu) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $menu->menu_ket;
            $row[] = $menu->menu_ket_parent;
            $row[] = $menu->menu_url;
            $row[] = "<div class=\"uk-text-center\">".$menu->menu_order."</div>";
            $row[] = "
                <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                    <a href=\"".site_url("cpanel_menu/edit_data/".$menu->menu_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs\" onClick=\"deleteItem('".$menu->menu_id."','".$menu->menu_ket."');\">Delete</button>
                </div>";

            $data[] = $row;
        }

        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->mm->count_all(),
                        "recordsFiltered" => $this->mm->count_filtered($this->input->post()),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function tambah_data()
    {
        $this->_cek_insert();

        $data['ch'] = 'Modul Menu ';
        $data["cho"] = "Tambah Data";
        $data['res_menu_child'] = $this->mm->get_menu_child();
        $data['res_ur'] = $this->mm->get_ur();
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_menu/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul Menu';
            $data["cho"] = "Edit Data";
            $data['res_menu'] = $this->mm->get_menu_by_id($id);
            $data['res_menu_child'] = $this->mm->get_menu_child();
            $data['res_ur'] = $this->mm->get_ur();
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_menu/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table menu
        $this->mm->delete_menu($id);
        redirect('cpanel_menu');
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $menu_id = $this->input->post('menu_id');
        $menu_ket = $this->input->post('menu_ket');
        $menu_parent = $this->input->post('menu_parent');
        $menu_url = $this->input->post('menu_url');
        $menu_order = $this->input->post('menu_order');

        $ha_view = $this->input->post('chk_view');
        $ha_insert = $this->input->post('chk_insert');
        $ha_update = $this->input->post('chk_update');
        $ha_delete = $this->input->post('chk_delete');
        $ur_id = $this->input->post('ur_id');

        $data_menu['menu_ket'] = strtolower($menu_ket);
        $data_menu['menu_parent'] = $menu_parent;
        $data_menu['menu_url'] = strtolower($menu_url);
        $data_menu['menu_order'] = $menu_order;

        // simpan data baru
        if ($this->input->post('simpan') === "simpan")
        {
            $this->_cek_insert();

            // simpan ke table menu
            $this->mm->save_menu($data_menu);

            // ambil menu_id
            $row_menu = $this->mm->get_detail_menu($data_menu);
            $id_menu = $row_menu->menu_id;

            // simpan ke table hak_akses
            for ($i = reset($ur_id); $i <= count($ur_id); $i++)
            {
                $arr_data_ha["ha_view"] = is_null($ha_view) ? 0: (array_key_exists($i, $ha_view) ? $ha_view[$i] : 0);
                $arr_data_ha["ha_insert"] = is_null($ha_insert) ? 0: (array_key_exists($i, $ha_insert) ? $ha_insert[$i] : 0);
                $arr_data_ha["ha_update"] = is_null($ha_update) ? 0 : (array_key_exists($i, $ha_update) ? $ha_update[$i] : 0);
                $arr_data_ha["ha_delete"] = is_null($ha_delete) ? 0 : (array_key_exists($i, $ha_delete) ? $ha_delete[$i] : 0);
                $arr_data_ha["ha_ur"] = is_null($ur_id) ? "" : (array_key_exists($i, $ur_id) ? $ur_id[$i] : "");
                $arr_data_ha["ha_menu"] = $id_menu;

                $this->mm->save_ha($arr_data_ha);
            }
            redirect('cpanel_menu');
        }
        // update data
        elseif ($this->input->post('simpan') === "ubah")
        {
            $this->_cek_update();

            // ubah data table menu
            $this->mm->update_menu($menu_id, $data_menu);

            // simpan ke table hak_akses
            for ($i = reset($ur_id); $i <= count($ur_id); $i++)
            {
                $arr_data_ha["ha_view"] = is_null($ha_view) ? 0: (array_key_exists($i, $ha_view) ? $ha_view[$i] : 0);
                $arr_data_ha["ha_insert"] = is_null($ha_insert) ? 0: (array_key_exists($i, $ha_insert) ? $ha_insert[$i] : 0);
                $arr_data_ha["ha_update"] = is_null($ha_update) ? 0 : (array_key_exists($i, $ha_update) ? $ha_update[$i] : 0);
                $arr_data_ha["ha_delete"] = is_null($ha_delete) ? 0 : (array_key_exists($i, $ha_delete) ? $ha_delete[$i] : 0);
                // $arr_data_ha["ha_ur"] = is_null($ur_id) ? "" : (array_key_exists($i, $ur_id) ? $ur_id[$i] : "");

                // cek apakah data ada di table hak akses?
                $arr_check["ha_menu"] = $menu_id;
                $arr_check["ha_ur"] = $ur_id[$i];
                $cek_ha = $this->mm->count_data("hak_akses", $arr_check);
                // echo $cek_ha;

                if ($cek_ha === 0)
                {
                    $arr_data_ha["ha_menu"] = $menu_id;
                    $arr_data_ha["ha_ur"] = $ur_id[$i];
                    $this->mm->save_ha($arr_data_ha);
                }
                else
                {
                    $where_ha["ha_menu"] = $menu_id;
                    $where_ha["ha_ur"] = $ur_id[$i];
                    // echo $this->db->where("ha_menu=$menu_id AND ha_ur=$ur_id[$i]")->set($arr_data_ha)->get_compiled_update("hak_akses");exit;
                    $this->mm->update_ha($where_ha, $arr_data_ha);
                }
            }
            redirect('cpanel_menu');
        }
        // access function without click the button #sok_bahasa_inggris
        else
        {
            redirect('cpanel_menu');
        }

    }

    private function _check_auth()
    {
        if ($this->session->userdata('is_logged_in') !== TRUE)
        {
            redirect('auth');
        }
    }

    private function _cek_akses()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_menu";

        $result = $this->am->get_ha("ha_view", $arr_where);
        // var_dump($result);

        if ($result->ha_view === "0" OR $result === FALSE)
        {
            redirect("cpanels");
        }
    }

    private function _cek_insert()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_menu";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_menu");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_menu";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_menu");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_menu";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_menu");
        }
    }
}
