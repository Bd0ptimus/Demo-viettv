<div class="row mb-3">
    <label for="description" class="col-md-4 col-form-label text-md-end">Ảnh hóa
        đơn</label>
    <div class="col-md-6">
        <div class="row d-flex justify-content-center">
            <div class="upload-btn-wrapper">
                <button class="normal-button" disabled><i class="fa-solid fa-upload"></i>
                    Upload ảnh hóa đơn</button>
                <input type="file" multiple="multiple" name="desPhotoUpload[]" placeholder="Choose image"
                    id="desPhotoUpload" class="normal-button" style="width:170px;">
            </div>
        </div>
    </div>


    <div class="row d-flex justify-content-center">
        <span class="text-danger" id="desPhotoUpload-warning"></span>
    </div>
    <div class="row d-flex justify-content-center" id="desPhotoUpload-preview-sec">

    </div>
</div>

<style>
    /*image upload container*/
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }


    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }


    .preview-image-sec {
        height: 100px;
        width: 130px;
        background-color: black;
        display: flex;
        justify-content: center;
        overflow: hidden;
        border-radius: 10px;
        position: relative;
        margin: 5px;
        cursor: pointer;
    }

    .previewImage-delete-icon {
        position: absolute;
        top: 10px;
        right: 5px;
        color: red;
    }

    .previewImage-delete-icon:hover {
        cursor: pointer;
        color: #1d8daf;
        transition: 0.5s;
    }

    .upload-image {
        height: 100%;
        width: auto;
        object-fit: cover;

    }
</style>

<script>
    var desPhotoExist = new DataTransfer();

    function removePreviewImageInMultiple(index, idForRemove, inputId) {
        // //check delete
        // console.log("multiple file before delete: ");
        // const filecheck = document.getElementById(inputId).files;
        // for (let i = 0; i < filecheck.length; i++) {
        //     console.log('file before : ', filecheck[i]);
        // }

        // const dt = new DataTransfer()
        desPhotoExist = new DataTransfer();
        const input = document.getElementById(inputId)
        const {
            files
        } = input

        console.log('index for remove : ', index);
        for (let i = 0; i < files.length; i++) {
            const file = files[i]
            if (index !== i) {
                console.log('not remove i : ', i);
                desPhotoExist.items.add(file) // here you exclude the file. thus removing it.
            }
        }
        input.files = desPhotoExist.files;
        $(`#${idForRemove}`).empty();

        var newListFiles = $(`#${inputId}`).prop('files');
        for (let i = 0; i < newListFiles.length; i++) {
            let reader = new FileReader();

            reader.onload = (e) => {
                console.log('check file multiple: ', i);
                $(`#${idForRemove}`).append(`
                            <div class="preview-image-sec">
                                <img class="upload-image" src="${e.target.result}" alt="logo upload" onclick="showFullImage('${e.target.result}')">
                                <i class="previewImage-delete-icon fa-solid fa-square-xmark fa-xl" onclick="removePreviewImageInMultiple(${i}, '${idForRemove}', '${inputId}')"></i>
                            </div>
                        `);
            }
            reader.readAsDataURL(newListFiles[i]);
        }

        // //Test
        // console.log("multiple file after delete: ");
        // const filecheckafter = document.getElementById('desPhotoUpload').files;
        // for (let i = 0; i < filecheckafter.length; i++) {
        //     console.log('file before : ', filecheckafter[i]);
        // }
    }

    $(document).ready(function() {

        $('#desPhotoUpload').on('change', function() {
            var filesTypesAccept = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
            var filesAmount = this.files.length;
            $('#desPhotoUpload-preview-sec').empty();
            for (let i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                var extension = this.files[i].name.split('.').pop().toLowerCase();
                fileExtensionAccept = filesTypesAccept.indexOf(extension) > -1;
                if (fileExtensionAccept) {
                    fileSizeAccept = this.files[i].size < 15728640;
                    if (fileSizeAccept) {
                        desPhotoExist.items.add(this.files[i]);
                        $('#desPhotoUpload-warning').text('');
                    } else {
                        $('#desPhotoUpload-warning').text(
                            'Kích thước ảnh quá lớn! Mỗi ảnh được chọn phải có kích thước không lớn hơn 15mb.'
                        );
                    }
                } else {
                    $('#desPhotoUpload-warning').text(
                        'Định dạng file không được chấp nhận! Chỉ chấp nhận ảnh JPG, JPEG, PNG, GIF, AVG.'
                    );
                }
            }

            const input = document.getElementById('desPhotoUpload');

            input.files = desPhotoExist.files;
            var filesAdd = $(`#desPhotoUpload`).prop('files');
            for (let i = 0; i < filesAdd.length; i++) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    console.log('check file multiple: ', i);
                    $('#desPhotoUpload-preview-sec').append(`
                            <div class="preview-image-sec" >
                                <img class="upload-image" src="${e.target.result}" alt="logo upload" onclick="showFullImage('${e.target.result}')">
                                <i class="previewImage-delete-icon fa-solid fa-square-xmark fa-xl" onclick="removePreviewImageInMultiple(${i}, 'desPhotoUpload-preview-sec', 'desPhotoUpload')"></i>
                            </div>
                        `);
                }
                reader.readAsDataURL(filesAdd[i]);
            }

            // //Test
            // console.log('file after append');
            // const filecheckafter = document.getElementById('desPhotoUpload').files;
            // for (let i = 0; i < filecheckafter.length; i++) {
            //     console.log('file append : ', filecheckafter[i]);
            // }

        });
    })
</script>
