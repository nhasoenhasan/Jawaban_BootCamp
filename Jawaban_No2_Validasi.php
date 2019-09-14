<?php

    function validasi(){
        //Deklarasi Variabel
        $username='Ayu99v';
        $password='p@ssW0rd#';
        $regexusername='/^([A-Za-z])[A-Za-z0-9]{5,9}/';
        $regexpassword='/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[*!#%&()^~{}])(?=.*[@]).{8,}/';

        //Pengecekan Password
        if(preg_match($regexpassword, $password) ) {

            //Pengecekan Username
            if(preg_match($regexusername, $username) ) {
                return TRUE;
            }else{
                return FALSE;
            }

        }else {
            return FALSE;
            
        }
    }

    //Menampilkan Hasil
    echo validasi();
    
?>