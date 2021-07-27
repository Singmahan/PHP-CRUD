<?php include('includes/hrader.php')?>
<?php include('dbconfig.php')?>
<?php 
    $id = $_GET['id'];
    $register_query = "SELECT * FROM register WHERE id='$id'";
    $register_query_run = mysqli_query($conn, $register_query);

    if(mysqli_num_rows($register_query_run) > 0){
        while($row = mysqli_fetch_array($register_query_run)){
            
            ?>
            

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="header-card">
                    <h4>Register Edit Page</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">

                    <input type="hidden" name="edit_id" class="form-control" value="<?php echo $row['id']; ?>">
                        
                    <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $row['fname']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $row['lname']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" value="<?php echo $row['phone']; ?>">
                        </div>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="register_update_btn" class="btn btn-info">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
        }
    }else{
        echo "No Data Found by this URL Id";
    }
?>
<?php include('includes/footer.php')?>