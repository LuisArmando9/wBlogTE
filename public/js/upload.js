$('#imageUpload').change(function(){      
    readImgUrlAndPreview(this);
   
    function readImgUrlAndPreview(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {                    
          $('#imagePreview').attr('src', e.target.result);
          $('#imagePreview').css('opacity', 1);
        }
      };
      reader.readAsDataURL(input.files[0]);
    } 
  });