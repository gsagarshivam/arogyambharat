$(document).ready(function() {
    // show the alert
    //alert('test');
    setTimeout(function() {
        $(".alert").alert('close');
    }, 5000);

  });  

  $('img').on("error", function() {
    $(this).attr('src', './images/noimage.png');
    //$(this).hide();
  });

  $(".createslug").keyup(function(){
      var Text = $(this).val();
      $(".showmeta").val(Text); 
      // Text = Text.toLowerCase();
      // Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
      Text = Text.toLowerCase().replace(/ /g,'-');
      //Text = Text.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
        ;
      $(".showslug").val(Text);  
  });

  $(".showslug").keyup(function(){
      var Text = $(this).val();
      Text = Text.toLowerCase();
      Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
      //return false;
      $(".showslug").val(Text);        
  });