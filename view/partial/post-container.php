<link href="./css/post.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>
    .chat-content {
        padding: 0 !important;
    }

    .full-chat-w .chat-content-w {
        height: 60vh;
    }

    .btn-white {
        background: white;
    }

    .img-top {
        width: 6vW;
        border-radius: 50%;
        margin-right: 30px;
    }
</style>

<div class="content-panel-toggler">
    <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
</div>

<div class="content-i mainPage">
    <div class="content-box">
        <div class="element-wrapper">
            <div class="element-box" style="padding-bottom: 0px;">
                <div id="container"></div>
                <!-- comment section -->
                <hr />
                <span id="comment_message"></span>
                <br />
                <div class="full-chat-w">
                    <div class="full-chat-i">
                        <div class="full-chat-middle">
                            <div class="chat-content-w">
                                <div class="chat-content">
                                    <div id="display_comment"></div>
                                </div>
                            </div>
                            <form method="POST" id="comment_form">
                                <div class="chat-controls">
                                    <div class="chat-input">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input name="comment_content" id="comment_content" placeholder="Type your comment here..." type="text"></div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for=""></label>
                                                    <select class="form-control" name="comment_type" id="comment_type" required="required" data-error="Please Select A User comment_type From List">
                                                        <option value="1">Positive Point</option>
                                                        <option value="2">Negative Point</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-input-extra">
                                        <div class="chat-btn"><input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" /></div>
                                    </div>
                                </div>
                                <input type="text" name="post_id" id="post_id" class="form-control d-none" placeholder="Enter Name" value="<?php echo $_GET['postId'] ?>" />
                                <input type="hidden" name="parent_comment_id" id="parent_comment_id" value="0" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------
	START - Sidebar
	-------------------->
    <?php include 'sidebar.php' ?>
    <!--------------------
	END - Sidebar
	-------------------->
</div>

<!-- MOdal likes of users ################################################################# -->
<?php include 'modal-likes.php' ?>