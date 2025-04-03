<?php
class Config{
	//live


    //  PRIVATE $host 		  = "localhost";
    //  PRIVATE $db_user_name = "fivestarweb";
    //  PRIVATE $db_user_pass = "Admin@123[];";
	// PRIVATE $db_name 	  = "aduetechnologies_ncr";
	// private $userTbl      = 'user_register';
	// PUBLIC 	$con 		  = NULL;



	//Local
    PRIVATE $host 		  = "localhost";
    PRIVATE $db_user_name = "root";
    PRIVATE $db_user_pass = "";
	PRIVATE $db_name 	  = "fivestarweb";
	PUBLIC 	$con 		  = NULL;



	//DATABASE CONNECTION
	public function __construct(){
		$this->con = new mysqli($this->host,$this->db_user_name,$this->db_user_pass,$this->db_name) or die("Connection failed: " . $this->con->connect_error);

	}


	//get this last id form table
	 public function last_id($conection){
		return mysqli_insert_id($conection);

	 }

	 //SQL INJECTION SQUARE
	public function input_check($data) {
        $data = trim($data);
		$data = addslashes($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
        $data = filter_var($data, FILTER_SANITIZE_STRING);
        $data = $this->con->real_escape_string($data);
        return $data;
    }

   //RUN SQL QUERY
	public function sql_run($sql) {
		$run = $this->con->query($sql);
		if($run === TRUE){
			return 1;
		}else{
			return 0;
		}
	}

    public function join_and($check){
       if(is_array($check) || is_object($check)){
        $where = Null;
        foreach($check as $k => $v){
			$where .= $k . "='" . $this->input_check($v) . "' and ";
		}
		$where = rtrim($where,' and');
        return $where;
       }else{
        return  $where = Null;
       }

	}

	//Compare All
	public function check($table,$check=array(),$other=NULL){
		$condition = $this->join_and($check);
		$sql       = "SELECT * FROM $table WHERE $condition $other";
		$run 	   = $this->con->query($sql);
		$compare   = $run->num_rows;
		if($compare >= 1){
			return 1;
		}else{
		    return 0;
		}
	}





	//INSERT DATA FUNCTION
	public function insert($table,$arr=array()){

		//CHECK INSERT COLOUMN_NAME & COMBINE [ (NAME,EMAIL) ]
		$coloumn_name = NULL;

		//CHECK INSERT VALUES & COMBINE [ ('ROHIT','WEBROHIT1997@GMAIL') ]
		$coloumn_val  = NULL;

		foreach($arr as $c=>$v){
			$coloumn_name .=  $c.',';
			$coloumn_val  .=  '"'.$this->input_check($v).'",';
		}

		$coloumn_name = rtrim($coloumn_name,',');
		$coloumn_val  = rtrim($coloumn_val,',');


		// BIND OR WRITE QUERY
		  $sql = "insert into $table($coloumn_name) VALUES($coloumn_val)";

		// RUN SQL
		RETURN $this->sql_run($sql);

	}

	//UPDATE DATA FUNCTION
	public function update($table,$key_value=array(),$check=array(),$other=NULL){

		//CHECK UPDATE COLOUMN_NAME & COLOUMN_VALUES WITH COMBINE [ (NAME='ROHIT',EMAIL='WEBROHIT1997@GMAIL') ]
		$update_value = NULL;
		foreach($key_value as $k => $v){
			$update_value .=  $k . "='" . $this->input_check($v) . "',";
		}
		$update_value = rtrim($update_value,",");

		$condition = $this->join_and($check);

		// BIND OR WRITE QUERY
		$sql = "UPDATE $table SET $update_value WHERE $condition $other";

        // RUN SQL
		RETURN $this->sql_run($sql);

	}







   //FETCH ALL
	public function all_fetch($table, $check = array(), $other = NULL, $print_sql = NULL) {
    // Ensure $check is an array before using count()
    $condition = "";
    if (!empty($check) && is_array($check) && count($check) >= 1) {
        $condition = " WHERE " . $this->join_and($check);
    }

    // Construct SQL query
    $sql = "SELECT * FROM $table $condition $other";

    // Debug SQL query if $print_sql is enabled
    if (!empty($print_sql)) {
        echo $sql;
    }

    // Execute the query
    $run = $this->con->query($sql);

    // Check if the query executed successfully
    if (!$run) {
        return []; // Return an empty array if the query fails
    }

    // Store fetched results
    $arr = [];
    while ($row = $run->fetch_object()) {
        $arr[] = $row;
    }

    return $arr; // Always return an array, even if empty
}



	//fetch one table
	public function get($table,$other=''){
		$sql = "select * from $table $other";
		$run = $this->con->query($sql);
		$compare = $run->num_rows;
		$arr = array();
		if($compare >= 1){
			while($row = $run->fetch_object()){
			    $arr[] = $row;

			}
			return $arr;

		}
		else{
			return 0;
		}
	}

		//get more
		public function get_more($sql_data){
			$sql = "$sql_data";
			$run = $this->con->query($sql);
			$compare = $run->num_rows;
			$arr = array();
			if($compare >= 1){
				while($row = $run->fetch_object()){
					$arr[] = $row;

				}
				return $arr;

			}
			else{
				return 0;
			}
		}


	//Check Date
	function check_date($current_date,$pass_data){
        $date1 = new DateTime($current_date);
		$date2 = new DateTime($pass_data);
		$check = $date1 <= $date2;
		return $check;

    }

	//ALL DELETE
	public function all_delete($table,$check=array(),$other=null){
		$condition = $this->join_and($check);
		$sql = "DELETE FROM $table WHERE $condition $other";
		RETURN $this->sql_run($sql);


	}

	//CHECK SESSION
	public function check_session($ses,$url){
		if(!isset($ses)){
		   echo "<script>location.href='$url'</script>";
		}
	}

	//Count All Databse Record
	public function all_count($table,$check=array(),$other=NULL){
		if(count($check) >= 1 ){
            $condition = " WHERE ". $this->join_and($check);
        }else{
			$condition = NULL;
        }
		$sql = "select count(*) as total from $table $condition $other";
		$run = $this->con->query($sql);
		$compare = $run->num_rows;
		if($compare >= 1){
			while($row = $run->fetch_array()){
			    $all   = $row['total'];
				return $all;
			}
		}
		else{
			return 0;
		}
	}


   //Insert into select
	public function move_temp_to_order($ft,$st,$c,$v,$check=array(),$other=Null){
		   if(count($check) >=1 ){
				$condition = " WHERE ". $this->join_and($check);
			}else{
				$condition = NULL;
			}

			//sql
		    $sql = "INSERT INTO $ft ($c) SELECT $v from $st $condition $other";

			// RUN SQL
			RETURN $this->sql_run($sql);
	}

  //Sum All Databse Record
  public function all_sum($table,$tabel_col_name,$check=array(),$other=Null){
       if(count($check) >=1 ){
            $condition = " WHERE ". $this->join_and($check);
        }else{
			$condition = NULL;
        }
       $sql = "select SUM($tabel_col_name) as total from $table $condition $other";
       $run = $this->con->query($sql);
       $compare = $run->num_rows;
		if($compare >= 1){
			while($row = $run->fetch_array()){
			    $all   = $row['total'];
				return $all;
			}
		}
		else{
			return 0;
		}

   }




}




$con   = new Config();





?>