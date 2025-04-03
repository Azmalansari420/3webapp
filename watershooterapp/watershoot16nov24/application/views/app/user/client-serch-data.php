<?php
$name = "";

$id = $this->input->get('id');
$getlist = $this->db->get_where('water_form',array('id'=>$id))->result_object();
if(!empty($getlist))
	$getlist = $getlist[0];

if($getlist->type==1)
{
	$name = "STP";
}
else if($getlist->type==2)
{
	$name = "ETP";
}
else if($getlist->type==3)
{
	$name = "WTP";
}
else if($getlist->type==4)
{
	$name = "Other";
}
$username = $this->crud->selectDataByMultipleWhere('registration',array('id'=>$getlist->user_id));
include('include/header.php'); ?> 

<body>
<style>
	.page-content.space-top {
	    margin-top: 36px;
	}
	
	.form-label {
	    font-weight: 600;
	    color: black;
	}
	.bg-gray{
		background: #d9d9d9!important;
	}
	::-webkit-input-placeholder { 
	    color: black!important;
	    font-size: 12px;
	}
	.form-control {
    color: black!important;
	}
	.form-control:focus, .form-control:active, .form-control.active {
	    border-color: var(--primary);
	    background: var(--primary);
	}

	i.icon.feather.icon-check-circle {
	    font-size: 100px;
	    color: #283890;
	}
	button.add_field_button {
    margin: 8px 0;
    float: right;
    color: white;
    padding: 4px 7px;
    border-radius: 6px;
	}
	a.remove_field {
	    color: red;
	    margin: 5px;
	}

	.offcanvas-body {
	  background-color: #f0f9ff; 
	  border: 1px solid #007bff; 
	  border-radius: 8px; 
	  box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2); 
	  padding: 20px; 
	  margin-top: 20px; 
	  font-family: Arial, sans-serif; 
	  color: #333; 
	}

	.offcanvas-body h6 {
	  font-size: 16px;
	  font-weight: bold;
	  color: #0056b3; 
	  border-bottom: 2px solid #007bff; 
	  padding-bottom: 8px; 
	  margin-bottom: 16px; 
	}

	.form-check {
	  margin-bottom: 9px; 
	}

	.form-check-label {
	  font-weight: 600; 
	  margin-right: 10px; 
	}

	.form-check-input {
	  margin-right: 5px; 
	}

	.form-check input[type="radio"]:checked + label {
	  color: #28a745; 
	  font-weight: bold; 
	}
	.dz-filter-canvas .form-check {
	    justify-content: space-between;
	    padding-left: 0;
	    padding-bottom: 0;
	}





	.offcanvas-body {
	  background-color: #f0f9ff; /* Light blue background */
	  border: 1px solid #007bff; /* Blue border */
	  border-radius: 8px; /* Smooth rounded corners */
	  box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2); /* Box shadow */
	  padding: 20px; /* Inner spacing */
	  font-family: Arial, sans-serif; /* Clean font style */
	}

	.form-check {
	  display: flex;
	  align-items: center;
	  margin-bottom: 15px; /* Space between rows */
	}

	.form-check-label {
	  width: 150px; /* Fixed width for labels */
	  font-weight: 600; /* Bold labels */
	}

	.radio-options {
	  display: flex; /* Horizontal layout for radio options */
	  gap: 40px; /* Spacing between Ok and Not Ok */
	}

	.radio-options label {
	  display: flex;
	  align-items: center;
	  gap: 5px; /* Space between radio button and label */
	}

	.radio-options input[type="radio"] {
	  accent-color: #007bff; /* Blue color for radio button */
	}
</style>

