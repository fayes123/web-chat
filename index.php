<?php include('connect/db.php'); ?>
<?php include('connect/validation.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Web chat</title>
    <script>
        function online(){
            var req = new XMLHttpRequest();
            req.onreadystatechange=function(){
                if(req.readyState == 4 && req.status == 200){
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }
           req.open('POST','online.php', true);
           req.send(); 
        }
        setInterval(function(){online();}, 1000);
    </script>
</head>
<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['submit'])){  
            $name=$_POST['name'];
            $message =$_POST['mss'];

            if(required_input($name) && required_input($message)){
                $query ="INSERT INTO chat (name, message)
                    VALUES('$name', '$message')";
                
                $EXEc = mysqli_query($conn, $query);
                
                if(!$EXEc){
                    die('problem......!');
                }else{
                    echo "<script>alert('successed Insert')</script>";
                    header("location:index.php");
                }

            }else{
                echo "<script>alert('Flieds required')</script>";
                header("refresh:2;url=index.php");
            }  
        }
    }
?>

<body onload="online();">
    <div class="container">
        <div class="chat-box">
          <div id="chat">
            </div>
        </div>
        
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Enter name">
            <textarea name="mss" placeholder="Enter Message"></textarea>
            <input type="submit" name="submit" value="Send">
        </form>

    </div>
</body>
</html>