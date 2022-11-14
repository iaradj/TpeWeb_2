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
            $params = [
                "field" => "id",
                "order" => "asc",
                "genero" => "vinilos.generosfk",
                "limit" => "18446744073709551610",
                "offset" => "0"
            ];
            if(isset($_GET["field"])) {
                $params["field"] = $_GET["field"];
            }
            if(isset($_GET["order"]) ) {
                $params["order"] = $_GET["order"];
            }  
            if(isset($_GET["genero"]) ) {
                $params["genero"] = $_GET["genero"];
            }  
            if(isset($_GET["limit"]) ) {
                $params["limit"] = $_GET["limit"]; 
            if(isset($_GET["offset"]) ) {
                $params["offset"] = ($_GET['offset']-1)*$params["limit"];
                }  
            }  
        $vinilos = $this->model->getVinilos($params);
        $this->view->response($vinilos);
        }

      function getVinilosById($params = null) {
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