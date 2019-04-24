jQuery(document).ready(function(){
	
	var base = jQuery('body').attr('base');
	get_products(100, 0);
	
	jQuery("#create-product").click(function(e){
		e.preventDefault();
		// Validating inputs
		var error = 0;
		jQuery('.card form.createProduct input').each(function(){
		$(this).css('border',"1px solid black");
		if( !$(this).val() ) {
          $(this).css('border',"1px solid red");
		  error++;
    }
	else if($(this).attr('name') == "price"){
		if(!isMobile($(this).val())){
			$(this).css('border',"1px solid red");
		error++;
	}
	}
	});
	if(error == 0){ // check for errors
		// should send ajax request to get list of products now
	 $.ajax({
     dataType: 'json',
    accepts: {
        json: 'application/json'
    },
	data: jQuery('form.createProduct').serialize(),
	url: base+"/product/create", success: function(data){
    $(".createmsg").text(data.message);
    $(".createmsg").show();
	setTimeout(function(){ $(".createmsg").hide(); }, 5000);
	get_products(100, 0);
  }});
	}
	});
	jQuery("#products-list").on('click','.editproduct',function(e){
		e.preventDefault();
		var pid = jQuery(this).attr('pid');
		var nam = jQuery(this).attr('nam');
		var cat = jQuery(this).attr('cat');
		var pri = jQuery(this).attr('pri');
		$("#myModal").modal();
		jQuery("#myModal #id").val(pid);
		jQuery("#myModal #name").val(nam);
		jQuery("#myModal #category").val(cat);
		jQuery("#myModal #price").val(pri);
		jQuery("#myModal #update-product").val(pid);
		
	});
	jQuery("#products-list").on('click','.deleteproduct',function(e){
		e.preventDefault();
		
		$.ajax({
     dataType: 'json',
    accepts: {
        json: 'application/json'
    },
	url: base+"/product/delete?id="+jQuery(this).attr('pid'), success: function(data){
	
	setTimeout(function(){  }, 2000);
	get_products(100, 0);
  }});
		
	});
	jQuery("#update-product").click(function(e){
		e.preventDefault();
			var error = 0;
		jQuery('#myModal form.createProduct input').each(function(){
		$(this).css('border',"1px solid black");
		if( !$(this).val() ) {
          $(this).css('border',"1px solid red");
		  error++;
    }
	else if($(this).attr('name') == "price"){
		if(!isMobile($(this).val())){
			$(this).css('border',"1px solid red");
		error++;
	}
	}
	});
	if(error == 0){ // check for errors
		// should send ajax request to get list of products now
	 $.ajax({
     dataType: 'json',
    accepts: {
        json: 'application/json'
    },
	data: jQuery('#myModal form.createProduct').serialize(),
	url: base+"/product/edit", success: function(data){
    $("#myModal .createmsg").text(data.message);
    $("#myModal .createmsg").show();
	setTimeout(function(){ $("#myModal .createmsg").hide(); }, 5000);
	get_products(100, 0);
  }});
	}
		
	});
	function get_products(limit,offset){
		// should send ajax request to get list of products now
	 $.ajax({
     dataType: 'json',
    accepts: {
        json: 'application/json'
    },
	url: base+"/product/list?limit="+limit+"&offset="+offset, success: function(data){
		 
		 var mhtml = "";
		 for (var i = 0; i < data.length; i++){
			mhtml = mhtml+'<li><span>Name : '+data[i].name+', Price : '+data[i].price+', Category :'+data[i].category+'</span>   (<a class="editproduct" nam="'+data[i].name+'" cat="'+data[i].category+'" pri="'+data[i].price+'" pid="'+data[i].id+'" href="">Edit /</a><a class="deleteproduct" pid="'+data[i].id+'" href="">Delete</a>)</li>';
		 }
    $("#products-list").html(mhtml);
  }});
	}
	function isMobile(mob){
	 var regex = new RegExp(/^\+?[0-9(),.-]+$/);
    if(mob.match(regex)) {return true;}
    return false;
}
});