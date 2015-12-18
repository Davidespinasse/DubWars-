/*
* CAMERA STREAM AND RECORD 
*/

// check the browser
navigator.getUserMedia = (navigator.getUserMedia || 
                          navigator.webkitGetUserMedia || 
                          navigator.mozGetUserMedia || 
                          navigator.msGetUserMedia);

var video           = document.querySelector('#video'),
    audio           = document.querySelector('#audio'),
    startButton     = document.querySelector('#startButton'),
    alreadyOn       = false,
    cameraStream,
    sFileName,
    finishedVideo;

cameraStreamAndRecord();    

function cameraStreamAndRecord(){

  if (navigator.getUserMedia) {
    navigator.getUserMedia(
    {
        video:true,
        audio:false
    },        
    function(stream) {
      //stream the device camera
      cameraStream  = stream;
      video.src     = window.URL.createObjectURL(stream); 
      
      // record the stream
      document.querySelector('#startButton').addEventListener('click', function(){

        $('.start').css('display', 'none');

        var mediaRecorder       = new MediaStreamRecorder(stream);
        mediaRecorder.mimeType  = 'video/webm';

        mediaRecorder.width   = 640;
        mediaRecorder.height  = 480;

        var alea = Math.floor(Math.random()*10000001);

        //save the record on the server
        mediaRecorder.ondataavailable = function (blob) {

          if(alreadyOn == false){

            // do not start the loader before the end of the audio
            setTimeout(function(){
              $('#video').remove();
              $('.stream').append("<div class='circle'><div class='circleInside'></div></div>");
            },1000);  

            var fileType = 'video';
            var name = alea;
            var fileName = name + '.webm';
            var test = 0;

            var formData = new FormData();
            formData.append(fileType + '-filename', fileName);
            formData.append(fileType + '-blob', blob);

            // interact with save.php in order to register the record
            xhr('save.php', formData, function (fileURL) {
              // allow time to register the record (in case it's heavy)

              setTimeout(function(){
                // append the record in DOM without reload the page
                $('#audio').get(0);
                $('.restart').css('display','inline');
                $('.circle').remove();
                $('.link').append("<b>Link of your dub : </b>");
                $('.link').append("<a href='http://leonarddupuis.fr/dubwars/play.php?id="+name+"'>http://leonarddupuis.fr/dubwars/play.php?id="+name+"</a>");
                $('.stream').append("<video width='100%' height='100%' class='finishedVideo'> <source src='./uploads/"+ fileName + "' type='video/webm'></video>");
                paused = true;
                sFileName = fileName;
              },10000);
            });
            alreadyOn = true;  
          }  
        }

        // record the video only during the time of the audio sample
        var duration = audio.duration*1000;

        mediaRecorder.start(duration);    
        setTimeout(function(){
          mediaRecorder.stop();
          finishedVideo = document.querySelector('.finishedVideo');
        }, duration);

        audio.play();
      }); 
    },
    function() {
      document.writeln("Problem with accessing the hardware.");
    });
  }
  else 
  {
    document.writeln("Video capture is not supported.");
  };
}

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

// using jquery to catch the element loaded with ajax
var paused = false;

$(document).on('click', '.finishedVideo', function(){
  finishedVideo = document.querySelector('.finishedVideo');
  if(paused == false) {    
    audio.pause();
    finishedVideo.pause();
    paused = true;
  } 
  else {
    audio.play();
    finishedVideo.play();
    paused = false;
  } 

  // resolv problem in firefox
  if(finishedVideo.currentTime == finishedVideo.duration) {
    $('.finishedVideo').remove();
    $('#audio').get(0).play();
    $('.stream').append("<video autoplay width='100%' height='100%' class='finishedVideo'> <source src='./uploads/"+ sFileName + "' type='video/webm'></video>");
    paused = false; 
  }
});

$(document).on('click', '#restartRecordButton', function(){
  $('.finishedVideo').remove();
  $('.link a').remove();
  $('.link b').remove();
  $('.stream').append(video);
  audio.currentTime = 0;
  audio.pause();
  cameraStreamAndRecord();
  alreadyOn = false;
  $('.start').css('display', 'inline');
  $('.restart').css('display','none'); 
});












