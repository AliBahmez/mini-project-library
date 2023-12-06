<?php 
 $categoryId = $_GET['id']?? "";

 $checkcategoryId = array(
     "column" => "id",
     "operator" => "=",
     "value" => $categoryId
 );
 $where[] = $checkcategoryId;
 $category = db_select($connection, 'categories', "*", $where);
?>
<!--  -->
<div  class="container my-5 w-50 text-white form-login ">
        <h2 class=" text-center py-3">Update Category</h2>
        <form action='' method="POST">
            <div class="form-group ">
                <input type="hidden" name="category_id" value="<?php echo  $categoryId; ?>">
            <input type="hidden" name="form" value="putcategory">
                <label class="fs-5 fw-bold" for="name">Name:</label>
                <input type="text" class="form-control  py-3 fw-bold" id="name" name="name" placeholder="Enter Name Category" required value="<?php echo $category[0]['name']??'' ?>">
            </div>
            <button type="submit" class="btn btn-primary mb-3 w-100 fs-5 fw-bold">Update</button>
        </form>
    </div>

   

            
