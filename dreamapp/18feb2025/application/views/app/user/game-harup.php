<?php
$game_id = $this->input->get('game_id');
$gamedetail = $this->db->get_where('game',array('id'=>$game_id))->result_object();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<?php include('include/allcss.php'); ?>
</head>
<style>
    
.main-home-area 
{
  padding-top: 16px;
  padding-bottom: 60px;
}

  .main-footer-bottom {
    border-radius: 0;
  }
  .footer-btn {
    background: white;
    padding: 7px 10px;
    font-weight: 800;
    font-size: 17px;
  }

  
.tabs {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
  width: 100%;
}

.tabs button {
  flex: 1;
    background-color: black;
    color: white;
    border: none;
    font-size: 16px;
    padding: 5px 10px;
    cursor: pointer;
    border-bottom: 2px solid white;
    border-radius: 5px;
        margin: 0px 4px;
}

.tabs {
    display: flex
;
    justify-content: space-between;
    margin-bottom: 20px;
    width: 100%;
}




.grid {
    display: grid;
    grid-template-columns: repeat(5, 0fr);
    width: 100%;
    gap: 11px;
    justify-content: center;
}

/*.grid-item {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    height: 71px;
    border: 2px solid #007BFF;
    border-radius: 10px;
    padding: 0;
    background-color: black;
    width: 70px;
}*/

.grid-item {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    height: 60px;
    border: 2px solid #007BFF;
    border-radius: 10px;
    padding: 0;
    background-color: black;
    width: 60px;
}

/*.grid-item .number {
  font-size: 14px;
  color: white;
  margin-bottom: 5px;
}*/
.grid-item .number {
    font-size: 14px;
    color: white;
    margin-bottom: 0px;
}

.grid-item input {
  width: 100%;
  padding: 5px;
  font-size: 12px;
  border: 1px solid #007BFF;
  border-radius: 5px;
  text-align: center;
  background-color: black;
  color: white;
}

.grid-item input::placeholder {
  color: #888;
}

