<html>

<head>
    <!-- all css liks ################################################################################################### -->
    <?php include 'partial/links.php' ?>

    <style>
        @media (max-width: 1650px) {
            .content-box {
                padding: 2rem 6rem;
            }
        }
    </style>

</head>

<?php if (in_array(3, $_SESSION['access'])) { ?>

    <body>
        <div class="all-wrapper menu-side with-side-panel">
            <div class="layout-w">
                <!--------------------
            START - Mobile Menu
            -------------------->
                <?php include 'partial/mobile-menu.php' ?>
                <!--------------------
            END - Mobile Menu
            -------------------->
                <!--------------------
            START - Menu side 
            -------------------->
                <?php include 'partial/menu.php' ?>
                <!--------------------
            END - Menu side 
            -------------------->
                <div class="content-w">
                    <!-- header top ################################################################################################### -->
                    <?php include 'partial/header.php' ?>
                    <?php include 'partial/create-user-container.php' ?>
                </div>
            </div>
            <div class="display-type"></div>
        </div>
        <!-- all javascrpts liks ################################################################################################### -->
        <?php include 'partial/scripts.php' ?>

        <script type="text/javascript">
            var allowsubmit = false;
            $(function() {
                //on keypress 
                $('#confirmPassword').keyup(function(e) {
                    //get values 
                    var pass = $('#userPassword').val();
                    var confpass = $(this).val();
                    console.log(pass + '==' + confpass)
                    //check the strings
                    if (pass == confpass) {
                        //if both are same remove the error and allow to submit
                        $('#userPassword').css("border", "1px solid #cecece");
                        $('#confirmPassword').css("border", "1px solid #cecece");
                        $('#incorrectPassword').html('Password Matched');
                        $('#incorrectPassword').css("color", "#00c367");
                        allowsubmit = true;
                    } else {
                        //if not matching show error and not allow to submit
                        $('#userPassword').css("border", "#e65252 solid 1px");
                        $('#confirmPassword').css("border", "#e65252 solid 1px");
                        $('#incorrectPassword').html("Password Does'nt Match");
                        $('#incorrectPassword').css("color", "#e65252");
                        allowsubmit = false;
                    }
                });

                //on keypress 
                $('#userPassword').keyup(function(e) {
                    //get values 
                    var pass = $(this).val();
                    var confpass = $('#confirmPassword').val();
                    //check the strings
                    if (pass == confpass) {
                        //if both are same remove the error and allow to submit
                        $('#userPassword').css("border", "1px solid #cecece");
                        $('#confirmPassword').css("border", "1px solid #cecece");
                        $('#incorrectPassword').html('Password Matched');
                        $('#incorrectPassword').css("color", "#00c367");
                        allowsubmit = true;
                    } else {
                        //if not matching show error and not allow to submit
                        $('#userPassword').css("border", "#e65252 solid 1px");
                        $('#confirmPassword').css("border", "#e65252 solid 1px");
                        $('#incorrectPassword').html("Password Does'nt Match");
                        $('#incorrectPassword').css("color", "#e65252");
                        allowsubmit = false;
                    }
                });

                //form submit ajax      
                $("#form").on('submit', (function(e) {
                    e.preventDefault();
                    var role = $('#role').val();
                    var username = $('#username').val();
                    var userId = $('#userId').val();
                    var userPassword = $('#userPassword').val();

                    var confpass = $('#confirmPassword').val();
                    var allowsubmit = userPassword !== confpass || role.trim() === '' || username.trim() === '' || userId.trim() === '' || userPassword.length < 6 ? false : true;

                    //if both password are same
                    if (allowsubmit)
                        $.ajax({
                            url: "/maju/view/php/signup-decode.php",
                            type: "POST",
                            data: {
                                'role': role,
                                'username': username,
                                'userId': userId,
                                'userPassword': userPassword
                            },
                            beforeSend: function() {
                                $("#msg").fadeOut();
                            },
                            success: function(data) {
                                if (data.trim() == "success") {
                                    $("#msg").html('<div class="alert alert-success" role="alert" style="padding: 1rem .9rem;"><strong>Success! </strong>You Created New User Successfully.</div>').fadeIn();
                                } else {
                                    $("#msg").html('<div class="alert alert-danger" role="alert" style="padding: 1rem .9rem;"><strong>Error! </strong>' + data + '</div>').fadeIn();
                                }
                            },
                            error: function(e) {
                                $("#msg").html(e).fadeIn();
                            }
                        });
                }));
            });
        </script>
    </body>
<?php } ?>

</html>