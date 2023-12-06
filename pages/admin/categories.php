<table class="table w-75 m-auto mb-5 table-striped mymb-6">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="w-100">
                    <?php 
                    
                    $cagtegory = db_select($connection,"categories");                    

                foreach ($cagtegory as $value) {
                    ?>
                    <tr class="w-100">
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td class='d-flex  p-0 mt-2'>
                        <div>
                        <a  href="<?php echo ROOT_PATH; ?>admin/putcategory?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-primary btn-action fw-bold px-3 me-2 text-white" data-id="<?php echo $value['id']; ?>" data-action="update">Update</a>
                            
                        </div>    
                        <form method="POST" action="">
                            <input type="hidden" name="delete_category_id" value="<?php echo $value['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-danger btn-action fw-bold px-3" name="delete_category_submit" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                    ?>
                    
                </tbody>
            </table>
