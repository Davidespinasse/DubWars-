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
                $('#video').remove();
                $('#audio').get(0).play();
                $('.restart').css('display','inline');
                $('.stream').append("<video autoplay width='100%' height='100%' class='finishedVideo'> <source src='./uploads/"+ fileName + "' type='video/webm'></video>");
                sFileName = fileName;
              },1000);
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
  $('.stream').append(video);
  audio.currentTime = 0;
  audio.pause();
  cameraStreamAndRecord();
  alreadyOn = false;
  $('.start').css('display', 'inline');
  $('.restart').css('display','none'); 
});


/*
* VOLUME BAR 
*/

var volumeContainer  = document.querySelector('.volumeContainer'),
    volumeBar        = document.querySelector('.volumeBar'),
    volumeSeekBar    = document.querySelector('.volumeSeekBar');

audio.volume = 0.5;
refresh_volume_bar(audio.volume);
var drag_volume;

volumeBar.addEventListener('mousedown', function(e){
  drag_volume = function(e){
    audio.volume = refresh_audio_volume(e); 
    e.preventDefault();
  };
  volumeBar.addEventListener('mousemove',drag_volume);
  e.preventDefault();
});

window.addEventListener('mouseup', function(e){
  volumeBar.removeEventListener('mousemove',drag_volume);
});

volumeBar.addEventListener('click', function(e){
  audio.volume = refresh_audio_volume(e);
});

//refresh the video volume accordingly to the mouse position (when mouse is down)
function refresh_audio_volume(e){
  var bounding_rect = volumeBar.getBoundingClientRect(),
      x             = e.clientX - bounding_rect.left,
      volume        = Math.abs(x / bounding_rect.width);

  if(volume >= 0 && volume <= 1){
    refresh_volume_bar(volume); 
    return volume;
  }
}

function refresh_volume_bar(volume){
  volumeSeekBar.style.webkitTransform = 'scaleX('+ volume +')';
  volumeSeekBar.style.mozTransform    = 'scaleX('+ volume +')';
  volumeSeekBar.style.oTransform      = 'scaleX('+ volume +')';
  volumeSeekBar.style.transform       = 'scaleX('+ volume +')';  
}

var volumeImage = document.querySelector('.volumeImage'),
    volumeSave  = 0;

volumeImage.addEventListener('click', function(){
  var src = this.getAttribute('src');
  if(src == 'img/volume_up.png') {
    this.setAttribute('src','img/volume_mute.png');
    volumeSave = audio.volume;
    audio.volume = 0;
    refresh_volume_bar(audio.volume);
  }
  else {
    this.setAttribute('src','img/volume_up.png');
    audio.volume = volumeSave;
    refresh_volume_bar(audio.volume);
  }
});







