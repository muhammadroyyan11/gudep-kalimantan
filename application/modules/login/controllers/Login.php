<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Login extends Signin
{

  function _tokens()
  {
    if (!$this->session->token) {
      $this->session->set_userdata("token", randomKey(26));
    }
    return;
  }

  function index()
  {
    if ($this->auth->is_logged()) {
      redirect(url("dashboard"), "refresh");
    }

    $this->_tokens();
    $this->load->view("login-clasic");
  }

  public function register()
  {
    $data['title'] = 'Register';
    $this->load->view('register', $data);
  }

  function register_action()
  {
    if ($this->input->is_ajax_request()) {
      // $json = array('success' => false, 'alert' => array());
      $this->_rules();
      if ($this->form_validation->run()) {
        $token =  randomKey();
        $insert = array(
          'name' => $this->input->post('nama', true),
          'email' => $this->input->post('email'),
          'is_active' => $this->input->post('is_active'),
          'token' => $token,
          'photo' =>  $this->imageCopy($this->input->post('photo', true)),
          'password' => pass_encrypt($token, $this->input->post('konfirmasi_password')),
          'is_delete' => "0",
          'created' => date('Y-m-d H:i:s'),
        );

        $this->model->get_insert("auth_user", $insert);

        $last_id_user = $this->db->insert_id();

        $insert_trans = array(
          'id_user' => $last_id_user,
          'id_group' => $this->input->post('id_group')
        );

        $this->model->get_insert("auth_user_to_group", $insert_trans);

        set_message("success", cclang("notif_save"));
        $json['redirect'] = url("user");
        $json['success'] =  true;
      } else {
        foreach ($_POST as $key => $value) {
          $json['alert'][$key] = form_error($key);
        }
      }

      return $this->response($json);
    }
  }


  function action()
  {
    if ($this->input->is_ajax_request()) {
      if ($this->input->post("token") or $this->session->token == $this->input->post("token")) {
        $this->load->model("Login_model", "model");
        $this->load->library("form_validation");
        $json = array('success' => false, 'alert' => array(), "valid" => false, "url" => null, 'token' => '');
        $this->form_validation->set_rules("email", "*&nbsp;", "trim|xss_clean|valid_email|required");
        $this->form_validation->set_rules("password", "*&nbsp;", "trim|xss_clean|required");
        $this->form_validation->set_error_delimiters('<span class="error text-danger" style="font-size:11px">', '</span>');
        if ($this->form_validation->run()) {
          $json['success'] =  true;
          $email = $this->input->post('email');
          $password = $this->input->post('password');
          $account = $this->model->get_data($email);

          if ($account->num_rows() > 0) {
            $row = $account->row();
            $token = $row->token;
            $password_account = $row->password;
            if (pass_decrypt($token, $password, $password_account)) {
              $session = array('id_user' => $row->id_user, "login_status" => true);
              $this->session->set_userdata($session);

              $data = ['last_login' => date("Y-m-d H:i"), "ip_address" => $this->input->ip_address()];
              $this->db->where(['id_user' => $row->id_user]);
              $this->db->update("auth_user", $data);

              $json['valid'] = true;
              $json["url"] = site_url(ADMIN_ROUTE . "/dashboard");
            } else {
              $json['alert'] = "Email or password invalid";
            }
          } else {
            $json['alert'] = "Email or password invalid";
          }
          $this->session->unset_userdata("token");
          $this->_tokens();
          $json['token'] = $this->session->token;
        } else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }
        echo json_encode($json);
      } else {
        $this->output->set_status_header(403);
        show_error("Token Invalid", 403, '403::Token');
      }
    }
  }

  function logout()
  {
    // $this->load->library(array("user_agent"));
    $this->session->sess_destroy();
    redirect(LOGIN_ROUTE, "refresh");
  }
}
