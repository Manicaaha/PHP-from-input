<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div class="baner"><h3>Portal Społecznościowy - panel administratora</h3></div>
    <div class="lewy">
        <h4>Użytkownicy</h4>
        <?php
        $lacz = mysqli_connect('localhost','root','','dane4');
        $pyt = "SELECT `id`,`imie`,`nazwisko`,`rok_urodzenia`,`zdjecie` FROM `osoby` limit 30;";
        $wyn = mysqli_query($lacz, $pyt);
        function wiek($wiek){
            $now = date('Y');
            $wiek = $now - $wiek;
            return $wiek;
        }
        while($row = mysqli_fetch_array($wyn)){
            $wiek = $row[3];
            echo $row[0]. " ".$row[1]." ".$row[2]." ".wiek($wiek)." lat"."<br>";
        }
        mysqli_close($lacz)
        ?>
        <a href="settings.html">Inne Ustawienia</a>
    </div>
    <div class="prawy">
        <h4>Podaj id użytkownika</h4>
        <form action="users.php" method="post">
            <input type="number" name="number">
            <input type="submit" value="ZOBACZ">
        </form>
        <hr>
        <?php
        $lacz = mysqli_connect('localhost','root','','dane4');
        $wy = $_POST['number'];
        $pyt = "SELECT osoby.`id`,osoby.`imie`,osoby.`nazwisko`,osoby.`rok_urodzenia`,osoby.`zdjecie`, osoby.`opis`, hobby.nazwa FROM `osoby` join `hobby` on osoby.Hobby_id = hobby.id where osoby.id = '$wy' ";
        $wyn = mysqli_query($lacz, $pyt);
        while($row = mysqli_fetch_array($wyn)){
            echo "<h2>".$row[0].". ".$row[1]." ".$row[2]." ".$row[3]."</h2>";
            echo '<img src="'.$row[4].'">';
            echo "<p> Opis: ".$row[5]."<br> <b>Hobby:</b> ".$row[6]."</p>";
        }
        mysqli_close($lacz)
        ?>
    </div>
    <div class="stopka">
        Strone przygotował: Martyna Borowska
    </div>
</body>
</html>