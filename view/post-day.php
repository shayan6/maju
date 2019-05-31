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
                <?php include 'partial/post-chart-container.php' ?>
            </div>
        </div>
        <div class="display-type"></div>
    </div>
    <!-- all javascrpts liks ################################################################################################### -->
    <?php include 'partial/scripts.php' ?>
    <?php include 'partial/script-with-php/exportTableCSV.php' ?>
    <script>
        $('#postChart').remove(); // this is my <canvas> element
        $('#graph-container').append('<canvas height="50px" id="postChart" width="150px"><canvas>');

        $.get(baseURL + "/countChart/post/" + startDate + "/" + endDate + "/" + 365 + "/" + 1, function(data) {

            if (data.row.length == 0) return;
            var day = [];
            var counts = [];
            var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            ];
            for (var i = 0; i < data.row.length; i++) {
                counts.push(+data.row[i].c);
                day.push(formateDay(data.row[i].day));
            }
            <?php include 'partial/charts/post-chart.js'; ?>

        });


        $.get(baseURL + "/dataTable/post/" + startDate + "/" + endDate + "/" + 365 + "/" + 1, function(data) {

            if (data.row.length === 0) {
                $('#resultBody').empty();
                $('#resultHead').html('<th>NO RECORD FOUND</th>');
                $('#filter-loader').fadeOut();
            } else {

                // $("#resultBody").empty();

                var concatStringHead = '';
                var concatStringBody = '';

                tempArray = Object.entries(data.row[0]);
                for (var j = 0; j < tempArray.length; j++) {
                    concatStringHead += '<th>' + tempArray[j][0] + '</th>';
                }
                $("#resultHead").html(concatStringHead);

                for (var i = 0; i < data.row.length; i++) { //table Loop
                    tempArray = Object.entries(data.row[i]);
                    concatStringBody += '<tr>'; //table result1
                    for (var j = 0; j < tempArray.length; j++) {
                        concatStringBody += '<td>' + tempArray[j][1] + '</td>';
                    }
                    concatStringBody += '</tr>';
                }

                $("#resultBody").html(concatStringBody);
                $('#filter-loader').fadeOut();

            } //else end

        });
    </script>
</body>

</html>