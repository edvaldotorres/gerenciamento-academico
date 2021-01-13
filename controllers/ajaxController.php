<?php

class ajaxController extends Controller
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
    }

    public function search_pupils()
    {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $c = new Pupils();

        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $q = addslashes($_GET['q']);

            $clients = $c->searchClientByName($q, $u->getCompany());

            foreach ($clients as $citem) {
                $data[] = [
                  'name' => $citem['name'],
                  'link' => BASE_URL . '/home/edit/' . $citem['id'],
                  'id' => $citem['id'],
                ];
            }
        }

        echo json_encode($data);
    }

}