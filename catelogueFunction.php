<?php
//catelogueFunction.php

require (init.php);


$productByCode = getCode($_GET["code"]);


function runQuery($code) {

		$db = connect_database();
		$query = $db->prepare("SELECT * FROM tblproduct WHERE code=:code");
	    $query->bindParam("code", $code,PDO::PARAM_STR);
		$query->execute();
		$array = $query->fetchAll(PDO::FETCH_ASSOC));




		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}











?>