<?php
foreach($data as $value)
{

?>
<div class="accordion-item">
                    <div class="accordion-header" id="heading1">
                        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                            <div class="nft-horizontal-box d-block">
                                <a href="option-list.php" class="product-details d-block">
                                    <div class="product-content w-100">
                                        <div>
                                            <h4 style="color: white;"><?=$value->clickable_instumentkey ?></h4>
                                        </div>
                                        <div class="counter"><?=$value->strike_price ?></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>