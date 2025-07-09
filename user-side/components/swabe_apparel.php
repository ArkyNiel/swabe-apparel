<div class="swabe-hero-container mt-5">
  <div class="swabe-top-bar">
    <div><i class="fa fa-bullhorn"></i> <b>We're Open</b> <span>Monday to Sunday</span></div>
    <div class="swabe-separator">|</div>
    <div><i class="fa fa-clock"></i> <b>Time</b> <span>9am to 8pm</span></div>
    <div class="swabe-separator">|</div>
    <div><i class="fa fa-truck"></i> <b>We Offer Delivery</b> <span>around Philippines</span></div>
    <div class="swabe-separator">|</div>
    <div><i class="fa fa-credit-card"></i> <b>Payment Options</b> <span>Gcash, PayPal, PayMaya</span></div>
  </div>

  <div class="swabe-main-row">
    <div class="swabe-card swabe-facebook-promo">
      <div class="swabe-logo-title">
        <img src="../assets/img/swabe_logo.jpg" alt="Swabe Apparel Logo" class="swabe-logo-img">
      </div>
      <div class="swabe-facebook-desc">
        Follow us on Facebook for updates and exclusive offers!
      </div>
      <a href="https://www.facebook.com/swabecollection" target="_blank" class="swabe-facebook-btn">
        Visit our Facebook Page
      </a>
      <div class="swabe-facebook-handle">
        @swabecollection
      </div>
    </div>

    <div class="swabe-card swabe-carousel swabe-carousel-wide">
      <div id="swabeCarousel" class="carousel slide carousel-fade swabe-custom-carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../assets/img/banner1.jpg" class="d-block w-100 swabe-carousel-img" alt="Banner 1">
          </div>
          <div class="carousel-item">
            <img src="../assets/img/temp1.jpg" class="d-block w-100 swabe-carousel-img" alt="Temp 1">
          </div>
          <div class="carousel-item">
            <img src="../assets/img/temp2.jpg" class="d-block w-100 swabe-carousel-img" alt="Temp 2">
          </div>
          <div class="carousel-item">
            <img src="../assets/img/temp3.jpg" class="d-block w-100 swabe-carousel-img" alt="Temp 3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#swabeCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#swabeCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="swabe-card swabe-top-trends">
      <div class="swabe-trends-title">Top <b>Trends</b></div>
      <div class="swabe-trends-grid">
        <div class="swabe-trend-item">
          <img src="PATH_TO_IMG1.jpg" alt="Trend 1">
          <div class="swabe-trend-label">#elegantcasual</div>
          <div class="swabe-trend-price">₱186</div>
        </div>
        <div class="swabe-trend-item">
          <img src="PATH_TO_IMG2.jpg" alt="Trend 2">
          <div class="swabe-trend-label">#streetstyle</div>
          <div class="swabe-trend-price">₱299</div>
        </div>
        <div class="swabe-trend-item">
          <img src="PATH_TO_IMG3.jpg" alt="Trend 3">
          <div class="swabe-trend-label">#summerfit</div>
          <div class="swabe-trend-price">₱250</div>
        </div>
        <div class="swabe-trend-item">
          <img src="PATH_TO_IMG4.jpg" alt="Trend 4">
          <div class="swabe-trend-label">#minimalist</div>
          <div class="swabe-trend-price">₱199</div>
        </div>
      </div>
    </div>
  </div>

  <div class="swabe-bottom-bar">
    <div class="swabe-raffle">
      <span>3rd <span>Place</span></span>
      <div>Juan Dela Cruz</div>
    </div>
    <div class="swabe-raffle">
      <span>2nd <span>Place</span></span>
      <div>Maria Santos</div>
    </div>
    <div class="swabe-raffle">
      <span>1st <span>Place</span></span>
      <div>Pedro Reyes</div>
      <div class="swabe-note">*Congratulations!</div>
    </div>
    <button class="swabe-code-btn">Join the Raffle</button>
  </div>
</div>

<style>
.swabe-hero-container {
  width: 80%;
  max-width: 1200px;
  margin: 0 auto 24px auto;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 16px rgba(0,0,0,0.04);
  padding: 0 0 24px 0;
  color: #000;
}

.swabe-top-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #fffbe6;
  padding: 18px 36px;
  font-size: 18px;
  border-bottom: 2px solid #000;
  gap: 16px;
  border-radius: 10px 10px 0 0;
}

