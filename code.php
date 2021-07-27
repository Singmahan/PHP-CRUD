<?php include('dbconfig.php')?>
<?php
    
    $conn = mysqli_connect("localhost","root","","php-crud");

    if(isset($_POST['register_btn']))
    {
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone_number'];

        $query = "INSERT INTO register (fname,lname,email,password,phone) 
        VALUES ('$fname','$lname','$email','$password','$phone')";

        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            // sweetalert
            $_SESSION['status'] = "Register Successfully";
            $_SESSION['status_code'] = "success";

            header('Location: index.php');
        }else{
            // echo "Something Went Wrong";
            $_SESSION['status'] = "Data Not Register";
            $_SESSION['status_code'] = "error";

            header('Location: register.php');
        }
        
    }

    if(isset($_POST['register_update_btn']))
    {
        $update_id = $_POST['edit_id'];
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone_number'];

        $query_update = "UPDATE register SET fname='$fname',lname='$lname',email='$email',password='$password',phone='$phone' WHERE id='$update_id'";
        $query_update_run = mysqli_query($conn, $query_update);

        if($query_update_run){
            // sweetalert
            $_SESSION['status'] = "Data Updated Successfully";
            $_SESSION['status_code'] = "success";

            header("Location: index.php");
        }else{
            // sweetalert
            $_SESSION['status'] = "Data Not Update";
            $_SESSION['status_code'] = "error";

            header("Location: index.php");
        }
    }

    if(isset($_POST['register_delete_btn'])){
        $delete_id = $_POST['delete_id'];

        $reg_query = "DELETE FROM register WHERE id='$delete_id'";
        $reg_query_run = mysqli_query($conn, $reg_query);

        if($reg_query){
            // sweetalert
            $_SESSION['status'] = "Data Delete Successfully";
            $_SESSION['status_code'] = "success";

            header("Location: index.php");
        }else{
            // sweetalert
            $_SESSION['status'] = "Data Not Deleted";
            $_SESSION['status_code'] = "error";

            header("Location: index.php");
        }
    }
    if(isset($_POST['delete_btn_set']))
    {
        $del_id = $_POST['delete_id'];

        $reg_query = "DELETE FROM register WHERE id='$del_id'";
        $reg_query_run = mysqli_query($conn, $reg_query);

    }

?>