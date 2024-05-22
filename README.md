# MadMeterSentiment
PHP function to analyzing sentiment of Bahasa Indonesia (Indonesian) sentences or articles.

This function use simplified Naive Bayes Algorithm, combined with four databases as foundation to analyzing which part of the sentences or articles have positive or negative values.

To use, just call this:

```php

require_once 'languageMachine.php';

use function Madzae\MadMeter;

$sentences = 
  "Liverpool menatap era baru seusai ditinggalkan Juergen Klopp. 
  Manajer karismatik itu meninggalkan sejumlah catatan penting. 
  Ia merupakan satu-satunya manajer sejauh ini yang menjuarai
  Liga Inggris, Liga Champions, Piala FA, dan Piala Liga Inggris.";

MadMeter($sentences);

```
The result throw as JSON

Enjoy!
