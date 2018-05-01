<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel_profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_model',"pm");
    }

    function index()
    {

    }
}
