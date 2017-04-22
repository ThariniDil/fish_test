<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
        $this->load->model('Cart_model', 'cart'); /* LOADING MODEL * Welcome_model as welcome */
    }

    /*     * ************************  START FETCH OR VIEW FORM DATA ************** */

    public function index() {
        $this->data['view_data'] = $this->cart->view_data();
        //var_dump($this->sales->view_data());
        //echo 'index';
        $this->load->view('cart_view', $this->data, FALSE);
    }

    /*     * **************************  END FETCH OR VIEW FORM DATA ************** */


    /*     * **************************  START OPEN ADD FORM FILE ***************** */

    public function add_data() {
        //$this->load->view('sales_add'); 
        $this->data['buyer_data'] = $this->cart->buyer_data();
        $this->data['fish_data']=$this->cart->fish_data();
        $this->load->view('cart_add',$this->data, FALSE);
    }

    /*     * **************************  END OPEN ADD FORM FILE ******************* */


    /*     * **************************  START INSERT FORM DATA ******************* */

    public function submit_data() {
        $data = array('quantity' => $this->input->post('qy'),
            'fish_type_id' => $this->input->post('fid'),
            'buyer_id' => $this->input->post('bid'));
        //var_dump($data);
        $insert = $this->cart->insert_data($data);
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('cart/index');
    }

    /*     * **************************  END INSERT FORM DATA *********************** */


    /*     * **************************  START FETCH OR VIEW FORM DATA ************** */

    public function view_data() {
        $this->data['view_data'] = $this->cart->view_data();//mokadda me viewdata function eka?
        $this->load->view('cart_view', $this->data, FALSE);
    }

    /*     * **************************  END FETCH OR VIEW FORM DATA ************** */


    /*     * **************************  START OPEN EDIT FORM WITH DATA ************ */

    public function edit_data($id) {
        $this->data['buyer_data'] = $this->cart->buyer_data();
        $this->data['fish_data'] = $this->cart->fish_data();
        $this->data['edit_data'] = $this->cart->edit_data($id);
        $this->load->view('cart_edit', $this->data, FALSE);
    }

    /*     * **************************  END OPEN EDIT FORM WITH DATA ************** */


    /*     * **************************  START UPDATE DATA ************************ */

    public function update_data($id) {

       $data = array('quantity' => $this->input->post('qy'),
            'fish_type_id' => $this->input->post('fid'),
            'buyer_id' => $this->input->post('bid'));
               var_dump($data);
        $this->db->where('id', $id);
        $this->db->update('cart', $data);
        $this->session->set_flashdata('message', 'Your data updated Successfully..');
        redirect('cart/index');
    }

    /*     * **************************  END UPDATE DATA *************************** */


    /*     * **************************  START DELETE DATA ************************* */

    public function delete_data($id) {
        $this->db->where('id', $id);
        $this->db->delete('cart');
        $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('cart/index');
    }

    /*     * **************************  END DELETE DATA ************************** */


    /*     * **************************  Retrieve data from other tables ************************** */

  

    
}
