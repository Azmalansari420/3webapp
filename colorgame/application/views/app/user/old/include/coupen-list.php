<?php
foreach($data as $aValue)
{

?>
<li class="list-items">
						<div class="dz-icon-box me-3">
							<i class="icon feather icon-bell"></i>
						</div>
						<div class="list-content">
							<h5 class="title-head mb-1">USE <?=$aValue->name ?></h5>
							<p>Get <?php if($aValue->type==1)echo $aValue->amount.'%'; else echo $aValue->amount.' ₹' ?> Off</p>
						</div>
						<span class="time"><i class="icon feather icon-clock"></i> <?=date('d M, Y',strtotime($aValue->expirey_date)) ?></span>
					</li>
					<?php } ?>