<html>

<head>
  <!-- all css liks ################################################################################################### -->
  <?php include 'partial/links.php' ?>

  <!-- profile style ############################################### -->
  <link href="css/profile.css" rel="stylesheet" />

  <!-- Image Cropper Jquery -->
  <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">

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
        <?php include 'partial/profile-user.php'; ?>
      </div>
    </div>
    <div class="display-type"></div>
  </div>
  <!-- all javascrpts liks ################################################################################################### -->
  <?php include 'partial/scripts.php'; ?>
  <?php include 'partial/script-with-php/profile-script.php'; ?>
  <?php include './partial/script-with-php/main-script.php'; ?>
</body>

</html>