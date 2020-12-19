<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="icon" type="image/png" href="image/e.jpg"/>
        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css"> -->
     
        <!-- Fonts -->
   
        <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Abel|Lato|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/sport-store.css">
        
        <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
        <!-- Bootstrap -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
        <script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script> 

     
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    

  

</head>
<body>
    
     <div class="container">
    <div class="row">
        <div class="col-lg-10 offset-1">
    <div style="height:50px;"></div>

    <span style="font-size:25px; color:blue"><center><strong>PHP/MySQLi CRUD Modal using Bootstrap</strong></center></span> 

    <!--    <span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
        <div style="height:50px;"></div> -->

        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnew">
             Add New
            </button><br>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Address</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php
                include('conn.php');
                
                $query=mysqli_query($conn,"select * from user order by userid desc");
                while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo ucwords($row['firstname']); ?></td>
                        <td><?php echo ucwords($row['lastname']); ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>
                            <!-- <a href="#edit<?php echo $row['userid']; ?>" data-toggle="modal" class="btn btn-outline-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['userid']; ?>">
                             Edit
                            </button>


                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del<?php echo $row['userid']; ?>">
                             Delete
                            </button>
                            <?php include('button.php'); ?>
                        </td>
                    </tr>
                    <?php
                }
            
            ?>
            </tbody>
        </table>
    

    <!-- Modal -->
    <?php include('add_modal.php'); ?>
     <!-- Modal  end-->

</div>
</div>
    </div>
        <script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <?php


    include('conn.php');
if(isset($_POST['add'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $address=$_POST['address'];
    
    $sql ="insert into user (firstname, lastname, address) values ('$firstname', '$lastname', '$address')";
    $run = mysqli_query($conn,$sql);

    if($run){
        header('location:index.php');
    ?>
    <script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
             
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
}).then(function() {
            window.location = "index.php";
        });
        </script>
    <?php
    // $_SESSION['status'] = "Student Information Saved";
    // $_SESSION['status_code'] = "success";
    // header('location:index.php');
    }

}

    ?>

    <?php
    include('conn.php');
    if(isset($_POST['update'])){
    $id=$_POST['id'];
    
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $address=$_POST['address'];
    
    $sql= "update user set firstname='$firstname', lastname='$lastname', address='$address' where userid='$id'";
    $run = mysqli_query($conn,$sql);

    if($run){
   ?>
    <script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
             
Swal.fire({
  icon: 'success',
  title: 'Update',
  text: 'Update Successfully',
  
}).then(function() {
            window.location = "index.php";
        });
        </script>
    <?php
    }
    }
?>
</body>
    
    

</html>

