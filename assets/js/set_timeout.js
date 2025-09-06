setTimeout(() => {
  const alert = document.getElementById("successAlert");
  if (alert) {
    alert.classList.remove("show");
    setTimeout(() => alert.remove(), 150);
  }
}, 5000);
