 <!-- ******************************** -->
 <div class="d-flex  m-auto mybg-light  pt-3 pb-2"  >
        <form role="search" aria-label="Sitewide" id="formSearch" autocomplete="off" action="/search/book" class="search-container d-flex w-75 m-auto "; return false">
          <input class="form-control border-0 myborder-bottum mybg-light btn-outline-light" type="search" placeholder="Sheach for great book" >
         
          <button class="btn btn-search m--1 pb-3" role="search" type="submit" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search text-green " viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
          </svg></button>
          <div class="dropdown">
            <button class="btn mybg-light dropdownbutton  dropdown-toggle ms-7" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Sort according to
            </button>
            <?php 
              $url = $_SERVER['REQUEST_URI'];
              $needle = "?";
              if( strpos( $url, $needle ) !== false){
                $url .='&';
              }else{
                $url .= 'home?';
              }
            ?>
            <ul class="dropdown-menu mt-2 myrounded" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="<?php echo $url; ?>order=oldest">Oldest</a></li>
              <li><hr class="dropdown-divider mx-3"></li>
              <li><a class="dropdown-item" href="<?php echo $url; ?>order=latest">Latest</a></li>
              </ul>
          </div>
        </form>
      </div>

      <div class="d-flex w-100 ">
        <div class="w-20  border_rigth mybg-light">
          <ul class="text-center text list-style m-4">
            <a style="color: #232323;"  href="<?php echo ROOT_PATH; ?>">
            <li class="fs-4 fw-bold">Categories</li>
            </a>
            <?php
              
                $cagtegory = db_select($connection,"categories");
             foreach ($cagtegory as $cagory) {?>
               <a style="color: #232323;" class="mytext-blcak" href="<?php echo ROOT_PATH; ?>home?category=<?php echo $cagory['id']; ?>">
                <li class="fs-5 my-3 hoverlink px-3 py-2"><?= $cagory['name']?></li>
                </a>
                <hr class="my-1 p-0">    
         <?php    }
            ?>

          </ul>
        </div>
        <div class="row w-80 m-auto d-flex justify-content-evenly flex-wrap py-3">
            <?php 
              $columns = "*"; 
              $where = array(); 
              $orderby = " created ASC ";
              //
              if(isset($_GET['order']) && ($_GET['order'] === "oldest")) {
                $orderby = " created ASC ";
              }else if(isset($_GET['order']) && ($_GET['order'] === "latest")) {
                $orderby = " created DESC ";
              }
              if(isset($_GET['category'])){
                $checkCategoryId = array(
                    "column" => "category_id",
                    "operator" => "=",
                    "value" => $_GET['category']
                );
                $where[] = $checkCategoryId;
              }
              $books = db_select($connection,"books",$columns,$where,$orderby);
              
            //  $books = db_select($connection,"books"); 
                foreach($books as $book) {
            ?>
            
                <div class="items w-30 text-center overflow-hidden my-4">
                    <a class="text-black"   href="<?php echo ROOT_PATH; ?>details?id=<?php echo $book['id'] ?>">
                    <figure class="figure m-0 w-100  p-0 ">
                    <img  src="<?php echo ROOT_PATH; ?>uploads/images/<?php echo $book['image'] ?>" class="figure-img img-fluid rounded py-2 mt-4" alt="...">
                        <div class="tg-hovercontent w-100 py-5">
                            <div class="tg-description w-100 mt-2">
                            <p><?php echo $book['description'] ?></p>
                            </div>
                            <p class="tg-bookpage fw-bold m-0 mt-3" >Book Pages: <?php echo $book['page_number'] ?></p>
                    <p class="tg-bookpage fw-bold m-0 my-2" >Date: <?php echo $book['created'] ?></p>
                    <strong class="tg-bookcategory ">Category: <?php
                    $data= array(
                        "column" => "id",
                        "operator" => "=",
                        "value" => $book['category_id']  
                    ) ;
                    $where = array();
                    $where[] = $data;
                    $user = db_select($connection, "categories", "*", $where);
                    // print_r($user);
                    echo $user[0]['name'] ?> </strong>
                        </div>
                    </figure>
                        <hr class="mx-3 p-0 m-0 mb-3 ">
                        <figcaption class="fs-5 text-black"><?php echo $book['name'] ?></figcaption>
                        </a>
                    </div>
            <?php
                }
            ?>

      
      

     
  </div>
      </div>
    