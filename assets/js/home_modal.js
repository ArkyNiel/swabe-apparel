function closeSwabeModal() {
  const modal = document.getElementById("swabeModal");
  const backdrop = document.getElementById("modalBackdrop");

  // bug sa backdrop
  modal.style.display = "none";
  backdrop.style.display = "none";

  modal.classList.remove("show", "fade");
  backdrop.classList.remove("show", "fade");

  document.body.classList.remove("modal-open");

  modal.removeAttribute("style");
  backdrop.removeAttribute("style");

  backdrop.style.zIndex = "-1";

  backdrop.style.backgroundColor = "transparent";
  backdrop.style.background = "transparent";
}

document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("swabeModal");
  const backdrop = document.getElementById("modalBackdrop");

  modal.style.display = "block";
  modal.classList.add("show");
  backdrop.style.display = "block";
  backdrop.classList.add("show");
  document.body.classList.add("modal-open");

  modal.addEventListener("click", function (e) {
    if (e.target === modal) {
      closeSwabeModal();
    }
  });

  // Close modal with Escape key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      closeSwabeModal();
    }
  });
});
