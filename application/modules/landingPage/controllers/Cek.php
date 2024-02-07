<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load necessary libraries, helpers, etc. 
        $this->load->helper('cek_npsn');
    }

    public function index()
    {
        $npsn = $this->input->get('npsn');
        $schoolName = CekNpsn($npsn);
        
        echo $schoolName;
    }

}
