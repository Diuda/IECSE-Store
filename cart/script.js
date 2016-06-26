$(document).ready(function(){
	var i=1;

	//using ajax to get data from php file as json
	$.ajax({
		type:"POST",
		url:"product.php",
		datatype:"json",
		success: function(data)
		{

			var url=jQuery.parseJSON(data);
			//running array to get the values in it(info about the product)
			for(i=1;i<=4;i++)
			{
				var img=url['img'][i];

				var price=url['price'][i];
				
				var title=url['title'][i];
				//fetching image and appending it to repective div
				$('#p'+i).attr('src',img+'.jpg');
				//appending price
				$('#p'+i).after('<p>'+price+' RS</p>');
				//appending title
				$('#p'+i).before('<p>'+title+'</p>');
			}
		}
		

});




});