<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CekNPSNController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load necessary libraries, helpers, etc. 
        $this->load->helper('cek_npsn');
    }

    public function index()
    {
        $npsn = '30400391'; // Your NPSN value
        $schoolName = cekNPSN($npsn);
        
        echo $schoolName;
    }

}
