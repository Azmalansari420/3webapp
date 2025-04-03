
function success_message(text)
{
  saberToast.success({
        title: "Success", 
        text: text,
        delay: 200,
        duration: 2600,
        rtl: true,
        position: "top-left"
    });
}
function error_message(text)
{
    saberToast.error({
        title: "Warning",
        text: text,
        delay: 200,
        duration: 2600,
        rtl: true,
        position: "top-left"
    });
} 

function api_loader(type,loader_div)
{
    if(type==1)
    {
      $(loader_div).before(`<div class="spinner-box"><div class="pulse-container"><div class="pulse-bubble pulse-bubble-1"></div><div class="pulse-bubble pulse-bubble-2"></div><div class="pulse-bubble pulse-bubble-3"></div></div></div>`);
    }
    else
    {
      $(".spinner-box").remove();
    }
}

function print_toast(message,type)
{
  // console.log(message);
  const bottomRightContainer = document.createElement('div')
    bottomRightContainer.classList.add('custom-tost')
    document.body.append(bottomRightContainer)
    $(".custom-tost").html('<span>'+message+'</span>');
    $(".custom-tost").fadeIn();
    setTimeout(function(){ 
      $(".custom-tost").fadeOut();
     }, 2000);
    setTimeout(function(){ 
      $(bottomRightContainer).remove();
     }, 3000);
}


// data submit form

       $(document).on("submit", ".form_data",(function(e) {
        event.preventDefault();

        var form = $(this);
        var fid = form.attr('id');
        var input_type_submit = $("#"+fid+" input[type='submit']");
        var button_type_submit = $("#"+fid+" button[type='submit']");

        

        var form_ok = 1;
        $("#"+fid+" :input").each(function(){
         var input = $(this).prop("required"); 
         if (input == true)
         {
            if ($(this).val()=="" || $(this).val()=="0")
            {              
              form_ok = 0;
              var placeholder = $(this).attr("placeholder");
              if (placeholder==undefined) placeholder = $(this).attr("name");
              $(this).next('.invalid-feedback').remove();
              $(this).after('<div class="invalid-feedback">Please provide a valid text.</div>');  
              $(this).addClass("is-invalid");
              // $(this).addClass("focus-red");
              $(this).focus();
              return false;
            }
            else 
            {
              $(this).removeClass("is-invalid");
              $(this).next('.invalid-feedback').remove();
             form_ok = 1;
            }
          }
        });
        if (form_ok==1){
          $(input_type_submit).attr("disabled",true);
        $(button_type_submit).attr("disabled",true);
        $(".loader").addClass("active");
          var url1 = form.attr('action');
          var filecheck = 1;
          if(filecheck==1)
          {

            var form = new FormData(this);
            form.append("lat", sessionStorage.getItem("lat"));
            form.append("long", sessionStorage.getItem("long"));

            $.ajax({
             url: url1,
             type: "POST",
             data:  form,
             contentType: false,
                   cache: false,
             processData:false,
             beforeSend : function()
             {
              $("#err").fadeOut();
             },
             success: function(data)
                {
                    console.log(data);
                    if(JSON.parse(data))
                    {
                      var result = JSON.parse(data);
                      if(result.status=="200")
                      {
                        success_message(result.message);
                        if(result.action=="add")
                        { 
                          $("#"+fid)[0].reset();
                          $('#'+fid+' .images-ul').empty();
                          $(".select2").select2();
                        }
                        if(result.action=="login")
                        { 
                            window.location.href=result.url;
                        }
                        if(result.action=="reload")
                        { 
                            location.reload();
                        }                        
                        if(result.action=="enquiry")
                        { 
                            enquiry(result);
                        }                       
                      }
                      else if(result.status=="400")
                      {
                        error_message(result.message);
                        if(result.action=="login")
                        { 
                          if($("#captchadivlogin").html()!=undefined)
                            $("#captchadivlogin").load(result.data);
                        }
                      }
                      if(result.modaltype=="hide")
                        $("#"+result.modalid).modal("hide");


                      


                    }
                    else
                    {
                      $("#error-message").html(data);
                    }
                    $(input_type_submit).attr("disabled",false);
                    $(button_type_submit).attr("disabled",false);
                      $(".loader").removeClass("active");
                      // $('html, body').animate({scrollTop:0}, 'slow');
                },
             error: function(e) 
                {
                  $(".loader").removeClass("active");
                }          
              });
            }
            else
          {
            $("#warning-message").html('Use only Files name. (input type="file" name="files[]" multiple)  Like this ');
             $(".loader").removeClass("active");
          }
        }
       }));
      $(document).on("click", ".submit-btn",(function(e) {
        e.preventDefault();
        var id = $(this).data("target");  
        // $("#"+id).trigger("submit");
        var input_type_submit = $("#"+id+" input[type='submit']").trigger('click');
        var button_type_submit = $("#"+id+" button[type='submit']").trigger('click');

      }));
