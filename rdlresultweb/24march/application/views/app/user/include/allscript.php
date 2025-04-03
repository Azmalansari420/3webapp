


    <!-- all plugins here -->
    <script src="<?=base_url() ?>assets/js/jquery.3.6.min.js"></script>
    <script src="<?=base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url() ?>assets/js/imageloded.min.js"></script>
    <script src="<?=base_url() ?>assets/js/counterup.js"></script>
    <script src="<?=base_url() ?>assets/js/waypoint.js"></script>
    <script src="<?=base_url() ?>assets/js/magnific.min.js"></script>
    <script src="<?=base_url() ?>assets/js/isotope.pkgd.min.js"></script>
    <script src="<?=base_url() ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url() ?>assets/js/nice-select.min.js"></script>
    <script src="<?=base_url() ?>assets/js/fontawesome.min.js"></script>
    <script src="<?=base_url() ?>assets/js/owl.min.js"></script>
    <script src="<?=base_url() ?>assets/js/slick-slider.min.js"></script>
    <script src="<?=base_url() ?>assets/js/wow.min.js"></script>
    <script src="<?=base_url() ?>assets/js/tweenmax.min.js"></script>
    <!-- main js  -->
    <script src="<?=base_url() ?>assets/js/main.js"></script>

<?php include('toaster.php'); ?>






<script type="text/javascript">
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











