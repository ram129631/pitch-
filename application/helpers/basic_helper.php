<?php

function get_certile_age_gender($ages,$gender,$score){
    
    $CI = &get_instance();
    
    $query = $CI->db->query("select distinct ages from aims_certilescore");
    
    foreach ($query->result() as $row){
        $db_age = $row->ages;
        $age = explode("-", $db_age);
    for($i = $age[0]; $i<=$age[1]; $i++){
        if($i == $ages){
        //echo $i."<br/>";
        $certile_val = $CI->db->query("select * from aims_certilescore where ages='$db_age' and gender='$gender' and score='$score'");
        
        $cert_endval = $certile_val->row();
        return $cert_endval->certile;//"select * from aims_certilescore where age='$db_age' and gender='$gender' and score='$score'";//
        }
        
        
    }
    
    }
    
    
    
    
    //return "$ages $gender $score";
    
    
}
function isselected($url){
    $CI = &get_instance();
    //echo current_url();
    if(current_url() == "$url"){
        return 'bg-success';
    }
}
?>