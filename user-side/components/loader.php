<link rel="stylesheet" href="../../assets/css/loader.css">

<div class="loader-container" id="pageLoader">
    <div class="loader"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const loader = document.getElementById('pageLoader');
    
    // Wait for everything to be fully loaded the page
    window.addEventListener('load', () => {
        loader.classList.add('hide');
    });
});

// to show loader
function showLoader() {
    document.getElementById('pageLoader').classList.remove('hide');
}

// to hide
function hideLoader() {
    document.getElementById('pageLoader').classList.add('hide');
}
</script> 