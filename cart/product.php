<?php

global $conn;
$conn=mysqli_connect('localhost','root','root','iecsestore');



if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}


$errors=array();

	$query="Select * from `products`";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			echo "p_id: ".$row["p_id"]."<br> title: ".$row["title"]."<br> description: ".$row["description"]."<br> stock: ".$row["stock"]."<br> image: ".$row["image"]."<br><br><br>"; 
		}

	}else
		echo "0 result";

mysqli_close($conn);


?>