<?php include('includes/hrader.php')?>
<?php include('dbconfig.php')?>

    <div class="container">
       <div class="row">
           <div class="col-md-12 mt-5">
               <div class="card">
                   <div class="card-header">
                        <h4>
                           PHP - CRUD
                           <a href="register.php" class="btn btn-primary float-right">Register / Add</a>
                        </h4>
                   </div>
                   <div class="card-body">
                       <?php 
                            
                            $register = "SELECT * FROM register";
                            $register_run = mysqli_query($conn, $register);

                            if(mysqli_num_rows($register_run) >0){
                                
                        ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">FirstName</th>
                                <th scope="col">LastName</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">EDIT</th>
                                <th scope="col">DELETE</th>
                                <th scope="col">Confirm DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($reg_row = mysqli_fetch_array($register_run)) 
                                { 
                                ?>
                            <tr>
                                <th><?php echo $reg_row['id']; ?></th>
                                <td><?php echo $reg_row['fname']; ?></td>
                                <td><?php echo $reg_row['lname']; ?></td>
                                <td><?php echo $reg_row['email']; ?></td>
                                <td><?php echo $reg_row['password']; ?></td>
                                <td><?php echo $reg_row['phone']; ?></td>
                                <td>
                                    <a href="register-edit.php?id=<?php echo $reg_row['id']; ?>" class="btn btn-info ">Edit</a>   
                                </td>
                                <td>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="delete_id" value="<?php echo $reg_row['id']; ?>">
                                        <button type="submit" name="register_delete_btn" class="btn btn-danger ">Delete</button>
                                    </form> 
                                </td>
                                <td>
                                    <input type="hidden" class="delete_id_value" value="<?php echo $reg_row['id']; ?>">
                                    <a href="javascripit:void(0)" class="delete_btn_ajax btn btn-danger">Confirm Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php 
                            }else{
                                echo "No Record Found";
                            }
                       ?>
                   </div>
               </div>
           </div>
       </div> 
    </div>

    <?php include('includes/footer.php')?>