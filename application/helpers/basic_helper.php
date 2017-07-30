<?php

function get_certile_age_gender($ages,$gender,$score){
    
    $CI = &get_instance();
    
    $query = $CI->db->query("select distinct ages from pitch_certilescore");
    
    foreach ($query->result() as $row){
        $db_age = $row->ages;
        $age = explode("-", $db_age);
    for($i = $age[0]; $i<=$age[1]; $i++){
        if($i == $ages){
        //echo $i."<br/>";
        $certile_val = $CI->db->query("select * from pitch_certilescore where ages='$db_age' and gender='$gender' and score='$score'");
        //echo "select * from pitch_certilescore where ages='$db_age' and gender='$gender' and score='$score'";
        if($certile_val->num_rows() == 1){
        $cert_endval = $certile_val->row();
        //echo var_dump($cert_endval);
        //return $cert_endval->certile;//"select * from pitch_certilescore where age='$db_age' and gender='$gender' and score='$score'";//
        }else{
            return 0;
        }
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


function pag_config($count,$num,$url){
    $config["base_url"] = $url;
    $config["per_page"] = $num;
    $config['total_rows'] = $count;
    $config['use_page_numbers'] = TRUE;
    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['num_tag_open'] = '<li>'; 
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a class="current">';
    $config['cur_tag_close'] = '</a></li>';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Previous';
    return $config;
}
?>