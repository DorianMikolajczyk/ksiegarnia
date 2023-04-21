<?php
session_start();
$nameErr = $emailErr = $genderErr = $addressErr = $icErr = $contactErr = $usernameErr = $passwordErr = "";
$name = $email = $gender = $address = $ic = $contact = $uname = $upassword = "";
$cID;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Proszę wprowadzić swoje imię i nazwisko";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Dozwolone są tylko litery i spacje";
            $name = "";
        } else {
            $name = $_POST['name'];

            if (empty($_POST["uname"])) {
                $usernameErr = "Proszę wprowadzić nazwę użytkownika";
                $uname = "";
            } else {
                $uname = $_POST['uname'];

                if (empty($_POST["upassword"])) {
                    $passwordErr = "Proszę wprowadzić hasło";
                    $upassword = "";
                } else {
                    $upassword = $_POST['upassword'];

                    if (empty($_POST["ic"])) {
                        $icErr = "Proszę wprowadzić numer dowodu osobistego";
                    } else {
                        if (!preg_match("/^[0-9 -]*$/", $ic)) {
                            $icErr = "Proszę wprowadzić poprawny numer dowodu osobistego";
                            $ic = "";
                        } else {
                            $ic = $_POST['ic'];

                            if (empty($_POST["email"])) {
                                $emailErr = "Proszę wprowadzić adres e-mail";
                            } else {
                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    $emailErr = "Nieprawidłowy format e-mail";
                                    $email = "";
                                } else {
                                    $email = $_POST['email'];

                                    if (empty($_POST["contact"])) {
                                        $contactErr = "Proszę wprowadzić numer telefonu";
                                    } else {
                                        if (!preg_match("/^[0-9 -]*$/", $contact)) {
                                            $contactErr = "Proszę wprowadzić poprawny numer telefonu";
                                            $contact = "";
                                        } else {
                                            $contact = $_POST['contact'];

                                            if (empty($_POST["gender"])) {
                                                $genderErr = "* Płeć jest wymagana!";
                                                $gender = "";
                                            } else {
                                                $gender = $_POST['gender'];

                                                if (empty($_POST["address"])) {
                                                    $addressErr = "Proszę wprowadzić adres";
                                                    $address = "";
                                                } else {
                                                    $address = $_POST['address'];

                                                    $servername = "localhost";
                                                    $username = "root";
                                                    $password = "";

                                                    $conn = new mysqli($servername, $username, $password);

                                                    if ($conn->connect_error) {
                                                        die("Nie udało się połączyć: " . $conn->connect_error);
                                                    }

                                                    $sql = "USE ksiegarnia";
                                                    $conn->query($sql);

                                                    $sql = "INSERT INTO users(UserName, Password) VALUES('" . $uname . "', '" . $upassword . "')";
                                                    $conn->query($sql);

                                                    $sql = "SELECT UserID FROM users WHERE UserName = '".$uname."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
$id = $row['UserID'];
}
                                                $sql = "INSERT INTO customer(CustomerName, CustomerPhone, CustomerIC, CustomerEmail, CustomerAddress, CustomerGender, UserID) 
                                                VALUES('".$name."', '".$contact."', '".$ic."', '".$email."', '".$address."', '".$gender."', ".$id.")";
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
    <a href="index.php"><img src="image/logo2.png" width="9%"></a>
</blockquote>
</header>
<blockquote>
<div class="container">
<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1>Rejestracja:</h1>
    Imię i nazwisko:<br><input type="text" name="name" placeholder="Imię i nazwisko">
    <span class="error" style="color: red; font-size: 0.8em;"><?php echo $nameErr;?></span><br><br>
	Nazwa użytkownika:<br><input type="text" name="uname" placeholder="Nazwa użytkownika">
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $usernameErr;?></span><br><br>

Nowe hasło:<br><input type="password" name="upassword" placeholder="Hasło">
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $passwordErr;?></span><br><br>

Numer dowodu osobistego:<br><input type="text" name="ic" placeholder="xxxxxx-xx-xxxx">
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $icErr;?></span><br><br>

E-mail:<br><input type="text" name="email" placeholder="example@email.com">
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $emailErr;?></span><br><br>

Numer telefonu:<br><input type="text" name="contact" placeholder="Wprowadź numer telefonu" pattern="[0-9]+" title="Telefon powinien składać się z cyfr!">
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $contactErr;?></span><br><br>

<label>Płeć:</label><br>
<input type="radio" name="gender" <?php if (isset($gender) && $gender == "Mężczyzna") echo "checked";?> value="Mężczyzna">Mężczyzna
<input type="radio" name="gender" <?php if (isset($gender) && $gender == "Kobieta") echo "checked";?> value="Kobieta">Kobieta
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $genderErr;?></span><br><br>

<label>Adres:</label><br>
<textarea name="address" cols="50" rows="5" placeholder="Adres"></textarea>
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $addressErr;?></span><br><br>
<input class="button" type="submit" name="submitButton" value="Zatwierdź" onClick="window.location='login.php';>
<input class="button" type="button" name="cancel" value="Anuluj" onClick="window.location='index.php';" />
</form>
</div>
</blockquote>
</center>
</body>
</html>
