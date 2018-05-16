<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
    /*
     *@author Zulyantara <zulyantara@gmail.com> 2014
     */

    function index($error = "")
    {
        if($this->session->userdata('is_logged_in') !== TRUE)
        {
			$data['error'] = $error;
            $this->load->view('login/home', $data);
        }
        else
        {
            redirect('cpanels');
        }
    }

    function validate_credential()
    {
		if($this->input->post('btn_login') === 'btn_login')
		{
			$this->load->model('auth_model');

			$query = $this->auth_model->validate($this->input->post('txt_user_name'), $this->input->post('txt_user_password'));

			if($query !== FALSE)
			{
                $date = new DateTime($query->peserta_insert_date);
				$data = array(
					'userId' => $query->user_id,
					'userName' => $query->user_username,
                    'userUr' => $query->user_ur,
					'urKet' => $query->ur_ket,
					'userNama' => $query->peserta_nama == "" ? "Administrator" : $query->peserta_nama,
                    'userEmail' => $query->peserta_email,
                    'pesertaId' => $query->peserta_id,
                    'pesertaFoto' => $query->peserta_foto,
                    'pesertaKtp' => $query->peserta_ktp,
                    'pesertaCreate' => $date->format('F Y'),
					'is_logged_in' => TRUE
				);

				$this->session->set_userdata($data);
				redirect("cpanels");
			}
			else
			{
				$this->index("<div class=\"alert alert-danger\">Username atau Password salah</div>");
			}
		}
		else
		{
			$this->index();
		}
    }

    function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

    function form()
    {
        $this->load->model('master_model');
        $data["panel_title"] = "User ".$this->session->userdata('userNama')." | Ubah Password";

        $this->load->view('template/header_cpanel', $data);
        $this->load->view('login/form', $data);
        $this->load->view('template/footer_cpanel', $data);
    }

    function simpan()
    {
        $this->load->model('auth_model', 'am');

        $btn = $this->input->post('simpan');
        $password_old = $this->input->post('password_old');
        $password_new = $this->input->post('password_new');

        if ($btn === "ubah_password")
        {
            // check old password
            $chk_password = $this->am->check_password($password_old);

            // jika password_old = user_password maka lanjutkan gan
            if ($chk_password === TRUE)
            {
                $data_user['user_password'] = password_hash($password_new, PASSWORD_DEFAULT);
                $this->am->update_password($data_user);
                redirect('auth/form');
            }
            elseif ($chk_password === FALSE)
            {
                redirect('cpanels');
            }
            else
            {
                redirect('cpanels');
            }
        }
        else
        {
            redirect('cpanels');
        }
    }
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
