<style>
    /* file container */

    @font-face {
        font-family: FontAwesome;
        src: url(data:application/x-font-woff;charset=utf-8;base64,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) format('woff');
    }

    .content,
    .file {
        position: relative;
        top: calc(50% - 55px);
        background: #f8f8f8;
        border-radius: 3px;
        overflow: hidden
    }

    .content {
        left: calc(50% - 300px);
        width: 600px;
        height: 50px;
        text-align: center;
        border: 1px solid #B0BEC5;
    }

    .file {
        left: calc(18% - 115px);
        width: 50%;
        height: 36px;
        border: 1px solid #047bf8;
        opacity: 0;
        transition: .8s;
    }

    .text {
        margin-left: 45px;
        font: bold 11pt Verdana;
        line-height: 36px;
        color: #333
    }

    .text:before {
        content: '\f15c';
        position: absolute;
        font: 16pt FontAwesome;
        transform: translate(-28px, 7px);
    }

    /* 
        .text:after {
            content: '(83.1 kB)';
            position: absolute;
            margin-left: 8px;
            font: 10pt Verdana;
            color: #626262;
            transform: translate(0, 10px);
        } */

    .field {
        position: absolute;
        top: 0;
        right: 0;
        width: 50px;
        height: 36px;
        color: #fff;
        background: #047bf8;
        font: 16pt FontAwesome;
        text-align: center;
        line-height: 36px;
        cursor: pointer;
        transition: .2s;
    }

    .field:hover {
        background: #047bf8
    }
</style>

<div class="content-panel-toggler">
    <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
</div>

<div class="content-i mainPage">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                Your Post
            </h6>
            <div class="element-box-tp">
                <div class="activity-boxes-w">
                    <!-- Activity jquery fetch -->
                </div>
            </div>
        </div>
    </div>
    <!--------------------
        START - Sidebar
        -------------------->
    <?php include 'sidebar.php' ?>
    <!--------------------
        END - Sidebar
        -------------------->
</div>


<!-- MOdal likes of users ################################################################# -->
<?php include 'modal-likes.php' ?>