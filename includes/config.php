<?php
	
	//==================CONSTANTS=========================//

	$site_url		=	"http://myworks-yakuter.c9users.io/yPhoneBook";		// <-- site adresi. Sonunda "/" olmamalı!
	$limit			=	10;						// <-- her sayfada görüntülenecek kayıt sayısı
	$db_user		=	"yakuter";				// <-- veritabanı kullanıcı adı
	$db_password	=	"";						// <-- veritabanı kullanıcı parolası
	$db_name		=	"yPhoneBook";			// <-- veritabanı ismi
	$db_table		=	"contacts";				// <-- veritabanı tablosu
	$db_host		=	"localhost";			// <-- veritabanı sunucusu

	//==================SAYFALAMA SINIFI=========================//
	
function sayfalama($adres,$baslangic,$limit,$tabloadi,$kosul='')
{
  //Toplam Satır Sayısı 
  $t = mysql_query("SELECT COUNT(*) FROM ".$tabloadi." ".$kosul);
  list($toplam_kayit) = mysql_fetch_row($t);

  //Sayfa Sayısı
  $sayfasayisi = intval($toplam_kayit/$limit);

  if ($toplam_kayit%$limit) {    
    $sayfasayisi++;
  }

  if ($sayfasayisi > 1) {   
    if ($baslangic >= $limit) {            
      $fark = $baslangic-$limit; 
      echo "<A  style=\"color:blue\" HREF=\"".$adres."/?b=".$fark."\">Önceki</A>";            
    } else {            
      //Linksiz Önceki Yazısı            
      echo "Önceki";            
    }            
    //2-3-4-5 Gibi Sayfa Numaraları Olan Kısım            
    for ($i=1; $i<=$sayfasayisi; $i++) {            
	  if ((($i-1)*$limit) == $baslangic) {            
	    echo " [$i] ";            
      } else {            
        $fark = ($i-1)*$limit;           
        echo " <A style=\"color:blue\" HREF=\"".$adres."/?b=".$fark."\">".$i."</A> ";            
      }            
    }            
    if ($baslangic != $limit*($sayfasayisi-1)) {            
	  $fark = $baslangic+$limit;            
	  echo "<A  style=\"color:blue\" HREF=\"".$adres."/?b=".$fark."\">Sonraki</A>";            
    } else{
	  //Linksiz Sonraki Yazısı            
      echo "Sonraki";            
    }
  }
}

?>