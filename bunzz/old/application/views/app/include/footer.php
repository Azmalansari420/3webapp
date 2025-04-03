<div class="toaster"></div>

<script type="text/javascript" src="<?=base_url() ?>javascript/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url() ?>javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url() ?>javascript/password-addon.js"></script>
<script type="text/javascript" src="<?=base_url() ?>javascript/init.js"></script>
<script type="text/javascript" src="<?=base_url() ?>javascript/swiper-bundle.min.js"></script>
<script type="text/javascript" src="<?=base_url() ?>javascript/swiper.js"></script>
<script type="text/javascript" src="<?=base_url() ?>javascript/data-picker.min.js"></script>
<script type="text/javascript" src="<?=base_url() ?>javascript/custom-date.js"></script>
<script type="text/javascript" src="<?=base_url() ?>javascript/main.js"></script>
<script>
    
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
var id = "";
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





 function exportToExcel() 
 {
      const table = document.getElementById("dataTable");
      const rows = Array.from(table.rows).map(row => Array.from(row.cells).map(cell => cell.innerText).join("\t")).join("\n");

      const blob = new Blob([rows], { type: 'application/vnd.ms-excel' });
      const url = URL.createObjectURL(blob);

      const a = document.createElement('a');
      a.href = url;
      a.download = 'Table-Data.xls';
      a.click();


      console.log(url);
      

      URL.revokeObjectURL(url);
  }














































   
   /*webview*/
  // Improved link handling
$(document).on("click", "a", function (e) {
    e.preventDefault(); // Prevent default anchor behavior

    var href = $(this).attr("href");

    if (
        href &&
        !["javascript:;", "#pills-home", "#pills-profile", "#pills-contact", "#pills-road", "javascript:void(0);", "#!"].includes(href) &&
        !$(this).hasClass("back-btn") &&
        !$(this).hasClass("download-btn")
    ) {
        get_full_url(href);
        change_page();
    }
});

function get_full_url(href) {
    if (!href || href === "#") {
        return false;
    }

    var full_url = href;
    var device_id = "";

    var device_arr = window.location.href.split("device_id=");
    if (device_arr.length > 1) {
        device_id = device_arr[1].split("&")[0];
    }

    var firebase_token = window.location.href.split("firebase_token=")[1];

    if (!full_url.includes("device_id")) {
        full_url += full_url.includes("?") ? "&device_id=" + device_id : "?device_id=" + device_id;
    }

    if (!full_url.includes("<?=base_url('api/') ?>")) {
        full_url = "<?=base_url(user_app) ?>" + full_url.replace("<?=base_url(user_app) ?>", "");
    }

    full_url_new = full_url + "&firebase_token=" + firebase_token;
}

function change_page() {
    if (full_url_new) {
        window.location.href = full_url_new;
    } else {
        console.error("Full URL is undefined!");
    }
}

// Touch handling for refresh
document.addEventListener("touchstart", handleTouchStart, false);
document.addEventListener("touchmove", handleTouchMove, false);

var xDown = null;
var yDown = null;

function handleTouchStart(evt) {
    const firstTouch = evt.touches[0];
    xDown = firstTouch.clientX;
    yDown = firstTouch.clientY;
}

function top_0_refrash() {
    var top = document.documentElement.scrollTop || document.body.scrollTop;
    if (top === 0) {
        $(".preload").show();
        location.reload();
    }
}

function handleTouchMove(evt) {
    if (!xDown || !yDown) {
        return;
    }

    var xUp = evt.touches[0].clientX;
    var yUp = evt.touches[0].clientY;

    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;

    if (Math.abs(yDiff) > Math.abs(xDiff) && yDiff < 0) {
        top_0_refrash();
    }

    xDown = null;
    yDown = null;
}

   
</script>
</body>
</html>