// data form end





// wallet add
$(document).on("click", ".wallet-add",(function(e) {
  event.preventDefault();
  $("#walletModal").modal("show");
  var id = $(this).data("id");  
  $("#wallt_user_id").val(id);
  $("#user_id_name").html($(this).data("name")+" ("+$(this).data("user_id")+")");
}));

// wallet add end



jQuery(document).ready(function($){
  //close popup
  $('.cd-popup').on('click', function(event){
    if( $(event.target).is('.cd-popup-close, .close, .done-btn') || $(event.target).is('.cd-popup') ) {
      event.preventDefault();
      $(this).removeClass('is-visible');
    }
  });
 
});





// delte button
var rowid = '';
$(document).on("click", ".del-btn",(function(e) {
  var ids = [];
  ids.length = 0;
  event.preventDefault();
  $('#deletemodal').modal('show');  
  var id = $(this).data("id");  
  var url1 = $(this).attr('href');
  ids.push(id);
    $(document).on("click", ".done-btn",(function(e) {
      // $(".loading").addClass("active");
        delete_data(id,ids,url1);      
    }));

}));
  function delete_data(id,ids,url)
  {
    $(".loading").addClass("active");
    var rowid = "rowno";
    $.ajax({
          url:url,
          type:"post",
          data:{ids:ids,rowid:rowid},
          success:function(d)
          {
              console.log(d);
              var result = JSON.parse(d);
              if(result.success=='200')
              {
                success_message(result.message);
                $(result.id).remove();
              }
              else if(result.success=='400')
              {
                error_message(result.message);
              }
              else
              {
                console.log(d);
              }
              $('#deletemodal').modal('hide'); 
              $(".loading").removeClass("active");
          },
          error: function(e)
          {
            exit;
          }
      });
  }
// delete button end





// restore button
var rowid = '';
$(document).on("click", ".restore-btn",(function(e) {
  var ids = 0;
  
  event.preventDefault();

    swal({
      title: 'Are you sure to restore?',
      text: '',
      icon: 'warning',
      buttons: {
        cancel: {
          text: 'No',
          value: null,
          visible: true,
          className: 'btn btn-default',
          closeModal: true,
        },
        confirm: {
          text: 'Yes',
          value: true,
          visible: true,
          className: 'btn btn-success rdone-btn',
          closeModal: true
        }
      }
    });
  
  var id = $(this).data("id");  
  var url1 = $(this).attr('href');
  ids = id;
    $(document).on("click", ".rdone-btn",(function(e) {
      $("body").addClass("body-loader");
        restore_data(id,ids,url1);      
    }));

}));
  function restore_data(id,ids,url)
  {
    $(".loading").addClass("active");
    var rowid = "rowno";
    $.ajax({
          url:url,
          type:"post",
          data:{ids:ids,rowid:rowid},
          success:function(d)
          {
              // console.log(d);
              var result = JSON.parse(d);
              if(result.success=='200')
              {
                success_message(result.message);
                $(result.id).remove();
              }
              else if(result.success=='400')
              {
                error_message(result.message);
              }
              else
              {
                console.log(d);
              }
              $(".loading").removeClass("active");
              
          },
          error: function(e)
          {
            exit;
          }
      });
  }
