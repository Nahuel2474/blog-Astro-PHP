<?php
// Headers
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
header("Content-type:application/json");
include_once '../connect.php';
include_once '../model/blogModel.php';
$method = $_SERVER['REQUEST_METHOD'];

// Db connect Instance
$db = new DbConnect;
$conn = $db->connect();
$blog_instance = new Blog($conn);


switch ($method) {
    case "GET":

        if (isset($_GET['getSearch'])) {
            $search = $_GET['getSearch'];
            $search = $blog_instance->getSearch($search);

            echo json_encode($search);
        }

        if (isset($_GET['getAllPost'])) {
            $post = $blog_instance->getAllPost();

            echo json_encode($post);
        }

        if (isset($_GET['getPost'])) {
            $id = $_GET['getPost'];
            $post = $blog_instance->Post($id);

            echo json_encode($post);
        }

        if (isset($_GET['categoria'])) {
            $category = $_GET['categoria'];
            $post = $blog_instance->getCategory($category);
    
            echo json_encode($post);
        }

        if(isset($_GET['index'])) {
            $post = $blog_instance->getIndexPost();

            echo json_encode($post);
        }
        

        break;
}

?>