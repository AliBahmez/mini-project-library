<br>
<h2 class='text-center m-auto fw-bold'>Management books</h2>
<br>
<table style="box-shadow: 0px 0px 10px lightgrey;" class="table w-80 m-auto mb-4 fw-bold table-striped px-5">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>page_number</th>
                        <th>category</th>
                        <th >description</th>
                        <th>image</th>
                        <th >book</th>
                        <th>created</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        $books = db_select($connection,"books");
                        // print_r($books);
                        foreach($books as $book){?>
                        <tr>
                        <td><?php echo $book['id'] ?></td>
                        <td><?php echo $book['name'] ?></td>
                        <td><?php echo $book['page_number'] ?></td>
                        <td><?php
                        $data= array(
                            "column" => "id",
                            "operator" => "=",
                            "value" => $book['category_id']  
                        ) ;
                        $where = array();
                        $where[] = $data;
                        $user = db_select($connection, "categories", "*", $where);
                        // print_r($user);
                        echo $user[0]['name'] ;
                        
                         ?></td>
                        <td><?php echo $book['description'] ?></td>
                        <td> <?php echo $book['image'] ?></td>
                        <td><?php echo $book['book'] ?></td>
                        <td><?php echo $book['created'] ?></td>
                        <td>
                            <!-- <a class="btn btn-sm btn-secondary btn-action" data-id="2" data-action="view">View</a> -->
                            <a href="<?php echo ROOT_PATH; ?>admin/putbook?id=<?php echo $book['id'] ?>" class="btn btn-sm btn-primary btn-action my-2 text-white fw-bold" data-id="2" data-action="update">Update</a>
                            <!-- <a class="btn btn-sm btn-danger btn-action" data-id="2" data-action="delete">Delete</a> -->
                            <form method="POST" action="">
                            <input type="hidden" name="delete_book_id" value="<?php echo $book['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-danger btn-action fw-bold px-3" name="delete_book_submit" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                        <?php
                        }
                        ?>
                          </tr>
                </tbody>
                
            </table>
            <br>