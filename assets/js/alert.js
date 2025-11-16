// Show alert function
function showAlert(msg, type) {
    document.querySelectorAll('.alert').forEach(a => a.remove());
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    alert.style.cssText = 'top:20px;right:20px;z-index:9999;min-width:300px;';
    alert.innerHTML = `${msg}<button class="btn-close" data-bs-dismiss="alert"></button>`;
    document.body.appendChild(alert);
    setTimeout(() => alert.remove(), 5000);
}
