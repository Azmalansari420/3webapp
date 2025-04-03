<?php
foreach($data as $aValue)
{

?>
<li class="list-items">
						<div class="dz-icon-box me-3">
							<i class="icon feather icon-bell"></i>
						</div>
						<div class="list-content">
							<h5 class="title-head mb-1"><?=$aValue->title ?></h5>
							<p><?=$aValue->message ?></p>
						</div>
					</li>
					<?php } ?>