<?php

function yeniAd($ad) {
  // * adlar.txt sənədini $adlarFayl dəyişəni ilə əlaqələndiririk
  $adlarFayl = 'adlar.txt';
  
  // * Bu faylın oxunaqlığını artırmaq üçündür
  $adlar = file($adlarFayl, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  // * Əgər ad istifadə olunubsa təkrar istifadə etmirik
  if (in_array($ad, $adlar)) {
    return array_search($ad, $adlar) + 1;
  }

   // * Yeni adın əlifba sırasına uyğun yerləştirilməsi
  $index = 0;
  foreach ($adlar as $i => $isim) {
    if (strcasecmp($ad, $isim) < 0) {
      $index = $i;
      break;
    }
  }
  array_splice($adlar, $index, 0, $ad);

   // * Adların əlifba sırasına uyğun fayla yazılması
  file_put_contents($adlarFayl, implode("\n", $adlar));

  // * Yeni adın sətir nömrəsinə uyğun geri qaytarır
  return $index + 1;
}

// * Nümunə
$name1 = yeniAd("John");
echo $name1 ." nömrəli sətir". "<br>";
$name2 = yeniAd("Chris");
echo $name2 ." nömrəli sətir". "<br>"; 
$name3 = yeniAd("Morgan");
echo $name3." nömrəli sətir";

  
  


?>