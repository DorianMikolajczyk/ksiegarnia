<html>
<link rel="stylesheet" href="style.css">
<body style="background-color: #f4e1d2;">
<header>
<blockquote>
    <a href="index.php"><img src="image/logo2.png"></a>
</blockquote>
</header>
<blockquote>
<div class="container">
<center><h1>Zaloguj się</h1></center>
<form action="checklogin.php" method="post">
    Login:<br><input type="text" name="username"/>
    <br><br>
    Hasło:<br><input type="password" name="pwd" />
    <br><br>
    <input class="button" type="submit" value="Zaloguj się!"/>
    <input class="button" type="button" name="cancel" value="Powrót" onClick="window.location='index.php';" />
</form>
</div>
<blockquote>
<?php
if(isset($_GET['errcode'])){
    if($_GET['errcode']==1){
        echo '<span style="color: red;">Błędne dane.</span>';
    }elseif($_GET['errcode']==2){
        echo '<span style="color: red;">Zaloguj się.</span>';
    }
}

?>
</body>
</html>