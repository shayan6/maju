<html>

<head>
  <!-- all css liks ################################################################################################### -->
  <?php include 'partial/links.php' ?>
  <link href="./bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="./bower_components/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">

  <link rel="stylesheet" href="./css/bootstrap-multiselect.css" type="text/css">
  <script type="text/javascript" src="./js/bootstrap-multiselect.js"></script>

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
        <?php include 'partial/search-container.php' ?>
      </div>
    </div>
    <div class="display-type"></div>
  </div>
  <!-- all javascrpts liks ################################################################################################### -->
  <?php include 'partial/scripts.php' ?>
  <!-- other page scripts -->
  <!-- <script src='./js/timeline.js'></script> -->
  <?php include './partial/script-with-php/main-script.php'; ?>
  <script src="./bower_components/dragula.js/dist/dragula.min.js"></script>
  <script src="./bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
  <script src="./bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
</body>
<?php include 'partial/script-with-php/search-script.php' ?>

</html>