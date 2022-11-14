<?php
include_once '.\app\models\vinilosmodel.php';
include_once '.\app\views\vinilosview.php';

    class VinilosController {

        private $model;
        private $view;
        private $data;

        function __construct() {
            $this->model = new VinilosModel();
            $this->view = new VinilosView();
            // lee el body del request
            $this->data = file_get_contents("php://input");
        }
        private function getData() {
            return json_decode($this->data);
        }

        function getVinilos($params = null){
        $vinilos = $this->model->getVinilos();
        $this->view->response($vinilos);
        }

        function getVinilosAsc($params = null){
            $vinilos = $this->model->getVinilosAsc();
            $this->view->response($vinilos);
            }

      function getVinilosById($params = null ){
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $vinilos = $this->model->getVinilosById($id);
        // si no existe devuelvo 404
        if ($vinilos)
            $this->view->response($vinilos);
        else 
            $this->view->response("El vinilo con el id=$id no existe", 404);
    }
    function setVinilos($params = null) {
        $vinilos = $this->getData();

        if (empty($vinilos->vinilo)  || empty($vinilos->artista)  || empty($vinilos->precio)  || empty($vinilos->lanzamiento)  || empty($vinilos->generosfk)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->setVinilos($vinilos->vinilo, $vinilos->artista, $vinilos->precio, $vinilos->lanzamiento, $vinilos->generosfk);
            $vinilos = $this->model->getVinilosById($id);
            $this->view->response($vinilos, 201);
        }
    }
    }
        ?>