<?php include ('connect/db.php'); ?>

<?php
$sql ="SELECT * FROM chat ORDER BY id DESC";
$run = mysqli_query($conn, $sql);
if(!$run){
    die(print_r(mysqli_connect_error()));
}    

if(mysqli_num_rows($run) <=0){
    echo "<script>alert('Datebase empty....!')</script>";
}
?>

<?php if(mysqli_num_rows($run) > 0): ?>   
    <?php while($data = mysqli_fetch_assoc($run)): ?>    
<div class="chatdata">              
    <span style="color:gold"><?php echo $data['name']; ?></span>
    <span >: </span>
    <span> <?php echo $data['message']; ?></span>
    <span style="color:red; margin-left: 20px;">Date: <?php echo $data['date']; ?></span>
    <span style="float:right"><a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></span>    

</div>
    <?php endwhile; ?>  
<?php endif; ?>  