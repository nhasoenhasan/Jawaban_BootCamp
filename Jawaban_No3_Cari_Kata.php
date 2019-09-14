<?php

    function cari_kata($string,$kata)
    {

        //Melakukan Pengecekan Apakah Input kata/frasa pencarian tidak lebih panjang dibandingkan string 
        if( strlen($kata) < strlen($string)){

            //Melakukan Pengecekan Apakah Kata Yang Di Cari Di Temmukan
            if(preg_match("/$kata/i", $string)) {

                //Mencetak Kata Yang Di Cari
                echo "Di Temukan ".$jumlah=preg_match_all("/$kata/i", $string)." Kali";
            
            } else {
                
                //Apabila Data Tidak Di Temukan
                echo 'Tidak Ketemu';
    
            }

        }else{
            //Apabila Kata Yang Di Cari Lebih Panjang Dari String
            echo "Kata Terlalu Panjang";

        }
       
    }

    //Variabel String 
    $string = 'banananana';
    //Variabel Berisi Kata Yang Ingin Di Cari 
    $kata='na';
    
    //Cetak Data
   cari_kata($string,$kata);

?>