<div class="page-wrapper">
    
	<header class="header header-fixed">
		<div class="container">
			<div class="header-content">
				<div class="left-content">
					<a href="javascript:void(0);" class="menu-toggler">
						<i class="icon feather icon-menu"></i>
					</a>
					<h6 class="title font-17"><?=$name ?></h6>
				</div>
				<div class="mid-content header-logo">
				</div>
				<div class="right-content dz-meta">
					
					<a href="javascript:;" class="icon shopping-cart">
						<i class="icon feather icon-settings"></i>
					</a>
				</div>
			</div>
		</div>
	</header>
	
	<?php include('include/sidebar.php'); ?>
	
	<input type="hidden" id="water_type" value="1">

	<div class="page-content space-top p-b80">
		<div class="container">
			
			<?php
			if(!empty($username))
				{ ?>
			<a class="btn btn-primary btn-sm w-100 mt-2 mb-3" style="padding: 12px 12px;font-size: 14px;">Plant Section</a>
			<div class="mb-3">
				<label class="form-label" for="water_date">Username</label>
				<input type="text" id="water_date" class="form-control date-class" style="color: black!important;" value="<?php if(!empty($username)) echo $username[0]->name; ?>" disabled>
			</div>
			<div class="mb-3">
				<label class="form-label" for="water_date">Plant Name</label>
				<input type="text" id="water_date" class="form-control date-class" style="color: black!important;" value="<?php if(!empty($username)) echo $username[0]->client_name; ?>" disabled>
			</div>
			<div class="mb-3">
				<label class="form-label" for="water_date">Location</label>
				<input type="text" id="water_date" class="form-control date-class" style="color: black!important;" value="<?php if(!empty($username)) echo $username[0]->location; ?>" disabled>
			</div>
			<div class="mb-3">
				<label class="form-label" for="water_date">Plant Capacity</label>
				<input type="text" id="water_date" class="form-control date-class" style="color: black!important;" value="<?php if(!empty($username)) echo $username[0]->plant_capacity; ?>" disabled>
			</div>
			<?php } ?>

			<a class="btn btn-primary btn-sm w-100 mt-2 mb-3" style="padding: 12px 12px;font-size: 14px;">Inlet Parameter</a>
			<?php 
			  if(!empty($getlist->date))
			  	{ ?>
			<div class="mb-3">
				<label class="form-label" for="water_date">Enter Date</label>
				<input type="date" id="water_date" class="form-control date-class" value="<?=$getlist->date ?>">
			</div>

			<?php }
			  if(!empty($getlist->flow_meter_inlet))
			  	{ ?>
			<div class="mb-3">
				<label class="form-label" for="phone">Flow Meter Inlet.</label>
				<input type="text" id="water_flow_meter_inlet" class="form-control bg-gray" placeholder="Flow meter inlet " value="<?=$getlist->flow_meter_inlet ?>">
			</div>
			<?php }
			  if(!empty($getlist->flow_meter_outlet))
			  	{ ?>
			<div class="mb-3">
				<label class="form-label" for="phone">Flow Meter Outlet.</label>
				<input type="text" id="water_flow_meter_outlet" class="form-control bg-gray" placeholder="Flow meter outlet" value="<?=$getlist->flow_meter_outlet ?>">
			</div>

			<?php }
			  if(!empty($getlist->intel_para_ph))
			  	{ ?>
			<div class="mb-3">
				<label class="form-label" for="phone">PH.</label>
				<input type="text" id="water_intel_para_ph" class="form-control bg-gray" placeholder="PH" value="<?=$getlist->intel_para_ph ?>">
			</div>
			<?php }
			  if(!empty($getlist->intel_para_temprature))
			  	{ ?>
			<div class="mb-3">
				<label class="form-label" for="phone">Temperature.</label>
				<input type="text" id="water_intel_para_temprature" class="form-control bg-gray" placeholder="Temperature" value="<?=$getlist->intel_para_temprature ?>">
			</div>
			<?php }
			  if(!empty($getlist->intel_para_tds))
			  	{ ?>
			<div class="mb-3">
				<label class="form-label" for="phone">TDS.</label>
				<input type="text" id="water_intel_para_tds" class="form-control bg-gray" placeholder="TDS" value="<?=$getlist->intel_para_tds ?>">
			</div>
			<?php }
			  if(!empty($getlist->intel_para_dewatering))
			  	{ ?>
			<div class="mb-3">
				<label class="form-label" for="phone">Dewatering Equipment.</label>
				<input type="text" id="water_intel_para_dewatering" class="form-control bg-gray" placeholder="Dewatering Equipment" value="<?=$getlist->intel_para_dewatering ?>">
			</div>
			<?php }
			  if(!empty($getlist->intel_para_dewatering))
			  	{ ?>
			<div class="mt-3">
				<label class="form-label" for="phone">Dosing Pump.</label>
				<textarea placeholder="Dosing Pump" class="form-control bg-gray" id="dosing_pump" rows="5"><?=$getlist->dosing_pump ?></textarea>
			</div>

		<?php } ?>
			
			
			<a class="btn btn-primary btn-sm w-100 mt-2" style="padding: 12px 12px;font-size: 14px;">Equipment Conditions</a>

			<div class="offcanvas-body dz-filter-canvas">
				<?php 
			  if(!empty($getlist->equipment_srp_sewage_working))
			  	{ ?>
				<div class="form-check">
					<label class="form-check-label" for="equipment_srp_sewage">
						 Lifting Pump (Working)
					</label>
					<label id="water_equipment_srp_sewage_working">
						<input class="form-check-input" type="radio"  id="water_equipment_srp_sewage_working" name="water_equipment_srp_sewage_working" value="1" <?php if($getlist->equipment_srp_sewage_working=='1') echo 'checked'; ?>>&nbsp; Ok
					</label>
					<label id="water_equipment_srp_sewage_working">
						<input class="form-check-input" type="radio"  id="water_equipment_srp_sewage_working" name="water_equipment_srp_sewage_working" value="2" <?php if($getlist->equipment_srp_sewage_working=='2') echo 'checked'; ?>>&nbsp; Not Ok
					</label>					
				</div>
				<?php }
			  if(!empty($getlist->equipment_srp_sewage_standby))
			  	{ ?>
				<div class="form-check">
					<label class="form-check-label" for="equipment_srp_sewage">
						 Lifting Pump (Standby)
					</label>
					<label id="water_equipment_srp_sewage_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_srp_sewage_standby" name="water_equipment_srp_sewage_standby" value="1" <?php if($getlist->equipment_srp_sewage_standby=='1') echo 'checked'; ?>>&nbsp; Ok
					</label>
					<label id="water_equipment_srp_sewage_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_srp_sewage_standby" name="water_equipment_srp_sewage_standby" value="2" <?php if($getlist->equipment_srp_sewage_standby=='2') echo 'checked'; ?>>&nbsp; Not Ok
					</label>					
				</div>
				<?php }
			  if(!empty($getlist->equipment_stp_air_working))
			  	{ ?>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						Air Blower(Working)
					</label>
					<label id="water_equipment_stp_air_working">
						<input class="form-check-input" type="radio"  id="water_equipment_stp_air_working" name="water_equipment_stp_air_working" value="1" <?php if($getlist->equipment_stp_air_working=='1') echo 'checked'; ?>>&nbsp; Ok
					</label>
					<label id="water_equipment_stp_air_working">
						<input class="form-check-input" type="radio"  id="water_equipment_stp_air_working" name="water_equipment_stp_air_working" value="2" <?php if($getlist->equipment_stp_air_working=='2') echo 'checked'; ?>>&nbsp; Not Ok
					</label>
				</div>
				<?php }
			  if(!empty($getlist->equipment_stp_air_standby))
			  	{ ?>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						Air Blower(Standby)
					</label>
					<label id="water_equipment_stp_air_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_stp_air_standby" name="water_equipment_stp_air_standby" value="1" <?php if($getlist->equipment_stp_air_standby=='1') echo 'checked'; ?>>&nbsp; Ok
					</label>
					<label id="water_equipment_stp_air_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_stp_air_standby" name="water_equipment_stp_air_standby" value="2" <?php if($getlist->equipment_stp_air_standby=='2') echo 'checked'; ?>>&nbsp; Not Ok
					</label>
				</div>
				<?php }
			  if(!empty($getlist->equipment_recirculation_working))
			  	{ ?>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						Recirculation Pump(Working)
					</label>
					<label id="water_equipment_recirculation_working">
						<input class="form-check-input" type="radio"  id="water_equipment_recirculation_working" name="water_equipment_recirculation_working" value="1" <?php if($getlist->equipment_recirculation_working=='1') echo 'checked'; ?>>&nbsp; Ok
					</label>
					<label id="water_equipment_recirculation_working">
						<input class="form-check-input" type="radio"  id="water_equipment_recirculation_working" name="water_equipment_recirculation_working" value="2" <?php if($getlist->equipment_recirculation_working=='2') echo 'checked'; ?>>&nbsp; Not Ok
					</label>
				</div>
				<?php }
			  if(!empty($getlist->equipment_recirculation_standby))
			  	{ ?>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						Recirculation Pump(Standby)
					</label>
					<label id="water_equipment_recirculation_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_recirculation_standby" name="water_equipment_recirculation_standby" value="1" <?php if($getlist->equipment_recirculation_standby=='1') echo 'checked'; ?>>&nbsp; Ok
					</label>
					<label id="water_equipment_recirculation_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_recirculation_standby" name="water_equipment_recirculation_standby" value="2" <?php if($getlist->equipment_recirculation_standby=='2') echo 'checked'; ?>>&nbsp; Not Ok
					</label>
				</div>

				<?php }
			  if(!empty($getlist->equipment_filterfeed_working))
			  	{ ?>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						Filter Feed Pump(Working)
					</label>
					<label id="water_equipment_filterfeed_working">
						<input class="form-check-input" type="radio"  id="water_equipment_filterfeed_working" name="water_equipment_filterfeed_working" value="1" <?php if($getlist->equipment_filterfeed_working=='1') echo 'checked'; ?>>&nbsp; Ok
					</label>
					<label id="water_equipment_filterfeed_working">
						<input class="form-check-input" type="radio"  id="water_equipment_filterfeed_working" name="water_equipment_filterfeed_working" value="2" <?php if($getlist->equipment_filterfeed_working=='2') echo 'checked'; ?>>&nbsp; Not Ok
					</label>
				</div>
				<?php }
			  if(!empty($getlist->equipment_filterfeed_standby))
			  	{ ?>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						Filter Feed Pump(Standby)
					</label>
					<label id="water_equipment_filterfeed_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_filterfeed_standby" name="water_equipment_filterfeed_standby" value="1" <?php if($getlist->equipment_filterfeed_standby=='1') echo 'checked'; ?>>&nbsp; Ok
					</label>
					<label id="water_equipment_filterfeed_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_filterfeed_standby" name="water_equipment_filterfeed_standby" value="2" <?php if($getlist->equipment_filterfeed_standby=='2') echo 'checked'; ?>>&nbsp; Not Ok
					</label>
				</div>
				<?php }
			  if(!empty($getlist->water_equipment_hpn_working))
			  	{ ?>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						HPN(Working)
					</label>
					<label id="water_equipment_hpn_working">
						<input class="form-check-input" type="radio"  id="water_equipment_hpn_working" name="water_equipment_hpn_working" value="1" <?php if($getlist->water_equipment_hpn_working=='1') echo 'checked'; ?>>&nbsp; Ok
					</label>
					<label id="water_equipment_hpn_working">
						<input class="form-check-input" type="radio"  id="water_equipment_hpn_working" name="water_equipment_hpn_working" value="2" <?php if($getlist->water_equipment_hpn_working=='2') echo 'checked'; ?>>&nbsp; Not Ok
					</label>
				</div>
				<?php }
			  if(!empty($getlist->water_equipment_hpn_standby))
			  	{ ?>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						HPN(Standby)
					</label>
					<label id="water_equipment_hpn_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_hpn_standby" name="water_equipment_hpn_standby" value="1" <?php if($getlist->water_equipment_hpn_standby=='1') echo 'checked'; ?>>&nbsp; Ok
					</label>
					<label id="water_equipment_hpn_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_hpn_standby" name="water_equipment_hpn_standby" value="2" <?php if($getlist->water_equipment_hpn_standby=='2') echo 'checked'; ?>>&nbsp; Not Ok
					</label>
				</div>

			<?php } ?>
				
			</div>

			<a class="btn btn-primary btn-sm w-100 mt-4 mb-3" style="padding: 12px 12px;font-size: 14px;">Add Chemicals (UNIT, KG)</a>
			<?php 
			  if(!empty($getlist->chemical_sludge_sodium))
			  	{ ?>
			<div class="mb-3">
				<label class="form-label" for="phone">Sodium Hypo Chlorite.</label>
				<input type="text" id="water_chemical_sludge_sodium" class="form-control bg-gray" placeholder="Sodium Hypo Chlorite" value="<?=$getlist->chemical_sludge_sodium ?>">
			</div>
			<?php }
			  if(!empty($getlist->chemical_sludge_polymer))
			  	{ ?>
			<div class="mb-3">
				<label class="form-label" for="phone">Polymer.</label>
				<input type="text" id="water_chemical_sludge_polymer" class="form-control bg-gray" placeholder="Polymer" value="<?=$getlist->chemical_sludge_polymer ?>">
			</div>
		<?php }
			  if(!empty($getlist->chemical_sludge_mlss))
			  	{ ?>
			<div class="mb-3">
				<label class="form-label" for="phone">MLSS.</label>
				<input type="text" id="water_chemical_sludge_mlss" class="form-control bg-gray" placeholder="MLSS" value="<?=$getlist->chemical_sludge_mlss ?>">
			</div>
		<?php }
		$otherdata = $getlist->chemical_sludge_other; 
				if (!empty($otherdata)) 
				{ ?>
			<div class="input_fields_wrap">
				<label class="form-label" for="phone">Others (Name).</label>
				<?php
				
				    $otherItems = explode(',', $otherdata);
				    foreach ($otherItems as $value) 
				    { 
				?>
				   <input type="text" name="water_chemical_sludge_other[]" class="form-control bg-gray mb-2"  value="<?= htmlspecialchars(trim($value)) ?>">
				<?php  } ?> 
			</div>
				<?php  } ?> 
			

			
			<a class="btn btn-primary btn-sm w-100 mt-4 mb-0" style="padding: 12px 12px;font-size: 14px;">Other Equipment Condition</a>

			<div class="offcanvas-body dz-filter-canvas">
				<?php 
			  if(!empty($getlist->other_diffuser))
			  	{ ?>
			  <div class="form-check">
			    <label class="form-check-label" for="water_">Diffuser</label>
			    <div class="radio-options">
			      <label>
			        <input class="form-check-input" type="radio" name="diffuser" value="1" id="other_diffuser" <?php if($getlist->other_diffuser=='1') echo 'checked'; ?>> Ok
			      </label>
			      <label>
			        <input class="form-check-input" type="radio" name="diffuser" value="2" id="other_diffuser" <?php if($getlist->other_diffuser=='2') echo 'checked'; ?>> Not Ok
			      </label>
			    </div>
			  </div>
			  <?php } 
			  if(!empty($getlist->other_panel))
			  	{ ?>
			  <div class="form-check">
			    <label class="form-check-label" for="water_">Panel</label>
			    <div class="radio-options">
			      <label>
			        <input class="form-check-input" type="radio" name="panel" value="1" id="other_panel" <?php if($getlist->other_panel=='1') echo 'checked'; ?>> Ok
			      </label>
			      <label>
			        <input class="form-check-input" type="radio" name="panel" value="2" id="other_panel" <?php if($getlist->other_panel=='2') echo 'checked'; ?>> Not Ok
			      </label>
			    </div>
			  </div>
			  <?php } 
			  if(!empty($getlist->piping_leakage))
			  	{ ?>
			  <div class="form-check">
			    <label class="form-check-label" for="water_">Piping Leakage</label>
			    <div class="radio-options">
			      <label>
			        <input class="form-check-input" type="radio" name="piping_leakage" value="1" id="other_pipe_leakage" <?php if($getlist->other_pipe_leakage=='1') echo 'checked'; ?>> Ok
			      </label>
			      <label>
			        <input class="form-check-input" type="radio" name="piping_leakage" value="2" id="other_pipe_leakage" <?php if($getlist->other_pipe_leakage=='2') echo 'checked'; ?>> Not Ok
			      </label>
			    </div>
			  </div>
			  <?php } 
			  if(!empty($getlist->other_agitator))
			  	{ ?>
			  <div class="form-check">
			    <label class="form-check-label" for="water_">Agitator</label>
			    <div class="radio-options">
			      <label>
			        <input class="form-check-input" type="radio" name="piping_agitator" value="1" id="other_agitator" <?php if($getlist->other_agitator=='1') echo 'checked'; ?>> Ok
			      </label>
			      <label>
			        <input class="form-check-input" type="radio" name="piping_agitator" value="2" id="other_agitator" <?php if($getlist->other_agitator=='2') echo 'checked'; ?>> Not Ok
			      </label>
			    </div>
			  </div>
			  <?php } 
			  if(!empty($getlist->other_acf))
			  	{ ?>
			  <div class="form-check">
			    <label class="form-check-label" for="water_">ACF</label>
			    <div class="radio-options">
			      <label>
			        <input class="form-check-input" type="radio" name="piping_acf" value="1" id="other_acf"  <?php if($getlist->other_acf=='1') echo 'checked'; ?>> Ok
			      </label>
			      <label>
			        <input class="form-check-input" type="radio" name="piping_acf" value="2" id="other_acf"  <?php if($getlist->other_acf=='2') echo 'checked'; ?>> Not Ok
			      </label>
			    </div>
			  </div>
			  <?php } 
			  if(!empty($getlist->other_sofner))
			  	{ ?>
			   <div class="form-check">
			    <label class="form-check-label" for="water_">Sofner</label>
			    <div class="radio-options">
			      <label>
			        <input class="form-check-input" type="radio" name="other_acf" value="1" id="other_sofner"  <?php if($getlist->other_sofner=='1') echo 'checked'; ?>> Ok
			      </label>
			      <label>
			        <input class="form-check-input" type="radio" name="other_acf" value="2" id="other_sofner"  <?php if($getlist->other_sofner=='2') echo 'checked'; ?>> Not Ok
			      </label>
			    </div>
			  </div>
			  <?php } 
			  if(!empty($getlist->other_uf))
			  	{ ?>
			   <div class="form-check">
			    <label class="form-check-label" for="water_">UF</label>
			    <div class="radio-options">
			      <label>
			        <input class="form-check-input" type="radio" name="piping_uf11" value="1" id="other_uf"  <?php if($getlist->other_uf=='1') echo 'checked'; ?>> Ok
			      </label>
			      <label>
			        <input class="form-check-input" type="radio" name="piping_uf11" value="2" id="other_uf"  <?php if($getlist->other_uf=='2') echo 'checked'; ?>> Not Ok
			      </label>
			    </div>
			  </div>
			  <?php } 
			  if(!empty($getlist->other_ro))
			  	{ ?>
			   <div class="form-check">
			    <label class="form-check-label" for="water_">RO</label>
			    <div class="radio-options">
			      <label>
			        <input class="form-check-input" type="radio" name="piping_uf" value="1" id="other_ro"  <?php if($getlist->other_ro=='1') echo 'checked'; ?>> Ok
			      </label>
			      <label>
			        <input class="form-check-input" type="radio" name="piping_uf" value="2" id="other_ro"  <?php if($getlist->other_ro=='2') echo 'checked'; ?>> Not Ok
			      </label>
			    </div>
			  </div>
		<?php } 
			  if(!empty($getlist->other_mgf))
			  	{ ?>
			  <div class="mb-3">
				<label class="form-label" for="phone">MGF.</label>
				<input type="text" id="other_mgf" class="form-control bg-gray" placeholder="MGF" value="<?=$getlist->other_mgf ?>">
			  </div>

			<?php } ?>
			</div>

			<?php
			if(!empty($getlist->inlet_image))
				{ ?>
			<div class="mt-3">
				<label class="form-label" for="phone">Inlet Sample Image.</label>
				<p><img style="    width: 50%;" src="<?=base_url() ?>media/uploads/<?=$getlist->inlet_image ?>"></p>
			</div>
		<?php } if(!empty($getlist->outlet_image)){?>

			<div class="mt-3">
				<label class="form-label" for="phone">Outlet Sample Image.</label>
				<p><img style="width: 50%;" src="<?=base_url() ?>media/uploads/<?=$getlist->outlet_image ?>"></p>
			</div>
			<?php } if(!empty($getlist->mlss_image)){?>
			<div class="mt-3">
				<label class="form-label" for="phone">MLSS Image.</label>
				<p><img style="    width: 50%;" src="<?=base_url() ?>media/uploads/<?=$getlist->mlss_image ?>"></p>
			</div>
			<?php } if(!empty($getlist->other_image)){?>
			<div class="mt-3">
				<label class="form-label" for="phone">Any Other Image.</label>
				<p><img style="    width: 50%;" src="<?=base_url() ?>media/uploads/<?=$getlist->other_image ?>"></p>
			</div>
		<?php } ?>

			<div class="mt-3">
				<label class="form-label" for="phone">Remark.</label>
				<textarea placeholder="Remark" class="form-control bg-gray" id="remark" rows="5"><?=$getlist->remark ?></textarea>
			</div>

		</div>
		
	</div>

	<?php include('include/menu-bar.php'); ?>
