<?php
class Form{
    
    
    public function getCountriesSelect($record = null){
        $objCountry = new Country();
        $countries = $objCountry->getCountries();
        if(!empty($countries)){
            $out = "<select name=\"country\" name=\"country\" class=\"sel\">";
            if(empty($record)){
                $out .= "<option value=\"\">Select One&hellip;</option>";
            }
            
            foreach ($countries as $country){
                $out .="<option value=\"";
                $out .= $country['id'];
                $out .="\">";
                $out .= $country['name'];
                $out .="<option>";
            }
            
            $out .="</select>";
            return $out;
        }
    }
}