// restore button end





$(document).on('click',".status_change",function (e) {
  $(".loading").addClass("active");
  var id = $(this).val();
  var url = $(this).data("url");
  var column = $(this).data("column");
  if ($(this).prop('checked')==true)
    var status = 1;
  else
    var status = 0;

  $.ajax({
      url:url,
      type:"post",
      data:{id:id,status:status,column:column},
      success:function(d)
      {
        console.log(column);
        var result = JSON.parse(d);
        if(result.status=="200")
        {
          success_message(result.message);
          $("#"+column+id).html(result.data['status']);
        }
        else if(result.status=="400")
        {
          error_message(result.message);
        }
          $(".loading").removeClass("active");       
      },
      error: function(e) 
    {
      $(".loading").removeClass("active");
    } 
  });
});




function deleteAllCookies() {
    const cookies = document.cookie.split(";");

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i];
        const eqPos = cookie.indexOf("=");
        const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}


  var listcheckbox = [];
  $(document).on("click", ".listcheckbox-btn",(function(e) {    

      var table_id = $(this).data("table_id");
      var index222 = listcheckbox.indexOf('all');
      if (index222 > -1)
      {
        listcheckbox.splice(index222, 1);
      }
      $(".alllistcheckbox"+table_id).attr("checked",false);

      if (this.checked) 
      {
          listcheckbox.push(this.value);
      }
      else
      {
          const index = listcheckbox.indexOf(this.value);
          if (index > -1)
          {
            listcheckbox.splice(index, 1);
          }
      }
  }));


  $(document).on("click", ".alllistcheckbox-btn",(function(e) {    
      var table_id = $(this).data("table_id");
      listcheckbox = [];
      if (this.checked) 
      {
          listcheckbox = ['all'];
          $(".listcheckbox"+table_id).attr("checked",true);
      }
      else
      {
          $(".listcheckbox"+table_id).attr("checked",false);        
      }
  }));


  $(document).on("click", ".bulk-action",(function(e) {    
    var table_id = $(this).data("table_id");
    var url1 = $(this).data("url");
    var chk = $('.listcheckbox'+table_id+':checked');
    var hasChecked = false;
    if(chk.length>0)
      hasChecked = true;
    var bulkactiontype = $("#bulkactiontype"+table_id).val();
    if (bulkactiontype=='')
    {
      error_message("Select bulk action type.");
      return false;
    }
    if (hasChecked == false)
    {
      error_message("Please select at least one.");    
    }
    else {
          $(".loading").addClass("active");
          $.ajax({
              url:url1,
              type:"post",
              data:{table_id:table_id,listcheckbox:listcheckbox,bulkactiontype:bulkactiontype},
              success:function(d)
              {
                console.log(d);
                var result = JSON.parse(d);
                if(result.status=="200")
                {
                  success_message(result.message);
                  if(result.action=='delete')
                  {
                    $(listcheckbox).each(function (index,value) {
                        $("#rowno"+value).remove();
                    });
                  }
                  if(result.action=='active' || result.action=='inactive')
                  {
                    $(listcheckbox).each(function (index,value) {
                      if(result.action=='active')
                      {
                        $(".status_change"+value).attr("checked",true);
                      }
                      else
                      {
                        $(".status_change"+value).attr("checked",false);                        
                      }

                      $("#status"+value).html(result.data['status']);

                    });
                  }
                }
                else if(result.status=="400")
                {
                  error_message(result.message);
                }
                  $(".loading").removeClass("active");       
              },
              error: function(e) 
              {
                $(".loading").removeClass("active");
              } 
          });
      }
   }));


