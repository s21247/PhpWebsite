
<?php
session_start();
function __autoload($class){
  include $class . ".php";
}
?>
<html>
<head>
<meta charset="uft-8">
<title>Głosowanie</title>
</head>
<body>
<p>
<FORM action="" method="POST">
<Fieldset>
<Legend>Wybory partii politycznych w Polsce</Legend>
<table>
<ul>
    <h1>Partie polityczne</h1>
    <tr>
    <td><input type=radio name="glos" value="1">Prawo i Sprawiedliwość<br>
    <img src="logo/PIS.jpg" alt=""></td>
    <td><input type=radio name="glos" value="2">Platforma Obywatelska<br>
    <img src="logo/PO.jpg" alt=""></td>
    <td><input type=radio name="glos" value="3">Polskie Stronnictwo ludowe<br>
    <img src="logo/PSL.png" alt=""></td>
    </tr>
    <tr>
    <td><input type=radio name="glos" value="4">Wiosna<br>
    <img src="logo/WIOSNA.png" alt=""></td>
    <td><input type=radio name="glos" value="5">Porozumienie<br>
    <img src="logo/POROZUMIENIE.jpg" alt=""></td>
    <td><input type=radio name="glos" value="6">Lewica razem<br>
    <img src="logo/LEWICA.png" alt=""></td>
    </tr>
    <tr>
    <td><input type=radio name="glos" value="7">partia Zieloni<br>
    <img src="logo/ZIELONI.png" alt=""></td>
    <td><input type=radio name="glos" value="8">Unia Europejskich Demokratów<br>
    <img src="logo/EUD.png" alt=""></td>
    <td><input type=radio name="glos" value="9">Polska Partia Socjalistyczna<br>
    <img src="logo/PPS.png" alt=""></td>
    </tr>
    <tr>
        <td><br>
        <input type=submit name="submit" value="ODDAJ GŁOS"><br>
        </td>
    </tr>
</ul>
</p>
</Fieldset>
</FORM>
</body>
</html>
<?php

$baza_danych = new Stats("localhost","s21247","Woj.Pior","s21247");


if(isset($_POST['submit'])){

  $kandydat_nr = $_POST['glos'];


  switch($kandydat_nr){
    case 1:{
      $sql = "UPDATE par SET PIS=PIS+1 , suma=suma+1";
      $baza_danych->insert($sql);
    }break;
        case 2:{
      $sql = "UPDATE par SET PO=PO+1 , suma=suma+1";
      $baza_danych->insert($sql);
    }break;
    case 3:{
      $sql = "UPDATE par SET PSL=PSL+1 , suma=suma+1";
      $baza_danych->insert($sql);
    }break;
    case 4:{
      $sql = "UPDATE par SET WIOSNA=WIOSNA+1 , suma=suma+1";
      $baza_danych->insert($sql);
    }break;
    case 5:{
      $sql = "UPDATE par SET POROZUMIENIE=POROZUMIENIE+1 , suma=suma+1";
      $baza_danych->insert($sql);
    }break;
    case 6:{
      $sql = "UPDATE par SET LEWICA=LEWICA+1 , suma=suma+1";
      $baza_danych->insert($sql);
    }break;
    case 7:{
      $sql = "UPDATE par SET ZIELONI=ZIELONI+1 , suma=suma+1";
      $baza_danych->insert($sql);
    }break;
    case 8:{
      $sql = "UPDATE par SET UED=UED+1 , suma=suma+1";
      $baza_danych->insert($sql);
    }break;
    case 9:{
      $sql = "UPDATE par SET PPS=PPS+1 , suma=suma+1";
      $baza_danych->insert($sql);
    }break;
  }
  header("Location: wyniki.php");
}

?>