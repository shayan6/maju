<html>

<head>
    <!-- all css liks ################################################################################################### -->
    <?php include 'partial/links.php' ?>
    <script src="./bower_components/dragula.js/dist/dragula.min.js"></script>

    <style type="text/css">
        .legend-pin,
        .legend-value {
            margin-left: 2px;
            font-size: large;
        }

        .input-group-addon {
            color: #ffffff;
        }

        .os-dropdown {
            right: 245px;
            bottom: 10px;
        }
    </style>
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
                <?php include 'partial/signup-chart-container.php' ?>
            </div>
        </div>
        <div class="display-type"></div>
    </div>
    <!-- all javascrpts liks ################################################################################################### -->
    <?php include 'partial/scripts.php' ?>
    <?php include 'partial/script-with-php/exportTableCSV.php' ?>
    <script>
        // $.get(baseURL + "/countChart/user/" + startDate + "/" + endDate + "/" + 10 + "/" + 1, function(data) {

        //     if (data.row.length == 0) return;
        //     var day = [];
        //     var counts = [];
        //     var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        //         "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        //     ];
        //     for (var i = 0; i < data.row.length; i++) {
        //         counts.push(+data.row[i].c);
        //         day.push(formateDay(data.row[i].day));
        //     }
        //     <?php // include 'partial/charts/signup-charts.js'; ?>

        // });
        
    </script>
</body>

</html>