$(document).on("click", ".open-pdf",(function(e) {
  var id = $(this).attr("id");
  var url2 = window.location.hostname;
  var url = window.location.pathname;
  var url = "http://".concat(url2, url, "content/", id);
  window.open(url, "", "width=800,height=500");
}));


$(document).on("click", ".open-docx",(function(e) {
  event.preventDefault();
  var id = $(this).attr("id");
  var url2 = window.location.hostname;
  var url = window.location.pathname;
  var url = "http://".concat(url2, url, "content/", id);
  var url = "https://view.officeapps.live.com/op/embed.aspx?src=" + url;
  window.open(url, "", "width=800,height=500");
}));










function front_success_message()
{
    $("body").append(` 

      <div id="successmodal" class="modal fade show1" style="display: none;">
      <div class="modall-dialog modall-confirm">
        <div class="modall-content">
          <div class="modall-header justify-content-center">
            <button type="button" id="successmodalclose" class="close" data-dismiss="modall" aria-hidden="true">&times;</button>
            
            <svg id="successAnimation" class="animated" xmlns="http://www.w3.org/2000/svg" width="140" height="140" viewBox="0 0 70 70">
                <circle id="successAnimationCircle" cx="35" cy="35" r="24" stroke="#d5f3d3" stroke-width="2" stroke-linecap="round" fill="#d5f3d3" />
                <polyline id="successAnimationCheck" stroke="#4BB543" stroke-width="2" points="23 34 34 43 47 27" fill="transparent" />
            </svg>
                
          </div>
          <div class="modall-body text-center">
            <h4 style="color:#4BB543;">Successfully Submited!</h4> 
            <p>Your message has been submitted successfully, Team will respond you shortly!</p>
          </div>
        </div>
      </div>
    </div>  

    `);
}

function front_error_message()
{
    $("body").append(` 

      <div id="errormodal" class="modal fade show1" style="display: none;">
      <div class="modall-dialog modall-confirm">
        <div class="modall-content">
          <div class="modall-header justify-content-center">
            <button type="button" class="close" id="errormodalclose" data-dismiss="modall" aria-hidden="true">&times;</button>
            
            <svg id="failureAnimation" class="animated" xmlns="http://www.w3.org/2000/svg" width="140" height="140" viewBox="0 0 70 70">
                <circle id="failureAnimationCircle" cx="35" cy="35" r="24" stroke="#faebea" stroke-width="2" stroke-linecap="round" fill="#faebea" />
                <polyline class="failureAnimationCheckLine" stroke="#F44336" stroke-width="2" points="25,25 45,45" fill="transparent" />
                <polyline class="failureAnimationCheckLine" stroke="#F44336" stroke-width="2" points="45,25 25,45" fill="transparent" />
            </svg>

          </div>
          <div class="modall-body text-center">
            <h4 style="color:#F44336;">Oops, something went wrong!</h4> 
            <p>Your form has been not Submited, Tray Again....</p>
          </div>
        </div>
      </div>
    </div> 

    `);
}

$(document).on("click", "#successmodalclose,#errormodalclose",(function(e) {
  $("#successmodal,#errormodal").remove();
}));






function check_required_fields(form_id)
{
  var form_ok = 1;
  $("#"+form_id+" :input").each(function(){
         var input = $(this).prop("required"); 
         if (input == true)
         {
            if ($(this).val()=="" || $(this).val()=="0")
            {
              form_ok = 0;
              var placeholder = $(this).attr("placeholder");
              if (placeholder==undefined) placeholder = $(this).attr("name");
              $(this).next('p').remove();
              $(this).after('<p class="error" >This field is required.</p>');  
              $(this).addClass("is-invalid");
              $(this).focus();
              return false;
            }
            else 
            {
              $(this).removeClass("is-invalid");
              $(this).next('.invalid-feedback').remove();
              $(this).next('.error').remove();
             form_ok = 1;
            }
          }
        });
  return form_ok;
}






