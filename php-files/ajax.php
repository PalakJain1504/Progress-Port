<?php

include_once dirname(__FILE__).'/inc/config.php';


//--->get all users > start
if(isset($_GET['call_type']) && $_GET['call_type'] =="get")
{
	$q1 = app_db()->select('select * from users');
	echo json_encode($q1);
}
//--->get all users > end




//--->update single entry > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="single_entry")
{	

	$row_id 	= app_db()->CleanDBData($_POST['row_id']);
	$col_name  	= app_db()->CleanDBData($_POST['col_name']); 
	$col_val  	= app_db()->CleanDBData($_POST['col_val']);
	
	$tbl_col_name = array("fname", "lname", "email", "row_id");

	if (!in_array($col_name, $tbl_col_name))
	{
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'invalid col_name', 
		));
		die();
	}

	$q1 = app_db()->select("select * from users where row_id='$row_id'");
	if($q1 < 1) 
	{
		//no record found in the database
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'no entries were found', 
		));
		die();
	}
	else if($q1 > 0) 
	{
		//found record in the database
		 
		$strTableName = "users";

		$array_fields = array(
			$col_name => $col_val,
		);
		$array_where = array(    
		  'row_id' => $row_id,
		);
		//Call it like this:  
		app_db()->Update($strTableName, $array_fields, $array_where);


		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'updated entry', 
		));
		die();
	}
}
//--->update single entry > end




//--->update a whole row  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="row_entry")
{	

	$row_id 	= app_db()->CleanDBData($_POST['row_id']);
	$fname  	= app_db()->CleanDBData($_POST['fname']); 
	$lname  	= app_db()->CleanDBData($_POST['lname']); 
	$email  	= app_db()->CleanDBData($_POST['email']); 	
	
	$q1 = app_db()->select("select * from users where row_id='$row_id'");
	if($q1 < 1) 
	{
		//no record found in the database
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'no entries were found', 
		));
		die();
	}
	else if($q1 > 0) 
	{
		//found record in the database
		 
		$strTableName = "users";

		$array_fields = array(
			'fname' => $fname,
			'lname' => $lname,
			'email' => $email,
		);
		$array_where = array(    
		  'row_id' => $row_id,
		);
		//Call it like this:  
		app_db()->Update($strTableName, $array_fields, $array_where);


		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'updated row entry', 
		));
		die();
	}
}
//--->update a whole row > end




//--->new row entry  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="new_row_entry")
{	

	$row_id 	= app_db()->CleanDBData($_POST['row_id']);
	$fname  	= app_db()->CleanDBData($_POST['fname']); 
	$lname  	= app_db()->CleanDBData($_POST['lname']); 
	$email  	= app_db()->CleanDBData($_POST['email']); 	
	
	$q1 = app_db()->select("select * from users where row_id='$row_id'");
	if($q1 < 1) 
	{
		//add new row
		$strTableName = "users";

		$insert_arrays = array
		(
			'row_id' => $row_id,
			'fname' => $fname,
			'lname' => $lname,
			'email' => $email,
		);

		//Call it like this:
		app_db()->Insert($strTableName, $insert_arrays);

		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'added new entry', 
		));
		die();
	}	 
}
//--->new row entry  > end



//--->new row entry  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="delete_row_entry")
{	

	$row_id 	= app_db()->CleanDBData($_POST['row_id']);	 
	
	$q1 = app_db()->select("select * from users where row_id='$row_id'");
	if($q1 > 0) 
	{
		//found a row to be deleted
		$strTableName = "users";

		$array_where = array('row_id' => $row_id);

		//Call it like this:
		app_db()->Delete($strTableName,$array_where);

		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'deleted entry', 
		));
		die();
	}	 
}
//--->new row entry  > end