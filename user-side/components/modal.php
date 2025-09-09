<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 800px;">
        <div class="modal-content border-0 rounded-3 shadow-lg">
            <button type="button" class="btn-close position-absolute end-0 top-0 m-3 bg-white rounded-circle p-2" 
                data-bs-dismiss="modal" aria-label="Close" style="z-index: 1050; background-color: #101820;">
                <span class="visually-hidden">Close</span>
            </button>
            <div class="modal-body d-flex flex-column flex-md-row p-0">

            <div class="col-md-6 d-flex align-items-center justify-content-center bg-light rounded-start-3 p-4 position-relative"
                    style="min-height: 400px;">
                    <div class="img-hover-container w-100 h-100 d-flex align-items-center justify-content-center position-relative"
                        style="cursor: pointer; transition: all 0.3s ease;">
                        <img id="productModalProductImage" src="" alt="Product Image"
                            class="img-fluid rounded-2 border shadow-sm w-100 h-100"
                            style="max-height: 320px; object-fit: contain; transition: transform 0.3s ease;" />
                        <div class="img-hover-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center rounded-2"
                            style="background: rgba(0,0,0,0.7); opacity: 0; transition: opacity 0.3s ease;">
                            <span class="text-white fw-semibold fs-5 d-flex align-items-center"
                                style="text-shadow: 0 2px 8px rgba(0,0,0,0.5);">
                                <i class="fas fa-expand me-2"></i>Full View
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 p-5 d-flex flex-column justify-content-center rounded-end-3 bg-white">
                    <div class="mb-4">
                        <h3 id="productModalProductName" class="fw-bold mb-4 text-dark" style="font-size: 1.5rem; line-height: 1.3;"></h3>
                        
                        <div class="product-details">
                            <div class="detail-item d-flex align-items-center mb-3">
                                <div class="detail-label me-3">
                                    <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-medium">Color</span>
                                </div>
                                <div class="detail-value">
                                    <span id="productModalProductColor" class="fw-semibold text-dark"></span>
                                </div>
                            </div>
                            
                            <div class="detail-item d-flex align-items-center mb-3">
                                <div class="detail-label me-3">
                                    <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-medium">Size</span>
                                </div>
                                <div class="detail-value">
                                    <span id="productModalProductSize" class="fw-semibold text-dark"></span>
                                </div>
                            </div>
                            
                            <div class="detail-item d-flex align-items-center mb-4">
                                <div class="detail-label me-3">
                                    <span class="badge bg-primary text-white px-3 py-2 rounded-pill fw-medium">Price</span>
                                </div>
                                <div class="detail-value">
                                    <span id="productModalProductPrice" class="fw-bold text-primary fs-4">₱</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-auto">
                        <button type="button" class="btn btn-outline-secondary btn-outline-gold w-100 py-3 rounded-3 fw-semibold" 
                            data-bs-dismiss="modal" style="border-width: 1px; border-color: #101820; color: #101820;">
                            <i class="fas fa-times me-2"></i>Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Full Image View -->
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true" data-bs-keyboard="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 90vw;">
        <div class="modal-content border-0 bg-transparent shadow-none p-0 d-flex justify-content-center align-items-center" style="background: rgba(0,0,0,0.5);">
            <div class="position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2 bg-white rounded-circle p-2" 
                    data-bs-dismiss="modal" aria-label="Close" style="z-index: 1050; opacity: 0.9; box-shadow: 0 2px 8px rgba(0,0,0,0.3); background-color: #101820;">
                </button>
                <img id="lightboxImage" src="" alt="Full View"
                    style="
                        max-width: 90vw;
                        max-height: 80vh;
                        object-fit: contain;
                        display: block;
                        border-radius: 0.5rem;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
                        user-select: none;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        pointer-events: none;
                    " />
            </div>
        </div>
    </div>
</div>

<style>

</style>

<link rel="stylesheet" href="../../assets/css/cart.css">
<link rel="stylesheet" href="../../assets/css/add_to_cart.css">
<script src="../../assets/js/modal.js"></script>