<div class="content-panel-toggler">
    <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
</div>

<div class="content-i mainPage">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                Create User
            </h6>
            <div class="element-box-tp">
                <div class="activity-boxes-w element-box">
                    <div class="logo-w text-center">
                        <a href="index.html"><img alt="" class="majuLogo" src="img/maju_logo.png"></a>
                    </div>
                    <hr>
                    <form id="form" method="post" style="padding: 10px 80px 20px 80px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for=""> User Role </label>
                                    <select class="form-control" name="role" id="role" required="required" data-error="Please Select A User Role From List">
                                        <option value="">-- Select Role --</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Teacher</option>
                                        <option value="3">Student</option>
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
                                    <label for="">Confirm Password</label><input id="confirmPassword" required="required" class="form-control" data-match="#userPassword" data-match-error="Whoops, these don't match" placeholder="Enter Password..." type="password" minlength="6">
                                    <div class="help-block with-errors" id="incorrectPassword"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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