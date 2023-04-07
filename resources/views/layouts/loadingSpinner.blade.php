<!doctype html>
<html lang="vi">

<style>
    .loading {
        z-index: 20;
        position: fixed;
        top: 0;
        left: -5px;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .loading-content {
        position: absolute;
        border: 16px solid #f3f3f3;
        border-top: 16px solid #840123;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        top: 50%;
        transform: translateY(-50%);
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<body>
    <div class="container" >

        <section id="loading" class="d-flex justify-content-center">
            <div id="loading-content"></div>
        </section>

    </div>
</body>

<script type="text/javascript">
    function startLoading() {
        $('#loading').addClass('loading');
        $('#loading-content').addClass('loading-content');
    }

    function endLoading() {
        $('#loading').removeClass('loading');
        $('#loading-content').removeClass('loading-content');
    }
</script>

</html>
