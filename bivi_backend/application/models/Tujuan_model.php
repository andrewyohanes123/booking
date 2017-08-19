<?php

defined('BASEPATH') OR exit('No akses');

class tujuan_model extends CI_Model
{

    public function ambil_semua_tujuan()
    {
        return $this->db->get_where('tujuan', array('status_tujuan' => 1))->result();
    }

    public function tambah_tujuan($tujuan)
    {
        $this->db->insert('tujuan', array('tujuan' => $tujuan, 'status_tujuan' => 1));

        if ($this->db->affected_rows() > 0) {
            return 'Berhasil';
        } else {
            return 'Gagal';
        }
    }

    public function hapus_tujuan($id)
    {
        $this->db->where(array('id_tujuan' => $id))
            ->update('tujuan', array('status_tujuan' => 0));

        if ($this->db->affected_rows() > 0) {
            return 'Berhasil';
        } else {
            return 'Gagal';
        }
    }

    public function update_tujuan($id_tujuan, $tujuan)
    {
        $this->db->where(array('id_tujuan' => $id_tujuan))
            ->update('tujuan', array('tujuan' => $tujuan));

        if ($this->db->affected_rows() > 0) {
            return 'Berhasil';
        } else {
            return 'Gagal';
        }

    }
}
