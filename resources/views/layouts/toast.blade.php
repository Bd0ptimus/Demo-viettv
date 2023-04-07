<style>
    .notification {
        position: fixed;
        top: 70px;
        right: 10px;
    }
    #para {
        border: 1px solid black;
        width: 300px;
        height: 100px;
        overflow: scroll;
    }
    .toast-success-color {
        color: green;
        background-color: #e0e0e0;
    }
    .toast-fail-color {
        color: red;
        background-color: #e0e0e0;
    }
    h1 {
        color:green;
    }

    #toast-close-btn{
        float:right;
        border :0px;
    }
</style>
<div id="notification-success" class="toast toast-success-color notification"  data-delay="2000" style="z-index:3000;">
    <div class="toast-header toast-success-color d-flex justify-content-between">
        <span>
            <strong class="mr-auto"><i class="fa-solid fa-check" style="color:green;"></i></strong>
            <small style="color: black">Gần đây</small>
        </span>


        <button onclick="closeToast(0)" id="toast-close-btn" type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="toast-body" id="toast-success-text">

    </div>
</div>

<div id="notification-fail" class="toast toast-fail-color notification"  data-delay="4000" style="z-index:3000;">
    <div class="toast-header toast-fail-color d-flex justify-content-between">
        <span>
            <strong class="mr-auto"><i class="fa-solid fa-x" style="color:red;"></i></strong>
            <small style="color: black">Gần đây</small>
        </span>


        <button onclick="closeToast(1)" type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="toast-body" id="toast-fail-text">

    </div>
</div>
<script>
    function closeToast(indexToast){
        switch(indexToast){
            case (0): //success
                $('#notification-success').toast('hide')
                break
            case (1): //fail
                $('#notification-fail').toast('hide')
                break
        }

    }
</script>
