<?php
session_start();
function __autoload($class){
    include $class . ".php";
  }

  $baza_danych = new Stats("localhost","s21247","Woj.Pior","s21247");

  $sql = "SELECT * FROM par";
  $wyniki = array();
  $wyniki = $baza_danych->select($sql);
  $oddanych_glosow = $wyniki[0]['suma'];

 // print_r($wyniki);
  $PIS = ($wyniki[0]['PIS'] * 100) / $oddanych_glosow;
  $PO = ($wyniki[0]['PO'] * 100) / $oddanych_glosow;
  $PSL = ($wyniki[0]['PSL'] * 100) / $oddanych_glosow;
  $WIOSNA = ($wyniki[0]['WIOSNA'] * 100) / $oddanych_glosow;
  $POROZUMIENIE = ($wyniki[0]['POROZUMIENIE'] * 100) / $oddanych_glosow;
  $LEWICA = ($wyniki[0]['LEWICA'] * 100) / $oddanych_glosow;
  $ZIELONI = ($wyniki[0]['ZIELONI'] * 100) / $oddanych_glosow;
  $UED = ($wyniki[0]['UED'] * 100) / $oddanych_glosow;
  $PPS = ($wyniki[0]['PPS'] * 100) / $oddanych_glosow;

  $kandydaci = array($PIS,$PO,$PSL,$WIOSNA,$POROZUMIENIE,$LEWICA,$ZIELONI,$UED,$PPS);
 
 
  session_destroy();
  
?>
<style> td { border: 2px solid black; } </style>
<fieldset style="width: 400px;">
<table>
  <tr style="text-align: center; ">
    <td>Partia:</td><td>Oddanych głosów:</td><td>Procent głosów:</td>
  </tr>
  <tr style="text-align: center; ">
    <td>Prawo i Sprawiedliwość<br></td>
    <td><?php echo $wyniki[0]['PIS'];?></td>
    <td><?php printf('%.3f', $PIS); echo "%"; ?></td>
  </tr>
  <tr style="text-align: center; ">
    <td>Platforma Obywatelska<br></td>
    <td><?php echo $wyniki[0]['PO'];?></td>
    <td><?php printf('%.3f', $PO); echo "%"; ?></td>
  </tr>
  <tr style="text-align: center; ">
    <td>Polskie Stronnictwo ludowe<br></td>
    <td><?php echo $wyniki[0]['PSL'];?></td>
    <td><?php printf('%.3f', $PSL); echo "%"; ?></td>
  </tr>
  <tr style="text-align: center; ">
    <td>Wiosna<br></td>
    <td><?php echo $wyniki[0]['WIOSNA'];?></td>
    <td><?php printf('%.3f', $WIOSNA); echo "%"; ?></td>
  </tr>
  <tr style="text-align: center; ">
    <td>Porozumienie<br></td>
    <td><?php echo $wyniki[0]['POROZUMIENIE'];?></td>
    <td><?php printf('%.3f', $POROZUMIENIE); echo "%"; ?></td>
  </tr>
  <tr style="text-align: center; ">
    <td>Lewica<br></td>
    <td><?php echo $wyniki[0]['LEWICA'];?></td>
    <td><?php printf('%.3f', $LEWICA); echo "%"; ?></td>
  </tr>
  <tr style="text-align: center; ">
    <td>Partia Zieloni<br></td>
    <td><?php echo round($wyniki[0]['ZIELONI'],2);?></td>
    <td><?php printf('%.3f', $ZIELONI); echo "%"; ?></td>
  </tr>
  <tr style="text-align: center; ">
    <td>Unia Europejskich Demokratów<br></td>
    <td><?php echo $wyniki[0]['UED'];?></td>
    <td><?php printf('%.3f', $UED); echo "%"; ?></td>
  </tr>
  <tr style="text-align: center; ">
    <td>Polska Partia Socjalistyczna<br></td>
    <td><?php echo $wyniki[0]['PPS'];?></td>
    <td><?php printf('%.3f', $PPS); echo "%"; ?></td>
  </tr>
</table>
</fieldset>