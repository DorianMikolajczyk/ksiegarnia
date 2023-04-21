<?php
session_start();
$nameErr = $emailErr = $genderErr = $addressErr = $icErr = $contactErr = $usernameErr = $passwordErr = "";
$name = $email = $gender = $address = $ic = $contact = $uname = $upassword = "";
$cID;

$oUserName;
$oPassword;
$oName;
$oIC;
$oEmail;
$oPhone;
$oAddress;

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password); 

if ($conn->connect_error) {
    die("Nie udało się połączyć z bazą danych: " . $conn->connect_error);
} 

$sql = "USE ksiegarnia";
$conn->query($sql);

$sql = "SELECT users.UserName, users.Password, customer.CustomerName, customer.CustomerIC, customer.CustomerEmail, customer.CustomerPhone, customer.CustomerGender, customer.CustomerAddress
	FROM users, customer
	WHERE users.UserID = customer.UserID AND users.UserID = ".$_SESSION['id']."";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
	$oUserName = $row['UserName'];
	$oPassword = $row['Password'];
	$oName = $row['CustomerName'];
	$oIC = $row['CustomerIC'];
	$oEmail = $row['CustomerEmail'];
	$oPhone = $row['CustomerPhone'];
	$oAddress = $row['CustomerAddress'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Proszę wprowadzić swoje imię i nazwisko";
	}else{
		if (!preg_match("/^[a-zA-Z ]*$/", $name)){
			$nameErr = "Dozwolone są tylko litery i spacje";
			$name = "";
		}else{
			$name = $_POST['name'];

			if (empty($_POST["uname"])) {
				$usernameErr = "Proszę wprowadzić swoją nazwę użytkownika";
				$uname = "";
			}else{
				$uname = $_POST['uname'];

				if (empty($_POST["upassword"])) {
					$passwordErr = "Proszę wprowadzić swoje hasło";
					$upassword = "";
				}else{
					$upassword = $_POST['upassword'];

					if (empty($_POST["ic"])){
						$icErr = "Proszę wprowadzić swój numer dowodu osobistego";
					}else{
						if(!preg_match("/^[0-9 -]*$/", $ic)){
							$icErr = "Proszę wprowadzić prawidłowy numer dowodu osobistego";
							$ic = "";
						}else{
							$ic = $_POST['ic'];

							if (empty($_POST["email"])){
								$emailErr = "Proszę wprowadzić swój adres e-mail";
							}else{
								if (filter_var($email, FILTER_VALIDATE_EMAIL)){
									$emailErr = "Nieprawidłowy format adresu e-mail";
									$email = "";
								}else{
									$email = $_POST['email'];

									if (empty($_POST["contact"])){
										$contactErr = "Proszę wprowadzić swój numer telefonu";
									}else{
										if(!preg_match("/^[0-9 -]*$/", $contact)){
											$contactErr = "Proszę wprowadzić prawidłowy numer telefonu";
											$contact = "";
										}else{
$contact = $_POST['contact'];

if (empty($_POST["gender"])){
$genderErr = "* Płeć jest wymagana!";
$gender = "";
}else{
$gender = $_POST['gender'];
if (empty($_POST["address"])){
	$addressErr = "Proszę wprowadzić swój adres";
	$address = "";
}else{
	$address = $_POST['address'];

	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = new mysqli($servername, $username, $password); 

	if ($conn->connect_error) {
	    die("Połączenie nieudane: " . $conn->connect_error);
	} 

	$sql = "USE ksiegarnia";
	$conn->query($sql);

	$sql = "UPDATE users SET UserName = '".$uname."', Password = '".$upassword."' WHERE UserID = "
	.$_SESSION['id']."";
	$conn->query($sql);

	$sql = "UPDATE customer SET CustomerName = '".$name."', CustomerPhone = '".$contact."', 
	CustomerIC = '".$ic."', CustomerEmail = '".$email."', CustomerAddress = '".$address."', 
	CustomerGender = '".$gender."'";
	$conn->query($sql);

	header("Location:index.php");
}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
<html>
<link rel="stylesheet" href="style.css">
<body style="background-color: #f4e1d2;">
<header>
<blockquote>
	<a href="index.php"><img src="image/logo2.png" width="20%"></a>
</blockquote>
</header>
<blockquote>
<div class="container">
<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<h1>Edytuj profil:</h1>
	Imię i nazwisko:<br><input type="text" name="name" placeholder="<?php echo $oName; ?>">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $nameErr;?></span><br><br>

	Nazwa użytkownika:<br><input type="text" name="uname" placeholder="<?php echo $oUserName; ?>">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $usernameErr;?></span><br><br>

	Nowe hasło:<br><input type="password" name="upassword" placeholder="<?php echo $oPassword; ?>">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $passwordErr;?></span><br><br>

	Numer dowodu osobistego:<br><input type="text" name="ic" placeholder="<?php echo $oIC; ?>">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $icErr;?></span><br><br>

	E-mail:<br><input type="text" name="email" placeholder="<?php echo $oEmail; ?>">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $emailErr;?></span><br><br>

	Numer telefonu:<br><input type="text" name="contact" placeholder="<?php echo $oPhone; ?>" pattern="[0-9]+" title="Telefon powinien składać się z cyfr!">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $contactErr;?></span><br><br>

	<label>Płeć:</label><br>
	<input type="radio" name="gender" <?php if (isset($gender) && $gender == "Male") echo "checked";?> value="Male">Mężczyzna
	<input type="radio" name="gender" <?php if (isset($gender) && $gender == "Female") echo "checked";?> value="Female">Kobieta
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $genderErr;?></span><br><br>

	<label>Adres:</label><br>
    <textarea name="address" cols="50" rows="5" placeholder="<?php echo $oAddress; ?>"></textarea>
    <span class="error" style="color: red; font-size: 0.8em;"><?php echo $addressErr;?></span><br><br>
	
	<input class="button" type="submit" name="submitButton" value="Edytuj">
	<input class="button" type="button" name="cancel" value="Anuluj" onClick="window.location='index.php';" />
</form>
</div>
</blockquote>
</center>
</body>
</html>
