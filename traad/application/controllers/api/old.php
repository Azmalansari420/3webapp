<?php
// echo "string";
// die;
?>

<ul>
    <?php foreach ($stocks as $stock): ?>

        <?php
        print_r($stock);
        ?>

        <div class="accordion-item">
                <div class="accordion-header" id="heading1">
                  <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                    <div class="nft-horizontal-box d-block">
                      <a href="" class="product-details d-block">
                        <div class="product-content w-100">
                          <div>
                            <h4><?php echo $stock['name']; ?></h4>
                          </div>
                          <div class="counter"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>



        <!-- <li>
            <strong>Symbol:</strong> <?php echo $stock['symbol']; ?><br>
            <strong>Name:</strong> <?php echo $stock['name']; ?><br>
            <strong>Currency:</strong> <?php echo $stock['currency']; ?><br>
            <strong>Exchange:</strong> <?php echo $stock['exchange']; ?><br>
            <strong>Country:</strong> <?php echo $stock['country']; ?><br>
            <strong>Type:</strong> <?php echo $stock['type']; ?><br>
            <strong>FIGI Code:</strong> <?php echo $stock['figi_code']; ?><br><br>
        </li> -->
    <?php endforeach; ?>
</ul>