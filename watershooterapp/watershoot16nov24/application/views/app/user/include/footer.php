<!--**********************************
    Scripts
***********************************-->
<script src="<?=base_url() ?>assets/js/jquery.js"></script>
<script src="<?=base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
<script src="<?=base_url() ?>assets/vendor/countdown/jquery.countdown.js"></script><!-- COUNTDOWN FUCTIONS  -->
<script src="<?=base_url() ?>assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script><!-- Swiper -->
<script src="<?=base_url() ?>assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="<?=base_url() ?>assets/js/settings.js"></script>
<script src="<?=base_url() ?>assets/js/custom.js"></script>
<!-- <script src="<?=base_url() ?>assets/js/index.js"></script> -->
<!-- <script src="<?=base_url() ?>assets/js/app.js"></script> -->


   
<style>
   .toaster {
    position: fixed;
    width: 100%;
    bottom: -50px;
    z-index: 99999;
    display: flex;
    transition: all 0.5s;
}
.toaster-div {
    background: #283891;
    width: auto;
    text-align: center;
    margin: 0 auto;
    border-radius: 6px;
    border: 3px solid #283891;
    color: white;
    padding: 9px 19px;
    width: 91%;
    /*background: whitesmoke;
    width: auto;
    text-align: center;
    margin: 0 auto;
    border-radius: 6px;
    border: 3px solid #5cb85c;
    color: black;
    padding: 8px 19px;*/
}
.toaster-div>h5 {
    color: black!important;
    margin: 0;
}
.toaster.show {
    bottom: 115px;
}
</style>

   <div class="toaster">
      <div class="toaster-div"></div>
   </div>

<script>
      function toast_print(type='',message)
      {
         $(".toaster-div").removeClass("c-alert-success");
         $(".toaster-div").removeClass("c-alert-warning");
         if(type==1)
            $(".toaster-div").addClass("c-alert-success");
         else
            $(".toaster-div").addClass("c-alert-warning");

         $(".toaster-div").html(message);
         $(".toaster").addClass("show");
          setTimeout(() => {
          $(".toaster").removeClass("show");
        }, 3000);

      }


/*--web view--*/
   var href = '';
   var full_url_new = '';
   var full_url_old = '';
   $(document).on("click", "a",(function(e) {
     event.preventDefault();
     href = $(this).attr('href');
     if($(this).attr('class')!='back-btn' && href!='javascript:;' && href!='javascript:void(0);' && href!='#!')
     {
         get_full_url();
         var title = '';
         var obj = { Title: title, Url: full_url_new };
         history.pushState(obj, obj.Title, obj.Url);
         change_page();
     }
   }));

   $(document).on("click", ".link",(function(e) {
     event.preventDefault();
     href = $(this).data('href');
     get_full_url();
     var title = '';
     var obj = { Title: title, Url: full_url_new };
     history.pushState(obj, obj.Title, obj.Url);
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
       "url": "<?=base_url('share/make_call') ?>",
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
       "url": "<?=base_url('share/make_whatsapp') ?>",
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
       "url": "<?=base_url('share/delete_firbase') ?>",
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


/*--------refresh btn----------*/

   var clientHeight = $('.select-game-box-card').width();
   if(clientHeight)
   {
       $(".select-game-box-card").css("height",clientHeight+"px");
       $(".select-game-box-card").css("width",clientHeight+"px");   
   }
   document.addEventListener('touchstart', handleTouchStart, false);        
   document.addEventListener('touchmove', handleTouchMove, false);

   var xDown = null;                                                        
   var yDown = null;

   function getTouches(evt) {
     return evt.touches || evt.originalEvent.touches; 
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
    if ( ! xDown || ! yDown ) 
    {
        return;
    }
    var xUp = evt.touches[0].clientX;                                    
    var yUp = evt.touches[0].clientY;
    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;
    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) 
    {
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







<!-- <script>
    new WOW().init();
    
    var wow = new WOW(
    {
      boxClass:     'wow',      // animated element css class (default is wow)
      animateClass: 'animated', // animation css class (default is animated)
      offset:       50,          // distance to the element when triggering the animation (default is 0)
      mobile:       false       // trigger animations on mobile devices (true is default)
    });
    wow.init(); 
</script> -->

</body>
</html>