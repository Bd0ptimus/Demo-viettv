<!doctype html>
<html lang="vi">

@include('layouts.app')
<body style="margin-top:0px;">
    <div class="row d-flex justify-content-center" style=" width:auto; margin:auto; padding:auto; z-index:0;">
        <div class="row d-block justify-content-center" style="width:60%; margin:auto; padding:auto;">
            <div class="row d-flex justify-content-center" style="margin : 30px auto; padding:0px;">
                <h3 class="d-flex justify-content-center" style="padding:0px;">
                    Quản lý tài khoản
                </h3>

            </div>
            <div id="scanner"></div>

            <div class="row d-flex justify-content-center" style="margin : 30px auto ;padding:0px;">
                <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark" id="scanner-form">
                    <i class="fa-solid fa-qrcode"></i> {{ __('Start Scan') }}</a>
                <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark" id="qr-scanner-closer" style="display:none;">
                    <i class="fa-solid fa-ban text-danger"></i> {{ __('End Scan') }}</a>
            </div>
        </div>
    </div>

</body>
<style>
    #scanner{
        padding:0px;
    }
    video{
        width:100% !important;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.7/html5-qrcode.min.js"
    integrity="sha512-dH3HFLqbLJ4o/3CFGVkn1lrppE300cfrUiD2vzggDAtJKiCClLKjJEa7wBcx7Czu04Xzgf3jMRvSwjVTYtzxEA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const qrCodeScanner = new Html5Qrcode('scanner');
    const QRscanning = async () => {
        await Html5Qrcode.getCameras().then(async (devices) => {
            const config = {

                fps: 25, // Set the capture frame rate to 15 FPS.
                qrbox: {
                    width: 220,
                    height : 120,
                }, // Set the QR code scanning box size to 300 pixels.
                aspectRatio: 2.5, // Set the aspect ratio of the QR code scanning box to 1.5.
            };

            const onSuccess = async (decodedText, decodedResult) => {
                // prefix: 'https://coolmate.me'
                console.log('scan success : ', decodedText);
                if (decodedText.startsWith('')) {
                    qrCodeScanner.stop().then((ignore) => {
                        console.log(decodedResult);
                        $('#qr-scanner-closer').hide();
                        $('#scanner-form').show();
                        // window.location.href = decodedText;

                    }).catch((err) => {
                        // Stop failed, handle it.
                        console.log(err);
                    });
                    // console.log(decodedResult);
                    // checkUrl(decodedText);
                }

            }
            const onError = (err) => {
                console.warn(err);
            }
            if (devices.length > 1) {
                await qrCodeScanner.start({
                    facingMode: "environment"
                }, config, onSuccess, onError);
            } else
                await qrCodeScanner.start(devices[0].id, config, onSuccess, onError);
        }).catch(err => {
            console.warn(err)
        });

    }

    $(document).ready(() => {
        $('#imgBackground').remove();

        const scannerToggler = document.getElementById('scanner-form');
        scannerToggler.addEventListener('click', async () => {
            try {
                $('#scanner-form').hide();
                $('#qr-scanner-closer').show();

                await QRscanning();
            } catch (e) {
                console.log(e);
            }
        });
        const closer = document.getElementById('qr-scanner-closer');
        closer.addEventListener('click', async () => {
            $('#scanner-form').show();
            $('#qr-scanner-closer').hide();
            await qrCodeScanner.stop();

        })
    });
</script>
</html>
