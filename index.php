<?php

// Define a constant
define('ROOT_PATH', '/libaray/');

require_once('inc/app.php');

$db_server = "localhost";
$db_user = "root";
$db_user_pass = "";
$db_name = "libaray";

$connection = db_connect($db_server, $db_user, $db_user_pass, $db_name); 
//
$pageName = myAppRequestRoute();
// ====================================================

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["form"]) && ($_POST["form"] === "login")){
        $username = $_POST["username"];
        $password = $_POST["password"];
        // $checked = db_select($connection,users , )
        $checkUsername = array(
            "column" => "username",
            "operator" => "=",
            "value" => $username
        );
        $checkPassword = array(
            "column" => "password",
            "operator" => "=",
            "value" => $password
        );
        $where = array();
        $where[] = $checkPassword;
        $where[] = $checkUsername;
        $user = db_select($connection, "users", "*", $where);
        if (!empty($user)) { 
            $_SESSION['isSignedIn']= true;
           
                    // Redirect to /
                    header("Location: " . ROOT_PATH );
                exit;
            }else{ 
                
                header("Location: ".ROOT_PATH);
                exit;
            }
        
            
    }
 
    //
    if(isset($_POST["form"]) && ($_POST["form"] === "addbook")){
        $name = $_POST['name'];
        // print_r($_FILES); exit;
        $image = $_FILES['image']['name'];
        $pdf = $_FILES['pdf']['name'];
        $page = $_POST['page'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        // echo 'the image and pdf :'. $image . '<br>' . $pdf; exit;
        $imagePath = 'uploads/images/' . $image;
        $pdfPath = 'uploads/pdf/' . $pdf;
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        move_uploaded_file($_FILES['pdf']['tmp_name'], $pdfPath);
        
        $data = array(
            "name" => $name,
            "page_number" => $page,
            "description" => $description,
            "category_id" => $category,
            "image" => $image,
            "book" => $pdf,
        );
  
        $user = db_insert($connection, "books", $data);
        header("Location: " . ROOT_PATH . 'admin/books');
        // print_r($user);
        exit();
    }
    //
    if(isset($_POST["form"]) && ($_POST["form"] === "addcategory")){
        $namecategory = $_POST["name"];
        $data = array(
            "name"=> $namecategory,
        );
        db_insert($connection,"categories", $data);
        header("Location: " . ROOT_PATH . 'admin/categories');
    }
    //
    if (isset($_POST["form"]) && ($_POST["form"] === "putcategory")) {
        $namecategory = $_POST["name"];
        $category_Id = $_POST["category_id"];
        
        $data = array(
            "name" => $namecategory,
        );
        
        $checkBookId = array(
            "column" => "id",
            "operator" => "=", 
            "value" => $category_Id,
        );
       
        $where[] = $checkBookId;
        
        $updatedRows = db_update($connection, "categories", $data, $where);
        header("Location: " . ROOT_PATH . 'admin/categories');
    }

    if (isset($_POST["form"]) && ($_POST["form"] === "putbook")){

        $book_Id = $_POST["book_id"];
        $name = $_POST['name'];
        $image = $_FILES['image']['name'];
        $pdf = $_FILES['pdf']['name'];
        $page = $_POST['page'];
        $category = $_POST['category'];
        $description = $_POST['description'];

        $data = array(
            "name" => $name,
            "page_number" => $page,
            "description" => $description,
            "category_id" => $category,
            "image" => $image,
            "book" => $pdf,
        );
        $checkBookId = array(
            "column" => "id",
            "operator" => "=", 
            "value" => $book_Id,
        );
        $updatedRows = db_update($connection, "books", $data, $where);
        header("Location: " . ROOT_PATH . 'admin/books');

    }


    if (isset($_POST['delete_category_submit'])) {
        $deleteCategoryId = $_POST['delete_category_id'];
        
        $checkUsername = array(
            "column" => "id",
            "operator" => "=",
            "value" => $deleteCategoryId
        );
        $where = array();
        $where[] = $checkUsername;
        $result = db_delete($connection, "categories", $where);
        print_r($result);


        header("Location: " . ROOT_PATH . 'admin/categories');
        exit();
    }
    if (isset($_POST['delete_book_submit'])) {
        $deleteCategoryId = $_POST['delete_book_id'];
        
        $checkUsername = array(
            "column" => "id",
            "operator" => "=",
            "value" => $deleteCategoryId
        );
        $where = array();
        $where[] = $checkUsername;
        $result = db_delete($connection, "books", $where);
        print_r($result);


        header("Location: " . ROOT_PATH . 'admin/books');
        exit();
    }

}

if(!empty($_GET)) {

    if(isset($_GET['action']) && ($_GET['action'] === "download_book")) {
        // $file = $_GET["file"] .".pdf"; 
        // // We will be outputting a PDF 
        // header('Content-Type: application/pdf'); 
        // // It will be called downloaded.pdf 
        // header('Content-Disposition: attachment; filename="gfgpdf.pdf"'); 
        // $bookPdf = file_put_contents($image, file_get_contents($file));  
        // echo $imagepdf;

        //
        $bookId = $_GET["id"];
        $checkBookId = array(
            "column" => "id",
            "operator" => "=",
            "value"=> $bookId
        );
        $where = array();
        $where[] = $checkBookId;
        $book = db_select($connection,  "books", "*", $where);
        // print_r($book); exit;
        //
        
        $file = ROOT_PATH."uploads/pdf/".$book[0]['book']; 

        // header("Content-Type: application/octet-stream"); 
        // header("Content-Disposition: attachment; filename=" . urlencode($book[0]['book']));    
        // header("Content-Type: application/download"); 
        // header("Content-Description: File Transfer");             
        // header("Content-Length: " . filesize($file)); 
        // flush(); // This doesn't really matter. 
        // $fp = fopen($file, "r"); 
        // while (!feof($fp)) { 
        //     echo fread($fp, 65536); 
        //     flush(); // This is essential for large downloads 
        // }
        // fclose($fp);  
        //
        header('Content-Disposition: attachment; filename="' . urlencode($book[0]['book']).'"');
        $pdf = file_put_contents($image, file_get_contents($file));
        echo $pdf;
    }
    
}
// if($pageName === 'admin/addbook'){
//     if(myAppIsUserSignedIn()){
//         header("Location: ".ROOT_PATH."admin/addbook");
//     }else{
//         header("Location: ".ROOT_PATH."notfound");
//     }
// }
if($pageName == "signout"){
    myAppSignout();
    // Redirect to /
    header("Location: ".ROOT_PATH);
    exit;
}




// ====================================================
// Construct the file path
$pageName = explode('?', $pageName)[0];
$filePath = 'pages/' . $pageName . '.php';

// Check if the file exists
if (file_exists($filePath)) {
    require_once('layout/header.php');
    // Include or require the file
    require_once($filePath);
    require_once('layout/footer.php');
} else {
    require_once('layout/header.php');
    // File not found, handle the error
    require_once('pages/notfound.php');
    require_once('layout/footer.php');
}
