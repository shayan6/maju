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
                <?php include 'partial/statistics-container.php' ?>
            </div>
        </div>
        <div class="display-type"></div>
    </div>
    <!-- all javascrpts liks ################################################################################################### -->
    <?php include 'partial/scripts.php' ?>
    <script>

        // window location ########################################################################
        
       $('#signupDay').on('click',function(){
          window.location.href='signup-day.php?startDate='+querySelector['startDate']+'&endDate='+querySelector.endDate+'&location=Installs Trend';
        });

        //last 10 days ********************************************************************************************************************************
        if (querySelector['startDate'] === 'undefined' || querySelector['startDate'] === undefined || querySelector['endDate'] === 'undefined' || querySelector['endDate'] === undefined) {

            var startDate = moment().subtract(10,'d').format('YYYY-MM-DD 00:00:00');

        } else {

            var date1 = new Date(startDate);
            var date2 = new Date(endDate);
            var timeDiff = Math.abs(date2.getTime() - date1.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;

            if (diffDays > 10) {

                var startDate = moment(endDate).subtract(10,'d').format('YYYY-MM-DD 00:00:00');
            }

        }

        $.get(baseURL + "/countChart/user/" + startDate + "/" + endDate + "/" + 10 + "/" + 1, function(data) {

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
            //signup chart.js
            <?php include 'partial/charts/signup-chart.js' ?>

        });
        $.get(baseURL + "/countChart/post/" + startDate + "/" + endDate + "/" + 10 + "/" + 1, function(data) {


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
            //post chart.js
            <?php include 'partial/charts/post-chart.js' ?>

        });
        $.get(baseURL + "/countChart/like/" + startDate + "/" + endDate + "/" + 10 + "/" + 1, function(data) {

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
            //like chart.js
            <?php include 'partial/charts/like-chart.js' ?>

        });
        $.get(baseURL + "/countChart/comment/" + startDate + "/" + endDate + "/" + 10 + "/" + 1, function(data) {

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
            //comment chart.js
            <?php include 'partial/charts/comment-chart.js' ?>

        });
    </script>
</body>

</html>