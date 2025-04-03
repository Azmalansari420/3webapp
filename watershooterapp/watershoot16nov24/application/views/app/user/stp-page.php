<?php
$type = $this->input->get('type');
$name = "";
if($type==1)
{
	$name = "STP";
}
else if($type==2)
{
	$name = "ETP";
}
else if($type==3)
{
	$name = "WTP";
}
else if($type==4)
{
	$name = "Other";
}

$user = getuserdata();
$user_id = $user[0]->id;

$this->db->where('type !=',3);
$getsludgedate = $this->db->order_by('id desc')->limit(1)->get_where('water_form',array('user_id'=>$user_id,))->result_object();
// print_r($getsludgedate[0]->chemical_sludge_date);
// die;

include('include/header.php'); ?>

<body>
<style>
	.page-content.space-top {
	    margin-top: 70px;
	}
	.date-class {
/*	    background: #283890;*/
/*	    color: white!important;*/
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
					<h6 class="title font-17">STP</h6>
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
			<!-- <a class="btn btn-primary btn-sm w-100 mt-2" style="padding: 12px 12px;font-size: 14px;">Plant Section Name</a> -->

			

			<a class="btn btn-primary btn-sm w-100 mt-2 mb-3" style="padding: 12px 12px;font-size: 14px;">Inlet Parameter</a>

			<div class="mb-3">
				<label class="form-label" for="water_date">Enter Date</label>
				<input type="date" id="water_date" class="form-control date-class" value="<?=date('Y-m-d') ?>">
			</div>

			<!-- <h6 class="title border-1bottom pb-2 mt-2">Inlet Parameter</h6> -->
			<div class="mb-3">
				<label class="form-label" for="phone">Flow Meter Inlet.</label>
				<input type="text" id="water_flow_meter_inlet" class="form-control bg-gray" placeholder="Flow meter inlet ">
			</div>

			<div class="mb-3">
				<label class="form-label" for="phone">Flow Meter Outlet.</label>
				<input type="text" id="water_flow_meter_outlet" class="form-control bg-gray" placeholder="Flow meter outlet">
			</div>


			<div class="mb-3">
				<label class="form-label" for="phone">PH.</label>
				<input type="text" id="water_intel_para_ph" class="form-control bg-gray" placeholder="PH">
			</div>
			<div class="mb-3">
				<label class="form-label" for="phone">Temperature.</label>
				<input type="text" id="water_intel_para_temprature" class="form-control bg-gray" placeholder="Temperature">
			</div>
			<div class="mb-3">
				<label class="form-label" for="phone">TDS.</label>
				<input type="text" id="water_intel_para_tds" class="form-control bg-gray" placeholder="TDS">
			</div>
			<div class="mb-3">
				<label class="form-label" for="phone">Dewatering Equipment.</label>
				<input type="text" id="water_intel_para_dewatering" class="form-control bg-gray" placeholder="Dewatering Equipment">
			</div>
			
			
			<a class="btn btn-primary btn-sm w-100 mt-2" style="padding: 12px 12px;font-size: 14px;">Equipment Conditions</a>

			<div class="offcanvas-body dz-filter-canvas">
				<div class="form-check">
					<label class="form-check-label" for="equipment_srp_sewage">
						 Lifting Pump (Working)
					</label>
					<label id="water_equipment_srp_sewage_working">
						<input class="form-check-input" type="radio"  id="water_equipment_srp_sewage_working" name="water_equipment_srp_sewage_working" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_srp_sewage_working">
						<input class="form-check-input" type="radio"  id="water_equipment_srp_sewage_working" name="water_equipment_srp_sewage_working" value="2">&nbsp; Not Ok
					</label>					
				</div>
				<div class="form-check">
					<label class="form-check-label" for="equipment_srp_sewage">
						 Lifting Pump (Standby)
					</label>
					<label id="water_equipment_srp_sewage_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_srp_sewage_standby" name="water_equipment_srp_sewage_standby" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_srp_sewage_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_srp_sewage_standby" name="water_equipment_srp_sewage_standby" value="2">&nbsp; Not Ok
					</label>					
				</div>

				<div class="form-check">
					<label class="form-check-label" for="water_">
						Air Blower(Working)
					</label>
					<label id="water_equipment_stp_air_working">
						<input class="form-check-input" type="radio"  id="water_equipment_stp_air_working" name="water_equipment_stp_air_working" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_stp_air_working">
						<input class="form-check-input" type="radio"  id="water_equipment_stp_air_working" name="water_equipment_stp_air_working" value="2">&nbsp; Not Ok
					</label>
				</div>

				<div class="form-check">
					<label class="form-check-label" for="water_">
						Air Blower(Standby)
					</label>
					<label id="water_equipment_stp_air_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_stp_air_standby" name="water_equipment_stp_air_standby" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_stp_air_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_stp_air_standby" name="water_equipment_stp_air_standby" value="2">&nbsp; Not Ok
					</label>
				</div>

				<div class="form-check">
					<label class="form-check-label" for="water_">
						Recirculation Pump(Working)
					</label>
					<label id="water_equipment_recirculation_working">
						<input class="form-check-input" type="radio"  id="water_equipment_recirculation_working" name="water_equipment_recirculation_working" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_recirculation_working">
						<input class="form-check-input" type="radio"  id="water_equipment_recirculation_working" name="water_equipment_recirculation_working" value="2">&nbsp; Not Ok
					</label>
				</div>

				<div class="form-check">
					<label class="form-check-label" for="water_">
						Recirculation Pump(Standby)
					</label>
					<label id="water_equipment_recirculation_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_recirculation_standby" name="water_equipment_recirculation_standby" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_recirculation_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_recirculation_standby" name="water_equipment_recirculation_standby" value="2">&nbsp; Not Ok
					</label>
				</div>


				<div class="form-check">
					<label class="form-check-label" for="water_">
						Filter Feed Pump(Working)
					</label>
					<label id="water_equipment_filterfeed_working">
						<input class="form-check-input" type="radio"  id="water_equipment_filterfeed_working" name="water_equipment_filterfeed_working" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_filterfeed_working">
						<input class="form-check-input" type="radio"  id="water_equipment_filterfeed_working" name="water_equipment_filterfeed_working" value="2">&nbsp; Not Ok
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						Filter Feed Pump(Standby)
					</label>
					<label id="water_equipment_filterfeed_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_filterfeed_standby" name="water_equipment_filterfeed_standby" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_filterfeed_standby">
						<input class="form-check-input" type="radio"  id="water_equipment_filterfeed_standby" name="water_equipment_filterfeed_standby" value="2">&nbsp; Not Ok
					</label>
				</div>
				
			</div>

			<a class="btn btn-primary btn-sm w-100 mt-4 mb-3" style="padding: 12px 12px;font-size: 14px;">Add Chemicals (UNIT, KG)</a>
			<div class="mb-3">
				<label class="form-label" for="phone">Sodium Hypo Chlorite.</label>
				<input type="text" id="water_chemical_sludge_sodium" class="form-control bg-gray" placeholder="Sodium Hypo Chlorite">
			</div>
			<div class="mb-3">
				<label class="form-label" for="phone">Polymer.</label>
				<input type="text" id="water_chemical_sludge_polymer" class="form-control bg-gray" placeholder="Polymer">
			</div>
			<div class="mb-3">
				<label class="form-label" for="phone">MLSS.</label>
				<input type="text" id="water_chemical_sludge_mlss" class="form-control bg-gray" placeholder="MLSS">
			</div>
			<div class="input_fields_wrap">
				<label class="form-label" for="phone">Others (Name).</label>
			    <div><input type="text" name="water_chemical_sludge_other[]" class="form-control bg-gray mb-2" placeholder="Others (Name)"></div>
			</div>
			<button class="add_field_button btn-primary mb-2">Add More Fields</button>

			
			<a class="btn btn-primary btn-sm w-100 mt-4 mb-0" style="padding: 12px 12px;font-size: 14px;">Other Equipment Condition</a>

			<div class="offcanvas-body dz-filter-canvas">
			  <div class="form-check">
			    <label class="form-check-label" for="water_">Diffuser</label>
			    <div class="radio-options">
			      <label>
			        <input class="form-check-input" type="radio" name="diffuser" value="1" id="other_diffuser"> Ok
			      </label>
			      <label>
			        <input class="form-check-input" type="radio" name="diffuser" value="2" id="other_diffuser"> Not Ok
			      </label>
			    </div>
			  </div>

			  <div class="form-check">
			    <label class="form-check-label" for="water_">Panel</label>
			    <div class="radio-options">
			      <label>
			        <input class="form-check-input" type="radio" name="panel" value="1" id="other_panel"> Ok
			      </label>
			      <label>
			        <input class="form-check-input" type="radio" name="panel" value="2" id="other_panel"> Not Ok
			      </label>
			    </div>
			  </div>

			  <div class="form-check">
			    <label class="form-check-label" for="water_">Piping Leakage</label>
			    <div class="radio-options">
			      <label>
			        <input class="form-check-input" type="radio" name="piping_leakage" value="1" id="other_pipe_leakage"> Ok
			      </label>
			      <label>
			        <input class="form-check-input" type="radio" name="piping_leakage" value="2" id="other_pipe_leakage"> Not Ok
			      </label>
			    </div>
			  </div>
			</div>


			<div class="mt-3">
				<label class="form-label" for="phone">Inlet Sample Image.</label>
				<input type="file" id="inlet_image" class="form-control bg-gray" >
			</div>

			<div class="mt-3">
				<label class="form-label" for="phone">Outlet Sample Image.</label>
				<input type="file" id="outlet_image" class="form-control bg-gray" >
			</div>
			<div class="mt-3">
				<label class="form-label" for="phone">MLSS Image.</label>
				<input type="file" id="mlss_image" class="form-control bg-gray" >
			</div>
			<div class="mt-3">
				<label class="form-label" for="phone">Any Other Image.</label>
				<input type="file" id="other_image" class="form-control bg-gray" >
			</div>

			<div class="mt-3">
				<label class="form-label" for="phone">Remark.</label>
				<textarea placeholder="Remark" class="form-control bg-gray" id="remark" rows="5"></textarea>
			</div>

		</div>
		<div class="container pt-0">
			<a href="javascript:void(0);"  class="btn btn-primary w-100 enquiry-submit-btn">Save</a>

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
