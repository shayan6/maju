
 <div class="content-box">
     <div class="control-header">
         <div class="row align-items-center">
             <div class="col-6">
                 <?php
                    //   include('form.html'); 
                    ?>
             </div>
         </div>
     </div>

     <div class="pipelines-w" id="HTMLtoPDF">
         <div class="element-wrapper" style="padding-bottom: 0rem; width:100%">
             <h4 class="element-header" style="margin-left: 35px; margin-right: 35px;">
                 Statistics
             </h4>
             <div class="row" style="margin: 20px;">
                 <div class="col-lg-6 col-xxl-6">
                     <div class="pipeline white lined-primary">
                         <div class="pipeline-header">
                             <h5 class="pipeline-name">
                                 Signups
                             </h5>
                             <div class="pipeline-header-numbers">
                                 <div class="pipeline-value">
                                     Last 10 Days:
                                 </div>
                                 <div class="pipeline-count">
                                     Update
                                 </div>
                             </div>
                             <div class="pipeline-settings os-dropdown-trigger">
                                 <i class="os-icon os-icon-hamburger-menu-1"></i>
                                 <div class="os-dropdown">
                                     <div class="icon-w">
                                         <i class="icon-chart"></i>
                                     </div>
                                     <ul>
                                         <li>
                                             <a class="signupTable"><i class="icon-chart"></i><span>View Data Table</span></a>
                                         </li>
                                         <li>
                                             <a id="signupDay"><i class="icon-chart"></i><span>View Statistics In Detail</span></a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="el-chart-w">
                             <canvas height="70px" id="signupChart" width="150px"></canvas>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6 col-xxl-6">
                     <div class="pipeline white lined-success">
                         <div class="pipeline-header">
                             <h5 class="pipeline-name">
                                 Posts
                             </h5>
                             <div class="pipeline-header-numbers">
                                 <div class="pipeline-value parDataHeading">
                                     Last 10 Days:
                                 </div>
                                 <div class="pipeline-count">
                                     Update
                                 </div>
                             </div>
                             <div class="pipeline-settings os-dropdown-trigger">
                                 <i class="os-icon os-icon-hamburger-menu-1"></i>
                                 <div class="os-dropdown">
                                     <div class="icon-w">
                                         <i class="icon-chart"></i>
                                     </div>
                                     <ul>
                                         <li>
                                             <a class="postTable"><i class="icon-chart"></i><span>View Data Table</span></a>
                                         </li>
                                         <li>
                                             <a id="postDay"><i class="icon-chart"></i><span>View Statistics In Detail</span></a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="el-chart-w col-sm-12">
                                 <canvas height="144%" id="postChart"></canvas>
                             </div><br><br>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6 col-xxl-6">
                     <div class="pipeline white lined-warning">
                         <div class="pipeline-header">
                             <h5 class="pipeline-name">
                                 Likes
                             </h5>
                             <div class="pipeline-header-numbers">
                                 <div class="pipeline-value parDataHeading">
                                     Last 10 Days:
                                 </div>
                                 <div class="pipeline-count">
                                     Update
                                 </div>
                             </div>
                             <div class="pipeline-settings os-dropdown-trigger">
                                 <i class="os-icon os-icon-hamburger-menu-1"></i>
                                 <div class="os-dropdown">
                                     <div class="icon-w">
                                         <i class="icon-graph"></i>
                                     </div>
                                     <ul>
                                         <li>
                                             <a class="likeTable"><i class="icon-graph"></i><span>View Data Table</span></a>
                                         </li>
                                         <li>
                                             <a id="likeDay"><i class="icon-graph"></i><span>View Statistics In Detail</span></a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="el-chart-w col-sm-12">
                                 <canvas height="144%" id="likeChart"></canvas>
                             </div><br><br>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6 col-xxl-6">
                     <div class="pipeline white lined-danger">
                         <div class="pipeline-header">
                             <h5 class="pipeline-name">
                                 Comments
                             </h5>
                             <div class="pipeline-header-numbers">
                                 <div class="pipeline-value parDataHeading">
                                     Last 10 Days:
                                 </div>
                                 <div class="pipeline-count">
                                     Update
                                 </div>
                             </div>
                             <div class="pipeline-settings os-dropdown-trigger">
                                 <i class="os-icon os-icon-hamburger-menu-1"></i>
                                 <div class="os-dropdown">
                                     <div class="icon-w">
                                         <i class="icon-chart"></i>
                                     </div>
                                     <ul>
                                         <li>
                                             <a class="commentTable"><i class="icon-chart"></i><span>View Data Table</span></a>
                                         </li>
                                         <li>
                                             <a id="commentDay"><i class="icon-chart"></i><span>View Statistics In Detail</span></a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="el-chart-w col-sm-12">
                                 <canvas height="144%" id="commentChart"></canvas>
                             </div><br><br>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>