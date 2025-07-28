document.addEventListener("DOMContentLoaded", () => {
  // Success popup fade in/out
  const popup = document.getElementById("successPopup");
  if (popup) {
    setTimeout(() => popup.classList.add("show"), 10);
    setTimeout(() => {
      popup.classList.remove("show");
      setTimeout(() => {
        if (popup.parentNode) popup.parentNode.removeChild(popup);
      }, 300);
    }, 2500);
  }

  // Load banners on page load
  loadCurrentBanners();
  loadBanners();

  // Event delegation for pagination clicks
  const pag = document.getElementById("banner-pagination");
  pag.addEventListener("click", (e) => {
    if (e.target.classList.contains("page-link")) {
      e.preventDefault();
      const page = parseInt(e.target.getAttribute("data-page"));
      if (!isNaN(page)) {
        loadBanners(page);
      }
    }
  });
});

function renderBanners(banners) {
  const gallery = document.getElementById("banner-gallery");
  if (!banners.length) {
    gallery.innerHTML =
      '<div class="col-12"><p class="text-muted">No banners in the gallery yet.</p></div>';
    return;
  }
  let html = "";
  banners.forEach((banner) => {
    html += `
            <div class="banner-col">
                <img src="./../assets/img/${banner.image_path}" 
                     class="img-fluid rounded landscape-img"
                     alt="Banner ${banner.id}"
                     loading="lazy">
            </div>
        `;
  });
  gallery.innerHTML = html;
}

function renderPagination(current, total) {
  const pag = document.getElementById("banner-pagination");
  if (total <= 1) {
    pag.innerHTML = "";
    return;
  }
  let html = `<nav><ul class="pagination pagination-sm m-0">`;
  html += `<li class="page-item${current <= 1 ? " disabled" : ""}">
                <a class="page-link" href="#" data-page="${
                  current - 1
                }">Previous</a>
            </li>`;
  for (let i = 1; i <= total; i++) {
    html += `<li class="page-item${i === current ? " active" : ""}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                 </li>`;
  }
  html += `<li class="page-item${current >= total ? " disabled" : ""}">
                <a class="page-link" href="#" data-page="${
                  current + 1
                }">Next</a>
            </li>`;
  html += `</ul></nav>`;
  pag.innerHTML = html;
}

function loadBanners(page = 1) {
  fetch(`./../back-end/admin-side/get_banners.php?page=${page}`)
    .then((res) => res.json())
    .then((data) => {
      renderBanners(data.banners);
      renderPagination(data.page, data.total_pages);
    });
}

function loadCurrentBanners() {
  fetch("./../back-end/admin-side/get_banners.php?page=1&limit=5")
    .then((res) => res.json())
    .then((data) => {
      renderCurrentBanners(data.banners);
    });
}

function renderCurrentBanners(banners) {
  const current = document.getElementById("current-banners");
  if (!banners.length) {
    current.innerHTML =
      '<div class="col-12"><p class="text-muted">No banners uploaded yet.</p></div>';
    return;
  }
  let html = "";
  banners.forEach((banner) => {
    const imgPath = banner.image_path.replace(/^\/+/, "");
    html += `
            <div class="banner-col">
                <img src="./../assets/img/${imgPath}" 
                     class="img-fluid rounded landscape-img"
                     alt="Current Banner ${banner.id}">
            </div>
        `;
  });
  current.innerHTML = html;
}
