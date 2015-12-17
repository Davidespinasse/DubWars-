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
