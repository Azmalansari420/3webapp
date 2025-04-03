 <h6 class="head-title">Winner Winner Chicken Dinner</h6>
                <div class="ba-all-page-inner1 mb-4 p-0 border-radius-4">
                    <div class="table-responsive">
                        <table class="table uikit-table-1">
                            <thead>
                                <tr>
                                    <th scope="col">Pos</th>
                                    <th scope="col" style="font-size: 15px;">Player Name</th>
                                    <th scope="col">Kills</th>
                                    <th scope="col">Winning</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
                                $i=0;
                                
                                foreach($result as $value)
                                { $i++;
                                ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>John</td>
                                    <td>5</td>
                                    <td><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win">50</span></td>
                                </tr>

                                <?php } ?>

                                
                            </tbody>
                        </table>
                    </div>
                </div>