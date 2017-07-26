<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('peserta_model','mm');
        $this->load->model('master_model');
    }

    function index()
    {
        $data['ch'] = 'Modul Peserta';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_peserta/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $peserta) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $peserta->peserta_nama;
            $row[] = $peserta->peserta_hp;
            $row[] = $peserta->itikaf_mulai;
            $row[] = $peserta->konsumsi_ket;
            $row[] = $peserta->peserta_foto == "" ? "<div class=\"label label-warning\">Blm Upload Foto</div>" : "<div class=\"label label-success\">Sudah Upload Foto</div>";
            $row[] = $peserta->peserta_ktp == "" ? "<div class=\"label label-warning\">Blm Upload KTP</div>" : "<div class=\"label label-success\">Sudah Upload KTP</div>";
            $row[] = $peserta->status;
            $row[] = "
                <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                    <a href=\"".site_url("cpanel_peserta/edit_data/".$peserta->peserta_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs\" onClick=\"deleteItem('".$peserta->peserta_id."','".$peserta->peserta_nama."');\">Delete</button>
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

        $data['ch'] = 'Modul Peserta';
        $data['cho'] = 'Tambah Data';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_peserta/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul Peserta';
            $data['cho'] = 'Edit Data';
            $data["res_kota"] = $this->mm->get_kota();
            $data["res_ki"] = $this->mm->get_kartu_identitas();
            $data['res_peserta'] = $this->mm->get_detail_peserta("peserta_id=".$id);
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_peserta/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table peserta
        $this->mm->delete_peserta($id);

        // hapus di table itikaf
        $this->mm->delete_itikaf($id);

        //hapus di table user
        $this->mm->delete_user($id);

        redirect('cpanel_peserta');
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $peserta_id = $this->input->post('peserta_id');
        $peserta_nama = trim($this->input->post('peserta_nama'));
        $peserta_sex = $this->input->post('peserta_sex');
        $peserta_tempat_lahir = trim($this->input->post('peserta_tempat_lahir'));
        $peserta_thn_lahir = $this->input->post('peserta_thn_lahir');
        $peserta_bln_lahir = $this->input->post('peserta_bln_lahir');
        $peserta_tgl_lahir = $this->input->post('peserta_tgl_lahir');
        $peserta_status_pernikahan = $this->input->post('peserta_status_pernikahan');
        $peserta_alamat = trim($this->input->post('peserta_alamat'));
        $peserta_kota = $this->input->post('peserta_kota');
        $peserta_kartu_identitas = $this->input->post('peserta_kartu_identitas');
        $peserta_no_kartu_identitas = trim($this->input->post('peserta_no_kartu_identitas'));
        $peserta_email = strtolower(trim($this->input->post('peserta_email')));
        // $peserta_website = strtolower($this->input->post('peserta_website'));
        $peserta_telepon = trim($this->input->post('peserta_telepon'));
        $peserta_hp = trim($this->input->post('peserta_hp'));
        $peserta_pendidikan = trim($this->input->post('peserta_pendidikan'));
        $peserta_jurusan = trim($this->input->post('peserta_jurusan'));
        $peserta_organisasi = trim($this->input->post('peserta_organisasi'));
        $peserta_posisi = trim($this->input->post('peserta_posisi'));
        $peserta_foto = $this->input->post('peserta_foto');
        $peserta_ktp = $this->input->post('peserta_ktp');

        // validasi tanggal lahir
        $check_date = checkdate($peserta_bln_lahir, $peserta_tgl_lahir, $peserta_thn_lahir);
        if ($check_date === FALSE)
        {
            redirect('pendaftaran');
        }
        else
        {
            $peserta_tanggal_lahir = $peserta_thn_lahir."-".$peserta_bln_lahir."-".$peserta_tgl_lahir;
        }

        $data_peserta['peserta_nama'] = $peserta_nama;
        $data_peserta['peserta_sex'] = $peserta_sex;
        $data_peserta['peserta_tempat_lahir'] = $peserta_tempat_lahir;
        $data_peserta['peserta_tanggal_lahir'] = $peserta_tanggal_lahir;
        $data_peserta['peserta_status_pernikahan'] = $peserta_status_pernikahan;
        $data_peserta['peserta_alamat'] = $peserta_alamat;
        $data_peserta['peserta_kota'] = $peserta_kota;
        $data_peserta['peserta_kartu_identitas'] = $peserta_kartu_identitas;
        $data_peserta['peserta_no_kartu_identitas'] = $peserta_no_kartu_identitas;
        $data_peserta['peserta_email'] = $peserta_email;
        $data_peserta['peserta_telepon'] = $peserta_telepon;
        $data_peserta['peserta_hp'] = $peserta_hp;
        $data_peserta['peserta_pendidikan'] = $peserta_pendidikan;
        $data_peserta['peserta_jurusan'] = $peserta_jurusan;
        $data_peserta['peserta_organisasi'] = $peserta_organisasi;
        $data_peserta['peserta_posisi'] = $peserta_posisi;
        $data_peserta['peserta_update_date'] = date('Y-m-d H:i:s');

        // simpan data baru
        if ($this->input->post('simpan') === "ubah")
        {
            $this->_cek_update();

            // ubah data table peserta
            $this->mm->update_peserta($peserta_id, $data_peserta);

            redirect('cpanel_peserta');
        }
        // access function without click the button #sok_bahasa_inggris
        else
        {
            redirect('cpanel_peserta');
        }
    }

    function export_xls()
    {
        $data["res_peserta"] = $this->mm->get_peserta();
        // var_dump($data["res_siswa"]);exit;

        $this->load->view("cpanel_peserta/excell", $data);
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
        $arr_where["menu_url"] = "cpanel_peserta";

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
        $arr_where["menu_url"] = "cpanel_peserta";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_peserta");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_peserta";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_peserta");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_peserta";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_peserta");
        }
    }
}
