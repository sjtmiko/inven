<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Test_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'test/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'test/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'test/index.html';
            $config['first_url'] = base_url() . 'test/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Test_model->total_rows($q);
        $test = $this->Test_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'test_data' => $test,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('test/test_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Test_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_in' => $row->id_in,
		'nama' => $row->nama,
		'test' => $row->test,
		'test6' => $row->test6,
	    );
            $this->load->view('test/test_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('test'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('test/create_action'),
	    'id_in' => set_value('id_in'),
	    'nama' => set_value('nama'),
	    'test' => set_value('test'),
	    'test6' => set_value('test6'),
	);
        $this->load->view('test/test_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'test' => $this->input->post('test',TRUE),
		'test6' => $this->input->post('test6',TRUE),
	    );

            $this->Test_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('test'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Test_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('test/update_action'),
		'id_in' => set_value('id_in', $row->id_in),
		'nama' => set_value('nama', $row->nama),
		'test' => set_value('test', $row->test),
		'test6' => set_value('test6', $row->test6),
	    );
            $this->load->view('test/test_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('test'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_in', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'test' => $this->input->post('test',TRUE),
		'test6' => $this->input->post('test6',TRUE),
	    );

            $this->Test_model->update($this->input->post('id_in', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('test'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Test_model->get_by_id($id);

        if ($row) {
            $this->Test_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('test'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('test'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('test', 'test', 'trim|required');
	$this->form_validation->set_rules('test6', 'test6', 'trim|required');

	$this->form_validation->set_rules('id_in', 'id_in', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "test.xls";
        $judul = "test";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Test");
	xlsWriteLabel($tablehead, $kolomhead++, "Test6");

	foreach ($this->Test_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->test);
	    xlsWriteLabel($tablebody, $kolombody++, $data->test6);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-26 02:28:21 */
/* http://harviacode.com */