<?php  
include_once 'lib/all_files.php';
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Five Star</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <style>
   
.live-number {
    /* background: black; */
    text-align: center;
    /* padding: 20px; */
    margin: 5px 0;
    height: 150px;
    border-radius: 16px;
    position: relative;
}
    .live-number h2 {
            color: white;
    padding-top: 9px;
    font-weight: 700;
    font-size: 33px;
    }
    .live-number p {
        color: white;
    }
    .live-number h1 {
        color: white;
    }
    .number {
    display: contents;
    align-items: center;
    justify-content: center;
    background: #bc1e2d;
    height: 75px;
    width: 75px;
    border-radius: 50%;
}


.number {
    position: relative;
}
img.logo-img {
    height: 75px;
    margin-bottom: 14px;
}
.time-date {
    background-image: linear-gradient(to bottom,#ab0405 0,#e73b3b 100%);
    padding: 27px 0;
}
.fire {
    color: #f00;
    /*text-shadow: 0px -2px 4px #fff, 0px -2px 10px #FF3, 0px -10px 20px #F90, 0px -20px 40px #C33;*/
    font-size: 40px;
    font-weight: bold;
}
.result h2{
    text-align: center;
    padding: 12px 0;
        margin-bottom: 2px;
}
.blink {
          animation: blinker 1.5s linear infinite;
          color: white;
          font-family: sans-serif;
      }
      @keyframes blinker {
          50% {
              opacity: 0;
          }
      }

.name-acc{
      font-size: 17px;
    font-weight: 900;
}

span.click-btn{
  background: whitesmoke;
    color: black;
    padding: 6px 11px;
    border-radius: 20px;
    position: relative;
    width: 107px;
    left: 47%;
    bottom: 48px;
}




#neonShadow{
  height:50px;
  width:100px;
  border:none;
  border-radius:50px;
  transition:0.3s;
  background-color:red;
  animation: glow 1s infinite ;
  transition:0.5s;
}
span{
    display: block;
    width: 100%;
    height: 100%;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 700;
    padding-top: 15%;
    padding-right: 2.5%;
    margin-right: 0px;
    font-size: 1.2rem;
    transition: 0.3s;
/*    opacity: 0;*/
    }
span:hover{
    transition: 0.3s;
    opacity: 1;
    font-weight: 700;
    }

#neonShadow:hover{
  transform:translateX(-20px)rotate(30deg);
  border-radius:5px;
  background-color:#c3bacc;
  transition:0.5s;
}

@keyframes glow{
  0%{
  box-shadow: 5px 5px 20px rgb(93, 52, 168),-5px -5px 20px rgb(93, 52, 168);}
  
  50%{
  box-shadow: 5px 5px 20px rgb(81, 224, 210),-5px -5px 20px rgb(81, 224, 210)
  }
  100%{
  box-shadow: 5px 5px 20px rgb(93, 52, 168),-5px -5px 20px rgb(93, 52, 168)
  }
}




.live-number img {
    width: 100%;
    height: 100%;
}
.live-number-inner {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    color: white;
    height: 100%;
}

body {
    background: #353a40;
}
table, th, td {
    background: transparent !important;
    border: 0 !important;
    color: white;
    text-align: center;
}
label {
    color: white;
}
@media (max-width: 575.98px)
         {
            span.click-btn
               {
                  left: 35%;
               }
         }


  </style>

</head>
<body>




<div class="container-fluid table-responsive" > 
         <div class="result">
             <h2 style="color: white;font-weight: 700;background: transparent;">Result History</h2>
              

              <div class="col-md-4" style="margin: 0 auto;">
                <label>Game</label>
                <select class="form-control" id="game_id" required="">
                  <?php
                  $all_games = $con->all_fetch("game",array("status"=>'Yes',));
                  foreach ($all_games as $key => $value)
                    { 
                      $selected = "";
                      if($value->id==$_GET['game_id'])
                        $selected = 'selected';
                      ?>
                    <option <?=$selected ?> value="<?=$value->id ?>"><?=$value->name ?></option>
                  <?php } ?>
                </select>
                <label>Date</label>
                <input type="date" name="date" class="form-control" id="date" value="<?=$_GET['date'] ?>">
              </div>
            
  
         </div>


          <table class="table table-bordered table-hover" id="table">
             <thead class="thead-dark">
              <tr>
                <th scope="col" style="background-color:black;">Time</th>
                <th scope="col" style="background-color:black;">Number</th>
              </tr>
            </thead>
            <tbody id="all_game_list">
                         <tr><th colspan="2" style="text-align: center;font-size: 35px;">Wait...</th></tr>
            </tbody>
          </table>
      </div>

  







<script>
function load_data(game_id,date)
{
  $("#all_game_list").html('<tr><th colspan="2" style="text-align: center;font-size: 35px;">Wait...</th></tr>');
  var form = new FormData();
  form.append("game_id", game_id);
  form.append("date", date);

  var settings = {
    "url": "api/game-times.php",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "mimeType": "multipart/form-data",
    "contentType": false,
    "data": form,
    "dataType":"json",
  };

  $.ajax(settings).done(function (response) {
    var result = response;
    console.log(result.data);
    var html = '';
    // all_games
    $("#all_game_list").html('');
    $(result.data ).each(function( index,value ) {

    $("#all_game_list").append(`<tr>
                <th scope="row" style="background-color:#d3d30c;">`+value.time+`</th>
                <td style="background: lightgray;font-size: 17px;font-weight: 700;">`+value.result+`</td>
              </tr>`);

    });

    
  });
}

load_data("<?=$_GET['game_id'] ?>","<?=$_GET['date'] ?>");


$(document).on("change", "#date,#game_id",(function(e) {
  var date = $("#date").val();
  var game_id = $("#game_id").val();
  load_data(game_id,date)

}));





</script>




</body>
</html>
