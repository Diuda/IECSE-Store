<?php

global $conn;
$conn=mysqli_connect('localhost','root','root','iecsestore');



if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

$image_url=array();
$price=array();
$stock=array();
$title=array();

	$query="Select * from `products`";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{	//getting data from database
		while($row=mysqli_fetch_assoc($result))
		{ 

				//storing the info about the product in array with product id	
				$image_url[$row["p_id"]]=$row["image"];
				$price[$row["p_id"]]=$row["price"];
				$stock[$row["p_id"]]=$row["stock"];
				$title[$row["p_id"]]=$row["title"];
		}

	}
		//encoding all the information about the product as json
		echo json_encode(array('img'=>$image_url,'price'=>$price,'stock'=>$stock,'title'=>$title));
		

mysqli_close($conn);


?>