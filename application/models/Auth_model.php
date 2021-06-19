<?php
class Auth_model extends CI_Model {
    // Define the database table
    protected $User_table_name = "users";
    // Insert user data in database
    public function insert_user($userData) {
        return $this->db->insert($this->User_table_name, $userData);
    }
    // Check user login in database
    public function check_login($userData) {
        // Check username exist in the database
        $query = $this->db->get_where($this->User_table_name, array('username' => $userData['username']));
        if ($this->db->affected_rows() > 0) {
            $password = $query->row('password');
            // Check password hash
            if (password_verify($userData['password'], $password) === TRUE) {
                // Valid username and password
                return ['status' => TRUE, 'data' => $query->row(), ];
            } else {
                return ['status' => FALSE, 'data' => FALSE];
            }
        } else {
            return ['status' => FALSE, 'data' => FALSE];
        }
    }
    // View user details
    public function display_records() {
        $query = $this->db->get($this->User_table_name);
        return $query->result();
    }
}
?>
