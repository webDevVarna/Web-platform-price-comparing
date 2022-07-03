<?php  
session_start();
include 'database.php';
$name = $_SESSION["username"];
$sql="SELECT * FROM users WHERE name='".$name."'";
$result = mysqli_query($link, $sql);
while($row = $result->fetch_assoc()) { 
    if(isset($_POST["insert"]))  
    {  
        $file = base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));
        $phone = $_POST["phone"];
        $date = date('Y-m-d', strtotime($_POST['date']));
        $sex = $_POST["sex"];
        $city = $_POST['city'];
        
        $userID = $row['id'];
        $query = "UPDATE users SET image = '$file', phone = '$phone', date = '$date', sex = '$sex', city='$city' WHERE id = '$userID'";  
        if(mysqli_query($link, $query))  
        {  
            $_SESSION['message'] = "Данните Ви са обновени !"; 
            header('Location: account.php');
        }  
    }
}
?>  