<?php

defined('BASEPATH') OR exit('No akeses');

class admin_model extends CI_Model
{
    public function ambil_admin(){
        return $this->db->select('id_admin,nama_admin,username')
                        ->get('admin')
                        ->result();
    }

    public function cek_admin($username, $password)
    {
        return $this->db->get_where('admin', array('username' => $username, 'password' => md5($password)))->row_array();
    }

    public function tambah_admin($nama_admin, $username, $password)
    {
        $this->db->insert('admin', array('nama_admin' => $nama_admin,
                        'username' => $username,
                        'password' => md5($password)));

    if ($this->db->affected() > 0) {
        return 'Berhasil';
    } else {
        return 'Gagal';
    }
  }

    public function update_nama_user_admin($id_admin, $nama_admin)
    {
        $this->db->where(
            array(
                'id_admin' => $id_admin
            ))
            ->update('admin', array('nama_admin' => $nama_admin));

        if ($this->db->affected_rows() > 0) {
            return 'Berhasil';
        } else {
            return 'Gagal';
        }
    }

    public function update_password($password_lama, $password_baru)
    {
        $this->db->where(
            array(
                'password' => md5($password_lama),
                'id_admin' => $this->session->userdata('id_admin')
            ))
            ->update('admin', array('password' => md5($password_baru)));

        if ($this->db->affected_rows() > 0) {
            return 'Berhasil';
        } else {
            return 'Gagal';
        }
    }

    public function delete_admin($id_admin)
    {
        $this->db->delete('admin', array('id_admin' => $id_admin));

        if ($this->db->affected_rows() > 0) {
            return 'Berhasil';
        } else {
            return 'Gagal';
        }
    }
}
