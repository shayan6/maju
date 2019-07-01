<script>
    //side bar ###########################################################################
    $.get(baseURL + "/post/<?php echo $_GET['postId'] ?>", function(data) {
        console.log(data)
        var concatActivity = '';
        for (var i = 0; i < 6 && i < data.row.length; i++) {
            let {
                created_at,
                image,
                name,
                title,
                description,
                id,
                file,
                teacher_id,
                post_marks
            } = data.row[i];

            if (teacher_id == <?php echo $_SESSION['user_id'] ?>) {
                var input = `<div><input id="post_marks" name="post_marks" onblur="assignMarks(${id})" value="${post_marks}" min="10" max="100" required="required" class="form-control" placeholder="Enter Marks..." type="number"></div>`;
            } else {
                var input = `<div><input id="post_marks" value="${post_marks}" readonly class="form-control" type="text"></div>`;
            }

            concatActivity +=
                '<div class="activity-box-w pipeline-item" style="box-shadow: 0px 0px 0px white;" >' +
                '<div class="activity-box"  style="display:flex">' +
                '<div class="activity-avatar">' +
                '<img class="img-top" alt="" src="./uploads/' + image + '">' +
                '</div>' +
                '<div class="activity-info">' +
                '<div class="activity-role">' + moment(created_at).format('DD-MMM-YYYY H:m') + '</div>' +
                '<strong class="activity-title">' + name + '</strong>' +
                '<p>' + description + '</p>' +

                // file container
                '<a href="./uploads/files/' + file + '" download="' + title + '">' +
                `<button class="mr-2 mb-2 btn btn-outline-primary" type="button"> <div class="os-icon os-icon-file-text" style="font-size:large"></div>${title}</button>` +
                '</a>' +

                '</div>' +
                '</div>' +
                '<br><br>' +

                // like comment section
                `<div class="pi-foot">
                        <a class="extra-info" href="#"><i class="icon-like post-id-${id} clap-btn"></i><span onclick="allLikes(${id})" id="post-id-${id}" data-target="#likeModal" data-toggle="modal"><b> 0 </b> LIKE</span></a>
                        <a class="extra-info" href="#comment_content"><i class="os-icon os-icon-mail-12"></i><span id="comments-id-${id}" >0 Comments</span></a>` +
                input +
                `</div>` +
                '</div>';
            likeCount(id);
            commentCount(id);
        }

        // activity boxes w ############################################################
        $("#container").html(concatActivity);

        //clapp button #################################################################
        $('.clap-btn').on('click', function() {
            var that = $(this);
            var c = $(this).attr('class');
            var post_id = c.slice(c.indexOf("post-id-") + 8, c.indexOf("clap-btn"));
            console.log($(this).hasClass('clap-active'))

            // ajax post to add and delete likes in table
            $.ajax({
                url: "/maju/view/php/like.php",
                type: "POST",
                data: {
                    'post_id': post_id,
                    'like': $(this).hasClass('clap-active')
                },
                success: function(data) {
                    if (data == 'inserted') {
                        that.addClass('clap-active');
                    }
                    if (data == 'deleted') {
                        that.removeClass('clap-active');
                    }
                    likeCount(post_id);
                },
                error: function(e) {
                    alert('error');
                }
            });
        });
    }).then(function(data) {
        // after fetch request
        $('.file').css({
            'top': 'calc(50% + 15px)',
            'opacity': 1
        });
    });


    // post comments scripts ########################################################################################################
    $(document).ready(function() {

        $('#comment_form').on('submit', function(event) {

            event.preventDefault();
            var parent_comment_id = $('#parent_comment_id').val();
            var comment_content = $('#comment_content').val();
            var comment_type = $('#comment_type').val();
            var post_id = $('#post_id').val();

            console.log({
                parent_comment_id,
                comment_content,
                comment_type,
                post_id
            });

            if (comment_content.trim() != '')
                $.ajax({
                    url: "./php/add_comment.php",
                    method: "POST",
                    data: {
                        parent_comment_id,
                        comment_content,
                        comment_type,
                        post_id
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.error != '') {
                            $('#comment_form')[0].reset();
                            $('#comment_message').html(data.error);
                            $('#comment_id').val('0');
                            $('#post_id').val('<?php echo $_GET['postId']; ?>');
                            load_comment();
                        }
                    }
                });

        });

        load_comment();

        function load_comment() {
            var comment_id = $('#comment_id').val(); // parent comment id
            var post_id = $('#post_id').val();

            $.get(`${baseURL}/comments/${comment_id}/${post_id}`, function(data) {
                var output = '';
                for (let i = 0; i < data.row.length; i++) {
                    let {
                        user_id,
                        comment,
                        name,
                        image,
                        created_at
                    } = data.row[i];

                    if (user_id == '<?php echo $_SESSION['user_id'] ?>') {

                        output += '<div class="chat-message self">' +
                            '<div class="chat-message-content-w">' +
                            '<div class="chat-message-content">' + comment + '</div>' +
                            '</div>' +
                            '<div class="chat-message-date">' + created_at + '</div>' +
                            '<div class="chat-message-avatar"><img title="' + name + '" alt="" src="./uploads/' + image + '"></div>' +
                            '</div>';
                    } else {

                        output += '<div class="chat-message">' +
                            '<div class="chat-message-content-w">' +
                            '<div class="chat-message-content">' + comment + '</div>' +
                            '</div>' +
                            '<div class="chat-message-avatar"><img title="' + name + '" alt="" src="./uploads/' + image + '"></div>' +
                            '<div class="chat-message-date">' + created_at + '</div>' +
                            '<div style="display: inline-flex;float: right;"><a href="#comment_content" class="btn btn-default reply" onclick="fillComment(`' + name + '`)" ><i class="fa fa-reply" aria-hidden="true"></i></a></div>' +
                            '</div>';
                    }

                }

                $('#display_comment').html(output);

            });

        }

        $(document).on('click', '.reply', function() {
            var comment_id = $(this).attr("id");
            $('#comment_id').val(comment_id);
            $('#comment_name').focus();
        });

    });



    // functions to give marks #########################################################################################################################
    function assignMarks(id) {
        if( +( $('#post_marks').val() ) <= 100 )
        $.ajax({
            method: "POST",
            url: "/maju/view/php/marks.php",
            data: {
                id: id,
                post_marks: $('#post_marks').val()
            },
            success: function(data) {
                console.log(data);
                if (data.trim() == 'Null') {
                    Swal('Oops... Somthing Went Wrong', '', 'error');
                } else {
                    swalWithBootstrapButtons({
                        title: "Marks Assigned Successfully",
                        type: "success",
                        timer: 1500,
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                    
                }
                $('body').css('padding-right', '15px');
            }
        });
    }
</script>