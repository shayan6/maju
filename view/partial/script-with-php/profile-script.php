<script>
    $(window).ready(function() {
        //side bar ###########################################################################
        $.get(baseURL + "/users/profile", function(data) {

            console.log(data.row)

            //render function result
            var tmpl = $.templates("#myTmpl"); // Get compiled template
            var html = tmpl.render(data.row); // Render template using data - as HTML string
            $("#usersProfile").html(html); // Insert HTML string into DOM

            //user own profile
            var concatString = '';
            for (var i = 0; i < data.row.length; i++) {
                if (+data.row[i].id === <?php echo $_SESSION['user_id']; ?>) { //header name ############################################################################################################################## concatString +='<div class="up-main-info" id="up-main-info">' ; concatString +='<div class="user-avatar-w">' ; concatString +='<div class="user-avatar">' ; concatString +='<img alt="" src="./uploads/' +data.row[i]['image']+'">';
                    //header name ##############################################################################################################################
                    concatString += '<div class="up-main-info" id="up-main-info">';
                    concatString += '<div class="user-avatar-w">';
                    concatString += '<div class="user-avatar">';
                    concatString += '<img alt="" src="./uploads/' + data.row[i]['image'] + '">';
                    concatString += '<div id="updateImage" class="text-center" data-target="#taskModal" data-toggle="modal"><i class="icon-camera" ></i><br/>Update</dvi>';
                    concatString += '</div>';
                    concatString += '</div>';
                    concatString += '<h1 class="up-header">';
                    concatString += data.row[i]['name'];
                    concatString += '</h1>';
                    concatString += '<h5 class="up-sub-header" >';
                    concatString += 'Account Type: ' + data.row[i]['role_name'];
                    concatString += '</h5>';
                    concatString += '</div>';

                    //form fill #######################################################################################################################################
                    $('#user_id').val(data.row[i]['id']);
                    $('#full_name').val(data.row[i]['name']);
                    $('#principal_name').val(data.row[i]['maju_id']);

                }
            }
            $('#up-main-info').html(concatString);
        });
        //image croper ##########################################################################################################################################
        // uploadCrop = $('#upload-demo').croppie({
        //     enableExif: true,
        //     viewport: {
        //         width: 200,
        //         height: 200,
        //         type: 'circle'
        //     },
        //     boundary: {
        //         width: 300,
        //         height: 300
        //     }
        // });

        $('#upload').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });

            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadButton').removeClass('disabled');
        });

        // $('.upload-result').on('click', function(ev) {
        //     uploadCrop.croppie('result', {
        //         type: 'canvas',
        //         size: 'viewport'
        //     }).then(function(resp) {
        //         if (!$('#uploadButton').hasClass('disabled'))
        //             $.ajax({
        //                 url: "./php/user-image-upload.php",
        //                 type: "POST",
        //                 data: {
        //                     resp
        //                 },
        //                 success: function(data) {
        //                     if (data.trim() === "success") {
        //                         swalWithBootstrapButtons({
        //                             title: "Image Updated!!!",
        //                             type: "success",
        //                             timer: 1000,
        //                             showCancelButton: false,
        //                             showConfirmButton: false
        //                         });
        //                         setTimeout(function() {
        //                             location.reload()
        //                         }, 1500);
        //                     } else {
        //                         Swal("error", data, "error");
        //                     }
        //                 }
        //             });
        //     });
        // });
    });


    //profile upload ######################################################################################################s 
    var allowsubmit = false;
    $(function() {
        //on keypress 
        $('#confirm_password').keyup(function(e) {
            //get values 
            var pass = $('#new_password').val();
            var confpass = $(this).val();

            //check the strings
            if (pass == confpass) {
                //if both are same remove the error and allow to submit
                $('#new_password').css("border", "1px solid #cecece");
                $('#confirm_password').css("border", "1px solid #cecece");
                $('#incorrectPassword').html('Password Matched');
                $('#incorrectPassword').css("color", "#00c367");
                allowsubmit = true;
            } else {
                //if not matching show error and not allow to submit
                $('#new_password').css("border", "#e65252 solid 1px");
                $('#confirm_password').css("border", "#e65252 solid 1px");
                $('#incorrectPassword').html("Password Does'nt Match");
                $('#incorrectPassword').css("color", "#e65252");
                allowsubmit = false;
            }
        });

        //on keypress 
        $('#new_password').keyup(function(e) {
            //get values 
            var pass = $(this).val();
            var confpass = $('#confirm_password').val();

            //check the strings
            if (pass == confpass) {
                //if both are same remove the error and allow to submit
                $('#new_password').css("border", "1px solid #cecece");
                $('#confirm_password').css("border", "1px solid #cecece");
                $('#incorrectPassword').html('Password Matched');
                $('#incorrectPassword').css("color", "#00c367");
                allowsubmit = true;
            } else {
                //if not matching show error and not allow to submit
                $('#new_password').css("border", "#e65252 solid 1px");
                $('#confirm_password').css("border", "#e65252 solid 1px");
                $('#incorrectPassword').html("Password Does'nt Match");
                $('#incorrectPassword').css("color", "#e65252");
                allowsubmit = false;
            }
        });
    });

    //form submit ajax      
    $("#formValidate").on('submit', (function(e) {
        e.preventDefault();
        var user_id = $('#user_id').val();
        var full_name = $('#full_name').val();
        var old_password = $('#password').val();
        var new_password = $('#new_password').val();

        //if both password are same
        if (allowsubmit)
            $.ajax({
                url: "/maju/view/php/profile-edit.php",
                type: "POST",
                data: {
                    'user_id': user_id,
                    'full_name': full_name,
                    'old_password': old_password,
                    'new_password': new_password
                },
                beforeSend: function() {
                    $("#msg").fadeOut();
                },
                success: function(data) {
                    if (data.trim() == "success") {
                        $("#msg").html('<div class="alert alert-success" role="alert" style="padding: 1rem .9rem;"><strong>Success! </strong>Your Profile Updated Successfully.</div>').fadeIn();
                        setTimeout(() => location.reload(), 1500);
                    } else {
                        $("#msg").html('<div class="alert alert-danger" role="alert" style="padding: 1rem .9rem;"><strong>Error! </strong>' + data + '</div>').fadeIn();
                    }
                    setTimeout(() => $("#msg").fadeOut(), 5000);
                },
                error: function(e) {
                    $("#msg").html(e).fadeIn();
                }
            });
    }));
</script>