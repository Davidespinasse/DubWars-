/*
* REPLAY ARCHIVED VIDEOS (page play.php) 
*/

var pausedArc = false, // control play/pause archived bideo
    audio = document.querySelector('#audio'),
    archivedVideo = document.querySelector('.archivedVideo');

archivedVideo.addEventListener('click', function(){

  if(pausedArc == false) {    
    audio.pause();
    archivedVideo.pause();
    pausedArc = true;
  } 
  else if(pausedArc == true){
    audio.play();
    archivedVideo.play();
    pausedArc = false;
  } 

  //resolv problem in firefox (the video did not reload when it reach the end)
  if(archivedVideo.currentTime == archivedVideo.duration) {
    window.location.reload();
  }

});