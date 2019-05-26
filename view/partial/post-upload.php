<style>
    .input-container {
        /* margin: 3em auto;
        max-width: 300px; */
        background-color: #EDEDED;
        border: 1px solid #DFDFDF;
        border-radius: 5px;
    }

    input[type='file'] {
        display: none;
    }

    .file-info {
        font-size: 0.9em;
    }

    .browse-btn {
        background: #f05152;
        color: #fff;
        min-height: 35px;
        padding: 10px;
        border: none;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .browse-btn:hover {
        background: #ff5152;
    }

    @media (max-width: 300px) {
        button {
            width: 100%;
            border-top-right-radius: 5px;
            border-bottom-left-radius: 0;
        }

        .file-info {
            display: block;
            margin: 10px 5px;
        }
    }

    .upload-project {
        display: none;
    }
    
    @media (min-width: 1200px) {
        .post-box{
            width: 89%;
            padding: 3%
        }
    }
</style>
<div class="element-box post-box" style="margin-left: auto;">
    <div class="row">
        <div class="col-2 col-sm-2">
            <img src="./uploads/<?php echo $_SESSION['image'] ?>" alt="" width="90%" style="border-radius:50%">
        </div>
        <div class="col-10 col-sm-10">
            <form action="" method="POST" id="form" enctype="multipart/form-data">
                <div class="form-group custom-input" onclick="$('.upload-project').slideDown();">
                    <label for="" class="">Share You Work </label><textarea name="description" required="required" class="form-control" placeholder="Write Somethng About Your Work...  (Title Of The Project Will Be The Attached File Name)" type="text"></textarea>
                </div>
                <div class="upload-project">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="input-container">
                                <input name="file" type="file" id="real-input">
                                <button class="browse-btn">
                                    Browse Files
                                </button>
                                <span class="file-info">Upload a file </span>
                            </div>
                        </div>
                        <div class="col-sm-2" style="margin:auto">
                            <button id="btnPost" class="btn btn-primary btn-lg disabled" type="submit" style="width:100%">
                                Post
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    //uplad button #########################################################################################################
    const uploadButton = document.querySelector('.browse-btn');
    const fileInfo = document.querySelector('.file-info');
    const realInput = document.getElementById('real-input');

    uploadButton.addEventListener('click', (e) => {
        realInput.click();
    });

    realInput.addEventListener('change', () => {
        const name = realInput.value.split(/\\|\//).pop();
        const truncated = name.length > 20 ?
            name.substr(name.length - 20) :
            name;

        fileInfo.innerHTML = truncated;
        $('#btnPost').removeClass('disabled');
    });


    //form submit ajax ################################################################################################
    $("#form").on('submit', (function(e) {
        e.preventDefault();
        //if both button is not disabled
        if (!$('#btnPost').hasClass('disabled'))
            $.ajax({
                url: "/maju/view/php/post-upload.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#msg").fadeOut();
                },
                success: function(data) {
                    console.log(data);
                    if (data.trim() == "success") {
                        setTimeout(() => location.reload(), 1500);
                    } else {
                        $("#msg").html('<div class="alert alert-danger" role="alert" style="padding: 1rem .9rem;"><strong>Error! </strong>' + data + '</div>').fadeIn();
                    }
                    setTimeout(() => $("#msg").fadeOut(), 5000);
                },
                error: function(e) {
                    $("#msg").html(e).fadeIn();
                }
            });
    }));

</script>