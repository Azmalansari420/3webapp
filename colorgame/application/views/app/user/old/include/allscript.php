<div class="toaster"></div>
<!--**********************************
    Scripts
***********************************-->
<script src="<?=base_url() ?>assets/js/jquery.js"></script>
<script src="<?=base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?=base_url() ?>assets/vendor/countdown/jquery.countdown.js"></script>
<script src="<?=base_url() ?>assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?=base_url() ?>assets/js/dz.carousel.js"></script>
<script src="<?=base_url() ?>assets/js/settings.js"></script>
<script src="<?=base_url() ?>assets/js/custom.js"></script>
<script>

    <?php if(!empty($this->session->userdata('user'))){ ?>
        sessionStorage.setItem("token", "<?=$this->session->userdata('user')['access_token'] ?>");
    <?php } ?>
    
   function toaster(message, type) 
   {
     var toaster = $('.toaster');
     toaster.html(message);
     toaster.addClass(type);
     toaster.fadeIn(500);
     setTimeout(function() {
       toaster.fadeOut(500);
     }, 3000);
   }


/*get city list*/
var id = 0;
$(document).on("change", ".state-id",(function(e) {
id = $(this).val();
  city_list();
}));

function city_list()
{
var form = new FormData();
form.append("id", id);

var settings = {
  "url": "<?=base_url() ?>api/Distributor/show_city",
  "method": "POST",
  "dataType": "json",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  if(response.status==200) 
  {
    $(".city-list").html(response.data);
  } 
  else 
  {
    $(".city-list").html('');
  }
});

}


/*add to wishlist*/
var p_id = 0;
$(document).on("click", ".add-to-wishlist",(function(e) {
    p_id = $(this).data('p_id');
    add_to_wishlist_all();
    event.preventDefault();
  }));

     function add_to_wishlist_all()
    {
      var form = new FormData();
      form.append("p_id", p_id);     

      var settings = {
        "url": "<?=base_url() ?>api/Image_filter/addtowishlist_single",
        "method": "POST",
        "dataType": "json",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
      };
      
      $.ajax(settings).done(function (response) {
        toaster(response.message, 'success');
        console.log(response);
        $(".wishlist-side").html(response.data);
        $(".wishlist-count").html(response.count);
      });
    }
/*delete wishlist*/

