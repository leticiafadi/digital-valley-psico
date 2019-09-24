
$(document).ready(function(){
 
    // Click event of the showPassword button
    $('#showPassword').on('click', function(){
       
      // Get the password field
      var passwordField = $('#password');
   
      // Get the current type of the password field will be password or text
      var passwordFieldType = passwordField.attr('type');
   
      // Check to see if the type is a password field
      if(passwordFieldType == 'password')
      {
          passwordField.attr('type', 'text');
          $(this).find('i').removeClass('far fa-eye');
          $(this).find('i').addClass('far fa-eye-slash');
      } else {
          passwordField.attr('type', 'password');
          $(this).find('i').removeClass('far fa-eye-slash');
          $(this).find('i').addClass('far fa-eye');
      }
    
    });
  });

