<div class="d-flex justify-content-between">
    <div>
        <a href='#'
       class="btn-sm btn btn-primary flex-wrap" data-bs-toggle="modal"
            data-bs-target="#fileModalEdit_"><i class="fa fa-image px-1"></i>Upload Image</a>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-3 mt-sm-3 mt-lg-0 mt-md-0">
        <input type="hidden" name="image_id" id="selectedImageId">
        <span id="displaySelectedImageId" class="img-fluid"></span>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="fileModalEdit_" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel_"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    Upload Image
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeInnerModal()"></button>
            </div>
            <div class="modal-body">

                <div class="d-flex flex-wrap">
                    @foreach ($all_images as $image)
                        <img src="{{ asset('../uploads/profile/' . $image->name) }}"
                            class="img-fluid m-2 clickable-image" alt="" style="width: 200px; height: 200px;"
                            data-image-id="{{ $image->id }}">
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-primary" data-bs-dismiss="modal">Select</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const clickableImages = document.querySelectorAll('.clickable-image');
        const selectedImageIdField = document.getElementById('selectedImageId');
        const displaySelectedImageId = document.getElementById('displaySelectedImageId');

        clickableImages.forEach(image => {
            image.addEventListener('click', function() {
                const clickedImageId = this.getAttribute('data-image-id');
                console.log('Selected Image ID:', clickedImageId);

                selectedImageIdField.value = clickedImageId;

                // Display the image instead of the ID
                displaySelectedImageId.innerHTML =
                    `<img src="${this.src}" alt="Selected Image" style="max-width: 200px; max-height: 200px;">`;

                clickableImages.forEach(img => {
                    img.style.border = 'none';
                });

                this.style.border = '3px solid black'; // Adjust styling as needed
            });
        });
    });
</script>
