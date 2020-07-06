<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<title>Logowanie.</title>
</head>
<body>
<div>
<FORM action="" method="POST">
<Fieldset style="width: 300px">
<Legend> Panel wyborcy</Legend>
<TABLE>
<TR>
<TD>Imię:</TD>
<TD><INPUT name="imie"></TD>
</TR>
<TR>
<TD>Nazwisko:</TD>
<TD><INPUT name="nazwisko"></TD>
</TR>
<TR>
<TD>Pesel:</TD>
<TD><INPUT name="pesel"></TD>
</TR>
<TR>
<TD>&nbsp;</TD>
<TD><INPUT name="zaloguj" type="submit" value="Zaloguj"></TD>
</TR>
</TABLE>
</Fieldset>
</FORM>
</div>
</body>
</html>

<?php
function __autoload($class){
    include $class . ".php";
}
$baza_danych = new Stats("localhost","s21247","Woj.Pior","s21247");

    
   if(isset($_POST['zaloguj'])){
       
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $pesel = $_POST['pesel'];
    $ip = $_SERVER['REMOTE_ADDR'];

    if(!empty($pesel) || !empty($imie) || !empty($nazwisko))
    {
        
    
    $zapytanie = "SELECT ip FROM wyborca";
    $check = "INSERT INTO wyborca(imie,nazwisko,ip,pesel) VALUES ('$imie','$nazwisko','$ip','$pesel')";

    $dane = array();
    $dane = $baza_danych->select($zapytanie);
    print_r($dane);
    foreach($dane as $klucz=>$wartosc){
        echo "czy dziala";
        foreach($wartosc as $bla){
        if($bla == $ip){
            echo "Juz glosowales!";
            header('Location:wyniki.php');
        }else {
            $baza_danych->insert($check);
            header('Location: glowna.php');
       }
    }
    }
}
    else {
        header("Location: index.php");
    }
   }
?>