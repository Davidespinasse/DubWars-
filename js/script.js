// check the browser
navigator.getUserMedia = (navigator.getUserMedia || 
                          navigator.webkitGetUserMedia || 
                          navigator.mozGetUserMedia || 
                          navigator.msGetUserMedia);

var video = document.querySelector('#video'),
    audio = document.querySelector('#audio'),
    startButton = document.querySelector('#startButton'),
    cameraStream;

if (navigator.getUserMedia) {
  navigator.getUserMedia(
  {
      video:true,
      audio:false
  },        
  function(stream) {

      //stream the device camera
      cameraStream = stream;
      video.src = window.URL.createObjectURL(stream); 
      
      // record the stream
      document.querySelector('#startButton').addEventListener('click', function(){

        startButton.parentNode.removeChild(startButton);

        var mediaRecorder = new MediaStreamRecorder(stream);
        mediaRecorder.mimeType = 'video/webm';

        mediaRecorder.width = 640;
        mediaRecorder.height = 480;

        var alea = Math.floor(Math.random()*10000001);

        //save the record on the server
        mediaRecorder.ondataavailable = function (blob) {
          
          var fileType = 'video';
          var fileName = alea+'.webm';
          var test = 0;

          var formData = new FormData();
          formData.append(fileType + '-filename', fileName);
          formData.append(fileType + '-blob', blob);

          // interact with save.php in order to register the record
          xhr('save.php', formData, function (fileURL) {
            // allow time to register the record (in case it's heavy)
            setTimeout(function(){
              // append the record in DOM without reload the page
              $.ajax({
                  url: "uploads/"+fileName,
                  cache: false,
                  success: function(){
                      $('#video').remove();
                      $('#audio').get(0).play();
                      $('body').append("<video autoplay class='finishedVideo'> <source src='./uploads/"+ fileName + "' type='video/webm'></video>");                                                 
                  },   
              });
            },1000);
          });

          // interact with the server
          function xhr(url, data, callback) {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    callback(location.href + request.responseText);
                }
            };
            request.open('POST', url);
            request.send(data);
          }
        }

        var duration = audio.duration*1000;
        // record the video only during the time of the audio sample
        mediaRecorder.start(duration);    
        setTimeout(function(){
          mediaRecorder.stop();
          finishedVideo = document.querySelector('.finishedVideo');
          paused = true;
        }, duration);

        audio.play();
        }); 
      },
  function() {
    document.writeln("Problem with accessing the hardware.")
  });
}
else 
{
  document.writeln("Video capture is not supported.");
};

// using jquery to catch the element loaded with ajax
var paused = false;

$(document).on('click', '.finishedVideo', function(){
  var finishedVideo = document.querySelector('.finishedVideo');
  if(paused == false) {    
    audio.pause();
    finishedVideo.pause();
    paused = true;
  } 
  else 
  {
    audio.play();
    finishedVideo.play();
    paused = false;
  }    
});






