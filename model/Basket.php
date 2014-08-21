<?php

    class Basket{
        
        
        public static function activeButton($sees_id){
            if(isset($_SESSION['basket'][$sees_id])){
                $id =0;
                $label = "Remove from Basket";
            }else{
                $id = 1;
                $label = "Add to Basket";
            }
            
            $out = "<a href=\"#\" class=\"add_to_basket";
            $out .= $id == 0 ? " red" : null;
            $out .= "\" rel=\"";
            $out .= $sees_id."_".$id;
            $out .= "\">{$label}</a>";
            
            return $out;
        }
    }
?>

