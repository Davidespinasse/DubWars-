window.URL = window.URL || window.webkitURL;

navigator.getUserMedia = (navigator.getUserMedia || 
                         navigator.webkitGetUserMedia || 
                         navigator.mozGetUserMedia || 
                         navigator.msGetUserMedia);

var video = document.querySelector('#video'),
    cameraStream,
    audio = document.querySelector('#audio');

if (navigator.getUserMedia) {
    // Request access to video only
    navigator.getUserMedia(
    {
        video:true,
        audio:false
    },        
    function(stream) {
        cameraStream = stream;
        video.src = window.URL.createObjectURL(stream); 
        
        document.querySelector('#startButton').addEventListener('click', function(){

            var mediaRecorder = new MediaStreamRecorder(stream);
            mediaRecorder.mimeType = 'video/webm';

            mediaRecorder.width = 320;
            mediaRecorder.height = 240;

            mediaRecorder.ondataavailable = function (blob) {
                // POST/PUT "Blob" using FormData/XHR2
                var blobURL = URL.createObjectURL(blob);
                document.write('<a href="' + blobURL + '" target="_blank" >url</a>');
            };

            var duration = audio.duration*1000;

            mediaRecorder.start(duration);
            setTimeout(function(){mediaRecorder.stop();}, duration);

            audio.play();
        }); 
        },
    function() {
        document.writeln("problem with accessing the hardware")
    });
}
else {
    document.writeln("Video capture is not supported");
}




