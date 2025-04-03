
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
background: white;
    text-align: center;
    /* padding: 20px; */
    margin: 5px 0;
    height: 150px;
    border-radius: 16px;
    position: relative;
    border: 2px solid;
}
    .live-number h2
    {
color: white;
    padding: 6px 0;
    font-weight: 700;
    font-size: 20px;
    background: green;
    margin: 7px 10px;
    border-radius: 10px;
    }
    .live-number p {
        color: black;
    }
    .live-number h1 {
        color: black;
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


.pppp
{
  height: auto;
    margin: -15px 0 0 0;
    line-height: 1;
}
p.pppp span {
    margin: 5px 0 5px 0;
    height: 10px;
    padding: 0;
    font-size: 12px;
    display: inherit;
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
.logo {
    width: 50px;
}
body {
    background: #fcebd9;
}
.span1 {
    margin-top: 0 !important;
    margin-bottom: 12px !important;
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

  <header>
    
    <div class="row" style="margin: 0">
      
      <div class="col-12" style="text-align: center;">
        <i class="fa fa-bars"></i>
        <img src="logo.png" class="logo">
      </div>
    </div>

  </header>

   <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row" id="all_games" style="justify-content: center;">
                    


                    <h1>Wait...</h1>

                



          </div>
        </div>
      </div>
    </div>

  




<!-- 
  <div class="footer-bottom" style="background-color:black;padding: 25px 0;text-align: center;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p style="color: white;">2022  All Rights Reserved by Five Star.</p>
          </div>
        </div>
      </div>
    </div> -->





<script>



$(document).on("click", ".live-number-inner",(function(e) {
  var date = $(this).data('date');
  var game_id = $(this).data("game_id");
  window.location.href="chart.php?game_id="+game_id+"&date="+date;

}));


  var form = new FormData();
  var settings = {
    "url": "api/games.php",
    "method": "GET",
    "timeout": 0,
    "processData": false,
    "mimeType": "multipart/form-data",
    "contentType": false,
    "data": form,
    "dataType":"json"
  };

  $.ajax(settings).done(function (response) {

    var result = response;
    console.log(result.data);
    var html = '';
    // all_games
    $("#all_games").html('');
    $(result.data ).each(function( index,value ) {
  

   
      var html = `<div class="col-6">
                      <div class="live-number">

                        <!-- <img src="`+value.image+`"> -->

                        <div class="live-number-inner" data-game_id="`+value.id+`" data-date="<?=date('Y-m-d') ?>">
                          <h2>`+value.name+`</h2>

                          <div class="number">
                            <button class="btn" style="border-radius: 50%;"><h1 class="fire">`+value.result+`</h1></button>
                          </div>`;

                          if(value.result_time!='')
                          {
                            html =html+`<p class="pppp"><span class="span1"> `+value.result_time+`</span> <span  class="span2">Next Result Time: `+value.next_result_time+`</span></p>`;
                          }

                        html =html+`</div>
                      </div>
                    </div>`;
    $("#all_games").append(html);

      });




  });
</script>




</body>
</html>
