<?php

    class VinilosModel {

        private function connect() {
            $db = new PDO('mysql:host=localhost;'.'dbname=tienda_vinilos;charset=utf8', 'root', '');
            return $db;
        }

        function getVinilos($params) {
            $db = $this->connect();
            $query = $db->prepare("SELECT * 
                                        FROM vinilos 
                                        INNER JOIN generos 
                                        on vinilos.generosfk = generos.id_g
                                        WHERE vinilos.generosfk = $params[genero]
                                        ORDER BY $params[field] $params[order]
                                        LIMIT $params[limit] 
                                        OFFSET $params[offset]");
            $query->execute();
            return $vinilos = $query->fetchAll(PDO::FETCH_OBJ);
        }
        function getVinilosById($id){
            $db = $this->connect();
            $query = $db->prepare('SELECT * 
                                        FROM vinilos 
                                        INNER JOIN generos 
                                        on vinilos.generosfk = generos.id_g 
                                        WHERE `id`  = ?');
            $query->execute([$id]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        function setVinilos($vinilos, $artista, $precio, $lanzamiento, $generosfk) {
            $db = $this->connect();
            $query = $db->prepare("INSERT INTO vinilos (vinilo, artista, precio, lanzamiento, generosfk) 
                                    VALUES (?, ?, ?, ?, ?)");
            $query->execute([$vinilos, $artista, $precio, $lanzamiento, $generosfk]);
            return $db->lastInsertId();
        }
    }