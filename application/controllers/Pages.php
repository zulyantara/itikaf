<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pages_model','mm');
        $this->load->model('auth_model');
    }

    public function view($slug = NULL)
    {
        $data['ch'] = 'Modul Pages';
        $data["row_logo"] = $this->mm->get_logo();
		$data["res_tm"] = $this->mm->get_tm();
		$data["res_fa"] = $this->mm->get_fa();

        $data['pages_item'] = $this->mm->get_pages($slug);

        if (empty($data['pages_item']))
        {
            show_404();
        }

        $data['title'] = $data['pages_item']['pages_title'];

        $this->load->view('template/header', $data);
        $this->load->view('pages/view', $data);
        $this->load->view('template/footer');
    }
}
