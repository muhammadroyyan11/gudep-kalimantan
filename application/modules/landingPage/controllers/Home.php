<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'PRAMUKA BULUNGAN'
        ];
        // var_dump($data);
        $this->frontend->load('landingPage/template', 'landingPage/home/home', $data);
    }
}