<?php

class loginController extends Controller
{

    public function index()
    {
        $data = [];

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $pass = addslashes($_POST['password']);

            $u = new Users();

            if ($u->doLogin($email, $pass)) {
                header("Location: " . BASE_URL);
                exit;
            } else {
                $data['error'] = 'Ooops, Os dados informados não conferem :/';
            }
        }

        $this->loadView('login', $data);

    }

    public function logout()
    {
        $u = new Users();
        $u->logout();
        header("Location: " . BASE_URL);
    }

}