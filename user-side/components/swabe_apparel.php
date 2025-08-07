<?php
// banner loading
require_once __DIR__ . '/../../connection/connection.php';

try {
    $stmt = $conn->prepare("SELECT image_path FROM shop_banners ORDER BY uploaded_at DESC");
    $stmt->execute();
    $banners = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $banners = []; // error handling
}

// top trends loading - get all trends, but must need to limit only 10
try {
    $stmt = $conn->prepare("SELECT image_path, product_name, product_price FROM top_trends ORDER BY uploaded_at DESC LIMIT 10");
    $stmt->execute();
    $trends = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $trends = []; // error handling
}
?>

<link rel="stylesheet" href="../../assets/css/swabe_apparel.css">
<style>
  .swabe-modal-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.45);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .swabe-modal {
    position: relative;
    z-index: 10000;
    width: 90vw;
    max-width: 1100px;
    padding: 0;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
  }
  .swabe-modal-close {
    position: absolute;
    top: 10px;
    right: 16px;
    font-size: 2rem;
    color: #888;
    background: none;
    border: none;
    cursor: pointer;
    z-index: 10001;
    transition: color 0.2s;
  }
  .swabe-modal-close:hover {
    color: #222;
  }
</style>

<div class="swabe-modal-overlay" id="swabeModalOverlay">
  <div class="swabe-modal">
    <button class="swabe-modal-close" id="swabeModalClose" aria-label="Close">&times;</button>
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
            <img src="../../assets/img/swabe_logo.jpg" alt="Swabe Apparel Logo" class="swabe-logo-img">
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
              <?php if (empty($banners)): ?>
                <!-- Default banner if no banners  -->
                <div class="carousel-item active">
                  <img src="../../assets/img/banner1.jpg" class="d-block w-100 swabe-carousel-img" alt="Default Banner">
                </div>
              <?php else: ?>
                <!-- Dynamic banners from db * must change to modal--> 
                <?php foreach ($banners as $index => $banner): ?>
                  <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <img src="../../assets/img/<?php echo htmlspecialchars($banner['image_path']); ?>" 
                         class="d-block w-100 swabe-carousel-img" 
                         alt="Banner <?php echo $index + 1; ?>"
                         onerror="this.src='../../assets/img/banner1.jpg'">
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
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

        <div class="swabe-card swabe-top-trends" style="box-shadow:none; border:none; background:#fafafa;">
          <div class="swabe-trends-title" style="font-size:22px; margin-bottom:10px; color:#222; letter-spacing:1px;">Top <b>Trends</b></div>
          <div class="swabe-trends-grid" style="grid-template-columns: 1fr;">
            <div class="swabe-trend-item" style="border:none; box-shadow:none; background:transparent; padding:0; display:flex; flex-direction:column; align-items:center;">
              <?php if (!empty($trends)): ?>
                <img src="../../assets/img/<?php echo htmlspecialchars($trends[0]['image_path']); ?>" 
                     alt="Trend Product" 
                     class="swabe-trend-img-round"
                     onerror="this.src='../../assets/img/temp1.jpg'">
                <div class="swabe-trend-label" style="font-size:18px; color:#222; margin:1px 0 6px 0; font-weight:600;">
                  <?php echo htmlspecialchars($trends[0]['product_name']); ?>
                </div>
                <div class="swabe-trend-price" style="font-size:20px; color:#ffc107; font-weight:700;">
                  ₱<?php echo htmlspecialchars($trends[0]['product_price']); ?>
                </div>
              <?php else: ?>
                <img src="../../assets/img/temp1.jpg" alt="Trend Product" class="swabe-trend-img-round">
                <div class="swabe-trend-label" style="font-size:18px; color:#222; margin:1px 0 6px 0; font-weight:600;">Product Name</div>
                <div class="swabe-trend-price" style="font-size:20px; color:#ffc107; font-weight:700;">₱999</div>
              <?php endif; ?>
              <button class="swabe-trend-next-btn mt-0" onclick="nextTrend()">Next</button>
            </div>
          </div>
        </div>
      </div>

      <div class="swabe-bottom-bar">
        <div class="swabe-raffle swabe-raffle-3rd">
          <span>3rd <span>Place</span></span>
          <div>Arky Niel</div>
        </div>
        <div class="swabe-raffle swabe-raffle-2nd">
          <span>2nd <span>Place</span></span>
          <div>Arky Niel</div>
        </div>
        <div class="swabe-raffle swabe-raffle-1st">
          <span>1st <span>Place</span></span>
          <div>Arky Niel</div>
          <div class="swabe-note">*Congratulations!</div>
        </div>
        <button class="swabe-code-btn">Join the Raffle</button>
      </div>
    </div>
  </div>
</div>

<script>
// simple trend cycling
const trends = <?php echo json_encode($trends); ?>;
let current = 0;

function nextTrend() {
    if (trends.length > 1) {
        current = (current + 1) % trends.length;
        const trend = trends[current];
        
        document.querySelector('.swabe-trend-img-round').src = '../../assets/img/' + trend.image_path;
        document.querySelector('.swabe-trend-label').textContent = trend.product_name;
        document.querySelector('.swabe-trend-price').textContent = '₱' + trend.product_price;
    }
}

// auto change every 6 seconds
if (trends.length > 1) {
    setInterval(nextTrend, 6000);
}
</script>
<script>
document.getElementById('swabeModalClose').onclick = function() {
  document.getElementById('swabeModalOverlay').style.display = 'none';
};
</script>



