<div class="container-fluid p-0">
  <div id="swabeCarousel" class="carousel slide carousel-fade w-100" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../assets/img/temp1.jpg" class="d-block w-100" alt="Banner 1" style="width: 100%; height: 88vh; object-fit: cover;">
      </div>
      <div class="carousel-item">
        <img src="../assets/img/temp2.jpg" class="d-block w-100" alt="Shirt 1" style="width: 100%; height: 85vh; object-fit: cover;">
      </div>
      <div class="carousel-item">
        <img src="../assets/img/temp3.jpg" class="d-block w-100" alt="Shoes" style="width: 100%; height: 85vh; object-fit: cover;">
      </div>
      <div class="carousel-item">
        <img src="../assets/img/temp4.jpg" class="d-block w-100" alt="Shirt 2" style="width: 100%; height: 85vh; object-fit: cover;">
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

    <div class="floating-cards-wrapper">
      <div class="floating-cards-inner">
        <div class="floating-card"><img src="../assets/img/temp1.jpg" alt="Card 1" /></div>
        <div class="floating-card"><img src="../assets/img/temp2.jpg" alt="Card 2" /></div>
        <div class="floating-card"><img src="../assets/img/temp3.jpg" alt="Card 3" /></div>
        <div class="floating-card"><img src="../assets/img/temp4.jpg" alt="Card 4" /></div>
        <div class="floating-card"><img src="../assets/img/temp1.jpg" alt="Card 5" /></div>
        <div class="floating-card"><img src="../assets/img/temp2.jpg" alt="Card 6" /></div>
        <div class="floating-card"><img src="../assets/img/temp3.jpg" alt="Card 7" /></div>
        <div class="floating-card"><img src="../assets/img/temp4.jpg" alt="Card 8" /></div>
        <div class="floating-card"><img src="../assets/img/temp1.jpg" alt="Card 9" /></div>
        <div class="floating-card"><img src="../assets/img/temp2.jpg" alt="Card 10" /></div>
        <div class="floating-card"><img src="../assets/img/temp3.jpg" alt="Card 11" /></div>
        <div class="floating-card"><img src="../assets/img/temp4.jpg" alt="Card 12" /></div>
        <div class="floating-card"><img src="../assets/img/temp1.jpg" alt="Card 1" /></div>
      </div>
    </div>

  </div>
</div>

<style>
.carousel.carousel-fade .carousel-item {
  transition: opacity 0.7s ease-in-out;
}

.floating-cards-wrapper {
  position: absolute;
  left: 50%;
  bottom: 40px;
  transform: translateX(-50%);
  display: flex;
  gap: 20px;
  width: 90vw;
  z-index: 10;
  width: 1500px; 
  overflow: hidden;
  pointer-events: none; 
}

.floating-cards-inner {
  display: flex;
  gap: 20px;
  animation: scroll-left 20s linear infinite;
}

@keyframes scroll-left {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}

.floating-card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.15);
  overflow: hidden;
  width: 160px;
  height: 160px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.2s;
  flex-shrink: 0;
}
.floating-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.floating-card:hover {
  transform: translateY(-10px) scale(1.05);
  box-shadow: 0 16px 32px rgba(0,0,0,0.22);
}
</style>