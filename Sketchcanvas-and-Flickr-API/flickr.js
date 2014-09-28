
          function init()
		  {
		  
		  
		  
		  }

//find images
         function addAttribute()
         {
         
         var Input=document.createElement("input");
           Input.setAttribute("id","addInput");
         
         var addButton=document.createElement("button");
         addButton.setAttribute("id", "addButton");
         var minusSign=document.createTextNode("-");
         
         addButton.appendChild(minusSign);
         
         
         	document.getElementById('left').appendChild(Input);
         	document.getElementById('left').appendChild(addButton);
         	document.getElementById('left').appendChild(document.createElement('br'));
         
         	document.getElementById("addButton").onclick=function removeAttributes()
         		{
         			document.getElementById('left').removeChild(Input);
         			document.getElementById('left').removeChild(addButton);
         		}
         
         	
         }
         
         
         
         	$(document).ready(function(){
         
         //flickr api
         		$("#find").click(function(){


             



              

         			
         
         			document.getElementById('find').innerHTML="<img src='loading.png'>"
         
         		var userInput = $('#userInput').val();
         
         		var userInput1 = $('#addInput').val();
         				//alert(userInput);
         
         				if(userInput=="")
         				{
         					document.getElementById('right').innerHTML="Error";
         					document.getElementById('find').innerHTML="Find Images";
         				}
         
         		
         				else {
         					document.getElementById('right').innerHTML="";
         		
         			$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",{
         
         					tags:userInput,
         					tagmode:"any",
         					format:"json"
         				
         					
         
         			
         			},function(data){


         
         					$.each(data.items, function(i, item)
         					{
         							$('<img/>').attr("src",item.media.m).appendTo('#right');
         							if(i==9) return false; //displays 10 images
                             
         							
         
         							document.getElementById('find').innerHTML="Find Images";
         
         					})
         
         			});
         
         					}
         		});
         
         	});
         
        
         window.onload=init;
