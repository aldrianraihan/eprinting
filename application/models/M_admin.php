<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    function progress()
    {
        $query = $this->db->query(
            "SELECT SUM(tp.stat_print) AS c_stat_print, SUM(tp.stat_cek) AS c_stat_cek, SUM(tp.stat_done) AS c_stat_done FROM trx_print tp LEFT JOIN parameter p ON p.id_parameter = tp.id_parameter WHERE tp.stat_payment = 'done'"
        );
        return $query->result();
    }

    function trx_print()
    {
        $query = $this->db->query(
            "SELECT tp.kode, p.jenis_cetak, p.jenis_kertas, p.bw_color, p.harga, tp.jilid, tp.jumlah_halaman, tp.jumlah, tp.total_harga, tp.kekurangan_harga, tp.date_order, tp.nama_file, tp.lok_file FROM trx_print tp LEFT JOIN parameter p ON tp.id_parameter = p.id_parameter WHERE stat_payment = 'done' AND stat_print = 1"
        );
        return $query->result();
    }

    function trx_print2($kode)
    {
        $query = $this->db->query(
            "SELECT tp.kode, p.jenis_cetak, p.jenis_kertas, p.bw_color, p.harga, tp.jilid, tp.jumlah_halaman, tp.jumlah, tp.total_harga, tp.kekurangan_harga, tp.date_order, tp.nama_file, tp.lok_file FROM trx_print tp LEFT JOIN parameter p ON tp.id_parameter = p.id_parameter WHERE tp.kode = $kode"
        );
        return $query->result();
    }

    function trx_print_cek()
    {
        $query = $this->db->query(
            "SELECT tp.kode, p.jenis_cetak, p.jenis_kertas, p.bw_color, p.harga, tp.jilid, tp.jumlah_halaman, tp.jumlah, tp.total_harga, tp.kekurangan_harga, tp.date_order, tp.nama_file, tp.lok_file FROM trx_print tp LEFT JOIN parameter p ON tp.id_parameter = p.id_parameter WHERE stat_payment = 'done' AND stat_cek = 1"
        );
        return $query->result();
    }

    function trx_done()
    {
        $query = $this->db->query(
            "SELECT tp.kode, p.jenis_cetak, p.jenis_kertas, p.bw_color, p.harga, tp.jilid, tp.jumlah_halaman, tp.jumlah, tp.total_harga, tp.kekurangan_harga, tp.date_order, tp.nama_file, tp.lok_file FROM trx_print tp LEFT JOIN parameter p ON tp.id_parameter = p.id_parameter WHERE stat_payment = 'done' AND stat_done = 1"
        );
        return $query->result();
    }

    function parameter($jenis_cetak)
    {
        $query = $this->db->query(
            "SELECT * FROM parameter WHERE jenis_cetak = '$jenis_cetak' GROUP BY jenis_kertas"
        );
        return $query->result();
    }

    function parameter2($jenis_cetak, $jenis_kertas, $bw_color)
    {
        $query = $this->db->query(
            "SELECT * FROM parameter WHERE jenis_cetak = '$jenis_cetak' AND jenis_kertas = '$jenis_kertas' AND bw_color = '$bw_color'"
        );
        return $query->result();
    }

    function update_trx($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
