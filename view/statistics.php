<html>

<head>
    <!-- all css liks ################################################################################################### -->
    <?php include 'partial/links.php' ?>
    <script src="./bower_components/dragula.js/dist/dragula.min.js"></script>
    
</head>

<body>
    <div class="all-wrapper menu-side">
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
                <?php include 'partial/statistics-container.php' ?>
            </div>
        </div>
        <div class="display-type"></div>
    </div>
    <!-- all javascrpts liks ################################################################################################### -->
    <?php include 'partial/scripts.php' ?>
</body>

</html>