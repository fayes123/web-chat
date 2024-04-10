<?php include ('connect/db.php'); ?>
<?php
if($_SERVER['REQUEST_METHOD'] === "GET"){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM chat WHERE id =$id";
        $query = mysqli_query($conn, $sql);

        if(!$query){
            die(mysqli_connect_error());
        }else{
            header("location:index.php");
        }
    }
}


