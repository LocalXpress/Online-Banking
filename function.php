<?php
//database Connection
try 
		{ 
			$db = new PDO("mysql:dbname=taxi_rental;host=localhost", "root", "" );
		}
	catch(PDOException $e)
		{ 
			alert($e->getMessage());
		}//db connection which is common for every page.

//function to generate otp
function generateRandomString($length = 4) 
{
	//function to generate random strings
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//function to get car details
function getcardetails($c_type)
{
	//returns the details of the car
	$sql="select * from care_detail where c_type='$c_type' and status=0 order by rand() limit 1";
	foreach($GLOBALS['db']->query($sql) as $row);
	if(isset($row))
		return $row;
}
//function to get driver details
function getdriverdetails()
{
	//returns the details of the driver
	$sql="select * from driver_detail where status=0 order by rand() limit 1";
	foreach($GLOBALS['db']->query($sql) as $row);
	if(isset($row))
		return $row;
}
//function to check the login credentials
function logincheck($u_mail,$u_pass)
{
	$sql="select * from user_table where u_mail='$u_mail' and u_pass='$u_pass'";
	$key=0; 
	foreach($GLOBALS['db']->query($sql) as $row)
		$key++;
	if($key==1)
		return $row['u_id'];
	else
		echo "<center>Username or Password is incorrect</center>";
}
//functions to return back the user detail
function getuserdetails($u_id)
{
	$sql="select * from user_table where u_id=$u_id";
	foreach($GLOBALS['db']->query($sql) as $row);
	return $row;
}
//function to book a car
function bookcar($c_id,$d_id,$u_id,$date)
{
	$sql="insert into ride_details(u_id,d_id,c_id,booking_date,dep_date)values($u_id,$d_id,$c_id,'$date','".date("Y-m-d")."')";
	$GLOBALS['db']->exec($sql);
	$sql="update care_detail set status=1 where c_id=$c_id";
	$GLOBALS['db']->exec($sql);
	$sql="update driver_detail set status=1 where d_id=$d_id";
	$GLOBALS['db']->exec($sql);

}
?>