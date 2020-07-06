<?php
class Stats{
private $id;

    function __construct($adres,$uzytkownik,$haslo,$baza)
    {
        if(!$this->id = mysqli_connect($adres,$uzytkownik,$haslo,$baza) ){
            echo 'Wystąpił błąd podczas próby połączenia z serwerem MySQL...<br />';
            echo '</body></html>';
            exit;    
        }
    }
    function insert($sql){
        if(!mysqli_query($this->id,$sql)){
            echo "Nie udało się wysłać zapytania.";
            return false;
        }
    }
    function select($sql){
        $dane = array();
        $result = mysqli_query($this->id,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $dane[] = $row;
        }
        return $dane;
    }
    function __destruct()
    {
        mysqli_close($this->id);
    }
}
?>