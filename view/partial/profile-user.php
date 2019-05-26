<div class="content-panel-toggler">
  <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
</div>

<div class="content-i">
  <div class="content-box">
    <div class="element-wrapper">
      <div class="user-profile">
        <div class="up-head-w" style="background-image:url(./uploads/cover.jpg)">
          <div class="up-main-info" id="up-main-info">
            <!-- <div class="user-avatar-w">
                  <div class="user-avatar">
                    <img alt="" src="https://clarity.pk/wp-content/uploads/2017/12/tez-financial-services-pakistan-clarity-fintech.png">
                  </div>
                </div>
                <h1 class="up-header" style="font-size: 2.5rem" id="">
                  Shayan Shaikh
                </h1>
                <h5 class="up-sub-header" id="userRoleName">
                  Admin
                </h5> -->
          </div>
          <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
              <path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path>
            </g>
          </svg>
        </div>
        <div class="up-controls">

        </div>

        <div class="up-contents">
          <h5 class="element-header">
            Profile Settings
          </h5>
          <div class="row m-b">
            <div class="col-lg-12">
              <form id="formValidate" novalidate="true">
                <div class="row">
                  <div class="col-sm-4" style="display: none">
                    <div class="form-group">
                      <label for="">User id</label><input id="user_id" class="form-control" readonly="readonly" type="text">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">Profile Name</label><input id="full_name" class="form-control" data-error="Please input your Name" placeholder="Please input your user name" required="required" type="text">
                      <div class="help-block form-text with-errors form-control-feedback"></div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                  </div>
                </div>
                <fieldset class="form-group">
                  <legend><span>Create New Password</span></legend>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Old Password</label><input id="password" class="form-control" placeholder="Old Password" required="required" type="password">
                        <div class="help-block form-text text-errors form-control-feedback"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">New Password</label><input id="new_password" class="form-control" data-minlength="6" minlength="6" placeholder="Password" required="required" type="password">
                        <div class="help-block form-text text-muted form-control-feedback">
                          Minimum of 6 characters
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Confirm Password</label><input id="confirm_password" class="form-control" data-match-error="Passwords don't match" placeholder="Confirm Password" required="required" type="password">
                        <div class="help-block form-text with-errors form-control-feedback" id="incorrectPassword"></div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-buttons-w">
                      <button class="btn btn-primary disabled" type="submit"> Submit</button>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div id="msg"></div>
                  </div>
                </div>
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


<!--Modal - Edit Task-->
<div aria-hidden="true" class="modal fade" id="taskModal" role="dialog" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header faded smaller">
        <div class="modal-title">
          <!-- <img alt="" class="avatar" src="./uploads/default.jpg"> -->
          <span>Upload Image </span><strong id="dateSpan"></strong>
        </div>
        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div id="upload-demo"></div>
          </div>
          <div class="col-md-12">
            <strong>Select Image:</strong>
            <input type="file" id="upload" name="image">
            <hr />
            <button id="uploadButton" class="btn btn-success upload-result disabled" style="float: right;">Upload Image</button>
          </div>
          <!-- <div class="col-md-4" style="">
                <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
                </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!--End Modal - Edit Task-->