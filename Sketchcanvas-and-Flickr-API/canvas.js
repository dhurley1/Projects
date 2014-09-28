//canvas
         var canvasObj = document.getElementById("myCanvas");
         var context = canvasObj.getContext('2d');
         var temp = false,
             Xpos = 0,
             CurXpos = 0,
             Ypos = 0,
             CurYpos = 0,
             pntTemp = false;
         
         var colorLine;
         var colorThick = 4;
         
		 //save canvas
       function save()
	   {
	   var image=mycanvas.toDataURL();

        var x=localStorage.setItem(numImage++,image);
	    var newImage= document.createElement('img');
	   newImage.setAttribute('src', image);
newImage.setAttribute('width', 300);
newImage.setAttribute('height', 200);
newImage.style.padding="25px";
newImage.style.backgroundColor="#fa8072";
newImage.style.border="thick solid white";
	   
	   }
       
	   //load function for canvas doesn't work
	 /*  function load(){
	   
	   var image=canvas.toDataURL();

for(i=0;i<localStorage.length;i++){


var newImage= document.createElement('img');
	   newImage.setAttribute('src',localStorage.getItem(String(i)));
newImage.setAttribute('width', 300);
newImage.setAttribute('height', 200);
newImage.style.backgroundColor="#fa8072";
newImage.style.padding="25px";
newImage.style.backgroundColor="#fa8072";
newImage.style.border="thick solid white";
	   }
    */
	
	//function draw on canvas 
	  function draw() 
          {
         var thicknessMenu=document.getElementById("brushM");
         var colorsMenu=document.getElementById("colorMenu");
         var fillMenu=document.getElementById("fill");

        

//shift fill in-creates circles
            window.onmousemove = function (e) {

                     if (!e) e = window.event;
                     if (e.shiftKey) 
                        {
                        
                          context.beginPath();
                          context.arc(CurXpos, CurYpos,  10, 0, 2*Math.PI, true);
                           if(thicknessMenu.value === 'thin')
                          {
                            context.lineWidth = colorThick*1;
                          }
                          else if(thicknessMenu.value ==='medium')
                          {
                            context.lineWidth = colorThick;
                          }
                          else 
                          {
                            context.lineWidth = colorThick*2;
                          }

                           if (fillMenu.value==='green')
                          {
                          context.fillStyle = ('#00FF00');
                          }
                           else if (fillMenu.value==='red')
                          {
                            context.fillStyle = ('#FF0000');
                          }
                          else if (fillMenu.value==='blue')
                          {
                            context.fillStyle = ('#0000FF');
                          } 
                          else if (fillMenu.value==='white')
                          {
                            context.fillStyle = ('#FFFFFF');
                          }
                          else
                          {
                          context.fillStyle = colorLine;
                          }
                          context.fill();

                         
                          context.closePath();
                         
                          context.stroke();    
                     

                        }
            else{      

            //draw  line   with mouse     
              context.beginPath();
              context.moveTo(Xpos, Ypos);
              context.lineTo(CurXpos, CurYpos);
            
              if (colorsMenu.value==='green')
              {
              context.strokeStyle = ('#00FF00');
              }
             else if (colorsMenu.value==='red')
              {
                context.strokeStyle = ('#FF0000');
              }
              else if (colorsMenu.value==='blue')
              {
                context.strokeStyle = ('#0000FF');
              } 
             else if (colorsMenu.value==='white')
              {
                context.strokeStyle = ('#FFFFFF');
              }
              else if (colorsMenu.value==='black')
              {
              context.strokeStyle = colorLine;
              }

              if(thicknessMenu.value==='thin')
              {
                context.lineWidth = colorThick*1;
              }
              else if (thicknessMenu.value==='medium')
              {
                context.lineWidth = colorThick;
              }
              else 
              {
                context.lineWidth = colorThick*2;
              }

              context.stroke();
              context.closePath();
              context.fill();
              
          }
             
                 }
         }
         
		 //fade from canvas to flickr app
         function init()
         {
         
               document.getElementById("change-to-flickr").onclick = function changeToFlickr()
                 {
                  
                  $("#flickr").fadeIn();
                  $("#content").fadeOut();

                 }
                  document.getElementById("change-to-canvas").onclick = function changeToCanvas()
                 {
                  
                  $("#content").fadeIn();
                  $("#flickr").fadeOut();
                 }

//set image to canvas
          myCanvas.width=myCanvas.width;
          if (canvasObj.getContext)
              {
              
              
              var imageObj = new Image();
         
                  imageObj.onload = function() {
                     context.drawImage(imageObj, 0,0);
                  };
                   imageObj.src = 'mona.jpg';
         
         //track mouse
              myCanvas.addEventListener("mousemove", function (e) {
                  findAxis('move', e)
              }, false);
              myCanvas.addEventListener("mousedown", function (e) {
                  findAxis('down', e)
              }, false);
              myCanvas.addEventListener("mouseup", function (e) {
                  findAxis('up', e)
              }, false);
              myCanvas.addEventListener("mouseout", function (e) {
                  findAxis('out', e)
              }, false);
         
              }

               //load();

          }
         

         
        


        

       
         function findAxis(res, e) {
             if (res == 'down') {
                 Xpos = CurXpos;
                 Ypos = CurYpos;
                 CurXpos = e.clientX - myCanvas.offsetLeft;
                 CurYpos = e.clientY - myCanvas.offsetTop;
         
                 temp = true;
                 pntTemp = true;

                 if (pntTemp) {
                     context.beginPath();
                     context.fillStyle = colorLine;
                     context.fillRect(CurXpos, CurYpos, 2, 2);
                     context.closePath();
                     pntTemp = false;
                 }
             }
             if (res == 'up' || res == "out") {
                 temp = false;
             }
             if (res == 'move') {
                 if (temp) {
                     Xpos = CurXpos;
                     Ypos = CurYpos;
                     CurXpos = e.clientX - myCanvas.offsetLeft;
                     CurYpos = e.clientY - myCanvas.offsetTop;
                     draw();
                 }
             }
         }
         
 
 //button to downlload image doesn'y work
 /*    
document.getElementById("download").onclick =  function download(link, canvasId, filename)
 {
    link.href = document.getElementById(canvasId).toDataURL();
    link.download = filename;
}
        
	document.getElementById('download').addEventListener('click', function() {
    downloadCanvas(this, 'anvas', 'test.png');
}, false);	*/


//clear canvas draawings
        document.getElementById("clear").onclick = function clear()
         {
          myCanvas.width=myCanvas.width;
            var imgCanvas = new Image();
         
                  imgCanvas.onload = function() {
                     context.drawImage(imgCanvas, 0,0);
                  };
                   imgCanvas.src ='mona.jpg'; 
         }
         
          window.onload=init;     
