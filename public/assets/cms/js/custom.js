// Preview single image
function previewImage(event, target) {
    const fileInput = event.target;
    const file = fileInput.files[0];
    const imageBlob = new Blob([file], { type: file.type });
    const imageBlobPath = URL.createObjectURL(imageBlob);
    $('img#' + target).attr('src', imageBlobPath);
}

// Preview single image on modal
function previewImageModal(event) {
    const image = $(event.target);
    const imageSrc = image.attr('src');
    const imageAlt = image.attr('alt');

    const imageTarget = $('#modal-image-preview img');
    imageTarget.attr('src', imageSrc);
    imageTarget.attr('alt', imageAlt);
}