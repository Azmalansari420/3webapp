<?php
$users = $this->crud->selectDataByMultipleWhere('users',array('id'=>$EDITDATA[0]->user_id));
if(!empty($users))
{
   $image = base_url('media/uploads/users/'.$users[0]->profile_image);
}
else
{
   $image = base_url('assets/images/user-profile.jpg');
}
?>

<!DOCTYPE html>
<html lang="en">
   <title>View <?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <div class="profile-header" >
               <div class="profile-header-cover"></div>
               <div class="profile-header-content" style="display: flex;">
                  <div class="profile-header-img" style="margin-bottom: 0;">
                     <img src="<?=$image ?>" alt />
                  </div>
                  <div class="profile-header-info">
                     <h4><?=$EDITDATA[0]->name ?></h4>
                     <p>
                        Email:- <?=$EDITDATA[0]->email ?></br>
                        Mobile:- <?=$EDITDATA[0]->mobile ?><br>
                     
                        Address:- <?=$EDITDATA[0]->address ?><br>
                       Locality:- <?=$EDITDATA[0]->locality ?><br>
                       State:- <?=statename($EDITDATA[0]->state) ?><br>        
                       City:- <?=cityname($EDITDATA[0]->city) ?><br>        
                       Pincode:- <?=$EDITDATA[0]->pincode ?><br>     
                     </p>
                  </div>
               </div>
            </div>
<style>
   .table.table-profile .field {
       text-align: start;
   }
   td.value
   {
          text-align: end;
   }
</style>
            <div class="profile-container">
               <div class="row row-space-20">
                  <div class="col-xl-8">
                     <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="profile-post">
                           <div class="post">
                              <table class="table table-striped table-td-valign-middle table-bordered bg-white">
                                <thead>
                                  <tr>
                                    <th width="1%">#</th>
                                    <th>Order ID</th>
                                    <th>Product Image</th>
                                    <th>Product Details</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php 
                                 $i=0;
                                 $order_id = $EDITDATA[0]->order_id;
                                 $ALLDATA = $this->crud->selectDataByMultipleWhere('orders',array('order_id'=>$order_id,));

                                    foreach($ALLDATA as $key => $order)
                                     {                                        
                                        $i++; 
                                        $coupon = $this->crud->selectDataByMultipleWhere('order_coupon',array('user_id'=>$order->user_id,'order_id'=>$order_id));
                                    ?>
                                   <tr>
                                      <td><?=$i ?></td>
                                      <td><?=$order->order_id ?></td>
                                      <td>
                                         <img src="<?php echo base_url(); ?>media/uploads/product/<?php echo $order->image; ?>" class="" width="100"/>
                                      </td>
                                      <td>
                                         <p>
                                            Name:- <?=$order->name ?><br>
                                            Size:- <?=sizename($order->size_id) ?><br>
                                            Color:- <?=colorname($order->color_id) ?><br>
                                         </p>
                                      </td>
                                      <td><?=$order->quantity ?></td>
                                      <td><?=$order->sale_price ?></td>
                                      <td><?=$order->sale_price*$order->quantity ?></td>
                                   </tr>
                                <?php } ?>
                                </tbody>
                             </table>
                          
                           </div>

                        </div>
                     </div>
                  </div>


                  <div class="col-xl-4">
                     <?php
                     if(!empty($EDITDATA[0]->order_note))
                        { ?>
                     <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="profile-post">
                           <div class="post">
                              <h4>Order Note</h4>
                              <?=$EDITDATA[0]->order_note ?>                          
                           </div>
                        </div>
                     </div>
                     <?php } ?>

                     <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="profile-post">
                           <div class="post">
                              <table class="table table-profile">
                                 <thead>
                                    <tr>
                                       <th colspan="2"><b>Price</b></th>
                                    </tr>
                                 </thead>
                                 <tbody>

                                    <tr>
                                       <td class="field">Sub Total</td>
                                       <td class="value">
                                          <div class="m-b-5">
                                             <b><?php echo currency_simble($EDITDATA[0]->sub_total); ?></b>
                                          </div>
                                       </td>
                                    </tr>
                                    <?php
                                   if(!empty($coupon))
                                       { 
                                      $couponamout = $EDITDATA[0]->finalprice-$EDITDATA[0]->after_discount_final_price;
                                      $couponname = $this->crud->selectDataByMultipleWhere('coupen_code',array('name'=>$coupon[0]->coupon,));

                                     ?>
                                    <tr>
                                       <td class="field" style="width: 70%;">Promo Code:<br> <?php if(!empty($couponname)) echo $couponname[0]->name; ?>
                                       (<?php if($couponname[0]->type==2){ echo "Amount";}else{echo '%';} ?>)</td>
                                       <td class="value">
                                          <div class="m-b-5">
                                             <b><?php echo currency_simble($couponamout); ?></b>
                                          </div>
                                       </td>
                                    </tr>
                                 <?php } ?>
                                    <tr>
                                       <td class="field">Total</td>
                                       <td class="value">
                                          <div class="m-b-5">
                                             <b><?php echo currency_simble($EDITDATA[0]->after_discount_final_price); ?></b>
                                          </div>
                                       </td>
                                    </tr>

                                 </tbody>
                              </table>                        
                           </div>
                        </div>
                     </div>
                  </div>





               </div>
            </div>
            
            <!-- <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-8">

                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-6 form-group">
                           <label>Title </label>
                           <input type="text" class="form-control" name="title" value="<?=$EDITDATA[0]->title ?>" disabled>
                        </div>

                        <div class="col-6 form-group">
                           <label>Sub Title </label>
                           <input type="text" class="form-control" name="sub_title" value="<?=$EDITDATA[0]->sub_title ?>" disabled>
                        </div>

                        <div class="col-12 form-group" >
                           <label>Content </label>
                           <textarea name="content" class="summernote form-control"><?=$EDITDATA[0]->content ?></textarea>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 form-group">
                           <label>Upload Image</label>
                           <input  type="hidden" class="form-control" name="oldimage" value="<?php echo $EDITDATA[0]->image; ?>">
                           <?php
                           if(!empty($EDITDATA[0]->image))
                              { ?>
                                 <br>
                           <img id="image-preview" src="<?php echo base_url($upload_path); ?><?php echo $EDITDATA[0]->image; ?>" alt="Image Preview" width="100px" >
                        <?php } ?>
                        </div>

                        <div class="col-12 form-group m-b-0">
                           <label>Select Status</label>
                           <select class=" form-control" required name="status" disabled>
                              <option value="1"  <?php if($EDITDATA[0]->status==1)echo 'selected'; ?>>Show</option>
                              <option value="0" <?php if($EDITDATA[0]->status==0)echo 'selected'; ?>>Hide</option>
                           </select>
                        </div>
                       
                     </div>
                  </div>
               </div>
            </form> -->
         </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>
      <?php $this->load->view('admin/include/theams') ?>
      <?php $this->load->view('admin/include/allscript') ?>
   </body>
</html>