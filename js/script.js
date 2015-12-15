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

            mediaRecorder.width = 640;
            mediaRecorder.height = 480;

            mediaRecorder.ondataavailable = function (blob) {
                // POST/PUT "Blob" using FormData/XHR2
                var fileType = 'video'; // or "audio"
                var fileName = 'ABCDEF.webm';  // or "wav" or "ogg"

                var formData = new FormData();
                formData.append(fileType + '-filename', fileName);
                formData.append(fileType + '-blob', blob);

                xhr('save.php', formData, function (fileURL) {
                    window.open(fileURL);
                });

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

            };

            var duration = 1000;

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