// front data submit form

    $(document).on("submit", ".front_form_data",(function(e) {
        e.preventDefault();

        var form = $(this);
        var fid = form.attr('id');
        var input_type_submit = $("input[type='submit']");
        var button_type_submit = $("button[type='submit']");



        

        var form_ok = 1;
        $("#"+fid+" :input").each(function(){
         var input = $(this).prop("required"); 
         if (input == true)
         {
            if ($(this).val()=="" || $(this).val()=="0")
            {              
              form_ok = 0;
              var placeholder = $(this).attr("placeholder");
              if (placeholder==undefined) placeholder = $(this).attr("name");
              
              var data_title = $(this).data("title");
              if (data_title!=undefined) print_toast(data_title+' Mandatory');


              $(this).next('.invalid-feedback').remove();
              $(this).after('<div class="invalid-feedback">!</div>');  
              $(this).addClass("is-invalid");
              // $(this).addClass("focus-red");
              // $(this).focus();
              return false;
            }
            else 
            {


              if($(this).attr('type')=='email')
              {
                var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                if ($(this).val().match(validRegex)) {
                  // alert("Valid email address!");
                  // document.form1.text1.focus();
                  // return true;
                }else{
                  // alert("Invalid email address!");
                  print_toast('Invalid Email Formet!')                 

                  $(this).next('.invalid-feedback').remove();
                  $(this).after('<div class="invalid-feedback">!</div>');  
                  $(this).addClass("is-invalid");
                  $(this).focus();
                  form_ok = 0;
                  return false;
                }
              }



              $(this).removeClass("is-invalid");
              $(this).next('.invalid-feedback').remove();
             form_ok = 1;
            }
          }
        });
        if (form_ok==1){
          $(input_type_submit).attr("disabled",true);
        $(button_type_submit).attr("disabled",true);
        $(".ajax-loader").addClass("show");
          var url1 = form.attr('action');
         

            var form = new FormData(this);
            form.append("lat", sessionStorage.getItem("lat"));
            form.append("long", sessionStorage.getItem("long"));

            $.ajax({
             url: url1,
             type: "POST",
             data:  form,
             dataType:"json",
             "headers": {
                "token": sessionStorage.getItem("token")
             },
             contentType: false,
                   cache: false,
             processData:false,
             beforeSend : function()
             {
              $("#err").fadeOut();
             },
             success: function(data)
                {
                    console.log(data);
                    if(data)
                    {
                      // var result = JSON.parse(data);
                      var result = data;
                      if(result.status=="200")
                      {
                        print_toast(result.message);
                        if(result.action=="add")
                        { 
                          $("#"+fid)[0].reset();
                          $('#'+fid+' .add-produc-imgs').empty();
                        }
                        if(result.action=="login")
                        { 
                            window.location.href=result.url;
                        }
                        if(result.action=="reload")
                        { 
                            location.reload();
                        }
                        if(result.data.name)
                        {
                          $(".name").html(result.data.name);
                          $(".user-mobile").html(result.data.mobile);
                          $(".user-email").html(result.data.email);
                          $(".user-address").html(result.data.address);
                        }

                      }
                      else
                      {
                        print_toast(result.message);
                        if(result.action=="login")
                        { 
                            $("#captchadivlogin").load(result.data);
                        }
                      }
                      if(result.modaltype=="hide")
                      {
                        // $("#"+result.modalid).modal("hide");
                        $(".btn-close").trigger("click");
                      }




                    }
                    else
                    {
                      $("#error-message").html(data);
                    }
                    $(input_type_submit).attr("disabled",false);
                    $(button_type_submit).attr("disabled",false);
                      $(".ajax-loader").removeClass("show");

                },
             error: function(e) 
                {
                  $(".ajax-loader").removeClass("show");
                }          
              });
           
        }
       }));
      
// front data form end




