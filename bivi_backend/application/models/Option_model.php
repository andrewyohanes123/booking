<?php

defined('BASEPATH') OR exit('No akses');

class option_model extends CI_Model{

  public function ambil_option(){
    return $this->db->get('option')->row();;
  }

  public function update_option(){
    $data = array(
        'toleransi'=>$this->input->post('toleransi') * 60,
        'penanganan'=>$this->input->post('penanganan') * 60,
        'jam_mulai'=>(($this->input->post('jam_buka_jam')*3600) + ($this->input->post('jam_buka_menit')*60) + $this->input->post('jam_buka_detik')),
        'jam_tutup'=>(($this->input->post('jam_tutup_jam')*3600) + ($this->input->post('jam_tutup_menit')*60) + $this->input->post('jam_tutup_detik')),
        'jam_istirahat_mulai'=> (($this->input->post('jam_istirahat_jam')*3600) + ($this->input->post('jam_istirahat_menit')*60) + $this->input->post('jam_istirahat_detik')),
        'jam_istirahat_selesai'=> (($this->input->post('jam_istirahat_selesai_jam')*3600) + ($this->input->post('jam_istirahat_selesai_menit')*60) + $this->input->post('jam_istirahat_selesai_detik'))
    );
    $this->db->update('option', $data);
  }

}
