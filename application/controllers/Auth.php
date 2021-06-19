<?php
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<p class ="invalid-feedback">', '</p>');
        // Set the default time zone for the date function
        date_default_timezone_set('Asia/Colombo');
    }
    // User registration
    public function register() {
        // Set register form validation rules
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[users.email_address]', ['is_unique' => 'Account with the same email already exists. Please use a different email', ]);
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|exact_length[10]|numeric');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', ['is_unique' => 'User with the same username already exists. Please use a different username', ]);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[10]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        // Submit
        if ($this->form_validation->run() == FALSE) {
            // Page title
            $data['page_title'] = "Register";
            // Load header view
            $this->load->view('_Layout/header.php', $data);
            // Load register view
            $this->load->view('user/register');
            // Load footer view
            $this->load->view('_Layout/footer.php');
        } else {
            // Insert user details into database
            $insert_data = array('title' => $this->input->post('title', TRUE), 
                                 'first_name' => $this->input->post('fname', TRUE), 
                                 'last_name' => $this->input->post('lname', TRUE), 
                                 'email_address' => $this->input->post('email', TRUE), 
                                 'phone_number' => $this->input->post('phone', TRUE), 
                                 'job_type' => $this->input->post('jtype', TRUE), 
                                 'username' => $this->input->post('username', TRUE), 
                                 'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT), 
                                 'registered_date' => date('Y-m-d'));
            // Load user model
            $this->load->model('Auth_model', 'AuthModel');
            $result = $this->AuthModel->insert_user($insert_data);
            if ($result == TRUE) {
                $this->session->set_flashdata('success_flashData', 'You have registered successfully.');
                redirect('auth/login', 'refresh');
            } else {
                $this->session->set_flashdata('error_flashData', 'Invalid Registration.');
                redirect('auth/register', 'refresh');
            }
        }
    }
    // User login
    public function login() {
        // set login form validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[10]');
        // Submit
        if ($this->form_validation->run() == FALSE) {
            // Page title
            $data['page_title'] = "Login";
            // Load header view
            $this->load->view('_Layout/header.php', $data);
            // Load login view
            $this->load->view('user/login');
            // Load footer view
            $this->load->view('_Layout/footer.php');
        } else {
            $login_data = array('username' => $this->input->post('username', TRUE), 
                                'password' => $this->input->post('password', TRUE),);
            // Load user model
            $this->load->model('Auth_model', 'AuthModel');
            $result = $this->AuthModel->check_login($login_data);
            if (!empty($result['status']) && $result['status'] === TRUE) {
                // Create session
                $session_array = array('USER_ID' => $result['data']->user_id, 'USER_FNAME' => $result['data']->first_name, 'USER_LNAME' => $result['data']->last_name, 'USER_NAME' => $result['data']->username, 'USER_EMAIL' => $result['data']->email_address,);
                $this->session->set_userdata($session_array);
                $this->session->set_flashdata('success_flashData', 'Login Success');
                redirect('auth/profile');
            } else {
                $this->session->set_flashdata('error_flashData', 'Invalid Username/Password.');
                redirect('auth/login');
            }
        }
    }
    // User logout
    public function logout() {
        // Remove session data
        $remove_sessions = array('USER_ID', 'USER_FNAME', 'USER_LNAME', 'USER_NAME', 'USER_EMAIL');
        $this->session->unset_userdata($remove_sessions);
        redirect('auth/login');
    }
    // User profile
    public function profile() {
        if (empty($this->session->userdata('USER_ID'))) {
            redirect('auth/login');
        }
        $this->load->model('Auth_model', 'AuthModel');
        $result['data'] = $this->AuthModel->display_records();
        // Page title
        $data['page_title'] = "Home";
        // Load header view
        $this->load->view('_Layout/header.php', $data);
        // Load user profile view
        $this->load->view('user/user_profile', $result);
        // Load footer view
        $this->load->view('_Layout/footer.php');
    }
}
?>