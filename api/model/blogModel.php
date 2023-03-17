<?php

#  $sql = "SELECT * FROM games WHERE (generos LIKE '%$genero%') LIMIT $iniciar, $cantidad "; pagination 

class Blog {

    private $conn;

    function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    function Post($id) {
        $sql = "SELECT * FROM post WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        return $post;
    }

    function getAllPost(){
        $sql = "SELECT * FROM post";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    function getCategory($category){
        $sql = "SELECT * FROM post WHERE categorias = '$category'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $post = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $post;
    }

    function getSearch($search){
        $sql = "SELECT * FROM post WHERE titulo LIKE '%$search%'";
        $stmt = $this->conn->prepare($sql);
        $stmt-> execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    function getIndexPost() {
        $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 5;";
        $stmt = $this->conn->prepare($sql);
        $stmt-> execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}

?>