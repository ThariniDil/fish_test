<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');                    /***** LOADING HELPER TO AVOID PHP ERROR ****/
		$this->load->model('Buyer_model','buyer'); /* LOADING MODEL * Welcome_model as welcome */
	}


	/**************************  START FETCH OR VIEW FORM DATA ***************/
	public function index()
	{
	    $this->data['view_data']= $this->buyer->view_data();
	    $this->load->view('buyer_view', $this->data, FALSE);
	}
	/****************************  END FETCH OR VIEW FORM DATA ***************/


	/****************************  START OPEN ADD FORM FILE ******************/
	public function add_data()
	{
		$this->load->view('buyer_add');
	}
	/****************************  END OPEN ADD FORM FILE ********************/

    
    /****************************  START INSERT FORM DATA ********************/
    public function submit_data()
    {
    $data = array('buyer_name'                       => $this->input->post('bname'),
	          'buyer_tel'                    => $this->input->post('btel'));
    
    $insert = $this->buyer->insert_data($data);
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
    redirect('buyer/index');
    }
    /****************************  END INSERT FORM DATA ************************/


    /****************************  START FETCH OR VIEW FORM DATA ***************/
    public function view_data()
    {
    $this->data['view_data']= $this->buyer->view_data();
    $this->load->view('buyer_view', $this->data, FALSE);
    }
    /****************************  END FETCH OR VIEW FORM DATA ***************/

    
    /****************************  START OPEN EDIT FORM WITH DATA *************/
    public function edit_data($id)
    {
    $this->data['edit_data']= $this->buyer->edit_data($id);
    $this->load->view('buyer_edit', $this->data, FALSE);
    }
    /****************************  END OPEN EDIT FORM WITH DATA ***************/


    /****************************  START UPDATE DATA *************************/
    public function update_data($id)
    {
    $data = array('buyer_name'                       => $this->input->post('bname'),
	          'buyer_tel'                    => $this->input->post('btel'));
    $this->db->where('id', $id);
    $this->db->update('buyers', $data);
    $this->session->set_flashdata('message', 'Your data updated Successfully..');
    redirect('buyer/index');
    }
    /****************************  END UPDATE DATA ****************************/


    /****************************  START DELETE DATA **************************/
    public function delete_data($id)
    {  
    $this->db->where('id', $id);
    $this->db->delete('buyers');
    $this->session->set_flashdata('message', 'Your data deleted Successfully..');
    redirect('buyer/index');
    }
    /****************************  END DELETE DATA ***************************/

}
