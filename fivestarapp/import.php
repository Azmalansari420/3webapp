<?php
   // $dbname = 'gyanaurp_gyan';
   // $username = 'gyanaurp_gyan';
   // $password = 'iQ*t5#y1uwNm';
   
   
   $dbname = 'hanuman';
   $username = 'root';
   $password = '';
   
   
   
   $con = mysqli_connect("localhost",$username,$password,$dbname);
   if (!isset($_SESSION["publicIP2"])) {
       $publicIP = $_SESSION['publicIP2'] = rand().time();
   }
   
   
   ?>                              
<!DOCTYPE html>
<html lang="en">
   <head>
      <style>    
         .outer-container {
         background: #F0F0F0;
         border: #e0dfdf 1px solid;
         padding: 40px 20px;
         border-radius: 2px;
         }
         .btn-submit {
         background: #333;
         border: #1d1d1d 1px solid;
         border-radius: 2px;
         color: #f0f0f0;
         cursor: pointer;
         padding: 5px 20px;
         font-size:0.9em;
         }
         .tutorial-table {
         margin-top: 40px;
         font-size: 0.8em;
         border-collapse: collapse;
         width: 100%;
         }
         .tutorial-table th {
         background: #f0f0f0;
         border-bottom: 1px solid #dddddd;
         padding: 8px;
         text-align: left;
         }
         .tutorial-table td {
         background: #FFF;
         border-bottom: 1px solid #dddddd;
         padding: 8px;
         text-align: left;
         }
         #response {
         padding: 10px;
         margin-top: 10px;
         border-radius: 2px;
         display:none;
         }
         .success {
         background: #c7efd9;
         border: #bbe2cd 1px solid;
         }
         .error {
         background: #fbcfcf;
         border: #f3c6c7 1px solid;
         }
         div#response.display-block {
         display: block;
         }
      </style>
   </head>
   <body class="hold-transition sidebar-mini">
      <!--preloader-->
      <!-- <div id="preloader">
         <div id="status"></div>
         </div> -->
      <!-- Site wrapper -->
      <div class="wrapper">
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-bar-chart-o"></i>
               </div>
               <div class="header-title">
                  <h1>Import Clients From Excel File</h1>
                  <!-- <small>Add Pending Work</small> -->
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Projects time -->
                  <div class="col-sm-12 col-md-12">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Upload Excel File <a href="txn_history_sample.xlsx" download>Download Sample</a></h4>
                           </div>
                        </div>
                        <div class="panel-body text-center">
                           <div class="col-md-12">
                              <?php
                                 error_reporting(0);
                                 $conn = $con;
                                 
                                 $date = date_default_timezone_set('Asia/Kolkata');
                                 $date = date("Y-m-d");
                                 $time = date("h:i:a");
                                 $month = date("F");
                                 $year = date("Y");
                                 
                                 
                                 require_once('vendor/php-excel-reader/excel_reader2.php');
                                 require_once('vendor/SpreadsheetReader.php');
                                   
                                 
                                 if(isset($_REQUEST['import']))
                                 {
                                   $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
                                   if(in_array($_FILES["file"]["type"],$allowedFileType)){
                                         $targetPath = 'upload/'.$_FILES['file']['name'];
                                         move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                                         $Reader = new SpreadsheetReader($targetPath);
                                         $sheetCount = count($Reader->sheets());
                                         for($i=0;$i<$sheetCount;$i++)
                                         {
                                          // if($i==3)
                                          //           break;
                                             $Reader->ChangeSheet($i);
                                             $check1=1;
                                             foreach ($Reader as $Row)
                                             {
                                                 $date = "";
                                                
                                                
                                                
                                                 
                                 
                                                 if(isset($Row[0])) {
                                                    $date = mysqli_real_escape_string($conn,$Row[0]);
                                                 }
                                                 
                                                 if(isset($Row[1])) {
                                                     $number1 = mysqli_real_escape_string($conn,$Row[1]);
                                                 }
                                                 if(isset($Row[2])) {
                                                     $number2 = mysqli_real_escape_string($conn,$Row[2]);
                                                 }
                                                 if(isset($Row[3])) {
                                                     $number3 = mysqli_real_escape_string($conn,$Row[3]);
                                                 }
                                                 if(isset($Row[4])) {
                                                     $number4 = mysqli_real_escape_string($conn,$Row[4]);
                                                 }
                                                 if(isset($Row[5])) {
                                                     $number5 = mysqli_real_escape_string($conn,$Row[5]);
                                                 }
                                                 if(isset($Row[6])) {
                                                     $number6 = mysqli_real_escape_string($conn,$Row[6]);
                                                 }
                                                 if(isset($Row[7])) {
                                                     $number7 = mysqli_real_escape_string($conn,$Row[7]);
                                                 }
                                                 if(isset($Row[8])) {
                                                     $number8 = mysqli_real_escape_string($conn,$Row[8]);
                                                 }
                                                 if(isset($Row[9])) {
                                                     $number9 = mysqli_real_escape_string($conn,$Row[9]);
                                                 }
                                                 if(isset($Row[10])) {
                                                     $number10 = mysqli_real_escape_string($conn,$Row[10]);
                                                 }
                                                 if(isset($Row[11])) {
                                                     $number11 = mysqli_real_escape_string($conn,$Row[11]);
                                                 }
                                                 if(isset($Row[12])) {
                                                     $number12 = mysqli_real_escape_string($conn,$Row[12]);
                                                 }
                                                 if(isset($Row[13])) {
                                                     $number13 = mysqli_real_escape_string($conn,$Row[13]);
                                                 }
                                                 if(isset($Row[14])) {
                                                     $number14 = mysqli_real_escape_string($conn,$Row[14]);
                                                 }
                                                 if(isset($Row[15])) {
                                                     $number15 = mysqli_real_escape_string($conn,$Row[15]);
                                                 }
                                 
                                                
                                                 
                                 
                                 
                                 
                                 
                                 
                                                 
                                                   
                                 
                                                 if (!empty($date)) 
                                                 {
                                                   if ($check1!=1)
                                                   {
                                 
                                                     $year = 2021;
                                                     $month = date("F", strtotime($date));
                                                     $exp_date = explode("-", $date);

                                                     echo $date = "2021-".$exp_date[1]."-".$exp_date[0];

                                                     echo "<br>";


                                 
                                                     $query = "insert into number set create_on='$date',game_id='41',year='$year',month='$month',status='Show',number_time='10:00:00',number='$number1' ";
                                                     $result = mysqli_query($conn, $query);
                                 
                                 
                                                     $query = "insert into number set create_on='$date',game_id='42',year='$year',month='$month',status='Show',number_time='10:30:00',number='$number2' ";
                                                     $result = mysqli_query($conn, $query);
                                 
                                 
                                                     $query = "insert into number set create_on='$date',game_id='43',year='$year',month='$month',status='Show',number_time='11:00:00',number='$number3' ";
                                                     $result = mysqli_query($conn, $query);
                                 
                                 
                                                     $query = "insert into number set create_on='$date',game_id='44',year='$year',month='$month',status='Show',number_time='11:30:00',number='$number4' ";
                                                     $result = mysqli_query($conn, $query);
                                 
                                 
                                                     $query = "insert into number set create_on='$date',game_id='45',year='$year',month='$month',status='Show',number_time='12:00:00',number='$number5' ";
                                                     $result = mysqli_query($conn, $query);
                                 
                                                     $query = "insert into number set create_on='$date',game_id='46',year='$year',month='$month',status='Show',number_time='12:30:00',number='$number6' ";
                                                     $result = mysqli_query($conn, $query);
                                                     
                                                     $query = "insert into number set create_on='$date',game_id='47',year='$year',month='$month',status='Show',number_time='13:00:00',number='$number7' ";
                                                     $result = mysqli_query($conn, $query);
                                                     
                                                     $query = "insert into number set create_on='$date',game_id='48',year='$year',month='$month',status='Show',number_time='13:30:00',number='$number8' ";
                                                     $result = mysqli_query($conn, $query);
                                                     
                                                     $query = "insert into number set create_on='$date',game_id='49',year='$year',month='$month',status='Show',number_time='14:00:00',number='$number9' ";
                                                     $result = mysqli_query($conn, $query);
                                                     
                                                     $query = "insert into number set create_on='$date',game_id='50',year='$year',month='$month',status='Show',number_time='14:30:00',number='$number10' ";
                                                     $result = mysqli_query($conn, $query);
                                                     
                                                     $query = "insert into number set create_on='$date',game_id='51',year='$year',month='$month',status='Show',number_time='15:00:00',number='$number11' ";
                                                     $result = mysqli_query($conn, $query);
                                                     
                                                     $query = "insert into number set create_on='$date',game_id='52',year='$year',month='$month',status='Show',number_time='15:30:00',number='$number12' ";
                                                     $result = mysqli_query($conn, $query);
                                                     
                                                     $query = "insert into number set create_on='$date',game_id='53',year='$year',month='$month',status='Show',number_time='16:00:00',number='$number13' ";
                                                     $result = mysqli_query($conn, $query);
                                                     
                                                     $query = "insert into number set create_on='$date',game_id='54',year='$year',month='$month',status='Show',number_time='16:30:00',number='$number14' ";
                                                     $result = mysqli_query($conn, $query);
                                                     
                                                     $query = "insert into number set create_on='$date',game_id='55',year='$year',month='$month',status='Show',number_time='17:00:00',number='$number15' ";
                                                     $result = mysqli_query($conn, $query);
                                                    
                                                    }


                                                      $check1++;


                                                      if($check1==4)
                                                        break;
                                                       if (! empty($result)) 
                                                       {
                                                           $type = "success";
                                                           $message = "Excel Data Imported into the Database";
                                                       } else {
                                                           $type = "error";
                                                           $message = "Problem in Importing Excel Data";
                                                       }
                                                 }
                                              }
                                         
                                          }
                                   }
                                   else
                                   { 
                                         $type = "error";
                                         $message = "Invalid File Type. Upload Excel File.";
                                   }
                                 }
                                 ?>
                              <div class="outer-container">
                                 <form action="" method="post"
                                    name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                                    <div>
                                       <label>Choose Excel
                                       File</label> <input type="file" name="file"
                                          id="file" accept=".xls,.xlsx">
                                       <button type="submit" id="submit" name="import"
                                          class="btn-submit">Import</button>
                                    </div>
                                 </form>
                              </div>
                              <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- running time -->
               </div>
               <!-- Modal1 -->
               <!-- /.modal -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
   </body>
</html>