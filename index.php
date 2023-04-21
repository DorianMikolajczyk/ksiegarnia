<html>
<meta http-equiv="Content-Type"'.' content="text/html; charset=utf8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<body style="background-color: #f4e1d2;">
<?php
session_start();
	if(isset($_POST['ac'])){
		$servername = "localhost";
		$username = "root";
		$password = "";

		$conn = new mysqli($servername, $username, $password);

		if ($conn->connect_error) {
		    die("Błąd połączenia: " . $conn->connect_error);
		} 

		$sql = "USE ksiegarnia";
		$conn->query($sql);

		$sql = "SELECT * FROM book WHERE BookID = '".$_POST['ac']."'";
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()){
			$bookID = $row['BookID'];
			$quantity = $_POST['quantity'];
			$price = $row['Price'];
		}

		$sql = "INSERT INTO cart(BookID, Quantity, Price, TotalPrice) VALUES('".$bookID."', ".$quantity.", ".$price.", Price * Quantity)";
		$conn->query($sql);
	}

	if(isset($_POST['delc'])){
		$servername = "localhost";
		$username = "root";
		$password = "";

		$conn = new mysqli($servername, $username, $password);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "USE ksiegarnia";
		$conn->query($sql);

		$sql = "DELETE FROM cart";
		$conn->query($sql);
	}

	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "USE ksiegarnia";
	$conn->query($sql);	

	$sql = "SELECT * FROM book";
	$result = $conn->query($sql);
?>	

<?php
if(isset($_SESSION['id'])){
	echo '<header>';
	echo '<blockquote>';
	echo '<a href="index.php"><img src="image/logo2.png"></a>';
	echo '<form class="hf" action="logout.php"><input class="hi" type="submit" name="submitButton" value="Wyloguj"></form>';
	echo '<form class="hf" action="edituser.php"><input class="hi" type="submit" name="submitButton" value="Edytuj profil" style="
    margin-top: 16.656;
"></form>';
	echo '</blockquote>';
	echo '</header>';
}

if(!isset($_SESSION['id'])){
	echo '<header>';
	echo '<blockquote>';
	echo '<a href="index.php"><img src="image/logo2.png"></a>';
	echo '<form class="hf" action="Register.php"><input class="hi" type="submit" name="submitButton" value="Zarejestruj"></form>';
	echo '<form class="hf" action="login.php"><input class="hi" type="submit" name="submitButton" value="Zaloguj" style="
    margin-top: 19.656"></form>';
	echo '</blockquote>';
	echo '</header>';
}
echo '<blockquote>';
	echo "<table id='myTable' style='width:80%; float:right;'>";
	echo "<tr>";
    while($row = $result->fetch_assoc()) {
echo "<td>";
echo "<table>";
echo '<tr><td>'.'<img src="'.$row["Image"].'"width="80%">'.'</td></tr><tr><td style="padding: 5px;">Tytuł: '.$row["BookTitle"].'</td></tr><tr><td style="padding: 5px;">ISBN: '.$row["ISBN"].'</td></tr><tr><td style="padding: 5px;">Autor: '.$row["Author"].'</td></tr><tr><td style="padding: 5px;">Typ: '.$row["Type"].'</td></tr><tr><td style="padding: 5px;">'.$row["Price"].' zł</td></tr><tr><td style="padding: 5px;">
<form action="" method="post">
Ilość: <input type="number" value="1" name="quantity" style="width: 20%"/><br>
<input type="hidden" value="'.$row['BookID'].'" name="ac"/>
<input class="button" type="submit" value="Dodaj do koszyka"/>
</form></td></tr>';
echo "</table>";
echo "</td>";
}
echo "</tr>";
echo "</table>";
$sql = "SELECT book.BookTitle, book.Image, cart.Price, cart.Quantity, cart.TotalPrice FROM book,cart WHERE book.BookID = cart.BookID;";
$result = $conn->query($sql);

echo "<table style='width:20%; float:right;'>";
echo "<th style='text-align:left;padding: 5px;'><i class='fa fa-shopping-cart' style='font-size:24px'></i> Koszyk <form style='float:right;' action='' method='post'><input type='hidden' name='delc'/><input class='cbtn' type='submit' value='Opróżnij koszyk'></form></th>";
$total = 0;
while($row = $result->fetch_assoc()){
    echo "<tr><td>";
    echo '<img src="'.$row["Image"].'"width="20%"><br>';
    echo $row['BookTitle']."<br>".$row['Price']." zł<br>";
    echo "Ilość: ".$row['Quantity']."<br>";
    echo "Cena łączna: ".$row['TotalPrice']." zł</td></tr>";
    $total += $row['TotalPrice'];
}
echo "<tr><td style='text-align: left;padding: 5px;background-color: #f2f2f2;''>";
echo "Razem: <b>".$total." zł</b>";




if ($total > 0) {

    if (isset($_SESSION['id'])) {
        echo "<center><form action='checkout.php' method='post'><input class='button' type='submit' name='checkout' value='ZAMÓW'></form></center>";
    } else {
        echo "<center><p style='color: red;'>Musisz się zalogować lub zarejestrować, aby dokonać zakupu.</p><form action='login.php'><input class='button' type='submit' value='
 się'></form><form action='Register.php'><input class='button' type='submit' value='Zarejestruj się'></form></center>";
    }
} else {
    echo "<center><p style='color: red;'>Koszyk jest pusty. Dodaj produkty, aby kontynuować.</p></center>";
}




echo "</td></tr>";
echo "</table>";
echo '</blockquote>';
?>
<style>
  .image-container {
    position: relative;
    overflow: hidden;
  }

  img {
    transition: transform 0.3s ease;
  }

  img:hover {
    transform: scale(1.1);
  }

  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
    z-index: 999;
  }

  img:hover ~ .overlay {
    opacity: 1;
  }
</style>

</body>
</html>