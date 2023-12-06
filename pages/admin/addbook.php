<?php

if($pageName === 'admin/addbook'){
    if(!myAppIsUserSignedIn()){
        header("Location: ".ROOT_PATH);
        echo '<script>';
        echo 'alert("fsvrefkfkrf");';
        echo '</script>';
    }
}

?>
<div  class="container my-3 w-50 text-white form-login ">
        <h2 class=" text-center py-3">Add Book</h2>
        <form action="" method="post" enctype="multipart/form-data">
             <input type="hidden" name="form" value="addbook">
            <div class="form-group ">
                <label class="fs-5 fw-bold" for="name">Name:</label>
                <input type="text" class="form-control  py-3 fw-bold" id="name" name="name" placeholder="Enter Name Book" required>
            </div>

            <div class="form-group">
                <label class="fs-5 fw-bold" for="image">Image:</label>
                <input type="file" class="form-control-file " id="image" name="image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label class="fs-5 fw-bold" for="pdf">Upload PDF:</label>
                <input type="file" class="form-control-file" id="pdf" name="pdf" accept=".pdf" required>
            </div>

            <div class="form-group">
                <label class="fs-5 fw-bold" for="page">Page Number:</label>
                <input type="number" class="form-control fw-bold" id="page" name="page" placeholder="Enter Page Number" required>
            </div>

            <div class="form-group">
              <label class="fs-5 fw-bold" for="category">Category:</label>
              <select class="form-control py-1 fw-bold " id="category" name="category" required>
                  <option class="my-2 fs-5 " value="">Select a category</option>
                  <?php 
             $cagtegory = db_select($connection,"categories");  
             foreach ($cagtegory as $cagory) {?>
               <option class="fw-bold" value="<?= $cagory['id']?>"><?= $cagory['name']?></option>
                
         <?php    }
            ?>
                 </select>
          </div>

            <div class="form-group">
                <label class="fs-5 fw-bold" for="description">Description:</label>
                <br>
                <textarea name="description" id="" cols="76" rows="5" placeholder="Enter Description" class="py-1 px-2 "></textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-3 w-100 fs-5 fw-bold">Create</button>
        </form>
    </div>
