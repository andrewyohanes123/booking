<?php

defined('BASEPATH') OR exit('No akses');

class index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

//        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Control-Credentials: true');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: X-Requested-Width, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
        header('Access-Control-Allow-Method: POST,GET,OPTIONS,DELETE,PUT');

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS')
            exit();

        date_default_timezone_set('Asia/Makassar');
        $this->load->model('Tujuan_model');
        $this->load->model('Antri_model');
        $this->load->model('Option_model');
        $this->load->model('Admin_model');
        $this->load->helper('security');
    }

    public function ambil_jam_by_tanggal($tanggal56 = 0)
    {

        if ($tanggal56 == 0) {
            $tanggal56 = date('Y-m-d', strtotime(' +1 day'));
        }
        $option = $this->Option_model->ambil_option();

        $i = 0;
        for ($option->jam_mulai; $option->jam_mulai <= $option->jam_tutup - $option->toleransi - $option->penanganan; $option->jam_mulai = $option->jam_mulai + $option->toleransi + $option->penanganan) {
            if (!($option->jam_mulai >= $option->jam_istirahat_mulai && $option->jam_mulai < $option->jam_istirahat_selesai)) {
                $tanggal[$i]['jam'] = gmdate('H:i:s', $option->jam_mulai);
                $tanggal[$i]['diambil'] = FALSE;
                $i++;
            }
        }

        $waktu_sudah_diambil = $this->Antri_model->ambil_antri_by_tanggal($tanggal56);

        foreach ($waktu_sudah_diambil as $waktu_diambil) {
            $i = 0;
            foreach ($tanggal as $tanggal1) {
                if ($waktu_diambil->jam == $tanggal1['jam']) {
                    $tanggal[$i]['diambil'] = TRUE;
                }
                $i++;
            }
        }

        $hari_ini = date('Y-m-d');
        $tanggal_terakhir = date('t', strtotime($hari_ini));

        $cek_hari = date('Y-m-d');

        $cek_hari = explode('-', $cek_hari);
        $cek_hari[2] = $this->input->post('tanggal');
        $cek_hari = implode('-', $cek_hari);

        $this->encode($tanggal);
    }

    public function ambil_tujuan()
    {
        $this->encode($this->Tujuan_model->ambil_semua_tujuan());
    }


    public function tambah_antri()
    {
        $data_input = $this->decode();

        if (isset($data_input->nama)
            && isset($data_input->id_tujuan)
            && isset($data_input->tanggal)
            && isset($data_input->jam)) {
            if (isset($data_input->ket_user)) {
                $data_input->ket_user = xss_clean($data_input->ket_user);
            }
            $data_input->nama = xss_clean($data_input->nama);
            $data_input->id_tujuan = xss_clean($data_input->id_tujuan);
            $data_input->tanggal = xss_clean($data_input->tanggal);
            $data_input->jam = xss_clean($data_input->jam);

            $hari_ini = date('Y-m-d');
            $tanggal_terakhir = date('t', strtotime($hari_ini));

            $cek_hari = date('Y-m-d');

            $cek_hari = explode('-', $cek_hari);
            $cek_hari[2] = $this->input->post('tanggal');
            $cek_hari = implode('-', $cek_hari);

            $cek_hari = date('D', strtotime($cek_hari));

            if ($data_input->nama == NULL || $data_input->id_tujuan == NULL || $data_input->tanggal == NULL) {
                $data['msg'] = 'Lengkapi form';
                $this->encode($data);
                exit();
            } elseif ($data_input->tanggal > $tanggal_terakhir || $data_input->tanggal < date('d', strtotime('+1 day'))) {
                $data['msg'] = 'Tidak beroperasi';
                $this->encode($data);
                exit();
            } elseif ($cek_hari == 'Sun' || $cek_hari == 'Sat') {
                $data['msg'] = 'Tidak beroperasi';
                $this->encode($data);
                exit();
            }

            $data['unique_id'] =
                $this->Antri_model->tambah_antrian($data_input->nama
                    , $data_input->id_tujuan
                    , $data_input->tanggal
                    , $data_input->jam
                    , $data_input->ket_user);

            if(isset($this->session->userdata('unique_id'))){
              array_push($this->session->userdata('unique_id')=$data['unique_id']);
            } else {
                $this->session->set_userdata('unique_id') = $data['unique_id'];
            }

            $data['msg'] = 'Sukses';

            $this->encode($data);
        } else {
            $data['msg'] = 'Lengkapi Form';
            $this->encode($data);
        }

    }

    public function ambil_antri_by_unique_id($data)
    {
        $this->encode($this->Antri_model->ambil_antri_by_unique_id($data));
    }

    public function check()
    {
        if ($this->session->userdata('status') == NULL) {
            $data['msg'] = FALSE;
        } else {
            $data['session'] = $this->session->userdata();
            $data['msg'] = TRUE;
        }
        $this->encode($data);
    }

    public function login()
    {
        $data_input = $this->decode();

        if(!(isset($data_input->username) && isset($data_input->password))){
            $data['msg'] = 'Username atau Password salah';
            $this->encode($data);
            exit();
        }

        $data = $this->Admin_model->cek_admin($data_input->username, $data_input->password);
        if ($data == NULL) {
            $data['msg'] = 'Username atau Password salah';
        } else {
            unset($data['password']);
            $data['status'] = 'login';
            $this->session->set_userdata($data);
            $data['msg'] = 'Sukses';
        }
        $this->encode($data);
    }

    public function decode()
    {
        return json_decode(file_get_contents('php://input'));
    }

    public function encode($data)
    {
        echo json_encode($data);
    }

}
