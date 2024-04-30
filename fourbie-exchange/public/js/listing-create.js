const imageContainer = document.getElementById("imageContainer");
    
imageContainer.addEventListener("dragstart", function (event) {
    // set imageContainer as the dropzone by adding .dropzone class
    imageContainer.classList.add("dragstart");
    event.dataTransfer.setData("text/plain", event.target.id);
});

imageContainer.addEventListener("dragover", function (event) {
    imageContainer.classList.add("dragover");
    event.preventDefault();
});

imageContainer.addEventListener("drop", function (event) {
    event.preventDefault();
    const id = event.dataTransfer.getData("text/plain");
    const draggedElement = document.getElementById(id);
    const dropzone = event.target.closest(".draggable-image");

    // remove dragover class
    imageContainer.classList.remove("dragover");
    imageContainer.classList.remove("dragstart");

    // remove dragover class from all images
    const draggableImages = document.querySelectorAll(".draggable-image");
    draggableImages.forEach(function (image) {
        image.classList.remove("dragover");
    });

    if (dropzone && draggedElement) {
        dropzone.parentNode.insertBefore(draggedElement, dropzone);
    }
});

// for each image, add a class if it's being dragged over
const draggableImages = document.querySelectorAll(".draggable-image");
draggableImages.forEach(function (image) {
    image.addEventListener("dragover", function (event) {
        image.classList.add("dragover");
        event.preventDefault();
    });

    image.addEventListener("dragleave", function (event) {
        image.classList.remove("dragover");
    });
});