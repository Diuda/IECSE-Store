$(document).ready(function(){
	var i=1;


	$.ajax({
		type:"POST",
		url:"product.php",
		datatype:"json",
		success: function(data)
		{

			var url=jQuery.parseJSON(data);
			for(i=1;i<=4;i++)
			{
				var r=url[i];
				$('#p'+i).attr('src',r+'.jpg');
			}
		}
		

});




});