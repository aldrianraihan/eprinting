<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_home');
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
    $this->load->view('home');
  }

  function proses_login()
  {
    // $username = $this->input->post('username');
    // $password = $this->input->post('password');
    // $password_hash = password_hash($password, PASSWORD_DEFAULT);
    // $login = $this->input->post('login');
    // $result_query = $this->m_home->cek_login($username);
    // $cek = $result_query->num_rows();
    // $result = $result_query->result();

    // if (isset($login)) {
    //   if ($cek > 0) {
    //     if (password_verify($password, $result[0]->password)) {
    //       $this->session->set_userdata('status', 'masuk');
    //       $this->session->set_userdata('username', $result[0]->username);
    //       $this->session->set_userdata('level', $result[0]->level);

    //       echo "<script>alert('Selamat login berhasil')</script>";
    //       redirect('c_user');
    //     } else {
    //       echo "<script>alert('Password salah')</script>";
    //       $this->load->view('home');
    //     }
    //   } else {
    //     echo "<script>alert('Username salah')</script>";
    //     $this->load->view('home');
    //   }
    // }
  }

  function cek()
  {
    $data['jenis_cek'] = $this->uri->segment('3');

    if (!empty($this->input->get('search'))) {
      $kode = $this->input->get('no_order');
      $data['trx2'] = $this->m_home->trx2($kode);
    }

    $this->load->view('user/header');
    $this->load->view('user/cek', $data);
  }

  function cetak()
  {
    $data['jenis_cetak'] = $this->uri->segment('3');
    $data['parameter'] = $this->m_home->parameter($data['jenis_cetak']);

    $this->load->view('user/header');
    $this->load->view('user/cetak', $data);
  }

  function insert_trx()
  {
    $last_code = $this->m_home->last_code();
    if (date('Y-m-d', strtotime(substr($last_code[0]->date_order, 0, 10))) == date('Y-m-d')) {
      $last_digit = sprintf("%03s", substr($last_code[0]->last_code, 6, 3) + 1);
      $kode = date('ymd') . $last_digit;
    } else {
      $kode = date('ymd') . sprintf("%03s", 1);
    }

    $jenis_cetak = $this->input->post('jenis_cetak');
    $jenis_kertas = $this->input->post('jenis_kertas');
    $bw_color = $this->input->post('bw_color');
    $halaman_file = $this->input->post('halaman_file');
    $halaman_akhir = $this->input->post('halaman_akhir');
    $halaman_awal = $this->input->post('halaman_awal');
    $panjang = $this->input->post('panjang');
    $lebar = $this->input->post('lebar');
    $jilid = $this->input->post('jilid');
    $jumlah = $this->input->post('jumlah');
    $submit = $this->input->post('submit');
    if ($jenis_kertas <> '') {
      $parameter = $this->m_home->parameter2($jenis_cetak, $jenis_kertas, $bw_color);
    } else {
      $parameter = $this->m_home->parameter3($jenis_cetak, $bw_color);
    }
    $harga = $parameter[0]->harga;
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_loc = '.uploads/' . $kode . '-' . $file_name;
    $allowed_types = array('jpeg', 'jpg', 'png', 'docx', 'doc', 'xls', 'xlsx', 'pdf', '');
    $max_size = 2048000;

    $config['upload_path']          = 'uploads/';
    $config['overwrite']            = true;
    $config['file_name']            = $kode . '-' . $file_name;
    $config['allowed_types']        = 'jpeg|jpg|png|docx|doc|xls|xlsx|pdf';
    $config['max_size']             = 2048000;

    if ($halaman_file == 'halaman') {
      $jumlah_halaman = $halaman_akhir - $halaman_awal + 1;
    } elseif ($halaman_file == 'file') {
      $jumlah_halaman = $this->input->post('jumlah_halaman');
    } else {
      $jumlah_halaman = 0;
    }

    if ($jilid == 1) {
      $harga_jilid = 3000;
    } else {
      $harga_jilid = 0;
    }

    if ($jenis_cetak == 'dokumen') {
      $total_harga = ($harga * $jumlah_halaman * $jumlah) + ($harga_jilid * $jumlah);
    } elseif ($jenis_cetak == 'poster') {
      $total_harga = $harga * $jumlah;
    } elseif ($jenis_cetak == 'banner') {
      $total_harga = ($panjang * $lebar) * $harga * $jumlah;
    } else {
      $total_harga = 0;
    }

    $data = array(
      'kode' => $kode,
      'id_parameter' => $parameter[0]->id_parameter,
      'jilid' => $jilid,
      'jumlah_halaman' => $jumlah_halaman,
      'jumlah' => $jumlah,
      'total_harga' => $total_harga,
      'date_order' => date('Y-m-d H:i:s'),
      'nama_file' => $file_name,
      'size_file' => $file_size,
      'lok_file' => $file_loc,
      'payment' => '',
      'stat_payment' => '',
      'time_payment' => ''
    );

    $where = array(
      'kode' => $kode,
      'id_parameter' => $parameter[0]->id_parameter
    );

    if (isset($submit)) {
      if ($halaman_file == 'file' && $jumlah_halaman == '') {
        echo "<script>
        window.alert('Field jumlah halaman tidak boleh kosong');
        javascript:window.history.go(-1);
        </script>";
      } elseif ($halaman_file == 'halaman' && $halaman_awal == '' && $halaman_akhir == '') {
        echo "<script>
        window.alert('Field halaman awal/halaman akhir tidak boleh kosong');
        javascript:window.history.go(-1);
        </script>";
      } else {
        if (in_array($ext, $allowed_types)) {
          if ($file_size < $max_size) {
            $this->m_home->delete_trx($where, 'trx_print');
            $this->m_home->insert_trx($data, 'trx_print');
            $this->load->library('upload', $config);

            if ($this->db->affected_rows() > 0 && $this->upload->do_upload('file')) {
              redirect('c_home/confirm/' . $kode);
            } else {
              echo "<script>
              window.alert('Data gagal ditambah');
              javascript:window.history.go(-1);
              </script>";
            }
          } else {
            echo "<script>
            window.alert('Ukuran file melebihi 2 MB');
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
    }
  }

  function confirm()
  {
    $kode = $this->uri->segment('3');
    $data['trx'] = $this->m_home->trx($kode);

    $this->load->view('user/header');
    $this->load->view('user/confirm', $data);
  }

  function payment()
  {
    $kode = $this->input->post('kode');
    $payment = $this->input->post('payment');
    $stat_payment = $this->input->post('stat_payment');
    $submit = $this->input->post('submit');

    if (isset($submit)) {
      $data = array(
        'payment' => $payment,
        'stat_payment' => $stat_payment
      );

      $where = array(
        'kode' => $kode
      );

      $this->db->trans_start();
      $this->m_home->update_trx($where, $data, 'trx_print');
      $this->db->trans_complete();

      if ($this->db->trans_status() === TRUE) {
        redirect('c_home/payment_qr/' . $kode);
      } else {
        echo "<script>
              window.alert('Data gagal diupdate');
              javascript:window.history.go(-1);
              </script>";
      }
    }
  }

  function payment_qr()
  {
    $data['kode'] = $this->uri->segment('3');

    $this->load->view('user/header');
    $this->load->view('user/payment_qr', $data);
  }

  function upload_bukti_bayar()
  {
    $kode = $this->input->post('kode');
    $stat_payment = $this->input->post('stat_payment');
    $time = $this->input->post('time');
    $submit = $this->input->post('submit');
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_loc = '.uploads/' . $kode . 'bb';
    $allowed_types = array('jpeg', 'jpg', 'png', '');
    $max_size = 3072000;

    $config['upload_path']          = 'uploads/';
    $config['overwrite']            = true;
    $config['file_name']            = $kode . '-' . $file_name;
    $config['allowed_types']        = 'jpeg|jpg|png|docx|doc|xls|xlsx|pdf';
    $config['max_size']             = 3072000;

    $data = array(
      'stat_payment' => $stat_payment,
      'time_payment' => $time,
      'nama_file_bb' => $file_name,
      'size_file_bb' => $file_size,
      'lok_file_bb' => $file_loc
    );

    $where = array(
      'kode' => $kode
    );

    if (isset($submit)) {
      if (in_array($ext, $allowed_types)) {
        if ($file_size < $max_size) {
          $this->db->trans_start();
          $this->m_home->update_trx($where, $data, 'trx_print');
          $this->db->trans_complete();
          $this->load->library('upload', $config);

          if ($this->db->trans_status() === TRUE && $this->upload->do_upload('file')) {
            redirect('c_home/done/' . $kode);
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
  }

  function done()
  {
    $data['kode'] = $this->uri->segment('3');
    $data['trx'] = $this->m_home->trx($data['kode']);

    $this->load->view('user/header');
    $this->load->view('user/done', $data);
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect('c_home');
  }
}
