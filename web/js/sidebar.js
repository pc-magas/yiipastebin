$(document).ready(
function()	
{
	var the_url="http://localhost/yiiexample/web/?r=pastes/latest5";
	$.ajax({url:the_url,
	 	success:function(result)
	 	{
	 		 var data=jQuery.parseJSON(result);
	 		 console.log(data.length)
	 		 for(var i in data)
	 		 {
	 		 	var element=data[i];
	 		 	var string="<a href=\""+element.url+"\">"+element.title+"</a><br><span>By: "+element.name+" at "+element.date+"</span>";
	 		 	$("aside ul").append("<li>"+string+"</li>");
	 		 } 
	 	}
	 });
});