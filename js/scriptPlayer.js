/*
* REPLAY ARCHIVED VIDEOS (page play.php) 
*/

var pausedArc = true, // control play/pause of archived bideo
    audio = document.querySelector('#audio'),
    archivedVideo = document.querySelector('.archivedVideo');
    
    audio.pause();
    archivedVideo.pause();

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