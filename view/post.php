<html>

<head>
  <!-- all css liks ################################################################################################### -->
  <?php include 'partial/links.php'; ?>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous' />
  <style>
    /* like comment CSS ##################################################*/
    .like-btn,
    .clap-btn {
      display: inline-block;
      cursor: pointer;
      width: 70px;
      height: 40px;
    }

    .like-btn {
      background: url("https://i.ibb.co/vw78mf3/heart.png") no-repeat 0% 50%;
      background-size: 2900%;
    }

    .clap-btn {
      background: url("https://i.ibb.co/GVsbrFF/claps.png") no-repeat 0% 50%;
      background-size: 900%;
    }

    .like-active,
    .clap-active {
      animation-name: animate;
      animation-duration: 0.8s;
      animation-iteration-count: 1;
      animation-fill-mode: forwards;
    }

    .like-active {
      animation-timing-function: steps(28);
    }

    .clap-active {
      animation-timing-function: steps(8);
    }

    @keyframes animate {
      0% {
        background-position: left;
      }

      50% {
        background-position: right;
      }

      100% {
        background-position: right;
      }
    }

    .post-like-count {
      cursor: pointer;
      font-weight: bolder;
    }
  </style>
</head>

<body>
  <div class="all-wrapper menu-side with-side-panel">
    <div class="layout-w">
      <!--------------------
        START - Mobile Menu
        -------------------->
      <?php include 'partial/mobile-menu.php'; ?>
      <!--------------------
        END - Mobile Menu
        -------------------->
      <!--------------------
        START - Menu side 
        -------------------->
      <?php include 'partial/menu.php'; ?>
      <!--------------------
        END - Menu side 
        -------------------->
      <div class="content-w">
        <!-- header top ################################################################################################### -->
        <?php include 'partial/header.php'; ?>
        <?php include 'partial/post-container.php'; ?>
      </div>
    </div>
    <div class="display-type"></div>
  </div>
  <!-- all javascrpts liks ################################################################################################### -->
  <?php include 'partial/scripts.php'; ?>
  <!-- other page scripts -->
  <?php include './partial//script-with-php/main-script.php'; ?>
  <?php include './partial//script-with-php/post-script.php'; ?>
</body>

</html>