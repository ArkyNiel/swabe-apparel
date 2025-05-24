

<div class="loader-container" id="pageLoader">
    <div class="loader"></div>
</div>

<style>
.loader-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.9);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.loader {
    width: 50px;
    aspect-ratio: 1;
    display: grid;
    border: 4px solid #0000;
    border-radius: 50%;
    border-right-color:rgb(0, 0, 0);
    animation: l15 1s infinite linear;
}

.loader::before,
.loader::after {    
    content: "";
    grid-area: 1/1;
    margin: 2px;
    border: inherit;
    border-radius: 50%;
    animation: l15 2s infinite;
}

.loader::after {
    margin: 8px;
    animation-duration: 3s;
}

@keyframes l15 { 
    100% { transform: rotate(1turn) }
}

.hide {
    display: none;
}
</style>

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