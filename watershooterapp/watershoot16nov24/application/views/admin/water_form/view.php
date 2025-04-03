<?php
$username = $this->crud->selectDataByMultipleWhere('registration',array('id'=>$EDITDATA[0]->user_id));
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>View <?php echo $page_title; ?></title>
      <?php $this->load->view('admin/include/allcss') ?>

   </head>
   <body>
       <?php echo loder; ?> 
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">


          <?php $this->load->view('admin/include/header') ?>
          <?php $this->load->view('admin/include/sidebar') ?>


         
         <div id="content" class="app-content">
            <div class="d-flex align-items-center justify-content-between mb-3">
               <div>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                     <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> View <?php echo $page_title; ?></li>
                  </ol>
                  <h1 class="page-header mb-0">View <?php echo $page_title; ?></h1>
               </div>
               <div>
                  <button onclick="history.back();" class="btn btn-primary">Back</button>
               </div>
            </div>



               <form  class="row" method="post" enctype="multipart/form-data" action="#">
                  <div class="col-lg-12">
                     <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Content
                        </div>
                        <div class="card-body">
                           <div class="row">

                              <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($username)) echo $username[0]->name; ?>" disabled>
                                 </div>
                              </div>
                              <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Plant Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($username)) echo $username[0]->client_name; ?>" disabled>
                                 </div>
                              </div>
                              <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($username)) echo $username[0]->location; ?>" disabled>
                                 </div>
                              </div>
                              <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Plant Capacity</label>
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($username)) echo $username[0]->plant_capacity; ?>" disabled>
                                 </div>
                              </div>
                              <?php 
           if(!empty($EDITDATA[0]->date))
            { ?>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Enter Date</label>
                                    <input type="text" class="form-control" name="email"  value="<?php echo $EDITDATA[0]->date; ?>" disabled>
                                 </div>
                              </div>
                              <?php }
           if(!empty($EDITDATA[0]->flow_meter_inlet))
            { ?>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Flow meter inlet</label>
                                    <input type="text" class="form-control" name="email"  value="<?php echo $EDITDATA[0]->flow_meter_inlet; ?>" disabled>
                                 </div>
                              </div>
                              <?php }
           if(!empty($EDITDATA[0]->flow_meter_outlet))
            { ?>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Flow meter outlet</label>
                                    <input type="text" class="form-control" name="mobile"  value="<?php echo $EDITDATA[0]->flow_meter_outlet; ?>" disabled>
                                 </div>
                              </div>
                              <?php }
           if(!empty($EDITDATA[0]->intel_para_ph))
            { ?>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">PH</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo $EDITDATA[0]->intel_para_ph; ?>" disabled>
                                 </div>
                              </div>
                             <?php }
           if(!empty($EDITDATA[0]->intel_para_temprature))
            { ?>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Temperature</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo $EDITDATA[0]->intel_para_temprature; ?>" disabled>
                                 </div>
                              </div>
                             <?php }
           if(!empty($EDITDATA[0]->intel_para_tds))
            { ?>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Tds</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo $EDITDATA[0]->intel_para_tds; ?>" disabled>
                                 </div>
                              </div>
                             <?php }
           if(!empty($EDITDATA[0]->intel_para_dewatering))
            { ?>
               <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Dewatering Equipment</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo $EDITDATA[0]->intel_para_dewatering; ?>" disabled>
                                 </div>
                              </div>

                 <?php }
           if(!empty($EDITDATA[0]->equipment_srp_sewage_working))
            { ?>
                              <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label"> Lifting Pump (Working)</label>
                                    <?php echo ok_notok($EDITDATA[0]->equipment_srp_sewage_working); ?>
                                 </div>
                              </div>
                              <?php }
           if(!empty($EDITDATA[0]->equipment_srp_sewage_standby))
            { ?>
                              <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Lifting Pump (Standby)</label>
                                    <?php echo ok_notok($EDITDATA[0]->equipment_srp_sewage_standby); ?>
                                 </div>
                              </div>
                              <?php }
           if(!empty($EDITDATA[0]->equipment_stp_air_working))
            { ?>
                              <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Air Blower(Working)</label>
                                    <?php echo ok_notok($EDITDATA[0]->equipment_stp_air_working); ?>
                                 </div>
                              </div>
                              <?php }
           if(!empty($EDITDATA[0]->equipment_stp_air_standby))
            { ?>
                              <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Air Blower(Standby)</label>
                                    <?php echo ok_notok($EDITDATA[0]->equipment_stp_air_standby); ?>
                                 </div>
                              </div>
                            
                              <?php }
           if(!empty($EDITDATA[0]->equipment_recirculation_working))
            { ?>
                              <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Recirculation Pump(Working)</label>
                                    <?php echo ok_notok($EDITDATA[0]->equipment_recirculation_working); ?> 
                                    
                                 </div>
                              </div>
                              <?php }
           if(!empty($EDITDATA[0]->equipment_recirculation_standby))
            { ?>
               <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Recirculation Pump(Standby)</label>
                                    <?php echo ok_notok($EDITDATA[0]->equipment_recirculation_standby); ?> 
                                   
                                 </div>
                              </div>
<?php }
           if(!empty($EDITDATA[0]->equipment_filterfeed_working))
            { ?>

               <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Filter Feed Pump(Working)</label>
                                    <?php echo ok_notok($EDITDATA[0]->equipment_filterfeed_working); ?>
                                 </div>
                              </div>
<?php }
           if(!empty($EDITDATA[0]->equipment_filterfeed_standby))
            { ?>
                      <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Filter Feed Pump(Standby)</label>
                                    <?php echo ok_notok($EDITDATA[0]->equipment_filterfeed_standby); ?>
                                 </div>
                              </div>
                           <?php }
           if(!empty($EDITDATA[0]->water_equipment_hpn_working))
            { ?>
            <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">HPN(Working)</label>
                                    <?php echo ok_notok($EDITDATA[0]->equipment_filterfeed_standby); ?>
                                 </div>
                              </div>

                               <?php }
           if(!empty($EDITDATA[0]->water_equipment_hpn_standby))
            { ?>
               <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">HPN(Standby)</label>
                                    <?php echo ok_notok($EDITDATA[0]->equipment_filterfeed_standby); ?>
                                 </div>
                              </div>
<?php }
           if(!empty($EDITDATA[0]->chemical_sludge_sodium))
            { ?>


                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Sodium Hypo Chlorite</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo $EDITDATA[0]->chemical_sludge_sodium; ?>" disabled>
                                 </div>
                              </div>

                               <?php }
           if(!empty($EDITDATA[0]->chemical_sludge_polymer))
            { ?>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Polymer</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo $EDITDATA[0]->chemical_sludge_polymer; ?>" disabled>
                                 </div>
                              </div>
                              <?php }
           if(!empty($EDITDATA[0]->chemical_sludge_mlss))
            { ?>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">MLSS</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo $EDITDATA[0]->chemical_sludge_mlss; ?>" disabled>
                                 </div>
                              </div>
                           <?php }
      $otherdata = $EDITDATA[0]->chemical_sludge_other; 
            if (!empty($otherdata)) 
            { ?>
                              <div class="col-lg-3 mb-4">
            <label>Others (Name).</label>
            <?php
            
                $otherItems = explode(',', $otherdata);
                foreach ($otherItems as $value) 
                { 
            ?>
               <input type="text" name="water_chemical_sludge_other[]" class="form-control  mb-2"  value="<?= htmlspecialchars(trim($value)) ?>">
            <?php  } ?> 
         </div>
            <?php  } ?> 

            <?php 
           if(!empty($EDITDATA[0]->other_diffuser))
            { ?>
                              <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Diffuser</label>
                                    <?php echo ok_notok($EDITDATA[0]->other_diffuser); ?>
                                 </div>
                              </div>

 <?php } 
           if(!empty($EDITDATA[0]->other_panel))
            { ?>
               <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Panel</label>
                                    <?php echo ok_notok($EDITDATA[0]->other_panel); ?>
                                 </div>
                              </div>

 <?php } 
           if(!empty($EDITDATA[0]->piping_leakage))
            { ?>

               <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Piping Leakage</label>
                                    <?php echo ok_notok($EDITDATA[0]->piping_leakage); ?>
                                 </div>
                              </div>
                              <?php } 
           if(!empty($EDITDATA[0]->other_agitator))
            { ?>
               <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Agitator</label>
                                    <?php echo ok_notok($EDITDATA[0]->other_agitator); ?>
                                 </div>
                              </div>
                               <?php } 
           if(!empty($EDITDATA[0]->other_acf))
            { ?>  
               <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">ACF</label>
                                    <?php echo ok_notok($EDITDATA[0]->other_acf); ?>
                                 </div>
                              </div>

                              <?php } 
           if(!empty($EDITDATA[0]->other_sofner))
            { ?>
                <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Sofner</label>
                                    <?php echo ok_notok($EDITDATA[0]->other_sofner); ?>
                                 </div>
                              </div>

<?php } 
           if(!empty($EDITDATA[0]->other_uf))
            { ?>


                            <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">UF</label>
                                    <?php echo ok_notok($EDITDATA[0]->other_uf); ?>
                                 </div>
                              </div>   

                              <?php } 
           if(!empty($EDITDATA[0]->other_ro))
            { ?>

               <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">RO</label>
                                    <?php echo ok_notok($EDITDATA[0]->other_ro); ?>
                                 </div>
                              </div>   

                              <?php } 
           if(!empty($EDITDATA[0]->other_mgf))
            { ?>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">MGF</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo $EDITDATA[0]->other_mgf; ?>" disabled>
                                 </div>
                              </div>
                           <?php } ?>


                           <?php
         if(!empty($EDITDATA[0]->inlet_image))
            { ?>
                        <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Inlet Sample Image</label>
                                    <p><img style="    width: 50%;" src="<?=base_url() ?>media/uploads/<?=$EDITDATA[0]->inlet_image ?>"></p>
                                 </div>
                              </div>

                              <?php } if(!empty($EDITDATA[0]->outlet_image)){?>
                                 <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Outlet Sample Image</label>
                                    <p><img style="    width: 50%;" src="<?=base_url() ?>media/uploads/<?=$EDITDATA[0]->outlet_image ?>"></p>
                                 </div>
                              </div>
                            <?php } if(!empty($EDITDATA[0]->mlss_image)){?>
                              <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">MLSS Image</label>
                                    <p><img style="    width: 50%;" src="<?=base_url() ?>media/uploads/<?=$EDITDATA[0]->mlss_image ?>"></p>
                                 </div>
                              </div>
                              <?php } if(!empty($EDITDATA[0]->other_image)){?>
                                 <div class="col-lg-3 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Any Other Image</label>
                                    <p><img style="    width: 50%;" src="<?=base_url() ?>media/uploads/<?=$EDITDATA[0]->other_image ?>"></p>
                                 </div>
                              </div>
                                    <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>

               </form>
           
         </div>
       
      </div>



   <?php $this->load->view('admin/include/footer') ?>
<script>
   ClassicEditor
      .create( document.querySelector( '#editor' ), {
         // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
      } )
      .then( editor => {
         window.editor = editor;
      } )
      .catch( err => {
         console.error( err.stack );
      } );
</script>
   </body>
</html>