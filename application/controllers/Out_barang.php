<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Out_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Out_barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'out_barang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'out_barang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'out_barang/index.html';
            $config['first_url'] = base_url() . 'out_barang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Out_barang_model->total_rows($q);
        $out_barang = $this->Out_barang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'out_barang_data' => $out_barang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('out_barang/out_barang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Out_barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_barang' => $row->nama_barang,
		'merk' => $row->merk,
		'port' => $row->port,
		'kode_produk' => $row->kode_produk,
		'tgl_keluar' => $row->tgl_keluar,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('out_barang/out_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('out_barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('out_barang/create_action'),
	    'id' => set_value('id'),
	    'nama_barang' => set_value('nama_barang'),
	    'merk' => set_value('merk'),
	    'port' => set_value('port'),
	    'kode_produk' => set_value('kode_produk'),
	    'tgl_keluar' => set_value('tgl_keluar'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('out_barang/out_barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'port' => $this->input->post('port',TRUE),
		'kode_produk' => $this->input->post('kode_produk',TRUE),
		'tgl_keluar' => $this->input->post('tgl_keluar',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Out_barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('out_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Out_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('out_barang/update_action'),
		'id' => set_value('id', $row->id),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'merk' => set_value('merk', $row->merk),
		'port' => set_value('port', $row->port),
		'kode_produk' => set_value('kode_produk', $row->kode_produk),
		'tgl_keluar' => set_value('tgl_keluar', $row->tgl_keluar),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('out_barang/out_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('out_barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'port' => $this->input->post('port',TRUE),
		'kode_produk' => $this->input->post('kode_produk',TRUE),
		'tgl_keluar' => $this->input->post('tgl_keluar',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Out_barang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('out_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Out_barang_model->get_by_id($id);

        if ($row) {
            $this->Out_barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('out_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('out_barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('merk', 'merk', 'trim|required');
	$this->form_validation->set_rules('port', 'port', 'trim|required');
	$this->form_validation->set_rules('kode_produk', 'kode produk', 'trim|required');
	$this->form_validation->set_rules('tgl_keluar', 'tgl keluar', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "out_barang.xls";
        $judul = "out_barang";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Merk");
	xlsWriteLabel($tablehead, $kolomhead++, "Port");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Produk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Keluar");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Out_barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->merk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->port);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_produk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_keluar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Out_barang.php */
/* Location: ./application/controllers/Out_barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-26 02:28:20 */
/* http://harviacode.com */