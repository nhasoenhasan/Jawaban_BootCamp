<?php

    function cetak_gambar($jumlah){

        //Mencari Nilai Tengah
        $tengah=(int)($jumlah/2)+1;
       
        echo " --- panjang ---\n";
        //Melakukan Pengecekan Apakah Input Ganjil Atau Genap
        if( $jumlah%2 == 1){

            //Melakukan Perulangan Sebanyak Input (Untuk Baris)
            for ($i=1; $i <=$jumlah ; $i++) { 

                //Melakukan Pengecekan Apakah Perulangan Sudah Mencapai Data Median/Tengah
                if($i==$tengah){

                    //Melakukan Perulangan Sebanyak Input (Untuk Kolom)
                    for ($a=1; $a <=$jumlah ; $a++) { 
                        //Cetak Bintang
                        echo " * ";
                    }

                }else{
                    //Melakukan Perulangan Sebanyak Input (Untuk Kolom)
                    for ($a=1; $a <=$jumlah ; $a++) { 
                
                        //Untuk Kolom Pertama
                        if ($a == 1) {
                            //Cetak Bintang
                            echo " * ";
                        //Untuk Kolom Terakhir
                        }if($a==$jumlah){
                            //Cetak Kolom
                            echo " * ";
                        }
                        //Untuk Kolom Selain Tengah dan Terakhir
                        if($a < $jumlah-1){
                            //Cetak Sama Dengan
                            echo " = ";
                        }
        
                    }

                }

                //Untuk Membuat Baris Baru
                echo "\n";
            }
        }else{
            //Apabila Data Yang Di Masukan Bukan Data Ganjil
            echo "Silahkan Masukan Bilangan Ganjil";

        }
    }


    //Untuk Menjalankan Program
    cetak_gambar(5);
?>