<?php
  $bookId = $_GET['id'];

  $checkBookId = array(
      "column" => "id",
      "operator" => "=",
      "value" => $bookId
  );
  $whereBook[] = $checkBookId;
  $book = db_select($connection, 'books', "*", $whereBook);
  
  if (!empty($book)) {
      $categoryId = $book[0]['category_id'];
  
      $checkCategoryId = array(
          "column" => "id",
          "operator" => "=",
          "value" => $categoryId
      );
      $whereCategory[] = $checkCategoryId;
      $category = db_select($connection, "categories", "*", $whereCategory);
  }
?>
<div class="d-flex py-5 mx-7">
        <div class=" w-50 cart1 text-center">
            <img class=" img-detels" width="334px" height="334px" src="<?php echo ROOT_PATH ?>uploads/images/<?php echo $book[0]['image']; ?>" alt="">
        </div>
        <div class=" w-50 cart2 ">
            <h2 class="mt-5 text-detels"><?php echo $book[0]['name']; ?></h2>
            <p class="mt-3 fw-bold text-detels"><?php echo $book[0]['description']; ?></p>
            <p class="fw-bold m-0 my-3 text-detels" >Book Pages: <?php echo $book[0]['page_number']; ?></p>
            <p class="tg-bookpage fw-bold m-0 mb-2 text-detels" >Date: <?php echo $book[0]['created']; ?></p>
            <p class=" fw-bold text-detels">Category:  <?php echo $category[0]['name']; ?></p>
            <hr class="w-25 h-5"> 
            <a target="_blank" href="uploads/pdf/<?php echo $book[0]['book']?>">
    <button type="button" class="btn btn-outline-while bg-white py-2 my-4 w-100" onclick="window.open('uploads/pdf/<?php echo $book[0]['book']?>', '_blank')">
        Display
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download mx-1" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"/>
        </svg>
    </button>
</a>
        <a href="<?php echo ROOT_PATH; ?>details?action=download_book&id=<?php echo $book[0]['id']; ?>">
            <button type="button" class="btn btn-outline-while bg-white py-2  w-100">Download
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download mx-1" viewBox="0 0 16 16">
                  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                </svg>
            </button>
        </a>
        </div>
    </div>