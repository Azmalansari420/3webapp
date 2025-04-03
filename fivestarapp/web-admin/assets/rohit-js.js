/*
Auther Name : Rohit singh
Auther url  : iamrohitsingh.com
Auther Des  : Senior Web Developer

*/
$(document).on('change','#c_id_name',function(){
	   var sel_c_id_name = $(this).val();
	   if(sel_c_id_name !== ""){
			$.ajax({
				url:'ajax_to_php/admin_file.php',
				method:'POST',
				data:{sel_c_id_name:sel_c_id_name},
				success:function(dg){
					$('#select_project_id').html(dg);
				}
			});
		}
});
//selelect plan
$(document).on('change','#category',function(){
 var cate = $(this).val();

if(cate !== ""){
	$.ajax({
		url:'ajax_to_php/admin_file.php',
		method:'POST',
		data:{cate:cate},
		success:function(abc){
			$('#subcategory').html(abc);
		}

	});
}




});
//delete confirm
$(document).on('click','.del_confirm',function(){
	var check = confirm('Are You Sure You want to Delete');
	if(check==true){
		return true;
	}else{
		return false;
	}
});


//get invoice
$(document).on('change','#select_project_id',function(){
	   var select_project_id = $(this).val();
	   if(select_project_id !== ""){
			$.ajax({
				url:'ajax_to_php/admin_file.php',
				method:'POST',
				data:{select_project_id:select_project_id},
				success:function(dg){ 
					$('#show_over_view').show(); 
					var obj = JSON.parse(dg);
					$('#total_pc').val(obj.t_p_c);
					$('#total_add').val(obj.t_r_a);
					
					
					var total_remain = (obj.t_p_c-obj.t_r_a);
					$('#total_remain').val(total_remain);
					
					
					$('#old_project_costing').val(obj.t_p_c);
				}
			});
		}
});

//get extra services in project
$(document).on('change','#extra_services_status',function(){
	 var ess = $(this).val();
	   if(ess !== ""){
		 if(ess==2){
			 $("#extra_services_body").show();
			 $('#old_project_costing').attr('required');
			 $('#extra_services_amount').attr('required');
			 $('#describe_extra_services').attr('required');
		 }else{
			 $("#extra_services_body").hide();
		 }   
	  }
});

//add more listing images
$(document).on('click','.add_more_product_images',function(){ 
   var apend_img = "<div class='col-sm-12 innermultiimg' id='innermultiimg'><div class='col-sm-6'><input type='file' id='multi_product_images' class='form-control' accept='image/*' name='multi_product_images[]'><span id='show_img__error'></span></div><span class='remove_more_product_images'>Remove </span></div>";
   $('.outmultiimg').append(apend_img);
});
//Remove images option
$(document).on('click','.remove_more_product_images',function(){
     var revome_img = $(this).parent().remove();
	 
});


//Remove multiple img
$(document).on('click','.remove_more_product',function(){
 var del_imgs     = $(this).data('id'); 
 var img_name     = $(this).data('img');
 if(del_imgs !==""){
    $.ajax({
      url:'ajax_to_php/admin_file.php',
      type:'POST',
      data:{del_imgs:del_imgs,img_name:img_name},

      success:function(data){ 
      
        if(data==1){
          $('#hide_outer_'+del_imgs).hide();
        }
      }
    });
  }
 return false;
});