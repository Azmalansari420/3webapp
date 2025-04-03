<?php
$id = $this->input->get('id');

$today = date("Ymd");
$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
$uniq_id = $today . $rand;

$user = $this->crud->selectDataByMultipleWhere('employees',array('id'=>$id));
if(!empty($user))
{
    $user = $user[0];
}


$this->load->view('app/include/header'); 

?>

<style>
    .group-input>label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .group-input {
        margin-bottom: 30px;
    }
    .logo>img {
    width: 100px;
}
</style>
    <!-- /preload -->
    <div class="header">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="javascript:;" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Employees Update</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">

            
            <form class="tf-form mt-5" method="post" enctype="multipart/form-data" action="<?=base_url('api/hr/update_employe') ?>" id="form-data">
                <input type="hidden" value="<?=$id ?>" name="get_id">
                <div class="group-input">
                    <label>Employee Code</label>
                    <input type="text" placeholder="Enter Code.." name="employee_code" value="<?php echo $user->employee_code; ?>">
                </div>

                <div class="group-input">
                    <label>Name</label>
                    <input type="text" placeholder="Enter Name.." name="name" value="<?=$user->name ?>">
                </div>

                <div class="group-input">
                    <label>Enter Email</label>
                    <input type="text" placeholder="Enter Email.." name="email" value="<?=$user->email ?>">
                </div> 

                <div class="group-input">
                    <label>Enter Mobile</label>
                    <input type="number" placeholder="Enter Mobile.." name="mobile" value="<?=$user->mobile ?>">
                </div>                
                
                <div class="group-input">
                    <label>Address</label>
                    <textarea name="address" rows="5" placeholder="Enter Address.."><?=$user->address ?></textarea>
                </div>


                <div class="group-input">
                    <label>Upload Image</label>
                    <input type="file" placeholder="Enter Mobile.." name="image" value="">
                    <input  type="hidden" class="form-control" name="oldimage" value="<?php echo $user->image; ?>">

                    <div class="logo">
                        <img src="<?=base_url() ?>media/uploads/employees/<?=$user->image ?>" onerror="this.src='<?=base_url() ?>media/uploads/1725100321.jpg'">
                    </div>
                </div> 
                

        

                <div class="group-input">
                    <label>Status:</label>
                    <select name="status" required class="status">
                        <option <?php if($user->status==1) echo 'selected'; ?> value="1">Active</option>
                        <option <?php if($user->status==0) echo 'selected'; ?> value="0">De-Active</option>
                    </select>
                </div>

               
                <div class="bottom-navigatio4n-bar bottom-btn-fix4ed st2 mt-5">
                    <button type="submit" name="submit" class="tf-btn accent large submit-btn">Update</button>
                </div>
            </form>
        </div>
    </div>


<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>


<script>

// const rsm_id = '<?=$full_detail->id ?>';
// const nsm_id = '<?=$full_detail->nsm_id ?>';


//     $(document).on("click", ".submit-btn",(function(e) {
//       update_profile();
//     }));

//     function update_profile()
//     {
//         var id = $(".id").val();
//         var name = $(".name").val();
//         var mobile = $(".mobile").val();
//         var address = $(".address").val();
//         var state = $(".state-id").val();
//         var city = $(".city-list").val();
//         var email = $(".email").val();
//         var password = $(".password").val();
//         var status = $(".status").val();

//         if(name=='')
//         {
//             toaster('Enter Name..', 'success');
//             return false;
//         }
//         if(email=='')
//         {
//             toaster('Enter Email.', 'success');
//             return false;
//         }
//         if(password=='')
//         {
//             toaster('Enter Password.', 'success');
//             return false;
//         }

        
//         var form = new FormData();
       
//         form.append("id", id);
//         form.append("nsm_id", nsm_id);
//         form.append("rsm_id", rsm_id);
//         form.append("name", name);
//         form.append("mobile", mobile);
//         form.append("address", address);
//         form.append("state", state);
//         form.append("city", city);
//         form.append("email", email);
//         form.append("password", password);
//         form.append("status", status);

//         var settings = {
//           "url": "<?=base_url() ?>api/rsm/update_asm",
//           "method": "POST",
//           "dataType": "json",
//           "timeout": 0,
//           "processData": false,
//           "mimeType": "multipart/form-data",
//           "contentType": false,
//           "data": form
//         };

//         $.ajax(settings).done(function (response) {
//           console.log(response);
//           if(response.status == 200) 
//             {
//               toaster(response.message, 'success');
//               setTimeout(function() {
//                 window.location.href = response.url;
//               }, 2000); // Redirect after 2 seconds
//             } 
//             else 
//             {
//               toaster(response.message, 'success');
//             }
//         });
//     }

    
        // toaster('This is an error message!', 'error');
</script>