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
        $this->load->model('auth_model');
		if($this->input->post('btn_login') === 'btn_login')
		{
            if ($this->input->post('txt_user_name') != "")
            {

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
            elseif ($this->input->post('txt_email') != "")
            {
                $email = $this->input->post('txt_email');
                // cek email
                $cek_email = $this->auth_model->cek_email($email)->row();
                if (empty($cek_email))
                {
                    ?>
                    <script>
                    alert("Email tidak terdaftar!");
                    </script>
                    <?php
                    $this->index();
                }
                else
                {
                    // var_dump($cek_email);exit;
                    // reset passwordnya
                    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                    $pass = array();
                    $alphaLength = strlen($alphabet) - 1;
                    for ($i = 0; $i < 8; $i++) {
                        $n = rand(0, $alphaLength);
                        $pass[$i] = $alphabet[$n];
                    }
                    // echo implode($pass);
                    $data_user['user_password'] = password_hash(implode($pass), PASSWORD_DEFAULT);
                    $where_user["user_peserta"] = $cek_email->peserta_id;
                    $this->auth_model->update_users($where_user, $data_user);

                    // kirim email ke orangnya
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'ajahtara@gmail.com', // change it to yours
                        'smtp_pass' => 'Anugr4hny4En1', // change it to yours
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE
                    );
                    $message = 'Password : '.implode($pass);
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('ajahtara@gmail.com'); // change it to yours
                    $this->email->to($email);// change it to yours
                    $this->email->subject('Reset Password mutan.or.id');
                    $this->email->message($message);
                    if($this->email->send())
                    {
                        ?>
                        <script type="text/javascript">
                            alert("Silahkan cek email <?php echo $email; ?>");
                        </script>
                        <?php
                        $this->index();
                    }
                    else
                    {
                        ?>
                        <script type="text/javascript">
                            alert("Gagal kirim email");
                        </script>
                        <?php
                        $this->index();
                    }
                }
            }
            else
            {
                $this->index();
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
