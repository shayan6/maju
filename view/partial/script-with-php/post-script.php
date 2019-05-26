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
                file
            } = data.row[i];
            concatActivity +=
                '<div class="activity-box-w">' +
                '<div class="activity-box"  style="display:flex">' +
                '<div class="activity-avatar">' +
                '<img class="img-top" alt="" src="./uploads/' + image + '">' +
                '</div>' +
                '<div class="activity-info">' +
                '<div class="activity-role">' + name + '</div>' +
                '<strong class="activity-title">' + (title).slice(0, (title).indexOf(".")) + '</strong>' +
                '<p>' + description + '</p>' +

                // file container
                '<div class="file-container">' +
                '<a href="./uploads/files/' + file + '" download="' + title + '" class="main-box" style="margin-left: 69px;">' +
                '<div class="box-content">' +
                '<div class="svg">' +
                '<svg width="40" height="30" viewBox="0 0 66 57" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                '<path d="M2.70977 0H19.4194C20.2733 0 21.0742 0.402215 21.5857 1.08315L25.3821 6.14266C25.8937 6.82361 26.6946 7.22581 27.5484 7.22581H62.3226C63.8185 7.22581 65.0323 8.43956 65.0323 9.93548V53.2903C65.0323 54.7862 63.8185 56 62.3226 56H2.70968C1.21376 56 0 54.7862 0 53.2903V2.70968C0 1.21375 1.21385 0 2.70977 0Z" transform="translate(0.0177612 0.740387)" fill="#4F8AFE"></path>' +
                '</svg>' +
                '</div>' +
                '<div class="text">' +
                '<p class="title" style="margin-bottom: 0rem;">' + title + '</p>' +
                '<span>Uploaded At: ' + created_at + '</span>' +
                '</div>' +
                '<div class="dots">' +
                '<div></div>' +
                '<div></div>' +
                '<div></div>' +
                '</div>' +
                '</div>' +
                '</a>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<br><br>' +
                '<div><span class="post-id-' + id + ' clap-btn"></span>' +
                // likeCount returs likes count and active if post is already liked
                '<span class="post-like-count" style="vertical-align: super;" data-target="#likeModal" data-toggle="modal" onclick="allLikes(' + id + ')" id="post-id-' + id + '"> LIKE</span></div>' +
                '</div>';
            likeCount(id);
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
            var post_id = $('#post_id').val();

            console.log({
                parent_comment_id,
                comment_content,
                post_id
            });

            if (comment_content.trim() != '')
                $.ajax({
                    url: "./php/add_comment.php",
                    method: "POST",
                    data: {
                        parent_comment_id,
                        comment_content,
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
</script>