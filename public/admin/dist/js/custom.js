$(document).ready(function() {
    $('#blogMetni').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['forecolor', 'backcolor']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });
});

function onIlSelectChange() {
    var selectElement = document.getElementById("ilSelect");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var cityId = selectedOption.getAttribute("IlId");
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var ilceSelect = document.getElementById("ilceSelect");
                ilceSelect.innerHTML = xhr.responseText;
            } else {
                console.error('İlçeleri alma işlemi başarısız oldu.');
            }
        }
    };
    xhr.open("GET", "/ilceler/" + cityId, true);
    xhr.send();
}

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.src = reader.result;
        document.getElementById('imagePreviewContainer').style.display = 'block';
        var oldImage = document.getElementById('old_image');
        if (oldImage) {
            oldImage.style.display = 'none';
        }
    }
    reader.readAsDataURL(event.target.files[0]);
}
function previewImage2(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var imagePreview = document.getElementById('imagePreview2');
        imagePreview.src = reader.result;
        document.getElementById('imagePreviewContainer2').style.display = 'block';
        var oldImage = document.getElementById('old_image2');
        if (oldImage) {
            oldImage.style.display = 'none';
        }
    }
    reader.readAsDataURL(event.target.files[0]);
}

function previewImage3(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var imagePreview = document.getElementById('imagePreview3');
        imagePreview.src = reader.result;
        document.getElementById('imagePreviewContainer3').style.display = 'block';
        var oldImage = document.getElementById('old_image3');
        if (oldImage) {
            oldImage.style.display = 'none';
        }
    }
    reader.readAsDataURL(event.target.files[0]);
}
