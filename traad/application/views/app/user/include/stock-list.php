<ul>
    <?php foreach ($stocks as $group): ?>
        <?php foreach ($group['stocks'] as $stock): ?>
            <div class="accordion-item">
                <div class="accordion-header" id="heading1">
                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                        <div class="nft-horizontal-box d-block">
                            <a href="time-series.php" class="product-details d-block">
                                <div class="product-content w-100">
                                    <div>
                                        <h4 style="color: black"><?php echo $stock['name']; ?></h4>
                                    </div>
                                    <div class="counter"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</ul>
