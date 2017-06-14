<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_peserta_aktif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_check_auth();
        $this->_cek_akses();
        $this->load->model('peserta_aktif_model','mm');
    }

    function index()
    {
        $data['ch'] = 'Modul Peserta Aktif';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_peserta_aktif/home', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    public function ajax_list()
    {
        $list = $this->mm->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $peserta_aktif) {
            $no++;
            $row = array();
            $row[] = '<div class="uk-text-center">'.$no.'</div>';
            $row[] = $peserta_aktif->peserta_nama;
            $row[] = $peserta_aktif->peserta_hp;
            $row[] = $peserta_aktif->itikaf_mulai;
            $row[] = $peserta_aktif->konsumsi_ket;
            $row[] = $peserta_aktif->peserta_foto;
            $row[] = $peserta_aktif->peserta_ktp;
            $row[] = "
                <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                    <a href=\"".site_url("cpanel_peserta_aktif/edit_data/".$peserta_aktif->peserta_id)."\" class=\"btn btn-primary btn-flat btn-xs\">Edit</a>
                    <button type=\"button\" title=\"Hapus Data\" class=\"btn btn-primary btn-flat btn-xs\" onClick=\"deleteItem('".$peserta_aktif->peserta_id."','".$peserta_aktif->peserta_nama."');\">Delete</button>
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

        $data['ch'] = 'Modul Peserta Aktif';
        $data['cho'] = 'Tambah Data';
        $this->load->view('template/header_cpanel', $data);
        $this->load->view('cpanel_peserta_aktif/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function edit_data($id)
    {
        $this->_cek_update();

        if ( ! is_null($id))
        {
            $data['ch'] = 'Modul Peserta Aktif';
            $data['cho'] = 'Edit Data';
            $data["res_kota"] = $this->mm->get_kota();
            $data["res_ki"] = $this->mm->get_kartu_identitas();
            $data['res_peserta'] = $this->mm->get_detail_peserta("peserta_id=".$id);
            $this->load->view('template/header_cpanel', $data);
            $this->load->view('cpanel_peserta_aktif/form', $data);
            $this->load->view('template/footer_cpanel', $data);
        }
    }

    function hapus_data($id)
    {
        $this->_cek_delete();

        // hapus di table peserta_aktif
        $this->mm->delete_peserta($id);

        // hapus di table itikaf
        $this->mm->delete_itikaf($id);

        //hapus di table user
        $this->mm->delete_user($id);

        redirect('cpanel_peserta_aktif');
    }

    function simpan()
    {
        // var_dump($this->input->post());exit;
        $peserta_aktif_id = $this->input->post('peserta_aktif_id');
        $peserta_aktif_nama = trim($this->input->post('peserta_aktif_nama'));
        $peserta_aktif_sex = $this->input->post('peserta_aktif_sex');
        $peserta_aktif_tempat_lahir = trim($this->input->post('peserta_aktif_tempat_lahir'));
        $peserta_aktif_thn_lahir = $this->input->post('peserta_aktif_thn_lahir');
        $peserta_aktif_bln_lahir = $this->input->post('peserta_aktif_bln_lahir');
        $peserta_aktif_tgl_lahir = $this->input->post('peserta_aktif_tgl_lahir');
        $peserta_aktif_status_pernikahan = $this->input->post('peserta_aktif_status_pernikahan');
        $peserta_aktif_alamat = trim($this->input->post('peserta_aktif_alamat'));
        $peserta_aktif_kota = $this->input->post('peserta_aktif_kota');
        $peserta_aktif_kartu_identitas = $this->input->post('peserta_aktif_kartu_identitas');
        $peserta_aktif_no_kartu_identitas = trim($this->input->post('peserta_aktif_no_kartu_identitas'));
        $peserta_aktif_email = strtolower(trim($this->input->post('peserta_aktif_email')));
        $peserta_aktif_website = strtolower($this->input->post('peserta_aktif_website'));
        $peserta_aktif_telepon = trim($this->input->post('peserta_aktif_telepon'));
        $peserta_aktif_hp = trim($this->input->post('peserta_aktif_hp'));
        $peserta_aktif_pendidikan = trim($this->input->post('peserta_aktif_pendidikan'));
        $peserta_aktif_jurusan = trim($this->input->post('peserta_aktif_jurusan'));
        $peserta_aktif_organisasi = trim($this->input->post('peserta_aktif_organisasi'));
        $peserta_aktif_posisi = trim($this->input->post('peserta_aktif_posisi'));
        $peserta_aktif_foto = $this->input->post('peserta_aktif_foto');
        $peserta_aktif_ktp = $this->input->post('peserta_aktif_ktp');

        // validasi tanggal lahir
        $check_date = checkdate($peserta_aktif_bln_lahir, $peserta_aktif_tgl_lahir, $peserta_aktif_thn_lahir);
        if ($check_date === FALSE)
        {
            redirect('pendaftaran');
        }
        else
        {
            $peserta_aktif_tanggal_lahir = $peserta_aktif_thn_lahir."-".$peserta_aktif_bln_lahir."-".$peserta_aktif_tgl_lahir;
        }

        $data_peserta_aktif['peserta_aktif_nama'] = $peserta_aktif_nama;
        $data_peserta_aktif['peserta_aktif_sex'] = $peserta_aktif_sex;
        $data_peserta_aktif['peserta_aktif_tempat_lahir'] = $peserta_aktif_tempat_lahir;
        $data_peserta_aktif['peserta_aktif_tanggal_lahir'] = $peserta_aktif_tanggal_lahir;
        $data_peserta_aktif['peserta_aktif_status_pernikahan'] = $peserta_aktif_status_pernikahan;
        $data_peserta_aktif['peserta_aktif_alamat'] = $peserta_aktif_alamat;
        $data_peserta_aktif['peserta_aktif_kota'] = $peserta_aktif_kota;
        $data_peserta_aktif['peserta_aktif_kartu_identitas'] = $peserta_aktif_kartu_identitas;
        $data_peserta_aktif['peserta_aktif_no_kartu_identitas'] = $peserta_aktif_no_kartu_identitas;
        $data_peserta_aktif['peserta_aktif_email'] = $peserta_aktif_email;
        $data_peserta_aktif['peserta_aktif_telepon'] = $peserta_aktif_telepon;
        $data_peserta_aktif['peserta_aktif_hp'] = $peserta_aktif_hp;
        $data_peserta_aktif['peserta_aktif_pendidikan'] = $peserta_aktif_pendidikan;
        $data_peserta_aktif['peserta_aktif_jurusan'] = $peserta_aktif_jurusan;
        $data_peserta_aktif['peserta_aktif_organisasi'] = $peserta_aktif_organisasi;
        $data_peserta_aktif['peserta_aktif_posisi'] = $peserta_aktif_posisi;
        $data_peserta_aktif['peserta_aktif_update_date'] = date('Y-m-d H:i:s');

        // simpan data baru
        if ($this->input->post('simpan') === "ubah")
        {
            $this->_cek_update();

            // ubah data table peserta_aktif
            $this->mm->update_peserta_aktif($peserta_aktif_id, $data_peserta_aktif);

            redirect('cpanel_peserta_aktif');
        }
        // access function without click the button #sok_bahasa_inggris
        else
        {
            redirect('cpanel_peserta_aktif');
        }

    }

    function export_xls()
    {
        $data["res_peserta"] = $this->mm->get_peserta();
        // var_dump($data["res_siswa"]);exit;

        $this->load->view("cpanel_peserta_aktif/excell", $data);
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
        $arr_where["menu_url"] = "cpanel_peserta_aktif";

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
        $arr_where["menu_url"] = "cpanel_peserta_aktif";

        $result = $this->am->get_ha("ha_insert", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_insert === "0" OR $result === FALSE)
        {
            redirect("cpanel_peserta_aktif");
        }
    }

    private function _cek_update()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_peserta_aktif";

        $result = $this->am->get_ha("ha_update", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_update === "0" OR $result === FALSE)
        {
            redirect("cpanel_peserta_aktif");
        }
    }

    private function _cek_delete()
    {
        $this->load->model('auth_model', 'am');
        $arr_where["ha_ur"] = $this->session->userdata("userUr");
        $arr_where["menu_url"] = "cpanel_peserta_aktif";

        $result = $this->am->get_ha("ha_delete", $arr_where);
        // var_dump($result);echo $result;exit;
        if ($result->ha_delete === "0" OR $result === FALSE)
        {
            redirect("cpanel_peserta_aktif");
        }
    }
}
