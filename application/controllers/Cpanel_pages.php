<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pages_model','mm');
        $this->load->model('auth_model');
        $this->_check_auth();
        $this->_cek_akses();
    }

    function index()
    {
        $data['ch'] = 'Modul Pages';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $pages) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $pages->pages_title;
            $row[] = "
                <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                    <a href=\"".site_url("cpanel_pages/edit_data/".$pages->pages_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs\" onClick=\"deleteItem('".$pages->pages_id."','".$pages->pages_title."');\">Delete</button>
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

        $data['ch'] = 'Modul Pages';
        $data['cho'] = 'Tambah Data';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('pages/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul Pages';
            $data['cho'] = 'Edit Data';
            $data['res_pages'] = $this->mm->get_detail_pages("pages_id=".$id);
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('pages/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table pages
        $this->mm->delete_pages($id);
        redirect("cpanel_pages");
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $pages_id = $this->input->post('pages_id');
        $pages_title = trim($this->input->post('pages_title'));
        $pages_content = htmlentities($this->input->post('pages_content'));

        $data_pages['pages_title'] = $pages_title;
        $data_pages["pages_slug"] = url_title($pages_title);
        $data_pages["pages_content"] = $pages_content;

        // simpan data baru
        if ($this->input->post('simpan') === "simpan")
        {
            $this->_cek_insert();

            // simpan ke table pages
            $data_pages["pages_insert_date"] = date("Y-m-d H:i:s");
            $this->mm->save_pages($data_pages);

            redirect("cpanel_pages");
        }
        // update data
        elseif ($this->input->post('simpan') === "ubah")
        {
            $this->_cek_update();

            // ubah data table pages
            $this->mm->update_pages($pages_id, $data_pages);

            redirect("cpanel_pages");
        }
        // access function without click the button #sok_bahasa_inggris
        else
        {
            redirect("cpanel_pages");
        }

    }

    public function view($slug = NULL)
    {
        $data['pages_item'] = $this->mm->get_pages($slug);

        if (empty($data['pages_item']))
        {
            show_404();
        }

        $data["row_logo"] = $this->mm->get_logo();
		$data["res_tm"] = $this->mm->get_tm();

        $data['title'] = $data['pages_item']['pages_title'];

        $this->load->view('template/header', $data);
        $this->load->view('pages/view', $data);
        $this->load->view('template/footer');
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
        $arr_where["menu_url"] = "cpanel_pages";

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
        $arr_where["menu_url"] = "cpanel_pages";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("pages");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_pages";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("pages");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_pages";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("pages");
        }
    }
}
