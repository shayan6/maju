<html>

<head>
  <!-- all css liks ################################################################################################### -->
  <?php include 'partial/links.php' ?>

  <style>
    @media (max-width: 1650px){
      .content-box {
          padding: 2rem 6rem;
      }
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
        <?php include 'partial/timeline-container.php' ?>
      </div>
    </div>
    <div class="display-type"></div>
  </div>
  <!-- all javascrpts liks ################################################################################################### -->
  <?php include 'partial/scripts.php' ?>
  <!-- other page scripts -->
  <script src='./js/timeline.js'></script>
  <?php include './partial/script-with-php/main-script.php'; ?>
</body>
</html>