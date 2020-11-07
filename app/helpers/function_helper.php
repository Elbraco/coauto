<?php 
    // MESSAGE D'ERREUR
    
    function message_errors($errors){
        if(!empty($errors)) {
            echo '<div class="message-alert warning"';
            echo '<p> Vous n\'avez pas rempli le forumulaire correctement</p>';

            foreach($errors as $error)
            {
                echo'<ul> <li><p>'.$error.'</p></li> </ul>';
            }
            echo '</div>';
        }

    }

    // MESSAGE D'ERREUR
    function isNotValid($data = array(),string $error_name){
       echo '<span class="not_valid">';
        if(!empty($data[$error_name])){ echo $data[$error_name];} 
        echo '</span>';
        
    }

    // MESSAGE D'ERREUR
    function isNotValid2($data = array(),string $error_name){
        echo '<span class="not_valid2">';
         if(!empty($data[$error_name])){ echo $data[$error_name];} 
         echo '</span>';
         
     }

    //date_format
    function formatDate($dateFormat)
    {
         $date = date_create($dateFormat);
       echo date_format($date, 'd-m-Y H:i:s'); 
    }
?>