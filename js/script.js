console.log("yo");

window.URL = window.URL || window.webkitURL;
   
   navigator.getUserMedia = (navigator.getUserMedia || 
                             navigator.webkitGetUserMedia || 
                             navigator.mozGetUserMedia || 
                             navigator.msGetUserMedia);
   var v = document.getElementById('v');
   var cameraStream = '';
   if (navigator.getUserMedia) {
      // Request access to video only
      navigator.getUserMedia(
         {
            video:true,
            audio:true
         },        
         function(stream) {
            cameraStream = stream;
            v.src = window.URL.createObjectURL(stream);
            
         },
         function() {
            document.writeln("problem with accessing the hardware")
         }
      );
   }
   else {
      document.writeln("Video capture is not supported");
   }
   document.querySelector('#stopbt').addEventListener('click', 
    function(e){
      v.src='';
      cameraStream.stop();
    });
    
