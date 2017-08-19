<?php

defined('BASEPATH') OR exit ('No akses');

class antri_model extends CI_Model
{

    public function ambil_antri_by_unique_id($data)
    {
        return $this->db->select('antri.nama,antri.ket_user,antri.tanggal,antri.jam,antri.ket_user,antri.unique_id,tujuan.tujuan')
            ->from('antri')
            ->join('tujuan', 'tujuan.id_tujuan = antri.id_tujuan')
            ->where(array('unique_id' => $data, 'status' => 0))
            ->get()
            ->row();
    }

    public function ambil_antri_aktif_by_tanggal($tanggal)
    {
        return $this->db->select('*')
            ->from('antri')
            ->join('tujuan', 'tujuan.id_tujuan = antri.id_tujuan')
            ->order_by('jam', 'ASC')
            ->where(array('tanggal' => $tanggal, 'status' => 0))
            ->get()
            ->result();
    }

    public function ambil_antri_by_tanggal($tanggal)
    {
        return $this->db->select('jam')
            ->from('antri')
            ->where(array('tanggal' => $tanggal))
            ->order_by('jam', 'ASC')
            ->get()
            ->result();
    }


    public function tambah_antrian($nama
        , $id_tujuan
        , $tanggal
        , $jam
        , $ket_user)
    {
        $unique_id = uniqid();

        $this->db->insert('antri', array('nama' => $nama
        , 'unique_id' => $unique_id
        , 'tanggal' => $tanggal
        , 'jam' => $jam
        , 'ket_user' => $ket_user
        , 'id_tujuan' => $id_tujuan));
//        $data['jam'] = $this->input->post('jam_antri');
//        $data['tanggal'] = $tanggal_yang_diminta;
        $data = $unique_id;
        return $data;
    }

    public function antri_berikut($id)
    {
        $antri_berikut = $this->db->limit(1)
            ->select('jam')
            ->where(array('id_antri' => $id + 1))
            ->get('antri')
            ->row();

        if ($antri_berikut == NULL) {
            $waktu = 0;
        } else {
            $antri_berikut1['jam'] = substr($antri_berikut1->jam, 0, 2) * 60;
            $antri_berikut1['menit'] = substr($antri_berikut1->jam, 3, 2);

            $waktu = $antri_berikut1['jam'] + $antri_berikut1['menit'];
        }

        return $waktu;
    }

    public function auto_hapus($id)
    {
        return $this->db->limit(1)
            ->select('*')
            ->where(array('id_antri' => $id))
            ->get('antri')
            ->row();
    }

    public function ambil_antrian_selesai()
    {
        return $this->db->select('*')
            ->from('antri')
            ->join('tujuan', 'antri.id_tujuan = tujuan.id_tujuan')
            ->where(array('status' => 1))
            ->order_by('tanggal', 'ASC')
            ->order_by('jam', 'ASC')
            ->get()
            ->result();
    }

    public function update_status_selesai($id)
    {
        $this->db->where(array('id_antri' => $id))
            ->update('antri', array('status' => 1));
    }

    public function auto_selesai($id)
    {
        $this->db->where(array('id_antri' => $id))
        -> update('antri', array('status' => 1, 'ket_admin' => 'Waktu toleransi telah habis'));
    }

    public function update_status_pengatri($id)
    {
        $this->db->where(array('id_antri' => $id))
            ->update('antri', array('status_pengantri' => 1));
    }


}