$(document).on("click", ".delete-wishlist-btn",(function(e) {
      id = $(this).data('id');
      delete_wishlist();
      event.preventDefault();
    }));

   function delete_wishlist()
   {
      var form = new FormData();
      form.append("id", id);

      var settings = {
        "url": "<?=base_url() ?>api/Image_filter/delete_wishlist_item",
        "method": "POST",
        "dataType": "json",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
      };

      $.ajax(settings).done(function (response) {
        toaster(response.message, 'success');
        console.log(response);
        $(".wishlist-side").html(response.data);
        $(".wishlist-count").html(response.count);
      });
   }







































   /*webview*/
   
   var href = '';
   var full_url_new = '';
   var full_url_old = '';
   $(document).on("click", "a",(function(e) {
   event.preventDefault();
   href = $(this).attr('href');
   if($(this).attr('class')!='back-btn' && href!='javascript:void(0);' && href!="#!")
   {
       get_full_url();
       var title = '';
       var obj = { Title: title, Url: full_url_new };
       // history.pushState(obj, obj.Title, obj.Url);
       change_page();
   }
   }));
   $(document).on("click", ".link",(function(e) {
   event.preventDefault();
   href = $(this).data('href');
   get_full_url();
   var title = '';
   var obj = { Title: title, Url: full_url_new };
   // history.pushState(obj, obj.Title, obj.Url);
   change_page();        
   }));
   
   $(window).on('popstate', function(event) {
   change_page();
   });
   $(window).on('pushState', function(event) {
   change_page();
   });
   
   var modalNav = $(".menu-mobile-popup");
   $(document).on("click", ".btn-sidebar, .btn-st2", (function () {
   modalNav.addClass("modal-menu--open");
   }));
   $(document).on("click", ".modal-menu__backdrop", (function () {
   modalNav.removeClass("modal-menu--open");
   }));
   
   function get_full_url()
   {
   if(href==undefined || href=='#')
   {
       return false;
   }   
   else 
   {
       var full_url = href;
   
       var device_arr = window.location.href.split('device_id=');
       if(device_arr.length>1)
           device_id = window.location.href.split('device_id=')[1].split('&')[0];
       else device_id = '';
       firebase_token = window.location.href.split('firebase_token=')[1];
       var full_url_array = full_url.split('device_id');
       var full_url_qs_array = full_url.split('?');
       if(full_url_array.length==1)
       {
           if(full_url_qs_array.length==1)
               full_url = full_url+"?device_id="+device_id;
           else
               full_url = full_url+"&device_id="+device_id;
       }
       var full_url = full_url;
       var check_api_url = full_url.split("<?=base_url('api/') ?>");
       if(check_api_url.length==1)
       {
           var full_url_array = full_url.split("<?=base_url(user_app) ?>");
           if(full_url_array.length==1)
           {
               full_url = "<?=base_url(user_app) ?>"+full_url_array[0];
           }
           else
           {
               full_url = "<?=base_url(user_app) ?>"+full_url_array[1];
           }
       }
       full_url = full_url_new = full_url+'&firebase_token='+firebase_token;
   }        
   // console.log(full_url);      
   }
   
   

   function change_page()
    {  
      window.location.href=full_url_new;
   }
   
   
   $(document).on("click", ".call-btn",(function(e) {
   event.preventDefault();
   $(".preload").show(); 
   href = $(this).data('href');
   var form = new FormData();
   form.append("user_id", 0);
   form.append("mobile", href);
   var settings = {
     "url": "<?=base_url('api/user/make_call') ?>",
     "method": "POST",
     "processData": false,
     "mimeType": "multipart/form-data",
     "headers": {
           "token": sessionStorage.getItem("token")
         },
     "contentType": false,
     // "dataType":"json",
     "data": form
   };
   $.ajax(settings).done(function (response) {
     // console.log(response);
       delete_firbase();
     $(".preload").hide(); 
   });   
   }));
   $(document).on("click", ".whatsapp-btn",(function(e) {
   event.preventDefault();
   $(".preload").show();   
   href = $(this).data('href');
   var form = new FormData();
   form.append("user_id", 0);
   form.append("mobile", href);
   var settings = {
     "url": "<?=base_url('api/user/make_whatsapp') ?>",
     "method": "POST",
     "processData": false,
     "mimeType": "multipart/form-data",
     "headers": {
           "token": sessionStorage.getItem("token")
         },
     "contentType": false,
     // "dataType":"json",
     "data": form
   };
   $.ajax(settings).done(function (response) {
     // console.log(response);
       delete_firbase();
     $(".preload").hide(); 
   });   
   }));
   
   // delete_firbase();
   function delete_firbase()
   {
   var form = new FormData();
   form.append("user_id", 0);
   var settings = {
     "url": "<?=base_url('api/user/delete_firbase') ?>",
     "method": "POST",
     "processData": false,
     "mimeType": "multipart/form-data",
     "headers": {
           "token": sessionStorage.getItem("token")
         },
     "contentType": false,
     // "dataType":"json",
     "data": form
   };
   $.ajax(settings).done(function (response) {
     // console.log(response);
     // $(".preload").hide(); 
   }); 
   }
   
   
   
   /*refresh*/
   document.addEventListener('touchstart', handleTouchStart, false);        
   document.addEventListener('touchmove', handleTouchMove, false);
   
   var xDown = null;                                                        
   var yDown = null;
   
   function getTouches(evt) {
   return evt.touches ||             // browser API
       evt.originalEvent.touches; // jQuery
   }                                                     
                                                                       
   function handleTouchStart(evt) {
   const firstTouch = getTouches(evt)[0];                                      
   xDown = firstTouch.clientX;                                      
   yDown = firstTouch.clientY;                                      
   }; 
   function top_0_refrash()
   {
   var top = document.documentElement.scrollTop || document.body.scrollTop;
   if(top==0)
   {
    $(".preload").show(); 
    location.reload();
   }
   }                                               
                                                                       
   function handleTouchMove(evt) {
   if ( ! xDown || ! yDown ) {
      return;
   }
   
   var xUp = evt.touches[0].clientX;                                    
   var yUp = evt.touches[0].clientY;
   
   var xDiff = xDown - xUp;
   var yDiff = yDown - yUp;
                                                                       
   if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
      if ( xDiff > 0 ) {
          /* right swipe */ 
      } else {
          /* left swipe */
      }                       
   } else {
      if ( yDiff > 0 ) {
      } else { 
          /* up swipe */
          top_0_refrash();
      }                                                                 
   }
   /* reset values */
   xDown = null;
   yDown = null;                                             
   };
</script>
</body>
</html>