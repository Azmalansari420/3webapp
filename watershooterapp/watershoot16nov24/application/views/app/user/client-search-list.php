<?php
$type = $this->input->get('type');
$from_date = $this->input->get('from_date');
$to_date = $this->input->get('to_date');

$this->db->group_by('id');
$this->db->order_by('id desc');
$this->db->where('date >=', $from_date);
$this->db->where('date <=', $to_date);
$getlist = $this->db->get_where('water_form',array('type'=>$type))->result_object();

include('include/header.php'); ?>

<body>
<style>
	.page-content.space-top {
	    margin-top: 70px;
	}

	<style>
/* Highlight the container */
.dz-product-detail {
    border: 2px solid #007bff;
    border-radius: 12px;
    padding: 20px;
    background: linear-gradient(135deg, #e3f2fd, #ffffff);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
}

.dz-product-detail:hover {
    transform: scale(1.02);
}

/* Style the header */
.dz-product-detail h6 {
    color: #007bff;
    font-size: 22px;
    font-weight: bold;
    margin-bottom: 10px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Style the list group */
.list-group {
    padding: 0;
    margin: 0;
    list-style: none;
}

/* Style each list item */
.list-group-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
        margin-bottom: 2px;
    border-radius: 8px;
    background-color: #ffffff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
}

/* Add hover effect to list items */
.list-group-item:hover {
    background-color: #007bff;
    color: #ffffff;
    transform: translateY(-3px);
}

/* Add icons to titles */
.list-group-item .title::before {
    content: "✔️ "; /* Example icon */
    margin-right: 10px;
    color: #007bff;
    font-size: 18px;
    transition: color 0.3s ease;
}

.list-group-item:hover .title::before {
    color: #ffffff;
}

/* Style the button */
.btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 8px;
    padding: 8px 15px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Center the button and add spacing */
.text-center {
    margin-top: 10px;
}
span.sub-title {
    font-size: 17px;
    font-weight: 600;
    color: black;
}
</style>


</style>

<div class="page-wrapper">
    
	<header class="header header-fixed">
		<div class="container">
			<div class="header-content">
				<div class="left-content">
					<a href="javascript:void(0);" class="menu-toggler">
						<i class="icon feather icon-menu"></i>
					</a>
					<h6 class="title font-17">Search Data</h6>
				</div>
				<div class="mid-content header-logo">
				</div>
				<div class="right-content dz-meta">
					
					<a href="#!" class="icon shopping-cart">
						<i class="icon feather icon-settings"></i>
					</a>
				</div>
			</div>
		</div>
	</header>
	
	<?php include('include/sidebar.php'); ?>
	


	<div class="page-content space-top p-b80">
		<div class="container">
<?php
if(!empty($getlist))
	{
		foreach($getlist as $data)
		{
			$user = $this->crud->selectDataByMultipleWhere('registration',array('id'=>$data->user_id));
	 ?>
			<div class="dz-product-detail">
				<h6><?php if(!empty($user)) echo $user[0]->client_name; ?></h6>
				<ul class="list-group">
					<li class="list-group-item">
						<span class="title">Enter Date</span>
						<span class="sub-title"><?=$data->date ?></span>
					</li>
					<li class="list-group-item">
						<span class="title">Flow meter inlet</span>
						<span class="sub-title"><?=$data->flow_meter_inlet ?></span>
					</li>
					<li class="list-group-item">
						<span class="title">Flow Meter Outlet</span>
						<span class="sub-title"><?=$data->flow_meter_outlet ?></span>
					</li>
					<li class="list-group-item">
						<span class="title">PH</span>
						<span class="sub-title"><?=$data->intel_para_ph ?></span>
					</li>
					<li class="list-group-item">
						<span class="title">Temperature</span>
						<span class="sub-title"><?=$data->intel_para_temprature ?></span>
					</li>
					<li class="list-group-item">
						<span class="title">Tds</span>
						<span class="sub-title"><?=$data->intel_para_tds ?></span>
					</li>
					<li class="text-center">
						<a href="<?=('client-serch-data.php?id='.$data->id) ?>". class="btn btn-sm btn-primary">Click To View</a>
					</li>	
				</ul>
			</div>

			<div class="divider border"></div>

<?php } } else{?>

			<div class="text-center">
				<h3>Not Found!</h3>
			</div>
<?php } ?>


		</div>
		
	</div>

	<?php include('include/menu-bar.php'); ?>
</div>  

	<?php include('include/footer.php'); ?>


