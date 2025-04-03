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
	    background: #283890;
	    color: white!important;
	}
	.form-label {
	    font-weight: 600;
	    color: black;
	}
	.bg-gray{
		background: #d9d9d9!important;
	}
	::-webkit-input-placeholder { /* WebKit, Blink, Edge */
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
	
<input type="hidden" id="water_type" value="<?=$type ?>">

	<div class="page-content space-top p-b80">
		<div class="container">
			<h6 class="title border-bottom pb-2 mb-4">Plant Section Name</h6>
			<div class="mb-3">
				<label class="form-label" for="water_date">Enter Date</label>
				<input type="date" id="water_date" class="form-control date-class" style="color: white!important;">
			</div>

			<h6 class="title border-1bottom pb-2 mt-5">Inlet Parameter</h6>
			<div class="mb-1">
				<!-- <label class="form-label" for="phone">Mobile No.</label> -->
				<input type="text" id="water_flow_meter_inlet" class="form-control bg-gray" placeholder="Flow meter inlet ">
			</div>

			<div class="mb-1">
				<input type="text" id="water_flow_meter_outlet" class="form-control bg-gray" placeholder="Flow meter outlet">
			</div>
			<div class="mb-1">
				<input type="text" id="water_intel_para_ph" class="form-control bg-gray" placeholder="PH">
			</div>
			<div class="mb-1">
				<input type="text" id="water_intel_para_temprature" class="form-control bg-gray" placeholder="Temperature">
			</div>
			<div class="mb-1">
				<input type="text" id="water_intel_para_tds" class="form-control bg-gray" placeholder="TDS">
			</div>
			<?php
			if($type==3)
				{ ?>
			<div class="mb-1">
				<input type="text" id="water_intel_para_softenerplant" class="form-control bg-gray" placeholder="Softener Plant">
			</div>
			<div class="mb-1">
				<input type="text" id="water_intel_para_equipmentcon" class="form-control bg-gray" placeholder="Equipment Condition ">
			</div>
			<div class="mb-1">
				<input type="text" id="water_intel_para_transfer_pump" class="form-control bg-gray" placeholder="Transfer Pump">
			</div>
			<div class="mb-1">
				<input type="text" id="water_intel_para_filterfeed" class="form-control bg-gray" placeholder="Filter Feed Pump">
			</div>
			<div class="mb-1">
				<input type="text" id="water_intel_para_filter" class="form-control bg-gray" placeholder="Filter">
			</div>
			<div class="mb-1">
				<input type="text" id="water_intel_para_softener_vessel" class="form-control bg-gray" placeholder="Softener Vessel">
			</div>
			<div class="mb-1">
				<input type="text" id="water_intel_para_chemical" class="form-control bg-gray" placeholder="Chemical">
			</div>
			<div class="mb-1">
				<input type="text" id="water_intel_para_salt" class="form-control bg-gray" placeholder="Salt">
			</div>
		<?php } ?>
			
			<a class="btn btn-primary btn-sm w-100 mt-4 mb-4" style="padding: 12px 12px;font-size: 14px;">Equipment Conditions</a>

			<div class="offcanvas-body dz-filter-canvas">
				<div class="form-check">
					<label class="form-check-label" for="equipment_srp_sewage">
						<?php if($type==2){echo 'Effluent';} ?> Lifting Pump 
					</label>
					<label id="water_equipment_srp_sewage">
						<input class="form-check-input" type="radio"  id="water_equipment_srp_sewage" name="water_equipment_srp_sewage" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_srp_sewage">
						<input class="form-check-input" type="radio"  id="water_equipment_srp_sewage" name="water_equipment_srp_sewage" value="2">&nbsp; Not Ok
					</label>
					
				</div>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						<?php if($type==1){echo "STP";}else if($type==2) echo 'ETP' ?> Air Blower
					</label>
					<label id="water_equipment_stp_air">
						<input class="form-check-input" type="radio"  id="water_equipment_stp_air" name="water_equipment_stp_air" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_stp_air">
						<input class="form-check-input" type="radio"  id="water_equipment_stp_air" name="water_equipment_stp_air" value="2">&nbsp; Not Ok
					</label>
				</div>

				<div class="form-check">
					<label class="form-check-label" for="water_">
						Recirculation Pump
					</label>
					<label id="water_equipment_recirculation">
						<input class="form-check-input" type="radio"  id="water_equipment_recirculation" name="water_equipment_recirculation" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_recirculation">
						<input class="form-check-input" type="radio"  id="water_equipment_recirculation" name="water_equipment_recirculation" value="2">&nbsp; Not Ok
					</label>
				</div>


				<div class="form-check">
					<label class="form-check-label" for="water_">
						Filter Feed Pump
					</label>
					<label id="water_equipment_filterfeed">
						<input class="form-check-input" type="radio"  id="water_equipment_filterfeed" name="water_equipment_filterfeed" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_filterfeed">
						<input class="form-check-input" type="radio"  id="water_equipment_filterfeed" name="water_equipment_filterfeed" value="2">&nbsp; Not Ok
					</label>
				</div>
				<?php
				if($type==3)
					{ ?>

				<div class="form-check">
					<label class="form-check-label" for="water_">
						RO Feed Pump
					</label>
					<label id="water_equipment_rofeedpump">
						<input class="form-check-input" type="radio"  id="water_equipment_rofeedpump" name="water_equipment_rofeedpump" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_rofeedpump">
						<input class="form-check-input" type="radio"  id="water_equipment_rofeedpump" name="water_equipment_rofeedpump" value="2">&nbsp; Not Ok
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						RO High Pressure Pump
					</label>
					<label id="water_equipment_rohighpressure">
						<input class="form-check-input" type="radio"  id="water_equipment_rohighpressure" name="water_equipment_rohighpressure" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_rohighpressure">
						<input class="form-check-input" type="radio"  id="water_equipment_rohighpressure" name="water_equipment_rohighpressure" value="2">&nbsp; Not Ok
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						MCF
					</label>
					<label id="water_equipment_mcp">
						<input class="form-check-input" type="radio"  id="water_equipment_mcp" name="water_equipment_mcp" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_mcp">
						<input class="form-check-input" type="radio"  id="water_equipment_mcp" name="water_equipment_mcp" value="2">&nbsp; Not Ok
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label" for="water_">
						Dosing Pump
					</label>
					<label id="water_equipment_dosingpump">
						<input class="form-check-input" type="radio"  id="water_equipment_dosingpump" name="water_equipment_dosingpump" value="1">&nbsp; Ok
					</label>
					<label id="water_equipment_dosingpump">
						<input class="form-check-input" type="radio"  id="water_equipment_dosingpump" name="water_equipment_dosingpump" value="2">&nbsp; Not Ok
					</label>
				</div>
			<?php } ?>



				<!-- -----hide -->
				<div class="form-check" style="display:none;">
					<label class="form-check-label" for="water_">
						OK
					</label>
					<input class="form-check-input" type="checkbox"  id="water_equipment_ok">
				</div>
				<div class="form-check" style="display:none;">
					<label class="form-check-label" for="water_">
						Not OK
					</label>
					<input class="form-check-input" type="checkbox"  id="water_equipment_notok">
				</div>





			</div>

			<h6 class="title border-1bottom pb-2 mt-5">Add Chemicals & Sludge</h6>

			<div class="mb-1">
				<input type="text" id="water_chemical_sludge_sodium" class="form-control bg-gray" placeholder="Sodium Hypo Chlorite">
			</div>
			<div class="mb-1">
				<input type="text" id="water_chemical_sludge_polymer" class="form-control bg-gray" placeholder="Polymer">
			</div>

			<?php
				if($type==3)
					{ ?>

			<div class="mb-1">
				<input type="text" id="water_chemical_sludge_acid" class="form-control bg-gray" placeholder="Acid">
			</div>
			<div class="mb-1">
				<input type="text" id="water_chemical_sludge_alkali" class="form-control bg-gray" placeholder="Alkali">
			</div>
			<div class="mb-1">
				<input type="text" id="water_chemical_sludge_hypo" class="form-control bg-gray" placeholder="Hypo">
			</div>
			<div class="mb-1">
				<input type="text" id="water_chemical_sludge_caustic" class="form-control bg-gray" placeholder="Caustic">
			</div>

		<?php } ?>

			<div class="input_fields_wrap">
			    <div><input type="text" name="water_chemical_sludge_other[]" class="form-control bg-gray" placeholder="Others (Name)"></div>
			    <button class="add_field_button btn-primary">Add More Fields</button>
			</div>

			<?php
				if($type!=3)
					{ ?>
			<div class="mb-1">
				<label style="width: 100%;margin-top: 8px;">Sludge Date
				<input type="date" id="water_chemical_sludge_date" class="form-control bg-gray" placeholder="Date"></label>
				<?php
				if(!empty($getsludgedate))
					{ ?>
				<span>Last Sludge Date :- <?php echo date('d-M-Y',strtotime($getsludgedate[0]->chemical_sludge_date)) ?></span>
			<?php } ?>
			</div>

		<?php } ?>

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


// $(function(){
//     $('button').click(function(){
            
//         $('input[name^=titles]').each(function(){
//             titles.push($(this).val());
//         });
//         console.log(titles);
//         return false;
//     });
// });


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
  var date = $("#water_date").val();
  var flow_meter_inlet = $("#water_flow_meter_inlet").val();
  var flow_meter_outlet = $("#water_flow_meter_outlet").val();
  var intel_para_ph = $("#water_intel_para_ph").val();
  var intel_para_temprature = $("#water_intel_para_temprature").val();
  var intel_para_tds = $("#water_intel_para_tds").val();

  var equipment_srp_sewage = $("#water_equipment_srp_sewage:checked").val();
  var equipment_stp_air = $("#water_equipment_stp_air:checked").val();
  var equipment_recirculation = $("#water_equipment_recirculation:checked").val();
  var equipment_filterfeed = $("#water_equipment_filterfeed:checked").val();

  var equipment_ok = $("#water_equipment_ok").prop('checked');
  var equipment_notok = $("#water_equipment_notok").prop('checked');

  var chemical_sludge_sodium = $("#water_chemical_sludge_sodium").val();
  var chemical_sludge_polymer = $("#water_chemical_sludge_polymer").val();
  var chemical_sludge_other = titles;
  var chemical_sludge_date = $("#water_chemical_sludge_date").val();

  /*type 3*/
  var water_intel_para_softenerplant = $("#water_intel_para_softenerplant").val();
  var water_intel_para_equipmentcon = $("#water_intel_para_equipmentcon").val();
  var water_intel_para_transfer_pump = $("#water_intel_para_transfer_pump").val();
  var water_intel_para_filterfeed = $("#water_intel_para_filterfeed").val();
  var water_intel_para_filter = $("#water_intel_para_filter").val();
  var water_intel_para_softener_vessel = $("#water_intel_para_softener_vessel").val();
  var water_intel_para_chemical = $("#water_intel_para_chemical").val();
  var water_intel_para_salt = $("#water_intel_para_salt").val();

  var water_equipment_rofeedpump = $("#water_equipment_rofeedpump:checked").val();
  var water_equipment_rohighpressure = $("#water_equipment_rohighpressure:checked").val();
  var water_equipment_mcp = $("#water_equipment_mcp:checked").val();
  var water_equipment_dosingpump = $("#water_equipment_dosingpump:checked").val();

  var water_chemical_sludge_acid = $("#water_chemical_sludge_acid").val();
  var water_chemical_sludge_alkali = $("#water_chemical_sludge_alkali").val();
  var water_chemical_sludge_hypo = $("#water_chemical_sludge_hypo").val();
  var water_chemical_sludge_caustic = $("#water_chemical_sludge_caustic").val();

  if(date=='')
  {
  	toast_print(1,"Enter Date");
  	return false;
  }

  var form = new FormData();
  form.append("water_intel_para_softenerplant", water_intel_para_softenerplant);
  form.append("water_intel_para_equipmentcon", water_intel_para_equipmentcon);
  form.append("water_intel_para_transfer_pump", water_intel_para_transfer_pump);
  form.append("water_intel_para_filterfeed", water_intel_para_filterfeed);
  form.append("water_intel_para_filter", water_intel_para_filter);
  form.append("water_intel_para_softener_vessel", water_intel_para_softener_vessel);
  form.append("water_intel_para_chemical", water_intel_para_chemical);
  form.append("water_intel_para_salt", water_intel_para_salt);
  form.append("water_equipment_rofeedpump", water_equipment_rofeedpump);
  form.append("water_equipment_rohighpressure", water_equipment_rohighpressure);
  form.append("water_equipment_mcp", water_equipment_mcp);
  form.append("water_equipment_dosingpump", water_equipment_dosingpump);
  form.append("water_chemical_sludge_acid", water_chemical_sludge_acid);
  form.append("water_chemical_sludge_alkali", water_chemical_sludge_alkali);
  form.append("water_chemical_sludge_hypo", water_chemical_sludge_hypo);
  form.append("water_chemical_sludge_caustic", water_chemical_sludge_caustic);

  form.append("type", type);
  form.append("date", date);
  form.append("flow_meter_inlet", flow_meter_inlet);
  form.append("flow_meter_outlet", flow_meter_outlet);
  form.append("intel_para_ph", intel_para_ph);
  form.append("intel_para_temprature", intel_para_temprature);
  form.append("intel_para_tds", intel_para_tds);
  form.append("equipment_srp_sewage", equipment_srp_sewage);
  form.append("equipment_stp_air", equipment_stp_air);
  form.append("equipment_recirculation", equipment_recirculation);
  form.append("equipment_filterfeed", equipment_filterfeed);
  form.append("equipment_ok", equipment_ok);
  form.append("equipment_notok", equipment_notok);
  form.append("chemical_sludge_sodium", chemical_sludge_sodium);
  form.append("chemical_sludge_polymer", chemical_sludge_polymer);
  form.append("chemical_sludge_other", chemical_sludge_other);
  form.append("chemical_sludge_date", chemical_sludge_date);

  var settings = {
    "url": "<?=base_url() ?>api/user/water_enquiry_form",
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
    // jQuery("#offcanvasBottom2").modal('show');
     // $("#offcanvasBottom2").modal("show");
    toast_print(1,response.message);
  });
}


</script>
