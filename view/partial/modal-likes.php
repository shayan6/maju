<style>
    .likes-container {
        font-size: large;
    }

    .likes-container img {

        width: 10%;
        margin-right: 3%;
        border-radius: 50%;

    }

    .likes-container span {

        font-size: small;
        color: #999;
        float: right;
    }
</style>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="likeModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header faded smaller">
                <h5 class="modal-title" id="exampleModalLabel">
                    Likes
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
            </div>
            <div class="modal-body" id="likeModalBody">
            </div>
        </div>
    </div>
</div>