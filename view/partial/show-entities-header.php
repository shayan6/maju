<style type="text/css">
    .page-link {
        color: #00c367;
    }
</style>
<div class="row">
    <div class="col-md-7">
        <div class="dataTables_length" id="dataTable1_length">
            <label>Show
                <select id="pageSize" class="form-control-sm" style="width: 80px;">
                    <option value="7">7</option>
                    <option value="14">14</option>
                    <option value="21">21</option>
                    <option value="28">28</option>
                    <option value="35">35</option>
                    <option value="42">42</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="365">365</option>
                </select> Days
            </label>
        </div>
    </div>
    <div class="col-sm-12 col-md-5">
        <ul class="pagination" style="float: right;">
            <li class="btn-sm paginate_button page-item">
                <a id="firstPage" onclick="ProcessOnChange(1)" style="cursor:pointer; " class="page-link">
                    <<< </a> </li> <li class="btn-sm paginate_button page-item">
                        <a id="prevPages" onclick="ProcessOnChange(1)" style="cursor:pointer; " class="page-link">Prev Day</a>
            </li>
            <li class="btn-sm paginate_button page-item active" id='pageNo1'>
                <a href="#" id="btn" class="page-link">1</a>
            </li>
            <li class="btn-sm paginate_button page-item">
                <a id="nextPages" onclick="ProcessOnChange(2)" style="cursor:pointer;" class="page-link">Next Day</a>
            </li>
            <li class="btn-sm paginate_button page-item">
                <a id="lastPage" style="cursor:pointer;" class="page-link"> >>> </a>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $('.element-to-hide').hide();
</script>