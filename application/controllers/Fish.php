<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fish extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');                    /*         * *** LOADING HELPER TO AVOID PHP ERROR *** */
        $this->load->model('Fish_model', 'fish'); /* LOADING MODEL * Welcome_model as welcome */
    }

    /*     * ************************  START FETCH OR VIEW FORM DATA ************** */

    public function index() {
        $this->data['view_data'] = $this->fish->view_data();
        $this->load->view('fish_view', $this->data, FALSE);
    }

    /*     * **************************  END FETCH OR VIEW FORM DATA ************** */


    /*     * **************************  START OPEN ADD FORM FILE ***************** */

    public function add_data() {
        $this->load->view('fish_add');
    }

    /*     * **************************  END OPEN ADD FORM FILE ******************* */


    /*     * **************************  START INSERT FORM DATA ******************* */

    public function submit_data() {
        $data = array('fish_type'  => strip_tags($this->input->post('ftype')),
                      'fish_type_buying_price' => $this->input->post('fprice'));

        $insert = $this->fish->insert_data($data);
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('fish/index');
    }

    /*     * **************************  END INSERT FORM DATA *********************** */


    /*     * **************************  START FETCH OR VIEW FORM DATA ************** */

    public function view_data() {
        $this->data['view_data'] = $this->fish->view_data();
        $this->load->view('fish_view', $this->data, FALSE);
    }

    /*     * **************************  END FETCH OR VIEW FORM DATA ************** */


    /*     * **************************  START OPEN EDIT FORM WITH DATA ************ */

    public function edit_data($id) {
        $this->data['edit_data'] = $this->fish->edit_data($id);
        $this->load->view('fish_edit', $this->data, FALSE);
    }

    /*     * **************************  END OPEN EDIT FORM WITH DATA ************** */


    /*     * **************************  START UPDATE DATA ************************ */

    public function update_data($id) {
        $data = array('fish_type'  => $this->input->post('ftype'),
                      'fish_type_buying_price' => $this->input->post('fprice'));
        
        $this->db->where('id', $id);
        $this->db->update('fish_types', $data);
        $this->session->set_flashdata('message', 'Your data updated Successfully..');
        redirect('fish/index');
    }

    /*     * **************************  END UPDATE DATA *************************** */


    /*     * **************************  START DELETE DATA ************************* */

    public function delete_data($id) {
        $this->db->where('id', $id);
        $this->db->delete('fish_type');
        $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('fish/index');
    }

    /*     * **************************  END DELETE DATA ************************** */
}
