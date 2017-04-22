<?php
class Cart_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   /**************************  START INSERT QUERY ***************/
    public function insert_data($data){
        $this->db->insert('cart', $data); 
        return TRUE;
    }
    /**************************  END INSERT QUERY ****************/

    
    /*************  START SELECT or VIEW ALL QUERY ***************/
    public function view_data(){
        $query=$this->db->query("SELECT c.id, c.quantity, c.fish_type_id, c.buyer_id, f.fish_type, b.buyer_name  FROM cart c JOIN fish_types f on f.id = c.fish_type_id JOIN buyers b on b.id = c.buyer_id 
                                          ORDER BY c.id ASC");
		return $query->result_array();
    }
    /***************  END SELECT or VIEW ALL QUERY ***************/

    
    /*************  START EDIT PARTICULER DATA QUERY *************/
    public function edit_data($id){
        $query=$this->db->query("SELECT c.id, c.quantity, c.fish_type_id, c.buyer_id, f.fish_type, b.buyer_name  FROM cart c JOIN fish_types f on f.id = c.fish_type_id JOIN buyers b on b.id = c.buyer_id 
					  WHERE c.id = $id");
		return $query->result_array();
    }
    /*************  END EDIT PARTICULER DATA QUERY ***************/
    
    
   /****************************  Retrieve data from other tables ***************************/

    public function buyer_data(){
        $query=$this->db->query("SELECT * FROM buyers ");
		return $query->result_array();
    }
    
    public function fish_data() {
        
        $query=$this->db->query("SELECT * FROM fish_types");
          return $query->result_array();
        
        
    }

}