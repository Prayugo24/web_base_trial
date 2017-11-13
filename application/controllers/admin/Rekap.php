<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekap extends CI_Controller {
	
  
   public function __construct()
  {
    parent::__construct();
    //if($this->auth->is_admin_logged_in() == true) redirect(base_url('login'));
    // $this->load->library('session');
  }

	public function index()
	{        
        /*if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }*/
		$data['result'] = $this->dbm->select('tb_transaksi')->result();
		$this->load->view('nav_content/header');
		$this->load->view('laporan', $data); //datanya tak ilangi
		$this->load->view('nav_content/footer'); //hohoho
	}
    

    public function cetak()
    {
        /*if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }
*/
//        $tgl_transaksi1=$_POST['datetimepicker1'];
        $tgl_transaksi1=$this->input->post('datetimepicker1');
        $tgl_transaksi2=$this->input->post('datetimepicker2');
        
        $data['tgl'] = $this->input->post('datetimepicker1');
        $data['tgl2'] = $this->input->post('datetimepicker2');

        $data['result'] = $this->dbm->cari_laporan($tgl_transaksi1,$tgl_transaksi2)->result();
        $data['ret'] = $this->dbm->jumlah_laporan($tgl_transaksi1,$tgl_transaksi2)->result();
        //$this->load->view('laporan', $data); //datanya tak ilangi
        $html = $this->load->view('laporan_pdf', $data, true);

        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try 
            {
                $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
                $html2pdf->WriteHTML($html);
                $html2pdf->Output('Laporan_cimols.pdf');
            } 
        catch (HTML2PDF_exception $e) 
            {
            // echo $e;
            $this->session->set_flashdata('pesan_error', 'Maaf, kami mengalami kendala teknis. Coba ' . anchor('admin/rekap/index', 'ulangi ', 'class="alert-link"') . ' beberapa saat lagi!');
            redirect('admin/rekap/index');
            }
    }



}