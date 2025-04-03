

         <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>


      <script src="<?php echo base_url(); ?>media/admin/js/vendor.min.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/js/app.min.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/gritter/js/jquery.gritter.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.canvaswrapper.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.colorhelpers.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.saturated.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.browser.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.drawSeries.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.uiConstants.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.time.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.resize.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.pie.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.crosshair.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.categories.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.navigate.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.touchNavigate.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.hover.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.touch.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.selection.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.symbol.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.legend.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/jquery-sparkline/jquery.sparkline.min.js" ></script>      
      <script src="<?php echo base_url(); ?>media/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/js/demo/dashboard.js" ></script>            
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/pdfmake/build/pdfmake.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/pdfmake/build/vfs_fonts.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/jszip/dist/jszip.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/switchery/dist/switchery.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/select2/dist/js/select2.min.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/js/sweetalert2@11.js" ></script>
      <script src="https://cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
      <!-- table script-------- -->
       <style>
          .cke_notification_warning {
            background: #c83939;
            border: 1px solid #902b2b;
            display: none!important;
        }
      </style>
      <script>
        /*data table old(<table id="data-table-buttons"></table>)*/
        $('#data-table-buttons').DataTable({
          responsive: true,
          dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
          buttons: [
            { extend: 'copy', className: 'btn-sm' },
            { extend: 'csv', className: 'btn-sm' },
            { extend: 'excel', className: 'btn-sm' },
            { extend: 'pdf', className: 'btn-sm' },
            { extend: 'print', className: 'btn-sm' }
          ],
        });
      
        /*show Image--*/
        function readURL(input) 
        {
            if (input.files && input.files[0]) 
            {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#blah").css("display","block");
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
         $("#imgInp").change(function()
         {
            readURL(this);
        });

// --------alll delete-------
     $(document).ready(function(){
         $(".delete").click(function(event)
         {
             var href = $(this).attr("href")
             var btn = this;

             Swal.fire({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, delete it!"
            }).then((result) => {
              if (result.isConfirmed) 
              {
                $.ajax({
                    type: "GET",
                    url: href,
                    success: function(response) 
                    {
                        $(btn).closest('tr').fadeOut("slow");
                    }
                  });                    
              }
            });
             event.preventDefault();
          })
        });

// auto lockscreen
        inactivityTimeout = false;
        resetTimeout()
        function onUserInactivity() {
           window.location.href = "<?=base_url('admin/lockscreen') ?>";
        }
        function resetTimeout() {
           clearTimeout(inactivityTimeout)
           inactivityTimeout = setTimeout(onUserInactivity, 1000 * 6000)
        }
        window.onmousemove = resetTimeout
    
/*export Excel*/
   function fnExcelReport() 
   {
    var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
    var j = 0;
    var tab = document.getElementById('headerTable');
    for (j = 0; j < tab.rows.length; j++) {
        tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
    }
    tab_text = tab_text + "</table>";
    tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");
    tab_text = tab_text.replace(/<img[^>]*>/gi, "");
    tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, "");
    var msie = window.navigator.userAgent.indexOf("MSIE ");
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        txtArea1.document.open("txt/html", "replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus();
        sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
    } else {
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
    }
    return sa;
   }




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





$(document).on("change", ".nsm-id",(function(e) {
id = $(this).val();
  rsm_list();
}));

function rsm_list()
{
var form = new FormData();
form.append("id", id);

var settings = {
  "url": "<?=base_url() ?>admin_con/asm/showrsm_list",
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
    $(".rsm-list").html(response.data);
  } 
  else 
  {
    $(".rsm-list").html('');
  }
});

}




$(document).on("change", ".rsm-id",(function(e) {
id = $(this).val();
  asm_list();
}));

function asm_list()
{
var form = new FormData();
form.append("id", id);

var settings = {
  "url": "<?=base_url() ?>admin_con/sales_officer/showasm_list",
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
    $(".asm-list").html(response.data);
  } 
  else 
  {
    $(".asm-list").html('');
  }
});

}




$(document).on("change", ".asm-list",(function(e) {
id = $(this).val();
  showsalesofficer_list();
}));

function showsalesofficer_list()
{
var form = new FormData();
form.append("id", id);

var settings = {
  "url": "<?=base_url() ?>admin_con/sales_officer/showsalesofficer_list",
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
    $(".sales-officer-list").html(response.data);
  } 
  else 
  {
    $(".sales-officer-list").html('');
  }
});

}


















   
    </script>