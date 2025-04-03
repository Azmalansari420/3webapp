<link rel="stylesheet" type="text/css" href="<?=base_url() ?>front_css.css">    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="<?=base_url() ?>front_script.js"></script>
<!-- <script src="<?=base_url() ?>assets/js/jquery.3.6.min.js"></script> -->
<script>

    var href = '';
    var full_url_new = '';
    var full_url_old = '';
    $(document).on("click", "a",(function(e) {
        event.preventDefault();
        href = $(this).attr('href');
        if($(this).attr('class')!='back-btn')
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
      // window.location.href=full_url_new;


        // change_page();    
    }
    
    function change_page()
    {
        var f_url = '';
        var full_url1 = full_url_new.split("<?=base_url(user_app) ?>")[1];
        var full_url2 = full_url1.split("?device_id");
        if(full_url2[0]=='')
        {
            f_url = "<?=base_url(user_app.'#') ?>"+"login?device_id="+device_id+'&firebase_token='+firebase_token;
            var title = '';
            var obj = { Title: title, Url: f_url };
            history.pushState(obj, obj.Title, obj.Url);
        }
        
        console.log(f_url);
      // $(".preload").show(); 
    
        // var form = new FormData();
        // form.append("user_id", 0);

        // var settings = {
        //   "url": window.location.href,
        //   "method": "POST",
        //   "processData": false,
        //   "mimeType": "multipart/form-data",
        //   "headers": {
        //         "token": sessionStorage.getItem("token")
        //       },
        //   "contentType": false,
        //   // "dataType":"json",
        //   "data": form
        // };
        // $.ajax(settings).done(function (response) {
        //     $(".c-body").remove();
        //     $("body").prepend('<div class="c-body"></div>');
        //     $(".preload").hide(); 
        //     $(".c-body").html(response);
        //   // console.log(response);        
        //     full_url_old = full_url_new;
        //     modalNav.removeClass("modal-menu--open"); 
        //     window.scrollTo(0,0);           
        // });
   }

   // get_full_url();


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
               top_0_refrash();
           }                                                                 
       }
       xDown = null;
       yDown = null;                                             
   };
</script>