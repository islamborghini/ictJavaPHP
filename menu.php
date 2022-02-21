<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="conn_style.css">
    <title>Menu</title>
</head>
<body>
    <header>
        <a href="index.php" class="logo">Java</a>
        <div class="topnavs">
            <a href="menu.php" class="top-nav">Menu</a>
            <a href="cart.php?id=0" class="top-nav">Shopping cart</a>
        </div>
    </header>
    <h1>
        This is the menu of our cafe:
    </h1>

    <h1 class="menu_label">
        Our menu:
    </h1>
    <?php  
        require("conn.php");
        $db_table_to_show = 'menu';  
        //использование развлетвления
        $qr_result = mysqli_query($db, "Select * from `menu`")
        or die(mysqli_error());
        echo '<table class="tam">';
        echo '<th>' . 'ID' . '</th>';
        echo '<th>' . 'Dish name' . '</th>';
        echo '<th>' . 'Price' . '</th>';
        echo '<th>' . 'Photo' . '</th>';
        echo '<th>' . 'Add to a shopping cart' . '</th>';
        //использование цикла
        $total_price = 0;
        while($data = mysqli_fetch_array($qr_result)){
        echo '<tr>';
        echo '<td>' . $data['id'] . '</td>';
        echo '<td>' . $data['dish'] . '</td>';
        echo '<td>' . $data['price'] . '</td>';
        $total_price = $total_price + $data['price'];
        //вывод картинки
        $image = $data['photo'];
        $imageData = base64_encode(file_get_contents($image));
        echo'<td>';
        echo '<img style = "width:200px; height: 200px;"src="data:image/jpeg;base64,'.$imageData.'">';
        echo'</td>';
        echo'<td>';
        echo'<a href = "cart.php?id='.$data["id"].'"</a>';
        echo'<input class = "submit-btn" type = "submit" value = "Add to the cart" id = '.$data['id'].'>';
      // echo'<input type = "submit" value = "Add to the cart" name = "submit"'; 
       //echo'</td>';
       //echo'</tr>';
        }
       echo '</table>';
       if(isset($_POST['submit'])){
        header("location.php");
    }
    ?>
</body>
</html>