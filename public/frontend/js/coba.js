let track = document.querySelector('.carousel-track');
let itemWidth = document.querySelector('.layanan-item').offsetWidth;
let currentPosition = 0;

function moveLeft() {
    if (currentPosition < 0) {
        currentPosition += itemWidth * 4;
        track.style.transform = `translateX(${currentPosition}px)`;
    }
}

function moveRight() {
    let maxMove = -(track.scrollWidth - (itemWidth * 4)); // Total width of all items minus visible items
    if (currentPosition > maxMove) {
        currentPosition -= itemWidth * 4;
        track.style.transform = `translateX(${currentPosition}px)`;
    }
}
