// cycler for trends
let currentTrend = 0;

function nextTrend() {
    if (window.trendsData && window.trendsData.length > 1) {
        currentTrend = (currentTrend + 1) % window.trendsData.length;
        const trend = window.trendsData[currentTrend];
        
        // Update the display
        document.querySelector('.swabe-trend-img-round').src = '../../assets/img/' + trend.image_path;
        document.querySelector('.swabe-trend-label').textContent = trend.product_name;
        document.querySelector('.swabe-trend-price').textContent = '₱' + trend.product_price;
    }
}

// Auto change every 6 seconds
if (window.trendsData && window.trendsData.length > 1) {
    setInterval(nextTrend, 6000);
}
