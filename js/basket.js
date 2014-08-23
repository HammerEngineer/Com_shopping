$(document).ready(function(){

    
    if($(".add_to_basket").length >= 0){
        
        $(".add_basket").click(function(){
            var trigger = $(this);
            var param = trigger.attr("rel");
            var item = param.split("_");
            
            $.ajax({
                
                
            });
            return false;
        });
    }

});