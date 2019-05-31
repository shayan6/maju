<div class="content-box">
    <div class="control-header">
        <div class="row align-items-center">
            <div class="col-6">
                <?php
                  include('partial/form/form.php');
                ?>
            </div>
        </div>
    </div>

    <div class="element-wrapper" id="HTMLtoPDF" style="margin-bottom: 0px; width:100%;">
        <h3 class="element-header">
            Post Trend
        </h3>
        <div class="element-box">
            <div class="el-chart-w" id="graph-container">
                <canvas height="40%" id="postChart" width="100%"></canvas>
            </div>
        </div>
    </div>

    <div class="content-box element-box table-responsive">
        <table class="table table-striped table-lightfont">
            <thead>
                <tr  id="resultHead" >
                    <th>
                        Day
                    </th>
                </tr>
            </thead>
            <tbody id="resultBody">
            </tbody>
        </table>
    </div>
</div>