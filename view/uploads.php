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

            div.pipeline-item {
                pointer-events: none;
            }

            div.pi-controls {
                pointer-events: auto;
            }

            div.pipeline-item:hover {
                background: #f05152b8;
                color: white;
            }
        </style>

    </head>

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
                    <?php include 'partial/upload-container.php' ?>
                </div>
            </div>
            <div class="display-type"></div>
        </div>
        <!-- all javascrpts liks ################################################################################################### -->
        <?php include 'partial/scripts.php' ?>
        <!-- other page scripts -->
        <script>
            //side bar ###########################################################################
            $.get(baseURL + "/postsOfUser/<?php echo $_SESSION['user_id']; ?>", function(data) {
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
                        '<div class="activity-time">' + moment(created_at).fromNow() + '</div>' +


                        '<div class="pipeline-item" style="width:100%; padding: 3%;">' +
                        `<div class="pi-controls" onclick="deletePost(${id})"><div class="pi-settings os-dropdown-trigger" style="color:#f05152"><i class="os-icon os-icon-ui-15"></i></div></div>` +
                        '<div class="pi-body">' +
                        '<div class="avatar">' +
                        '<img alt="" src="./uploads/' + image + '">' +
                        '</div>' +
                        '<div class="pi-info">' +
                        '<div class="h6 pi-name">' +
                        name +
                        '</div>' +
                        '<div class="pi-sub">' +
                        (description).slice(0, 256) + '... <a href="#" onclick=windowLocation(' + id + ') id="readMore">Read More</a>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="pi-foot">' +
                        '<div class="tags">' +
                        '<a class="tag" href="./uploads/files/' + file + '" download="' + title + '">' + title + '</a>' +
                        '</div>' +
                        '<a class="extra-info" href="#"  onclick=windowLocation(' + id + ') ><i class="os-icon os-icon-mail-12"></i><span>0 Comments</span></a>' +
                        '<a class="extra-info" href="#"><i class="icon-like post-id-' + id + ' clap-btn" ></i><span  onclick="allLikes(' + id + ')" id="post-id-' + id + '"  data-target="#likeModal" data-toggle="modal" > Likes</span></a>' +
                        '</div>' +
                        '</div>' +

                        '</div>';
                    likeCount(id);
                }

                // activity boxes w ############################################################
                $(".activity-boxes-w").html(concatActivity);
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

            // delete post scripts ########################################
            function deletePost(id) {

                swalWithBootstrapButtons({
                    title: 'Are you sure?',
                    text: "You want to Delete This Post!",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {

                    if (result.value) {

                        $.ajax({
                            method: "POST",
                            url: "/maju/view/php/post-delete.php",
                            data: {
                                id: id,
                            },
                            success: function(data) {
                                console.log(data);
                                if (data.trim() == 'Null') {
                                    Swal('Oops... Somthing Went Wrong', '', 'error');
                                } else {
                                    swalWithBootstrapButtons({
                                        title: "Post Deleted Successfully",
                                        type: "success",
                                        timer: 1500,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    });
                                    setTimeout(() => location.reload(), 2000);
                                }
                                $('body').css('padding-right', '15px');
                            }
                        });

                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons({
                            title: "Cancelled! To Generate",
                            type: "error",
                            timer: 1000,
                            showCancelButton: false,
                            showConfirmButton: false
                        })
                        $('body').css('padding-right', '15px');
                    }
                })
            }
            $('.allUploads').removeClass('active');
            $('.myUploads').addClass('active');
        </script>
        <?php include './partial/script-with-php/main-script.php'; ?>
    </body>

    </html>