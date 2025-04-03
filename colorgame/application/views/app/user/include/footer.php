<div class="toaster"></div>


<!-- how to play -->
<div class="modal fade" id="exampleModalLong">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">How to Play</h5>
                <button class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>1 minutes 1 issue, 45 seconds to order, 15 seconds waiting for the draw. It opens all day. The total number of trade is 1440 issues.<br></p>
                <p>If you spend 100 to trade, after deducting 2 service fee, your contract amount is 98:</p>

                <p>1.<strong style="color:#17B15E;">Select green:</strong> if the result shows 1,3,7,9 you will get (98*2) 196;If the result shows 5, you will get (98*1.5) 147</p>

                <p>2.<strong style="color:#D23838;">Select red:</strong> if the result shows 2,4,6,8 you will get (98*2) 196;If the result shows 0, you will get (98*1.5) 147</p>

                <p>3.<strong style="color:#9B48DB;">Select violet:</strong> if the result shows 0 or 5, you will get (98*4.5) 441</p>

                <p>4. Select number:if the result is the same as the number you selected, you will get (98*9) 882</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="<?=base_url() ?>assets/js/jquery.js"></script>
<script src="<?=base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?=base_url() ?>assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?=base_url() ?>assets/js/dz.carousel.js"></script>
<script src="<?=base_url() ?>assets/js/settings.js"></script>
<script src="<?=base_url() ?>assets/js/custom.js"></script>

<script>

    $(".select-amount").click(function(event) {
        $(".select-amount").removeClass("selected");
        $(this).addClass("selected");
        final_amount = amount = $(this).data('amt');
        $('#bet-amount').val(amount);
    }); 

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

   var full_url_new = '';
   $(document).on("click", "a",(function(e) {
       event.preventDefault();
       var href = $(this).attr('href');
       if($(this).attr('class')!='back-btn' && href!='javascript:void(0);' && href!="#!" && href!="#" && href!="#home" && href!="#profile")
       {
           set_full_url(href);
           change_page();
       }
   }));
   $(document).on("click", ".link",(function(e) {
       event.preventDefault();
       set_full_url($(this).data('href'));
       change_page();        
   }));
   
   $(window).on('popstate', function(event) {
        change_page();
   });
   $(window).on('pushState', function(event) {
        change_page();
   });


   function change_page()
   {  
      window.location.href=full_url_new;
   }
   function set_full_url(href)
   {
       if(href==undefined || href=='#')
       {
           return false;
       }   
       else 
       {
           var full_url = href;       
           var device_arr = window.location.href.split('id=');
           if(device_arr.length>1)
               device_id = window.location.href.split('id=')[1].split('&')[0];
           else device_id = '';
           firebase_token = window.location.href.split('token=')[1];
           var full_url_array = full_url.split('id');
           var full_url_qs_array = full_url.split('?');
           if(full_url_array.length==1)
           {
               if(full_url_qs_array.length==1)
                   full_url = full_url+"?id="+device_id;
               else
                   full_url = full_url+"&id="+device_id;
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
           full_url = full_url_new = full_url+'&token='+firebase_token;
       }
       return full_url;
   }
</script>

<!-- webview end -->




</body>
</html>