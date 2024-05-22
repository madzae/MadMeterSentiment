<?php
require_once 'languageMachine.php';

use function Madzae\MadMeter;

$sentences = 
  "Liverpool menatap era baru seusai ditinggalkan Juergen Klopp. 
  Manajer karismatik itu meninggalkan sejumlah catatan penting. 
  Ia merupakan satu-satunya manajer sejauh ini yang menjuarai
  Liga Inggris, Liga Champions, Piala FA, dan Piala Liga Inggris.";

MadMeter($sentences);
?> 