</div>  

	<?php include('include/footer.php'); ?>


	<!-- <div class="offcanvas offcanvas-bottom dz-filter-canvas" tabindex="-1" id="offcanvasBottom2" aria-labelledby="offcanvasBottomLabel2">
		<div class="offcanvas-body text-center">
			<i class="icon feather icon-check-circle"></i>
			<h5 style="margin-top: 22px;">Successful Submission.</h5>
			<p>"Data submitted successfully!"</p>
			<a href="home.php">Go To Home</a>
		</div>
	</div> -->

<script>

	$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" placeholder="Others (Name)" class="form-control bg-gray" name="water_chemical_sludge_other[]"/><a href="#!" class="remove_field">Remove</a></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});


 var titles = [];      
$(document).on("click", ".enquiry-submit-btn",(function(e) {
	$('input[name^=water_chemical_sludge_other]').each(function(){
      titles.push($(this).val());
  });

    water_enquiry_form();
}));


function water_enquiry_form()
{
  var type = $("#water_type").val();
  /*Inlet Parameter*/
  var date = $("#water_date").val();
  var flow_meter_inlet = $("#water_flow_meter_inlet").val();
  var flow_meter_outlet = $("#water_flow_meter_outlet").val();
  var intel_para_ph = $("#water_intel_para_ph").val();
  var intel_para_temprature = $("#water_intel_para_temprature").val();
  var intel_para_tds = $("#water_intel_para_tds").val();
  var intel_para_dewatering = $("#water_intel_para_dewatering").val();


/*Equipment Conditions*/
  var equipment_srp_sewage_working = $("#water_equipment_srp_sewage_working:checked").val();
  var equipment_srp_sewage_standby = $("#water_equipment_srp_sewage_standby:checked").val();
  var equipment_stp_air_working = $("#water_equipment_stp_air_working:checked").val();
  var equipment_stp_air_standby = $("#water_equipment_stp_air_standby:checked").val();
  var equipment_recirculation_working = $("#water_equipment_recirculation_working:checked").val();
  var equipment_recirculation_standby = $("#water_equipment_recirculation_standby:checked").val();
  var equipment_filterfeed_working = $("#water_equipment_filterfeed_working:checked").val();
  var equipment_filterfeed_standby = $("#water_equipment_filterfeed_standby:checked").val();
  
  /*Add Chemicals*/
  var chemical_sludge_sodium = $("#water_chemical_sludge_sodium").val();
  var chemical_sludge_polymer = $("#water_chemical_sludge_polymer").val();
  var chemical_sludge_mlss = $("#water_chemical_sludge_mlss").val();
  var chemical_sludge_other = titles;

/*other*/
  var other_diffuser = $("#other_diffuser").val();
  var other_panel = $("#other_panel").val();
  var other_pipe_leakage = $("#other_pipe_leakage").val();

  /*image*/
  var inlet_image = $('#inlet_image').prop('files')[0];
  var outlet_image = $('#outlet_image').prop('files')[0];
  var mlss_image = $('#mlss_image').prop('files')[0];
  var other_image = $('#other_image').prop('files')[0];
  var remark = $("#remark").val();

  if(date=='')
  {
  	toast_print(1,"Enter Date");
  	return false;
  }

  var form = new FormData();
 
  form.append("type", type);
  form.append("date", date);
  form.append("flow_meter_inlet", flow_meter_inlet);
  form.append("flow_meter_outlet", flow_meter_outlet);
  form.append("intel_para_ph", intel_para_ph);
  form.append("intel_para_temprature", intel_para_temprature);
  form.append("intel_para_tds", intel_para_tds);
  form.append("intel_para_dewatering", intel_para_dewatering);

  form.append("equipment_srp_sewage_working", equipment_srp_sewage_working);
  form.append("equipment_srp_sewage_standby", equipment_srp_sewage_standby);
  form.append("equipment_stp_air_working", equipment_stp_air_working);
  form.append("equipment_stp_air_standby", equipment_stp_air_standby);
  form.append("equipment_recirculation_working", equipment_recirculation_working);
  form.append("equipment_recirculation_standby", equipment_recirculation_standby);
  form.append("equipment_filterfeed_working", equipment_filterfeed_working);
  form.append("equipment_filterfeed_standby", equipment_filterfeed_standby);

  form.append("chemical_sludge_sodium", chemical_sludge_sodium);
  form.append("chemical_sludge_polymer", chemical_sludge_polymer);
  form.append("chemical_sludge_mlss", chemical_sludge_mlss);
  form.append("chemical_sludge_other", chemical_sludge_other);

  form.append("other_diffuser", other_diffuser);
  form.append("other_panel", other_panel);
  form.append("other_pipe_leakage", other_pipe_leakage);

  form.append("inlet_image", inlet_image);
  form.append("outlet_image", outlet_image);
  form.append("mlss_image", mlss_image);
  form.append("other_image", other_image);
  form.append("remark", remark);


  var settings = {
    "url": "<?=base_url() ?>api/user/stp_form",
    "method": "POST",
    "dataType": "json",
    "timeout": 0,
    "processData": false,
    "mimeType": "multipart/form-data",
    "contentType": false,
    "data": form
  };

  $.ajax(settings).done(function (response) {
    console.log(response);
    $(".loader-wrapper").removeClass("show");
    toast_print(1,response.message);
  });
}


</script>
