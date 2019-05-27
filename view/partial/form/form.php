<style type="text/css">
    .hide-form-button {
        display: none;
    }
</style>

<form action="" class="form-inline">
    <!--
    <div class="form-group mr-3"> 
      <label class="mr-2" for="">Start Date</label>
      <div class="form-control-sm input-group">  -->
    <input id="startDate" name="startDate" placeholder="Start Date" type="text" value="" style="display: none; width: 100px;">
    <!--
        <div class="input-group-addon">
          <i class="icon-calendar"></i>
        </div>  hide start date 
      </div> 
    </div> -->
    <div class="form-group mr-3">
        <label class="mr-2" for="">Date</label>
        <div class="form-control-sm input-group">
            <input id="endDate" name="endDate" placeholder="End Date" type="text" value="" style="display:none; width: 100px;">
            <!--hide date time -->
            <div class="well" style="overflow: auto">
                <div id="reportrange" class="pull-left active" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i> <span id='dateSpan'>Jan 25, 2018 - Aug 14, 2018</span><b class="caret"></b>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {


                        $('#startDate').val(moment().subtract(1, 'month').startOf('month').format('MM/DD/YYYY'));
                        $('#endDate').val(moment().subtract(1, 'month').endOf('month').format('MM/DD/YYYY'));


                        if (querySelector['startDate'] === 'undefined' || querySelector['startDate'] === undefined || querySelector['endDate'] === 'undefined' || querySelector['endDate'] === undefined) {

                            var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                            var mydate1 = new Date('01/25/2018');
                            var mydate2 = new Date();

                            var str1 = month[mydate1.getMonth()] + ' ' + mydate1.getDate() + ',' + mydate1.getFullYear();
                            var str2 = month[mydate2.getMonth()] + ' ' + mydate2.getDate() + ',' + mydate2.getFullYear();

                            $('#reportrange span').html(str1 + ' - ' + str2);

                            // $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
                        } else {

                            var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                            var mydate1 = new Date(querySelector['startDate']);
                            var mydate2 = new Date(querySelector['endDate']);

                            var str1 = month[mydate1.getMonth()] + ' ' + mydate1.getDate() + ',' + mydate1.getFullYear();
                            var str2 = month[mydate2.getMonth()] + ' ' + mydate2.getDate() + ',' + mydate2.getFullYear();

                            $('#reportrange span').html(str1 + ' - ' + str2);
                        }


                        var cb = function(start, end, label) {
                            //console.log('FUNC: cb',start.toISOString(), end.toISOString(), label);
                            $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
                            $('#startDate').val(start.format('MM/DD/YYYY'));
                            $('#endDate').val(end.format('MM/DD/YYYY'));
                            $("#submit").click();
                        }

                        var ranges = {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment()],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                            'Last 2 Months': [moment().subtract(2, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                            'Last 3 Months': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                            'All Time': [new Date('01/25/2018'), moment()],
                        };

                        var optionSet1 = {
                            startDate: mydate1,
                            endDate: mydate2,
                            minDate: '01/01/2019',
                            maxDate: moment().format('MM/DD/YYYY'),
                            showDropdowns: true,
                            showWeekNumbers: true,
                            timePicker: false,
                            timePickerIncrement: 1,
                            timePicker12Hour: true,
                            showRangeInputsOnCustomRangeOnly: true,
                            ranges: ranges,
                            opens: 'right',
                            buttonClasses: ['btn btn-default'],
                            applyClass: 'btn-small btn-success btn-apply',
                            cancelClass: 'btn-small',
                            format: 'MM/DD/YYYY',
                            separator: ' to ',
                            locale: {
                                applyLabel: 'Submit',
                                cancelLabel: 'Clear',
                                fromLabel: 'From',
                                toLabel: 'To',
                                customRangeLabel: 'Custom',
                                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                firstDay: 1
                            }
                        };

                        var optionSet2 = {
                            startDate: moment().subtract(9, 'days'),
                            endDate: moment(),
                            opens: 'left',
                            showRangeInputsOnCustomRangeOnly: true
                        };

                        var optionSet3 = {
                            startDate: moment().subtract(16, 'days'),
                            endDate: moment(),
                            opens: 'left',
                            showRangeInputsOnCustomRangeOnly: true,
                            ranges: ranges
                        };

                        $('#reportrange').daterangepicker(optionSet1, cb);
                        $('#reportrange').on('show.daterangepicker', function() {
                            console.log("show daterangepicker fired by input");
                        });
                        $('#input-icon').daterangepicker(optionSet1, cb);
                        $('#input-icon').on('show.daterangepicker', function() {
                            console.log("show daterangepicker fired by icon");
                        });
                        $('#options1').click(function() {
                            $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
                        });
                        $('#options2').click(function() {
                            $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
                            console.log("show daterangepicker fired by lastdate");
                        });
                        $('#options3').click(function() {
                            $('#reportrange').data('daterangepicker').setOptions(optionSet3, cb);
                        });
                        $('#destroy').click(function() {
                            $('#reportrange').data('daterangepicker').remove();
                        });
                    });
                </script>

            </div>

            <div class="input-group-addon" style="background-color: #00c367;" id="input-icon">
                <i class="icon-calendar"></i>
            </div>
        </div>
    </div>
    <input id="locationName" name="location" type="text" style="display: none">
    </div>
    <div class="col-6 text-right">
        <a id="excelButton" class="btn btn-sm btn-link btn-upper mr-2 hidden-md-down" href="javascript:void(0)" onclick="exportTableToCSV('members.csv')"><i class="os-icon os-icon-ui-44"></i><span>Download Excel</span></a>
        <a id="pdfButton" class="btn btn-sm btn-link btn-upper mr-3 hidden-md-down" href="javascript:void(0)" onclick="genPDF()"><i class="os-icon os-icon-ui-44"></i><span>Download PDF</span></a>
        <button id="submit" class="btn btn-success btn-upper hide-form-button" type="submit" name="submit">
            <i class="icon-pie-chart" style="margin-right: 10px;"></i><span>View Statistics</span>
        </button>
</form>
<script type="text/javascript">
    $('#locationName').val(querySelector['location']);
</script>