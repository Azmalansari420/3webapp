<?php include('include/header.php'); ?>

<style>
	.spinner {
    margin: 0 auto;
    width: 50px;
    height: 50px;
    border: 5px solid rgba(0, 0, 0, 0.1); /* Light gray border */
    border-top: 5px solid #3498db; /* Blue color for the spinner */
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>


	<header class="header header-fixed" >
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="menu-toggler">
					<svg class="text-dark" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="#000000"><path d="M13 14v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1zm-9 7h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1zM3 4v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1zm12.95-1.6L11.7 6.64c-.39.39-.39 1.02 0 1.41l4.25 4.25c.39.39 1.02.39 1.41 0l4.25-4.25c.39-.39.39-1.02 0-1.41L17.37 2.4c-.39-.39-1.03-.39-1.42 0z"></path></svg>
				</a>
			</div>
			<div class="mid-content header-logo">
				<a href="javascript:void(0);" style="font-size: 22px;">
					<img src="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>" class="img-fluid">
				</a>
			</div>
			<div class="right-content">
				<a href="notification.php" class="dz-icon icon-fill icon-sm">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M15 6.66675C15 5.34067 14.4732 4.0689 13.5355 3.13121C12.5979 2.19353 11.3261 1.66675 10 1.66675C8.67392 1.66675 7.40215 2.19353 6.46447 3.13121C5.52678 4.0689 5 5.34067 5 6.66675C5 12.5001 2.5 14.1667 2.5 14.1667H17.5C17.5 14.1667 15 12.5001 15 6.66675Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M11.4417 17.5C11.2952 17.7526 11.0849 17.9622 10.8319 18.1079C10.5789 18.2537 10.292 18.3304 10 18.3304C9.70803 18.3304 9.42117 18.2537 9.16816 18.1079C8.91515 17.9622 8.70486 17.7526 8.55835 17.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
			</div>
		</div>
	</header>
	
	
	
	<!-- Sidebar -->
    <?php include('include/sidebar.php'); ?>
    <!-- Sidebar End -->
	
	<!-- Main Content Start -->
	<main class="page-content space-top p-b30">
		<!-- ad slider here -->
		<div class="container overflow-hidden pt-0">

			<div class="top-bar-box">
				<div class="row">
					<div class="col-12">
						<div class="wallet-box">
							<p><?=currency_simble($full_detail->wallet) ?></p>
							<p>Wallet Balance</p>
						</div>
					</div>
					<div class="col-6 text-center mt-2">
						<button class="btn btn-danger btn-sm" style="color:white;background: #d23838;border-radius: .53333rem;">Withdraw</button>
					</div>
					<div class="col-6 text-center mt-2">
						<button class="btn btn-success btn-sm" style="color:white;">Deposit</button>
					</div>
				</div>
			</div>
			<!-- Products -->
			<div class="dz-box">
				<div class="swiper category-slide">
					<div class="swiper-wrapper" style="justify-content: center;">
						<?php
					    $currentdatetime = date('Y-m-d H:i:s');
					    $game = $this->crud->selectDataByMultipleWhere('game', array('status' => 1));
					    foreach ($game as $key => $data) {
					        
					    ?>
						<div class="swiper-slide1">	
							<a href="javascript:void(0);" class="category-btn custom-btns <?php if ($key == 0) echo 'game-active' ?>"
				               data-game_id="<?=$data->id ?>" >
				                <?= $data->name ?>
				            </a>
						</div>
						<?php } ?>						
					</div>
				</div>


				<div class="row gx-3 gy-4 timeLeft">					
					<div class="col-6 mt-0 add-box-class">
						<p class="how-to-play" data-bs-toggle="modal" data-bs-target="#exampleModalLong">
							<svg data-v-3e4c6499="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 36" fill="none"><path data-v-3e4c6499="" d="M23.67 3H12.33C6.66 3 5.25 4.515 5.25 10.56V27.45C5.25 31.44 7.44 32.385 10.095 29.535L10.11 29.52C11.34 28.215 13.215 28.32 14.28 29.745L15.795 31.77C17.01 33.375 18.975 33.375 20.19 31.77L21.705 29.745C22.785 28.305 24.66 28.2 25.89 29.52C28.56 32.37 30.735 31.425 30.735 27.435V10.56C30.75 4.515 29.34 3 23.67 3ZM11.67 18C10.845 18 10.17 17.325 10.17 16.5C10.17 15.675 10.845 15 11.67 15C12.495 15 13.17 15.675 13.17 16.5C13.17 17.325 12.495 18 11.67 18ZM11.67 12C10.845 12 10.17 11.325 10.17 10.5C10.17 9.675 10.845 9 11.67 9C12.495 9 13.17 9.675 13.17 10.5C13.17 11.325 12.495 12 11.67 12ZM24.345 17.625H16.095C15.48 17.625 14.97 17.115 14.97 16.5C14.97 15.885 15.48 15.375 16.095 15.375H24.345C24.96 15.375 25.47 15.885 25.47 16.5C25.47 17.115 24.96 17.625 24.345 17.625ZM24.345 11.625H16.095C15.48 11.625 14.97 11.115 14.97 10.5C14.97 9.885 15.48 9.375 16.095 9.375H24.345C24.96 9.375 25.47 9.885 25.47 10.5C25.47 11.115 24.96 11.625 24.345 11.625Z" fill="currentColor"></path></svg> How to play
						</p>
						<span class="game-name">Parity</span>
						<div>
							<img src="<?=base_url() ?>assets/coins/0.png" style="width:17%;">
							<img src="<?=base_url() ?>assets/coins/1.png" style="width:17%;">
							<img src="<?=base_url() ?>assets/coins/2.png" style="width:17%;">
							<img src="<?=base_url() ?>assets/coins/3.png" style="width:17%;">
							<img src="<?=base_url() ?>assets/coins/4.png" style="width:17%;">
						</div>
					</div>
					<div class="col-6 mt-0 add-box-class" style="text-align:end;">
					    <span class="count-title">Time Reamaning</span>
						<div class="counter-nu" id="countdown">00:00</div>
						<p class="session-time">xxxx</p>
						<p style="display:none;" class="session-time" id="sessionStartTime"></p>
                        <p style="display:none;" class="session-time" id="sessionEndTime"></p>
                        <p style="display:none;" class="session-time" id="sessionResultDeclareTime"></p>
					</div>				
				</div>

				<div class="row gx-3 gy-4 mt-4 main-box">
					<!-- game data -->
				</div>

				<!-- <button onclick="showWinModal()">Trigger Win Modal</button> -->
				<!-- <button onclick="showLoseModal()">Trigger Lose Modal</button> -->

				<div class="row mt-4" id="contentArea">
					<div class="col-12">
						<div class="card" style="background-color:#21232f;">
	                        <div class="card-body" style="padding: 0;">
								<div class="default-tab">
									<ul class="nav nav-tabs justify-content-center" role="tablist">
										<li class="nav-item" role="presentation">
											<a class="nav-link active" data-bs-toggle="tab" href="#home" aria-selected="true" role="tab"><i class="icon feather icon-home me-2"></i> Game History</a>
										</li>
										<li class="nav-item" role="presentation">
											<a class="nav-link" data-bs-toggle="tab" href="#profile" aria-selected="false" role="tab" tabindex="-1"><i class="icon feather icon-user me-2"></i>My Bets</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade active show" id="home" role="tabpanel">
											<div class="pt-4">
												<div>
													<table class="table table-responsive">
														<thead>
															<tr>
																<th>Period</th>
																<th>Number</th>
																<th>Total Amt</th>
																<th>Color</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>20201245630</td>
																<td>2</td>
																<td>1200</td>
																<td>
																	<div class="win-color" style="width: 15px;height: 15px;border-radius: 50%;background: red;"></div>
																</td>
															</tr>
															<tr>
																<td>20201245630</td>
																<td>2</td>
																<td>1200</td>
																<td>
																	<div style="display:flex;">
																		<div class="win-color" style="width: 15px;height: 15px;border-radius: 50%;background: red;margin-right: 2px;"-></div>
																	<div class="win-color" style="width: 15px;height: 15px;border-radius: 50%;background: green;"></div>
																	</div>
																</td>
															</tr>
															<tr>
																<td>20201245630</td>
																<td>2</td>
																<td>1200</td>
																<td>
																	<div class="win-color" style="width: 15px;height: 15px;border-radius: 50%;background: red;"></div>
																</td>
															</tr>
															<tr>
																<td>20201245630</td>
																<td>2</td>
																<td>1200</td>
																<td>
																	<div class="win-color" style="width: 15px;height: 15px;border-radius: 50%;background: red;"></div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="profile" role="tabpanel">
											<div class="pt-4">
												<h6>This is profile title</h6>
												<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
												</p>
												<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
												</p>
											</div>
										</div>
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</main>
	
	<?php include('include/menubar.php'); ?>
	
	
</div>  


<!-- bet model -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center bet-modal-bg">
                <h5 class="modal-title">Enter Amount</h5>
            </div>
            <div class="modal-body">
                <div class="col-12 d-flex justify-content-center">
					<div class="dz-stepper bet-modal-bg" style="display: flex;width: 60%;padding: 7px 7px;border-radius: 44px;">
						<input class="stepper" type="text" value="1" name="demo3" id="bet-amount">
					</div>
				</div>
				<div class="col-12 mt-3">
					<div style="display: flex;justify-content: space-evenly;width: 100%;">
						<span class="amt-block setText select-amount selected" data-amt="10">10</span>
						<span class="amt-block setText select-amount" data-amt="50">50</span>
						<span class="amt-block setText select-amount" data-amt="100">100</span>
						<span class="amt-block setText select-amount" data-amt="200">200</span>
						<span class="amt-block setText select-amount" data-amt="500">500</span>
						<span class="amt-block setText select-amount" data-amt="1000">1000</span>
						<span class="amt-block setText select-amount" data-amt="10000">10000</span>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-sm btn-primary place-bet-btn">Submit</button>
            </div>
        </div>
    </div>
</div>







<!-- win -->
<!-- <div id="winModal" class="modal modal-winn">
    <div class="modal-con1tent modal-content-animation win-content" style="background-color:black;">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Congratulations! 🎉</h2>
        <p>You have won!</p>
    </div>
</div> -->



<!-- lose -->
<!-- <div id="loseModal" class="modal modal-lose">
    <div class="modal-cont1ent lose-content">
        <span class="close" onclick="closeLoseModal()">&times;</span>
        <h2>Oh no! 😞</h2>
        <p>You lost this round. Better luck next time!</p>
    </div>
</div> -->

















<?php include('include/footer.php'); ?>

<script>

var bet_type = 0;
var bet_id = 0;
var session_id = '';

let sessionStartTime = null;
let sessionBetEndTime = null;
let sessionEndTime = null;
let sessionResultDeclareTime = null; // New variable for session result declare time
let countdownTimer = null;

function fetchActiveSession() {
    $.ajax({
        url: "<?=base_url() ?>api/Game_session/get_active_sessions",
        method: "GET",
        dataType: "json",
        success: function (response) {
            if (response.status === 200 && response.data.length > 0) {
                const activeSession = response.data[0];
                session_id = activeSession.session_id;
                sessionStartTime = new Date(activeSession.session_start_date_time);
                sessionBetEndTime = new Date(activeSession.bet_stop_date_time);
                sessionEndTime = new Date(activeSession.session_stop_date_time);
                sessionResultDeclareTime = new Date(activeSession.session_result_declare_date_time); // Assign session result declare time

                console.log("Fetched Session ID:", session_id);
                console.log("Session Start Time:", sessionStartTime);
                console.log("Session Bet End Time:", sessionBetEndTime);
                console.log("Session End Time:", sessionEndTime);
                console.log("Session Result Declare Time:", sessionResultDeclareTime);

                $('.session-time').html(session_id);

                toggleMainBoxContent();
                startCountdown((sessionEndTime - new Date()) / 1000);
                updateSessionTimes();
            } else {
                console.error("No active sessions available.");
                toaster('No active sessions available.', 'error');
                showLoadingGif();
            }
        },
        error: function (error) {
            console.error("Error fetching active session:", error);
            toaster('Failed to fetch active session.', 'error');
            showLoadingGif();
        }
    });
}

/* Update session times in the DOM */
function updateSessionTimes() {
    if (sessionStartTime && sessionEndTime && sessionResultDeclareTime) {
        document.getElementById("sessionStartTime").textContent = sessionStartTime.toLocaleTimeString();
        document.getElementById("sessionEndTime").textContent = sessionEndTime.toLocaleTimeString();
        document.getElementById("sessionResultDeclareTime").textContent = sessionResultDeclareTime.toLocaleTimeString(); // Display session result declare time
    }
}

/* Timer set */
function startCountdown(duration) {
    const display = document.getElementById("countdown");
    clearInterval(countdownTimer);

    countdownTimer = setInterval(function () {
        let timer = Math.max(0, duration--);
        const minutes = parseInt(timer / 60, 10);
        const seconds = parseInt(timer % 60, 10);
        display.textContent = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;

        if (timer <= 0) {
            clearInterval(countdownTimer);
            fetchActiveSession(); // Re-fetch active session when the countdown ends
        }
    }, 1000);
}


/* Toggle main-box content */
function toggleMainBoxContent() 
{
    const now = new Date();

    if (now >= sessionStartTime && now <= sessionBetEndTime) 
    {
        $('.main-box').html(`
            <div class="row gx-3 gy-4 mt-4">
                <div class="col-4 pt-0 mt-0">
                    <button class="color-box select-color" style="background-color: #17B15E;" data-bet_id="1">Green</button>
                </div>
                <div class="col-4 pt-0 mt-0">
                    <button class="color-box select-color" style="background-color: #9B48DB;" data-bet_id="2">Violet</button>
                </div>
                <div class="col-4 pt-0 mt-0">
                    <button class="color-box select-color" style="background-color: #D23838;" data-bet_id="3">Red</button>
                </div>
                <!-- Add your other HTML content for betting here -->
                <div class="container betting-box">
                    <div class="row justify-content-center mb-2">
                        <div class="col p-0 text-center">
                            <img data-bet_id="0" class="img-fluid img-coin select-number"  src="<?=base_url() ?>assets/coins/0.png">
                        </div>
                        <div class="col p-0 text-center">
                            <img data-bet_id="1" class="img-fluid img-coin select-number"  src="<?=base_url() ?>assets/coins/1.png">
                        </div>
                        <div class="col p-0 text-center">
                            <img data-bet_id="2" class="img-fluid img-coin select-number"  src="<?=base_url() ?>assets/coins/2.png">
                        </div>
                        <div class="col p-0 text-center">
                            <img data-bet_id="3" class="img-fluid img-coin select-number"  src="<?=base_url() ?>assets/coins/3.png">
                        </div>
                        <div class="col p-0 text-center">
                            <img data-bet_id="4" class="img-fluid img-coin select-number"  src="<?=base_url() ?>assets/coins/4.png">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col p-0 text-center">
                            <img data-bet_id="5" class="img-fluid img-coin select-number"  src="<?=base_url() ?>assets/coins/5.png">
                        </div>
                        <div class="col p-0 text-center">
                            <img data-bet_id="6" class="img-fluid img-coin select-number"  src="<?=base_url() ?>assets/coins/6.png">
                        </div>
                        <div class="col p-0 text-center">
                            <img data-bet_id="7" class="img-fluid img-coin select-number"  src="<?=base_url() ?>assets/coins/7.png">
                        </div>
                        <div class="col p-0 text-center">
                            <img data-bet_id="8" class="img-fluid img-coin select-number"  src="<?=base_url() ?>assets/coins/8.png">
                        </div>
                        <div class="col p-0 text-center">
                            <img data-bet_id="9" class="img-fluid img-coin select-number"  src="<?=base_url() ?>assets/coins/9.png">
                        </div>
                    </div>
                </div>
            </div>
        `);
    } 
    else if (now >= sessionBetEndTime && now < sessionResultDeclareTime) 
    {
        $('.main-box').html(`
            <div style="text-align: center; padding: 20px;">
                <div class="spinner"></div>
                <p>Waiting for the result...</p>
            </div>
        `);
    } 
    else if (now >= sessionResultDeclareTime) 
    {
        const nextSessionStartTime = new Date(sessionResultDeclareTime.getTime() + 1000 * 60 * 5);
        const timeRemaining = Math.max(0, (nextSessionStartTime - now) / 1000);

        startCountdown(timeRemaining); // Start countdown for next session
        $('.main-box').html(`
            <div style="text-align: center; padding: 20px;">
                <div class="spinner"></div>
                <p>Ready for next round</p>
                <p>Next session starts in:</p>
                <div id="countdown"></div>
            </div>
        `);
    } 
    else 
    {
        showLoadingGif();
    }
}


/* Show loading GIF in .main-box */
function showLoadingGif() {
    $('.main-box').html(`
    	<style>
    	  .main-box 
	    	{
			    background: #2b3270;
			    padding-top: 50px;
			    padding-bottom: 50px;
			}
		</style>
        <div style="text-align: center; padding: 20px;">
            <div class="spinner"></div>
    		<p>Ready For Next Session </p>
        </div>
    `);
}

/* Initialize session on page load */
$(document).ready(function () {
    fetchActiveSession();
    setInterval(() => {
        toggleMainBoxContent();
    }, 1000); // Recheck every second
});




















	/* Color select */
	$(document).on("click", ".select-color", function(e) {
	    bet_id = $(this).data('bet_id');
	    bet_type = 1; // color
	    $(".bet-modal-bg").removeClass('green-bg red-bg violet-bg red-violet-bg green-violet-bg');
	    if (bet_id == 1) {
	        $(".bet-modal-bg").addClass('green-bg');
	    } else if (bet_id == 2) {
	        $(".bet-modal-bg").addClass('violet-bg');
	    } else if (bet_id == 3) {
	        $(".bet-modal-bg").addClass('red-bg');
	    }
	    $("#exampleModalCenter").modal("show");
	});

	/* Number select */
	$(document).on("click", ".select-number", function(e) {
	    bet_type = 2; // number
	    bet_id = $(this).data('bet_id');
	    $(".bet-modal-bg").removeClass('green-bg red-bg violet-bg red-violet-bg green-violet-bg');
	    if ([1, 3, 7, 9].includes(bet_id)) {
	        $(".bet-modal-bg").addClass('green-bg');
	    } else if ([2, 4, 6, 8].includes(bet_id)) {
	        $(".bet-modal-bg").addClass('red-bg');
	    } else if ([0].includes(bet_id)) {
	        $(".bet-modal-bg").addClass('red-violet-bg');
	    } else if ([5].includes(bet_id)) {
	        $(".bet-modal-bg").addClass('green-violet-bg');
	    }
	    $("#exampleModalCenter").modal("show");
	});





















	/* Place bet */
	$(document).on("click", ".place-bet-btn", function(e) {
	    place_bet();
	});

	function place_bet() {
	    var bet_amount = $("#bet-amount").val();

	    if (!session_id) {
	        toaster("No active session found. Please try again later.", "error");
	        return;
	    }

	    var form = new FormData();
	    form.append("bet_type", bet_type);
	    form.append("bet_id", bet_id);
	    form.append("bet_amount", bet_amount);
	    form.append("session_id", session_id);

	    var settings = {
	        url: "<?=base_url() ?>api/Game_bet/place_bet",
	        method: "POST",
	        dataType: "json",
	        timeout: 0,
	        processData: false,
	        mimeType: "multipart/form-data",
	        contentType: false,
	        data: form
	    };

	    $.ajax(settings).done(function(response) {
	        console.log(response);
	        toaster(response.message, 'success');
	        if (response.status == 200) {
	            setTimeout(function() {
	                $("#exampleModalCenter").modal('hide');
	            }, 100);
	        }
	    });
	}








































/*---win model---- */
	    function showWinModal() {
	        const modal = document.getElementById("winModal");
	        modal.style.display = "flex";
	    }
	    function closeModal() {
	        const modal = document.getElementById("winModal");
	        if (modal) {
		        modal.style.display = "none";
		    }
	    }
	    setTimeout(() => {
	        closeModal();
	    }, 3000);

/*-----lose model-----*/

	     function showLoseModal() {
	        const modal = document.getElementById("loseModal");
	        modal.style.display = "flex";
	    }
	    function closeLoseModal() {
	        const modal = document.getElementById("loseModal");
	        if (modal) {
		        modal.style.display = "none";
		    }
	    }

	    setTimeout(() => {
	        closeLoseModal();
	    }, 3000);

// /*-----lose model-----*/

// 	     function showLoseModal() {
// 	        const modal = document.getElementById("loseModal");
// 	        modal.style.display = "flex";
// 	    }
// 	    function closeLoseModal() {
// 	        const modal = document.getElementById("loseModal");
// 	        modal.style.display = "none";
// 	    }

// 	    setTimeout(() => {
// 	        closeLoseModal();
// 	    }, 3000);








</script>
