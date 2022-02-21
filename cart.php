<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="conn_style.css">
</head>
<body>
<header>
        <a href="index.php" class="logo">Java</a>
        <div class="topnavs">
            <a href="menu.php" class="top-nav">Menu</a>
            <a href="cart.php?id=0" class="top-nav">Shopping cart</a>
        </div>
    </header>
    <div class="main-heading">
        <h1 class="main_heading">
            Shopping Cart
        </h1>
    </div>
    
    <?php 
        $id = $_GET['id'];
            require("conn.php");
            $qr_result = mysqli_query($db, "SELECT * from `orders` WHERE username = 'admin' ")
            or die(mysqli_error());
            echo '<table class="tam">';
            echo '<th>' . 'order id' . '</th>';
            echo '<th>' . 'user' . '</th>';
            echo '<th>' . 'dish id' . '</th>';
            echo '<th>' . 'dish' . '</th>';
            echo '<th>' . 'price' . '</th>';
            $total_price = 0;
            while($data = mysqli_fetch_array($qr_result)){
                $qrMenu_result = mysqli_query($db, "SELECT `dish`, `price` FROM `menu` WHERE id =".$data['dish_id']."");
                $menu_data = mysqli_fetch_array($qrMenu_result);
                echo '<tr>';
                echo '<td>' . $data['order_id'] . '</td>';
                echo '<td>' . $data['username'] . '</td>';
                echo '<td>' . $data['dish_id'] . '</td>';
                echo '<td>' . $menu_data['dish'] . '</td>';
                echo '<td>' . $menu_data['price'] . '</td>';
                $total_price +=  $menu_data['price'];
                echo '</tr>';
                
            }
            echo"</table>";
            echo '<h1 class="total_price">Total price: ' .$total_price. '</h1>';
            if($id != 0){
                $qr_input_result = mysqli_query($db, "INSERT INTO `orders`(`username`,`dish_id`) VALUES ('admin','$id') ");
                header("Location: cart.php?id=0");
            }
            else

            //or die(mysqli_error());

    ?>
</body>
</html>