<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('form_validation');

        if ($this->session->userdata('status') != "masuk") {
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu!');
            redirect(base_url());
        }

        if ($this->session->userdata('level') != "admin") {
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu!');
            redirect(base_url());
        }

        error_reporting(1);
        ini_set('display_errors', 1);
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    function index()
    {
        $data['progress'] = $this->m_admin->progress();

        $this->load->view('admin/header');
        $this->load->view('admin/home', $data);
    }

    function menu_printing()
    {
        $data['trx_print'] = $this->m_admin->trx_print();

        $this->load->view('admin/header');
        $this->load->view('admin/printing', $data);
    }

    function edit_printing()
    {
        $kode = $this->uri->segment(3);
        $data['trx_print'] = $this->m_admin->trx_print2($kode);
        $jenis_cetak = $data['trx_print'][0]->jenis_cetak;
        $data['parameter'] = $this->m_admin->parameter($jenis_cetak);

        $this->load->view('admin/header');
        $this->load->view('admin/edit_printing', $data);
    }

    function proses_edit_print()
    {
        $kode = $this->input->post('kode');
        $jumlah_halaman = $this->input->post('jumlah_halaman');
        $jumlah = $this->input->post('jumlah');
        $jenis_cetak = $this->input->post('jenis_cetak');
        $jenis_kertas = $this->input->post('jenis_kertas');
        $bw_color = $this->input->post('bw_color');
        $jilid = $this->input->post('jilid');
        $total_harga = $this->input->post('total_harga');
        $parameter = $this->m_admin->parameter2($jenis_cetak, $jenis_kertas, $bw_color);
        $harga = $parameter[0]->harga;

        if ($jilid == 1) {
            $harga_jilid = 3000;
        } else {
            $harga_jilid = 0;
        }

        $kekurangan_harga = (($harga * $jumlah_halaman * $jumlah) + ($harga_jilid * $jumlah)) - $total_harga;

        $data = array(
            'kekurangan_harga' => $kekurangan_harga
        );

        $where = array(
            'kode' => $kode
        );

        $this->db->trans_start();
        $this->m_admin->update_trx($where, $data, 'trx_print');
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            redirect('c_admin/menu_printing');
        } else {
            echo "<script>
              window.alert('Data gagal diupdate');
              javascript:window.history.go(-1);
              </script>";
        }
    }

    function ceklist_print()
    {
        $kode = $this->uri->segment('3');

        $data = array(
            'stat_print' => 0,
            'time_print' => date('Y-m-d h:i:s'),
            'stat_cek' => 1,
        );

        $where = array(
            'kode' => $kode
        );

        $this->db->trans_start();
        $this->m_admin->update_trx($where, $data, 'trx_print');
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            echo "<script>
              window.alert('Data berhasil diapprove');
              javascript:window.history.go(-1);
              </script>";
            redirect('c_admin/menu_printing');
        } else {
            echo "<script>
              window.alert('Data gagal diupdate');
              javascript:window.history.go(-1);
              </script>";
        }
    }

    function menu_checking()
    {
        $data['trx_print'] = $this->m_admin->trx_print_cek();

        $this->load->view('admin/header');
        $this->load->view('admin/checking', $data);
    }

    function payment_qr()
    {
        $kode = $this->uri->segment('3');
        $data['trx'] = $this->m_admin->trx_print2($kode);

        $this->load->view('admin/header');
        $this->load->view('admin/payment_qr', $data);
    }

    function upload_bukti_bayar()
    {
        $kode = $this->input->post('kode');
        $kekurangan_harga = $this->input->post('kekurangan_harga');
        $total_harga = $this->input->post('total_harga');
        $final_harga = $kekurangan_harga + $total_harga;
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_loc = '.uploads/' . $kode . '-kb-' . $file_name;
        $allowed_types = array('jpeg', 'jpg', 'png', '');
        $max_size = 3072000;

        $config['upload_path']          = 'uploads/';
        $config['overwrite']            = true;
        $config['file_name']            = $kode . '-kb-' . $file_name;
        $config['allowed_types']        = 'jpeg|jpg|png|docx|doc|xls|xlsx|pdf';
        $config['max_size']             = 3072000;

        $data = array(
            'stat_cek' => 0,
            'time_cek' => date('Y-m-d h:i:s'),
            'stat_done' => 1,
            'time_done' => date('Y-m-d h:i:s'),
            'total_harga' => $final_harga,
            'kekurangan_harga' => 0
        );

        $where = array(
            'kode' => $kode
        );

        if (in_array($ext, $allowed_types)) {
            if ($file_size < $max_size) {
                $this->db->trans_start();
                $this->m_admin->update_trx($where, $data, 'trx_print');
                $this->db->trans_complete();
                $this->load->library('upload', $config);

                if ($this->db->trans_status() === TRUE && $this->upload->do_upload('file')) {
                    redirect('c_admin/menu_checking/');
                } else {
                    echo "<script>
              window.alert('Data gagal diupdate');
              javascript:window.history.go(-1);
              </script>";
                }
            } else {
                echo "<script>
            window.alert('Ukuran file melebihi 3 MB');
            javascript:window.history.go(-1);
            </script>";
            }
        } else {
            echo "<script>
          window.alert('Format file yang diizinkan hanya jpeg, jpg, png, docx, doc, xls, xlsx, pdf');
          javascript:window.history.go(-1);
          </script>";
        }
    }

    function ceklist_check()
    {
        $kode = $this->uri->segment('3');

        $data = array(
            'stat_cek' => 0,
            'time_cek' => date('Y-m-d h:i:s'),
            'stat_done' => 1,
            'time_done' => date('Y-m-d h:i:s'),
        );

        $where = array(
            'kode' => $kode
        );

        $this->db->trans_start();
        $this->m_admin->update_trx($where, $data, 'trx_print');
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            echo "<script>
              window.alert('Data berhasil diapprove');
              javascript:window.history.go(-1);
              </script>";
            redirect('c_admin/menu_checking');
        } else {
            echo "<script>
              window.alert('Data gagal diupdate');
              javascript:window.history.go(-1);
              </script>";
        }
    }

    function menu_done()
    {
        $data['trx_print'] = $this->m_admin->trx_done();

        $this->load->view('admin/header');
        $this->load->view('admin/done', $data);
    }

    function download()
    {
        $this->load->helper('file');
        $kode = $this->uri->segment(3);
        $data['trx_print'] = $this->m_admin->trx_print2($kode);
        $file_name = str_replace(" ", "_", $data['trx_print'][0]->nama_file);
        $loc = file_get_contents(base_url() . "uploads/" . $kode . '-' . $file_name);
        $name = $kode . '-' . $data['trx_print'][0]->nama_file;
        // print_r(base_url() . "uploads/" . $kode . '-' . $file_name);
        force_download($name, $loc);
    }
}
