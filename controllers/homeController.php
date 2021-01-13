<?php

class homeController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $u = new Users();
        if ($u->isLogged() == false) {
            header("Location: " . BASE_URL . "/login");
            exit;
        }
    }

    public function index()
    {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('visualizar_alunos')) {
            $c = new Pupils();
            $offset = 0;
            $data['p'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['p'] = intval($_GET['p']);
                if ($data['p'] == 0) {
                    $data['p'] = 1;
                }
            }

            $offset = (10 * ($data['p'] - 1));

            $data['pupils_list'] = $c->getList($offset, $u->getCompany());
            $data['pupils_count'] = $c->getCount($u->getCompany());
            $data['p_count'] = ceil($data['pupils_count'] / 10);
            $data['edit_permission'] = $u->hasPermission('editar_alunos');

            $this->loadTemplate('home', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function add()
    {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('editar_alunos')) {
            $c = new Pupils();

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $dataNasci = addslashes($_POST['date']);

                $c->add(
                  $u->getCompany(),
                  $name,
                  $dataNasci
                );
                header("Location: " . BASE_URL . "/home");
            }

            $this->loadTemplate('home_add', $data);
        } else {
            header("Location: " . BASE_URL . "/home");
        }
    }

    public function edit($id)
    {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('editar_alunos')) {
            $c = new Pupils();

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $dataNasci = addslashes($_POST['date']);

                $c->edit($id,
                  $u->getCompany(),
                  $name,
                  $dataNasci
                );
                header("Location: " . BASE_URL . "/home");
            }

            $data['pupils_info'] = $c->getInfo($id, $u->getCompany());

            $this->loadTemplate('home_edit', $data);
        } else {
            header("Location: " . BASE_URL . "/home");
        }
    }

    public function delete($id)
    {
        $u = new Users();
        $u->setLoggedUser();

        if ($u->hasPermission('editar_alunos')) {
            $i = new Pupils();
            $i->delete($id, $u->getCompany(), $u->getId());

            header("Location: " . BASE_URL . "/home");
        } else {
            header("Location: " . BASE_URL);
        }
    }

}