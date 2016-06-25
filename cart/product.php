<?php

global $conn;
$conn=mysqli_connect('localhost','root','root','iecsestore');



if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

$image_url=array();

	$query="Select * from `products`";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{	//getting data from database
		while($row=mysqli_fetch_assoc($result))
		{
			// echo "p_id: ".$row["p_id"]."<br> title: ".$row["title"]."<br> description: ".$row["description"]."<br> stock: ".$row["stock"]."<br> image: ".$row["image"]."<br><br><br>"; 

				//storing the image path in array with product id	
				$image_url[$row["p_id"]]=$row["image"];
		}

	}
		// echo "0 result";
		//displaying image url along with product id
		// var_dump($image_url);
		echo json_encode($image_url);
		

mysqli_close($conn);


?>