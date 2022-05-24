function updatePicture() {
  img = document.getElementsByTagName("img")[0];
  file = document.getElementById("form_record_picture").files[0];
  if (file.type.match('^image.*$')) {
    reader = new FileReader();
    reader.onload = function () {
      img.src = this.result; 
    }
    reader.readAsDataURL(file);
  }
}

function addSong(e) { 
  const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
  const item = document.createElement('div');
  item.innerHTML = collectionHolder.dataset.prototype.replace(/__name__/g, collectionHolder.dataset.index);
  collectionHolder.appendChild(item);
  inpt = document.getElementById('form_songs_' + collectionHolder.dataset.index + '_song_title');
  inpt.focus();
  collectionHolder.dataset.index++;
}

function removeSong(id) {
  song = document.getElementById("song-" + id);
  song.parentNode.removeChild(song);
}

