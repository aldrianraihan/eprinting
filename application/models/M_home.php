<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    function cek_login($username)
    {
        $query = $this->db->query(
            "SELECT * FROM user_pengguna WHERE username = '$username'"
        );
        return $query;
    }

    function parameter($jenis_cetak)
    {
        $query = $this->db->query(
            "SELECT * FROM parameter WHERE jenis_cetak = '$jenis_cetak' GROUP BY jenis_kertas"
        );
        return $query->result();
    }

    function last_code()
    {
        $query = $this->db->query(
            "SELECT MAX(kode) AS last_code, MAX(date_order) AS date_order FROM trx_print"
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

    function parameter3($jenis_cetak, $bw_color)
    {
        $query = $this->db->query(
            "SELECT * FROM parameter WHERE jenis_cetak = '$jenis_cetak' AND bw_color = '$bw_color'"
        );
        return $query->result();
    }

    function trx($kode)
    {
        $query = $this->db->query(
            "SELECT tp.id_trx, tp.kode, p.jenis_cetak, p.jenis_kertas, p.bw_color, p.harga, tp.jilid, tp.jumlah_halaman, tp.jumlah, tp.total_harga, tp.kekurangan_harga, tp.date_order, tp.nama_file, tp.lok_file, tp.payment, CASE WHEN tp.stat_payment = 'done' THEN 'lunas' WHEN tp.stat_payment = 'menunggu pembayaran' THEN 'menunggu pembayaran' ELSE '' END AS stat_payment, tp.panjang, tp.lebar FROM trx_print tp LEFT JOIN parameter p ON tp.id_parameter = p.id_parameter WHERE tp.kode = $kode"
        );
        return $query->result();
    }

    function trx2($kode)
    {
        $query = $this->db->query(
            "SELECT tp.id_trx, tp.kode, p.jenis_cetak, p.jenis_kertas, p.bw_color, p.harga, tp.jilid, tp.jumlah_halaman, tp.jumlah, tp.total_harga, tp.kekurangan_harga, tp.date_order, tp.nama_file, tp.lok_file, tp.payment, CASE WHEN tp.stat_payment = 'done' THEN 'lunas' WHEN tp.stat_payment = 'menunggu pembayaran' THEN 'menunggu pembayaran' ELSE '' END AS stat_payment, tp.stat_print, tp.stat_cek, tp.stat_done FROM trx_print tp LEFT JOIN parameter p ON tp.id_parameter = p.id_parameter WHERE tp.kode = $kode"
        );
        return $query->result();
    }

    function delete_trx($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function insert_trx($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function update_trx($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
