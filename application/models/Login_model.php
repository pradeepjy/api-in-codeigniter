<?php
class Login_model extends CI_Model {
  public function __construct(){
    $this->load->database();
  }
  function get_user()
  {
    $this->db->select('*');
    $this->db->from('wp_users');
    $this->db->join('wp_usermeta','wp_usermeta.user_id=wp_users.ID');
    $this->db->where('user_id','58');
    $query=$this->db->get();
    // $data= $query->result_array();
    // $this->db->where('ID','6');
    // $this->db->select('*');
    // $this->db->from('wp_users');
    // $this->db->join('wp_usermeta','wp_usermeta.user_id = wp_users.ID');
    // $query=$this->db->get();
    // $this->db->where('wp_users.ID','58');
    // if($query->num_rows() > 0){

          return $query->result_array();

        // }else{

          // return 0;

        // }
      }

      function join()
      {
        $this->db->select('students.name,students.lastname,library.book_name,library.book_issue');
        $this->db->from('students');
        $this->db->join('library','students.id=library.std_id');
        $query=$this->db->get();
        return $query->result_array();
      }

      function get_student()
      {

      }
  // function validate($user_email,$password)
  // {
  //   $this->db->where('user_email',$user_email);
  //   $this->db->where('password',$password);
  //   $result = $this->db->get('user_table');
  //   return $result;
  // }  

  // function add($data)
  // {
  //   if($this->db->insert('user_table', $data)){
  //     return true;
  //   }else{
  //     return false;
  //   }
  // }

  //    public function getallusers(){   

  //       $this->db->select('*');

  //       $this->db->from('user_table');

  //       $this->db->order_by("id", "desc"); 

  //       $query = $this->db->get();

  //       if($query->num_rows() > 0){

  //         return $query->result_array();

  //       }else{

  //         return 0;

  //       }

  //   }
  //   //API call - update a book record
  //   public function userupdate($id, $data){
      
  //      $this->db->where('id', $id);

  //      if($this->db->update('user_table', $data)){

  //         return true;

  //       }else{

  //         return false;

  //       }

  //   }
}