<?php

    function cetak($input) { 
        //Deklarasi Variabel
        $jmlkarakter=32; 
        $karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $RandomKarakterString = ''; 
        $RandomKarakterArray = [];

        //Melakukan Perulangan Sebanyak Jumlah Input 
        for ($i=0; $i <$input ; $i++) { 
            
            //Melakukan Perulangan Sebanyak 32X (Jumlah Karakter Berbeda)
            for ($a = 0; $a < $jmlkarakter; $a++) { 
                $index = rand(0, strlen($karakter) - 1); 
                $RandomKarakterString .= $karakter[$index]; 
            } 
            
            //Memasukan Hasil Acak Karakter Ke Variabel Array
            array_push($RandomKarakterArray,$RandomKarakterString);
            //Memasukan Pemisah Ke Variabel String
            $implode= implode("|",$RandomKarakterArray); 
            //Melakukan Reset Ulang Variabel Untuk Menampung Data Acak Di Perulangan Berikutnya
            $RandomKarakterString = ''; 
        }

        //Memasukan Data String Ke Variabel Array Sesuai Tanda Pemisah Yang Telah Di Masukan
        $exploded =explode('|',$implode);
        
        //Mengembalikan Data
        return $exploded;
    } 
    
    //Mencetak Data
    foreach (cetak(5) as $key => $value) {

        echo $value."\n";
    }
    

?>