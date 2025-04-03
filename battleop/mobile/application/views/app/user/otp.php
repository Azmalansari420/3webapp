<?php include('include/allcss.php'); ?>
<style>
body, html {
    background: black;
    padding: 0;
    margin: 0;
}
</style>
<form method="get" class="mt-3" style="display: none;">
    <input type="hidden" name="device_id" id="device_id" value="<?=$this->session->userdata('device_id') ?>">
    <input type="hidden" name="role" id="role" value="2">
    <div class="digit-group">
        <input class="form-control" type="text" id="digit-2" name="digit-2" placeholder="" data-next="digit-3" data-previous="digit-1">
        <input class="form-control" type="text" id="digit-3" name="digit-3" placeholder="" data-next="digit-4" data-previous="digit-2">
        <input class="form-control" type="text" id="digit-4" name="digit-4" placeholder="" data-next="digit-5" data-previous="digit-3">
        <input class="form-control" type="text" id="digit-5" name="digit-5" placeholder="" data-next="digit-6" data-previous="digit-4">
    </div>                
</form>
<script>        
    var form = new FormData();
    form.append("mobile", "<?=$this->input->get('mobile') ?>");
    form.append("otp1", 1);
    form.append("otp2", 2);
    form.append("otp3", 3);
    form.append("otp4", 4);
    form.append("type", $("#role").val());
    form.append("device_id", $("#device_id").val());
    var settings = {
      "url": "<?=base_url() ?>api/auth/sign_up_otp_verify",
      "method": "POST",
      "timeout": 0,
      "processData": false,
      "mimeType": "multipart/form-data",
      "contentType": false,
      "dataType":"json",
      "data": form
    };
    $.ajax(settings).done(function (response) {
      $("#preloader").removeClass("show");
      if(response.status==200)
      {
        sessionStorage.setItem("token", response.data.token);
        print_toast(response.message);
        window.location.href='home';
        print_toast(response.message);
      }
      else
      {
        print_toast(response.message);
      }
    });
</script>
<?php include('include/allscript.php'); ?>