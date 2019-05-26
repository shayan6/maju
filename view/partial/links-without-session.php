<title>Muhammad Ali Jinnah</title>
<meta charset="utf-8">
<meta content="ie=edge" http-equiv="x-ua-compatible">
<meta content="template language" name="keywords">
<meta content="Tamerlan Soziev" name="author">
<meta content="Admin dashboard html template" name="description">
<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="favicon.png" rel="shortcut icon">
<link href="apple-touch-icon.png" rel="apple-touch-icon">
<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
</script>
<link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
<link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
<link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
<link href="css/main.css?version=3.5.1" rel="stylesheet">
<style>
    .cke {
        visibility: hidden;
    }
</style>
<link href="icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

<!-- New CSS ############################################################################################## -->
<link href="bower_upgrade/main.css?version=4.4.1" rel="stylesheet">
<link href="bower_upgrade/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css">

<!-- CSS define by me -->
<link href="css/maju.css?version=3.5.1" rel="stylesheet">

<!-- js on top -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<script src="bower_components/moment/moment.js"></script>

<script>
    // base url ############################################
    var baseURL = "http://localhost/maju/index.php";

    // get JS ############################################
    var parts = window.location.search.substr(1).split("&");
    var querySelector = {};
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        querySelector[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }
    
    // startDate and endDate
    if (querySelector['startDate'] === 'undefined' || querySelector['startDate'] === undefined) {

        var startDate = '2019-01-01 00:00:00';
        if (querySelector['endDate'] === 'undefined' || querySelector['endDate'] === undefined) {
            var endDate = moment().format('YYYY-MM-DD 23:59:59');
        } else {
            var endDate = moment(querySelector.endDate).format('YYYY-MM-DD 23:59:59');
        }
    } else {
        var startDate = moment(querySelector['startDate']).format('YYYY-MM-DD 00:00:00');
        var endDate = moment(querySelector.endDate).format('YYYY-MM-DD 23:59:59');
    }

    console.log({startDate,endDate})

</script>