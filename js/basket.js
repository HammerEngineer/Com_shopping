$(document).ready(function() {	
	function refreshSmallBasket(){
            $.ajax({
               url:'mod/basket_small_refresh.php',
               dataType:'json',
               success: function(data){
                   $.each(data , function(k , v){
                       $("#basket_left ."+k+" span").text(v);
                   });
               },
               error:function(data){
                   alert("Eror occured");
               }
            });
        }
        
        function refreshBigBasket(){
            $.ajax({
               url: 'mod/basket_view.php',
               dataType: 'html',
               success: function(data){
                   $('#big_basket').html(data);
                   initBinds();
               },
               error: function(data){
                   alert('Error BigBasket');
               }
            });
        }
	if ($(".add_to_basket").length > 0) {
		$(".add_to_basket").click(function() {
			//alert('dsdas');
			var trigger = $(this);
			var param = trigger.attr("rel");
			var item = param.split("_");
			
			$.ajax({
				type: 'POST',
				url: 'mod/basket.php',
                                
				dataType: 'json',
                                data:({id:item[0], job:item[1]}),
                                success:function(data){
 
                                    var new_id = item[0] + '_' + data.job;
					if (data.job !== item[1]) {
						if (data.job === 0) {
							trigger.attr("rel", new_id);
							trigger.text("Remove from basket");
							trigger.addClass("red");
						} else {
							trigger.attr("rel", new_id);
							trigger.text("Add to basket");
							trigger.removeClass("red");
						}
						refreshSmallBasket();
					}
                                },
				error:function(data) {
					alert("An error");
				}
			});
			return false;
			
		});
	}
        
        initBinds();
        
        function initBinds(){
            if($('.update_basket').length > 0){
                $('.update_basket').bind('click',updateBasket);
            }else{alert('error in update_basket len');}
            if($('.fld_qty').length > 0){
                $('.fld_qty').bind('keypress' , function(e){
                    var code = e.keyCode ? e.keyCode : e.which;
                    if(code === 13){
                        updateBasket();
                    }
                });
            }else{alert('error in fld_qty');}
        }
        
        
        function updateBasket(){
            $('#frm_basket : input').each(function(){
               var sid = $this.attr('id').split('-');
               var val = $this.val();
               $.ajax({
                  type:'POST',
                  url: 'mod/basket_qty.php',
                  data: ({id:sid[1] , qty:val}),
                  success: function(){
                      refreshSmallBasket();
                      refreshBigBasket();
                  },
                  error: function(){
                      alert('Error occured');
                  }
                    
               });
            });
        }
	
});