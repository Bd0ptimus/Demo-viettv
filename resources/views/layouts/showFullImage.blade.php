<div class="modal fade" id="fullInmageModal" tabindex="-1" aria-labelledby="fullInmageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" id="fullInmageModalDialog">
        <div class="modal-content" id="fullInmageModalContent">
            <div class="modal-header">
                <h5 class="modal-title" id="fullInmageLabel">Ảnh</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <img id="fullImageSrc">
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>

<style>
    #fullInmageModalDialog{
        margin:0px;
        width:100vw;
        height:100%;
        max-width:100vw;
        background-color:rgba(0,0,0,0.3);
    }
    #fullInmageModalContent{
        height:100%;
    }
    #fullImageSrc{
        width : auto;
        height:100%;
    }
</style>

<script>
    function showFullImage(url){
        $('#fullImageSrc').attr('src', url);
        $('#fullInmageModal').modal('show');
    }
</script>
