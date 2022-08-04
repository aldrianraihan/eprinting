<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('form_validation');

        error_reporting(1);
        ini_set('display_errors', 1);
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    function index()
    {
        $this->load->view('user/home');
    }

    function dokumen()
    {
        $this->load->view('user/header');
        $this->load->view('user/dokumen');
    }

    function poster()
    {
        echo 'Menu cetak poster';
    }

    function banner()
    {
        echo 'Menu cetak banner';
    }
}