.swabe-top-bar div { flex: 1; text-align: center; }
.swabe-top-bar i { margin-right: 5px; color: #ffc107; }

.swabe-top-bar > div {
  position: relative;
}

.swabe-top-bar > div:not(:last-child)::after {
  content: "";
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  height: 60%;
  width: 1px;
  background: #ccc; 
  opacity: 0.7;
}

.swabe-main-row {
  display: flex;
  justify-content: space-between;
  align-items: stretch;
  padding: 18px 8px 8px 8px;
  gap: 16px;
  background: #fff;
}

.swabe-card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  padding: 18px 12px;
  min-width: 240px;
  flex: 1 1 0;
  margin: 0 4px;
  border: 1.5px solid #000;
  height: 340px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

.swabe-carousel-wide {
  flex: 2 1 0;
  max-width: 650px;
  height: 340px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.swabe-facebook-promo,
.swabe-top-trends {
  flex: 1 1 0;
  max-width: 340px;
  height: 340px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.swabe-app-promo {
  text-align: center;
  background: #fff;
  box-shadow: none;
  border: 2px solid #ffc107;
}
.swabe-app-title { font-weight: bold; font-size: 16px; margin-bottom: 6px; }
.swabe-app-highlight { color: #ffc107; font-size: 12px; }
.swabe-app-offers { margin-bottom: 6px; }
.swabe-app-offer { display: inline-block; background: #fff; border-radius: 4px; padding: 3px 8px; margin: 1px; font-weight: bold; color: #000; border: 2px solid #ffc107; }
.swabe-app-offer span { color: #ffc107; }
.swabe-app-code { margin-bottom: 6px; font-size: 11px; }
.swabe-qr { width: 60px; margin: 6px auto; display: block; border: 1px solid #000; border-radius: 4px; }
.swabe-app-buttons img { width: 90px; margin: 2px; filter: grayscale(1); }

.swabe-carousel {
  min-width: 0;
  max-width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  box-shadow: none;
  background: none;
  border: none;
  height: 100%; 
}
.swabe-carousel-placeholder {
  width: 100%;
  height: 150px;
  background: #fff;
  border: 2px dashed #ffc107;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #000;
  font-size: 18px; 
  font-style: italic;
}

.swabe-carousel-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 200px; 
  background: #fff;
  border: 2px dashed #ffc107;
  border-radius: 10px;
  position: relative;
}
.swabe-carousel-img {
  width: 100% !important;
  height: 340px !important;
  object-fit: cover;
  border-radius: 10px;
}
.swabe-carousel-btn {
  background: #ffc107;
  border: none;
  color: #000;
  font-size: 20px; 
  border-radius: 50%;
  width: 32px; 
  height: 32px; 
  cursor: pointer;
  transition: background 0.2s;
}
.swabe-carousel-btn:hover {
  background: #000;
  color: #ffc107;
}

.swabe-top-trends {
  background: #fff;
  border: 2px solid #ffc107;
}
.swabe-trends-title { font-weight: bold; margin-bottom: 10px; font-size: 14px; color: #000; }
.swabe-trends-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 8px; 
}
.swabe-trend-item {
  background: #fff;
  border-radius: 10px;
  padding: 4px; 
  text-align: center;
  box-shadow: 0 1px 4px rgba(0,0,0,0.04);
  border: 1px solid #000;
}
.swabe-trend-item img { width: 100%; border-radius: 3px; border: 2px solid #ffc107; }
.swabe-trend-label { font-size: 10px; color: #000; margin: 1px 0; }
.swabe-trend-price { color: #ffc107; font-weight: bold; font-size: 11px; }

.swabe-bottom-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #fff;
  border-top: 2px solid #000;
  padding: 22px 36px;
  margin-top: 16px;
  font-size: 20px;
  gap: 32px;
}
.swabe-raffle {
  background: #fff;
  border-radius: 10px;
  padding: 6px 15px; 
  text-align: center;
  font-weight: bold;
  min-width: 280px;
  width: 280px;
  border: 2px solid #ffc107;
}
.swabe-raffle span { color: #ffc107; font-size: 18px; }
.swabe-note { font-size: 10px; color: #000; }
.swabe-code-btn {
  background: #000; 
  color: #fff;
  border-radius: 10px; 
  padding: 6px 15px; 
  font-weight: bold;
  height: 50px;
  width: 190px;
  font-size: 16px;
  border: 2px solid #ffc107;
  cursor: pointer;
  transition: background 0.2s, color 0.2s, border 0.2s;
}
.swabe-code-btn:hover {
  background: #ffc107;
  color: #000;
}

.swabe-facebook-promo {
  text-align: center;
  background: #fff;
  box-shadow: none;
  border: 2px solid #ffc107;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 180px; 
}
.swabe-logo-title {
  margin-bottom: 6px; 
}
.swabe-logo-img {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 50%;    
  border: 2px solid #ffc107;
  background: #fff;
}
.swabe-facebook-desc {
  font-size: 16px;
  margin-bottom: 18px;
  color: #000;
}
.swabe-facebook-btn {
  display: inline-block;
  background: #ffc107;
  color: #000;
  font-weight: bold;
  border-radius: 10px; 
  padding: 12px 28px;
  text-decoration: none;
  font-size: 12px; 
  margin-bottom: 8px; 
  transition: background 0.2s, color 0.2s;
  border: 2px solid #ffc107;
}
.swabe-facebook-btn:hover {
  background: #000;
  color: #ffc107;
  border: 2px solid #000;
}
.swabe-facebook-handle {
  font-size: 10px; 
  color: #000;
  opacity: 0.7;
  margin-top: 2px;
}
.swabe-trends-title {
  font-size: 20px;
  margin-bottom: 18px;
}

.swabe-trends-grid {
  gap: 16px;
}

.swabe-trend-item {
  font-size: 15px;
  padding: 10px;
}

.swabe-trend-label {
  font-size: 15px;
}

.swabe-trend-price {
  font-size: 17px;
}
@media (max-width: 900px) {
  .swabe-hero-container {
    width: 95%;
    border-radius: 10px;
  }
  .swabe-main-row { flex-direction: column; gap: 12px; }
  .swabe-card { max-width: 100%; min-width: 0; margin: 0 0 8px 0; }
  .swabe-carousel { min-width: 0; max-width: 100%; }
  .swabe-bottom-bar { flex-direction: column; gap: 6px; }
}
.swabe-custom-carousel {
  width: 100%;
  max-width: 550px; 
  margin: 0 auto;
  height: 100%;
}

.swabe-custom-carousel .carousel-inner,
.swabe-custom-carousel .carousel-item {
  width: 100% !important;
  height: 100% !important;
}

.swabe-carousel-img {
  object-fit: cover;
  border-radius: 10px;
}
</style>


