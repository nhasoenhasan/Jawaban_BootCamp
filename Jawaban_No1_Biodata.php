<?php
    
    //function untuk deklarasi variabel dan
    function Biodata(){
        $biodata['name']="Nur Hasan";
        $biodata['age']=22;
        $biodata['addres']="RT011/005";
        $biodata['hobbies']=['Bermain Gitar','Nonton Film','Nonton Konser'];
        $biodata['is_married']= FALSE;
        $biodata['list_school']= array(
            ' year_in' => '2015',
            ' year_out' => '2019',
            'major' => 'S1 Teknik Informatika'
        );
        $biodata['skills']=array(
            'skill_name' => 'PHP',
            'level' => 'advanced'
        );
        $biodata['interest_in_coding']=TRUE; 

        echo json_encode($biodata);
        
    }

    //Untuk Menampilkan Data Pada Browser
    Biodata();

   
?>