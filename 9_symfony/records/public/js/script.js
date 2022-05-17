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
