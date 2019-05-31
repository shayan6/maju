<html>

<head>
  <!-- all css liks ################################################################################################### -->
  <?php include './partial/links-without-session.php' ?>
  <style type="text/css">
    .auth-box-w .logo-w {
      text-align: center;
      padding: 13%;
    }


    .field-icon {
      float: right;
      left: -10px;
      margin-top: -25px;
      position: relative;
      z-index: 2;
      font-size: large;
      font-weight: 600;
      cursor: pointer;
    }
  </style>
</head>

<body class="auth-wrapper">
  <div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
      <div class="logo-w">
        <a href="index.html"><img alt="" class="majuLogo" src="img/maju_logo.png"></a>
      </div>
      <h4 class="auth-header">
        Login Form
      </h4>
      <form id="form" method="POST" style="padding-bottom: 30px;">
        <div class="form-group">
          <label for="">MAJU id</label><input style="text-transform:none;" id="name" name="name" required="required" class="form-control" placeholder="Enter your id" type="text">
          <div class="pre-icon os-icon os-icon-user-male-circle"></div>
          <div id="incorrectUsername" style="position: absolute; color: #e65252; right: 0"></div>
        </div>
        <div class="form-group">
          <label for="">Password</label><input style="text-transform:none;" id="password" name="password" required="required" class="form-control" placeholder="Enter your password" type="password" />
          <span class="icon-eye field-icon toggle-password"></span>
          <div class="pre-icon os-icon os-icon-fingerprint"></div>
          <div id="incorrectPassword" style="position: absolute; color: #e65252; right: 0"></div>
        </div>
        <div class="buttons-w">
          <button class="btn btn-primary">Log me in</button>
        </div>
      </form>
    </div>
  </div>
  <!-- all javascrpts liks ################################################################################################### -->
  <?php include './partial/scripts.php' ?>
  <script src="./bower_components/moment/moment.js"></script>
  <script src="./js/login.js"></script>
</body>

</html>