.number {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: #000000;
    margin: 0 10px;
    width: 60px;
    height: 40px;
    background: #000000;
    border-radius: 9px;
}
</style>
<body class='sc5'>
    <!-- preloader area start -->
   <?php include('include/loader.php'); ?>

    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    
    <div class="container">
        <div class="main-home-area">
            <div class="profile-area">
                <div class="media">
                    <a class="btn back-page-btn"  href="home.php"><i class="ri-arrow-left-s-line"></i></a>
                    <div class="media-body">
                        <span class="profile-name" style="font-size: 18px;"><?php if(!empty($gamedetail[0]->name)) echo $gamedetail[0]->name; ?></span>
                    </div>
                </div>
                <div class="btn-wrap">
                    <div class="balance"> 
                        <span> <img src="<?=base_url() ?>assets/coin.png" alt="img" width="20px"> &nbsp; </span>
                        <strong class="update-wallet"> <?=$full_detail->wallet ?> </strong> 
                     </div>
                </div>
            </div>




            <?php include('include/game-category.php'); ?>


            <div class="game-title">
              <p>Harup Andar (A)</p>
            </div>
            <div class="grid">
              
              <div class="grid-item">
                <span class="number">111</span>
                <input type="number" name="01" placeholder="Bet" class="bet-input" data-game_type="2">
              </div>
              <div class="grid-item">
                <span class="number">222</span>
                <input type="number" name="02" placeholder="Bet" class="bet-input" data-game_type="2">
              </div>
              <div class="grid-item">
                <span class="number">333</span>
                <input type="number" name="03" placeholder="Bet" class="bet-input" data-game_type="2">
              </div>
              <div class="grid-item">
                <span class="number">444</span>
                <input type="number" name="04" placeholder="Bet" class="bet-input" data-game_type="2">
              </div>
              <div class="grid-item">
                <span class="number">555</span>
                <input type="number" name="05" placeholder="Bet" class="bet-input" data-game_type="2">
              </div>
              <div class="grid-item">
                <span class="number">666</span>
                <input type="number" name="06" placeholder="Bet" class="bet-input" data-game_type="2">
              </div>
              <div class="grid-item">
                <span class="number">777</span>
                <input type="number" name="07" placeholder="Bet" class="bet-input" data-game_type="2">
              </div>
              <div class="grid-item">
                <span class="number">888</span>
                <input type="number" name="08" placeholder="Bet" class="bet-input" data-game_type="2">
              </div>
              <div class="grid-item">
                <span class="number">999</span>
                <input type="number" name="09" placeholder="Bet" class="bet-input" data-game_type="2">
              </div>
              <div class="grid-item">
                <span class="number">000</span>
                <input type="number" name="00" placeholder="Bet" class="bet-input" data-game_type="2">
              </div>
            </div>

            <!-- bahar -->

            <div class="game-title mt-4">
              <p>Harup Bahar (B)</p>
            </div>
            <div class="grid">              
              <div class="grid-item">
                <span class="number">1111</span>
                <input type="number" name="01" placeholder="Bet" class="bet-input" data-game_type="3">
              </div>
              <div class="grid-item">
                <span class="number">2222</span>
                <input type="number" name="02" placeholder="Bet" class="bet-input" data-game_type="3">
              </div>
              <div class="grid-item">
                <span class="number">3333</span>
                <input type="number" name="03" placeholder="Bet" class="bet-input" data-game_type="3">
              </div>
              <div class="grid-item">
                <span class="number">4444</span>
                <input type="number" name="04" placeholder="Bet" class="bet-input" data-game_type="3">
              </div>
              <div class="grid-item">
                <span class="number">5555</span>
                <input type="number" name="05" placeholder="Bet" class="bet-input" data-game_type="3">
              </div>
              <div class="grid-item">
                <span class="number">6666</span>
                <input type="number" name="06" placeholder="Bet" class="bet-input" data-game_type="3">
              </div>
              <div class="grid-item">
                <span class="number">7777</span>
                <input type="number" name="07" placeholder="Bet" class="bet-input" data-game_type="3">
              </div>
              <div class="grid-item">
                <span class="number">8888</span>
                <input type="number" name="08" placeholder="Bet" class="bet-input" data-game_type="3">
              </div>
              <div class="grid-item">
                <span class="number">9999</span>
                <input type="number" name="09" placeholder="Bet" class="bet-input" data-game_type="3">
              </div>
              <div class="grid-item">
                <span class="number">0000</span>
                <input type="number" name="00" placeholder="Bet" class="bet-input" data-game_type="3">
              </div>
            </div>







            <div class="main-footer-bottom d-block text-center">
              <div class="row">
                <div class="col-6 p-0">
                  <div class="footer-btn">
                    <a href="" class="" style="color: black;">Total:- <span id="total-bet">0</span></a>
                  </div>
                </div>
                <div class="col-6 p-0">
                  <div class="footer-btn" style="background: blue;">
                    <a href="javascript:void(0);" style="color: white;"class="place-bet-btn">Play Now</a>
                  </div>
                </div>
              </div>                 
            </div>
                
            

        </div>
    </div>  


    <?php include('include/allscript.php'); ?>



    <script>



    function calculateTotal() 
    {
      let total = 0;
      const inputs = document.querySelectorAll('.bet-input');
      inputs.forEach(input => {
        const value = parseFloat(input.value); 
        if (!isNaN(value)) 
        {
          total += value; 
          console.log(`${input.name} - ${value}`);
        }
      });

      document.getElementById('total-bet').textContent = total;
    }

    const betInputs = document.querySelectorAll('.bet-input');
    betInputs.forEach(input => {
      input.addEventListener('input', calculateTotal);
    });


  /*game bet*/
 $(document).on("click", ".place-bet-btn", function(e) {
      place_bet();
  });

 function place_bet() 
{
    var game_id = <?=$game_id ?>;
    var form = new FormData();
    form.append("game_id", game_id);

    const inputs = document.querySelectorAll('.bet-input');
    let isValid = true; 

    inputs.forEach(input => 
    {
        const number = input.name; 
        const value = input.value.trim();
        const amount = parseFloat(value);
        const gameType = input.getAttribute('data-game_type');

        if (value === "") {
            return; // Skip empty inputs
        }

        if (isNaN(amount) || amount < 50) {
            toaster(`Minimum bet amount for ${number} is 50. (e.g., 50, 55, 60...)`, 'error');
            isValid = false;
            return;
        }

        if (amount % 5 !== 0) {
            toaster(`Bet amount for ${number} should be in multiples of 5 (e.g., 50, 55, 60...)`, 'error');
            isValid = false;
            return;
        }

        if (!isNaN(amount)) {
            form.append("number[]", number);
            form.append("amount[]", amount);
            form.append("game_type[]", gameType);
        }
    });

    if (!isValid) {
        return; // Stop if validation fails
    }

    var settings = {
        url: "<?=base_url() ?>api/game/harup_place_bet",
        method: "POST",
        dataType: "json",
        timeout: 0,
        processData: false,
        mimeType: "multipart/form-data",
        contentType: false,
        data: form
    };

    $.ajax(settings).done(function(response) 
    {
        console.log(response);
        if (response.status == 200) 
        {
            $(".update-wallet").html(response.data.update_wallet_amount);
            toaster(response.message, 'success');
            
            inputs.forEach(input => {
                input.value = ''; // Reset input values
            });

            document.getElementById('total-bet').textContent = '0';
        }
        else
        {
            toaster(response.message, 'error');
        }
    });
}


  // function place_bet() 
  // {
  //     var game_id = <?=$game_id ?>;
           
  //     var form = new FormData();
  //     form.append("game_id", game_id);

  //     const inputs = document.querySelectorAll('.bet-input');
  //     inputs.forEach(input => 
  //     {
  //         const number = input.name; 
  //         const amount = parseFloat(input.value);
  //         const gameType = input.getAttribute('data-game_type');

  //         if (number === '') 
  //         {
  //           toaster("Select a Number", 'error');
  //           isValid = false; 
  //           return false;
  //         }

  //         if (isNaN(amount) || amount < 50) {
  //             toaster("Minimum bet amount is 50. (e.g., 50, 55, 60...)", 'error');
  //             isValid = false;
  //             return false; 
  //         }

  //        if ((amount - 50) % 5 !== 0) 
  //        {
  //             console.log("Error: Invalid increment", amount);
  //             toaster("Bet amount should be in increments of 5 (e.g., 50, 55, 60...)", 'error');
  //             isValid = false;
  //             return false; 
  //         }

  //         if (!isNaN(amount)) {
  //             form.append("number[]", number);
  //             form.append("amount[]", amount);
  //             form.append("game_type[]", gameType);
  //         }
  //     });

  //     var settings = {
  //         url: "<?=base_url() ?>api/game/harup_place_bet",
  //         method: "POST",
  //         dataType: "json",
  //         timeout: 0,
  //         processData: false,
  //         mimeType: "multipart/form-data",
  //         contentType: false,
  //         data: form
  //     };

  //     $.ajax(settings).done(function(response) 
  //     {
  //         console.log(response);
  //         if (response.status == 200) 
  //         {
  //           $(".update-wallet").html(response.data.update_wallet_amount);
  //           toaster(response.message, 'success');
  //           inputs.forEach(input => {
  //               input.value = ''; // Reset input value
  //           });
  //           document.getElementById('total-bet').textContent = '0';

  //         }
  //         else
  //         {
  //           toaster(response.message, 'error');

  //         }
  //     });
  // }


  </script>

</body>
</html>