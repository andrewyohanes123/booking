<?php

defined('BASEPATH') OR exit('No akses');

class admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

//        if ($this->session->userdata('status') != 'login') {
//            redirect(base_url('index.php/index/'));
//        }

//        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Control-Credentials: true');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: X-Requested-Width, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
        header('Access-Control-Allow-Method: POST,GET,OPTIONS,DELETE,PUT');

        date_default_timezone_set('Asia/Makassar');
        $this->load->model('Antri_model');
        $this->load->model('Tujuan_model');
        $this->load->model('Option_model');
        $this->load->model('Admin_model');
    }

    public function ambil_antri_selesai()
    {
        $data = $this->Antri_model->ambil_antrian_selesai();
        $this->encode($data);
    }

    public function waktu_sekarang()
    {
        $waktu_sekarang = (date('G') * 3600) + (date('i') * 60) + date('s');
        $this->encode($waktu_sekarang);
    }

    public function ambil_antri_by_tanggal($tanggal)
    {
        $data = $this->Antri_model->ambil_antri_aktif_by_tanggal($tanggal);
        $this->encode($data);
    }


    public function option_view()
    {
        $data = $this->Option_model->ambil_option();

        $this->load->view('header_view');
        $this->load->view('option_view', compact('data'));
    }

    public function set_option()
    {
        $this->Option_model->update_option();
        redirect(base_url('index.php/admin/option_view'));
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }

    public function tambah_tujuan()
    {
        $data_input = $this->decode();
        $data = $this->Tujuan_model->tambah_tujuan($data_input->tujuan);
        $this->encode($data);
    }

    public function ambil_tujuan()
    {
        $data = $this->Tujuan_model->ambil_semua_tujuan();
        $this->encode($data);
    }

    public function hapus_tujuan()
    {
        $data_input = $this->decode();

        $data = $this->Tujuan_model->hapus_tujuan($data_input->id_tujuan);

        $this->encode($data);
    }

    public function update_tujuan()
    {
        $data_input = $this->decode();


        if (!(isset($data_input->id_tujuan) && isset($data_input->tujuan))) {
            $data['msg'] = 'Data tidak lengkap';
            $this->encode($data);
            exit();
        }

        $data = $this->Tujuan_model->update_tujuan($data_input->id_tujuan, $data_input->tujuan);

        $this->encode($data);
    }

    public function ambil_admin()
    {
        $data = $this->Admin_model->ambil_admin();
        $this->encode($data);
    }

    public function tambah_admin()
    {
        $data = $this->decode();
        $data2['msg'] = $this->Admin_model->tambah_admin($data->nama_admin,
            $data->username,
            $data->password);
        $this->encode($data2);
    }

    public function update_nama_admin()
    {
        $data_input = $this->decode();

        if (!(isset($data_input->id_admin) && isset($data_input->nama_admin))) {
            $data['msg'] = 'Lengkapi Form';
            $this->encode($data);
            exit();
        }

        $data['msg'] = $this->Admin_model->update_nama_user_admin($data_input->id_admin, $data_input->nama_admin);

        $this->encode($data);
    }

    public function update_password_admin()
    {
        $data_input = $this->decode();

        if (isset($data_input->password_lama)) {

        }

        if ($data_input->password_baru !=
            $data_input->konfirmasi_password_baru) {
            $data['msg'] = 'Password tidak sesuai';
            $this->encode($data);
            exit();
        }

        $data['msg'] = $this->Admin_model->update_password($data_input->password_lama, $data_input->password_baru);

        $this->encode($data);
    }

    public function delete_admin($id_admin)
    {
        $data['msg'] = $this->Admin_model->delete_admin($id_admin);

        $this->encode($data);
    }

    public function edit_tujuan($id)
    {
        $this->Tujuan_model->edit_tujuan($id);
        redirect(base_url('index.php/admin/tujuan_list'));
    }

    public function status_pengatri($id)
    {
        $this->Antri_model->status_pengatri($id);
        redirect(base_url('index.php/admin/index'));
    }

    private function ambil_antri()
    {
        $data = $this->Antri_model->ambil_antri_aktif_by_tanggal(date('Y-m-d'));
        $option = $this->Option_model->ambil_option();

        foreach ($data as $datas) {

            $waktu1['jam'] = substr($datas->jam, 0, 2) * 3600;
            $waktu1['menit'] = substr($datas->jam, 3, 2) * 60;
            $waktu1['detik'] = substr($datas->jam, 5, 2);
            $option2['toleransi'] = $option->toleransi;
            $option2['penanganan'] = $option->penanganan;

            $waktu_fix = $waktu1['jam'] + $waktu1['menit'] + $waktu1['jam'] + $option2['toleransi'];
            $datas->jam_hitung = $waktu_fix;
        }

        return $data;
    }

    public function ambil_antri_hari_ini()
    {
        $this->encode($this->ambil_antri());
    }


    public function ambil_option()
    {
        $this->encode($this->Option_model->ambil_option());
    }

    public function update_status_selesai()
    {
        $data_input = $this->decode();

        $this->Antri_model->update_status_selesai($data_input->id_antri);
        $this->encode($this->ambil_antri());
    }

    public function update_status_pengantri($id)
    {
        $this->Antri_model->update_status_pengantri($id);
        $this->encode($this->ambil_antri());
    }


    private function decode()
    {
        return json_decode(file_get_contents('php://input'));
    }

    private function encode($data)
    {
        echo json_encode($data);
    }
}
