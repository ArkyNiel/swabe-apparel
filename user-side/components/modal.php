<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content border-0 rounded-1 shadow">
            <button type="button" class="btn-close position-absolute end-0 top-0 m-3" data-bs-dismiss="modal"
                aria-label="Close"></button>
            <div class="modal-body d-flex flex-column flex-md-row p-0">
                <!-- Overlay -->
                <div class="col-md-6 d-flex align-items-center justify-content-center bg-light rounded-start-1 p-4 position-relative"
                    style="min-height: 320px;">
                    <div class="img-hover-container w-100 h-100 d-flex align-items-center justify-content-center position-relative"
                        style="cursor: pointer;">
                        <img id="modalProductImage" src="" alt="Product Image"
                            class="img-fluid rounded-1 border w-100 h-100"
                            style="max-height: 260px; object-fit: contain;" />
                        <div class="img-hover-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center rounded-1"
                            style="display: none;">
                            <span class="text-white fw-semibold fs-5"
                                style="text-shadow: 0 2px 8px rgba(0,0,0,0.5);">Full View</span>
                        </div>
                    </div>
                </div>
                <!-- Info Section -->
                <div class="col-md-6 p-4 d-flex flex-column justify-content-center rounded-end-4 bg-white">
                    <h4 id="modalProductName" class="fw-semibold mb-3"></h4>
                    <dl class="row mb-4">
                        <dt class="col-4 text-muted small">Color</dt>
                        <dd class="col-8 mb-2" id="modalProductColor"></dd>
                        <dt class="col-4 text-muted small">Size</dt>
                        <dd class="col-8 mb-2" id="modalProductSize"></dd>
                        <dt class="col-4 text-muted small">Price</dt>
                        <dd class="col-8 mb-0 fw-bold" id="modalProductPrice"></dd>
                    </dl>
                    <button type="button" class="btn w-100 mt-auto rounded-1" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Full Image View -->
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 450px;">
        <div class="modal-content border-0 bg-transparent shadow-none p-0" style="background: transparent;">
            <img id="lightboxImage" src="" alt="Full View"
                style="width: 500px; height: 700px; object-fit: contain; display: block;" />
        </div>
    </div>
</div>

<style>
.img-hover-container {
    position: relative;
    overflow: hidden;
}

.img-hover-overlay {
    background: rgba(30, 30, 30, 0.45);
    backdrop-filter: blur(3px);
    opacity: 0;
    transition: opacity 0.2s;
    pointer-events: none;
}

.img-hover-container:hover .img-hover-overlay,
.img-hover-container:focus .img-hover-overlay {
    opacity: 1;
    display: flex;
    pointer-events: auto;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const imgContainer = document.querySelector('#productModal .img-hover-container');
    const img = document.getElementById('modalProductImage');
    const lightboxModal = new bootstrap.Modal(document.getElementById('lightboxModal'));
    const lightboxImage = document.getElementById('lightboxImage');

    if (imgContainer && img && lightboxImage) {
        imgContainer.addEventListener('click', function() {
            if (img.src) {
                lightboxImage.src = img.src;
                lightboxModal.show();
            }
        });
    }
});
</script>