/*    
  @licstart  The following is the entire license notice for the 
  JavaScript code in this page.

  Copyright (C) 2022  Stéphane MEYER (Teegre)

  The JavaScript code in this page is free software: you can
  redistribute it and/or modify it under the terms of the GNU
  General Public License (GNU GPL) as published by the Free Software
  Foundation, either version 3 of the License, or (at your option)
  any later version.  The code is distributed WITHOUT ANY WARRANTY;
  without even the implied warranty of MERCHANTABILITY or FITNESS
  FOR A PARTICULAR PURPOSE.  See the GNU GPL for more details.

  As additional permission under GNU GPL version 3 section 7, you
  may distribute non-source (e.g., minimized or compacted) forms of
  that code without the copy of the GNU GPL normally required by
  section 4, provided you include this license notice and a URL
  through which recipients can access the Corresponding Source.   


  @licend  The above is the entire license notice
  for the JavaScript code in this page.
*/

function updatePicture(formType) {
  /* update picture display */
  img = document.getElementsByTagName("img")[0];
  switch (formType) {
    case 'artist':
      var id = "artist_artist_img";
      break;
    case 'record':
      var id = "form_record_picture";
      break
    default:
      var id = ""
  }

  try {
    file = document.getElementById(id).files[0];
  } catch (error) {
    console.log(error);
    return;
  }

  if (file.type.match('^image.*$')) {
    reader = new FileReader();
    reader.onload = function () {
      img.src = this.result; 
    }
    reader.readAsDataURL(file);
  }
}

function addSong(e) {
  /* add a text input to song collection */
  const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
  const item = document.createElement('div');
  item.innerHTML = collectionHolder.dataset.prototype.replace(/__name__/g, collectionHolder.dataset.index);
  collectionHolder.appendChild(item);
  inpt = document.getElementById('form_songs_' + collectionHolder.dataset.index + '_song_title');
  inpt.focus();
  collectionHolder.dataset.index++;
}

function removeSong(id) {
  /* remove a text input from song collection */
  song = document.getElementById("song-" + id);
  song.parentNode.removeChild(song);
}

