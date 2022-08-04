<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    function cek_login($username)
    {
        $query = $this->db->query(
            "SELECT * FROM user_pengguna WHERE username = '$username'"
        );
        return $query;
    }
}
