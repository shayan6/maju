<!DOCTYPE html>
<html>
  <head>
    <title>Tez Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"> 
    <!-- all css liks ################################################################################################### -->
    <?php include './partial/links-without-session.php' ?>
 </head>
 <body>
    <div class="all-wrapper menu-side with-pattern" style="padding: 13px;">
      <div class="auth-box-w wider">
        <div class="logo-w">
          <a href="index.html"><img alt="" class="majuLogo" src="img/maju_logo.png"></a>
        </div>
        <h4 class="auth-header">
          Create User
        </h4>
        <form id="form" method="post" style="padding: 10px 80px 20px 80px;">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for=""> User Role </label>
                <select class="form-control" name="role" id="role" required="required" data-error="Please Select A User Role From List">
                  <option value="">-- Select Role --</option>
                  <option value="1">Admin</option>
                  <option value="2">Student</option>
                  <option value="3">Teacher</option>
                </select>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Profile Name </label><input id="username" class="form-control" placeholder="Enter User Name..." name="username" type="text" required="required">
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> User Id</label><input id="userId" class="form-control" placeholder="Enter User Name..." name="userId" type="text" required="required">
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Password</label><input id="userPassword" name="userPassword" required="required" class="form-control" placeholder="Enter Password..." type="password" minlength="6">
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Confirm Password</label><input id="confirmPassword" required="required"  class="form-control" data-match="#userPassword" data-match-error="Whoops, these don't match"  placeholder="Enter Password..." type="password" minlength="6">
                <div class="help-block with-errors" id="incorrectPassword" ></div>
              </div>
            </div>
          </div>
          <div class="row" >
            <div class="col-sm-12">
              <div class="buttons-w">
                <button class="btn btn-primary" type="submit">Create Now</button>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="msg"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
  <footer>
    <script type="text/javascript">

    var allowsubmit = false;
    $(function(){
        //on keypress 
        $('#confirmPassword').keyup(function(e){
          //get values 
          var pass = $('#userPassword').val();
          var confpass = $(this).val();
          console.log(pass + '==' + confpass)
          //check the strings
          if(pass == confpass){
            //if both are same remove the error and allow to submit
            $('#userPassword').css("border", "1px solid #cecece");
            $('#confirmPassword').css("border", "1px solid #cecece");
            $('#incorrectPassword').html('Password Matched');
            $('#incorrectPassword').css("color", "#00c367");
            allowsubmit = true;
          }else{
            //if not matching show error and not allow to submit
            $('#userPassword').css("border", "#e65252 solid 1px");
            $('#confirmPassword').css("border", "#e65252 solid 1px");
            $('#incorrectPassword').html("Password Does'nt Match");
            $('#incorrectPassword').css("color", "#e65252");
            allowsubmit = false;
          }
        });

        //on keypress 
        $('#userPassword').keyup(function(e){
          //get values 
          var pass = $(this).val();
          var confpass = $('#confirmPassword').val();
          //check the strings
          if(pass == confpass){
            //if both are same remove the error and allow to submit
            $('#userPassword').css("border", "1px solid #cecece");
            $('#confirmPassword').css("border", "1px solid #cecece");
            $('#incorrectPassword').html('Password Matched');
            $('#incorrectPassword').css("color", "#00c367");
            allowsubmit = true;
          }else{
            //if not matching show error and not allow to submit
            $('#userPassword').css("border", "#e65252 solid 1px");
            $('#confirmPassword').css("border", "#e65252 solid 1px");
            $('#incorrectPassword').html("Password Does'nt Match");
            $('#incorrectPassword').css("color", "#e65252");
            allowsubmit = false;
          }
        });

       //form submit ajax      
       $("#form").on('submit',(function(e) {
        e.preventDefault();
        var role = $('#role').val(); 
        var username = $('#username').val();
        var userId = $('#userId').val();
        var userPassword = $('#userPassword').val();

        var confpass = $('#confirmPassword').val();
        var allowsubmit = userPassword !== confpass || role.trim() === '' || username.trim() === '' || userId.trim() === '' || userPassword.length < 6 ? false : true;

        //if both password are same
        if(allowsubmit)
        $.ajax({
         url:"/maju/view/php/signup-decode.php",
         type: "POST",
         data: {
          'role': role,
          'username': username,
          'userId': userId,
          'userPassword': userPassword
         },
         beforeSend : function()
         {
            $("#msg").fadeOut();
         },
         success: function(data){
            if(data.trim() == "success"){
              $("#msg").html('<div class="alert alert-success" role="alert" style="padding: 1rem .9rem;"><strong>Success! </strong>You Created New User Successfully.</div>').fadeIn();
            }else{
              $("#msg").html('<div class="alert alert-danger" role="alert" style="padding: 1rem .9rem;"><strong>Error! </strong>'+data+'</div>').fadeIn();
            }
          },
          error: function(e){
            $("#msg").html(e).fadeIn();
          }          
        });
       })); 
     });
    </script>
  </footer>
</html>