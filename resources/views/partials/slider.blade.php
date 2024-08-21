<div class="slider relative">
    <div class="slides">
        <div class="slide bg-cover rounded-sm overflow-hidden bg-center h-[400px]" style="background-image: url('https://img.lazcdn.com/us/domino/0cddb936-008f-4de0-ad15-512f32d28aad_BD-1976-688.jpg_1200x1200q80.jpg_.webp');"></div>
        <div class="slide bg-cover rounded-sm overflow-hidden bg-center h-[400px]" style="background-image: url('https://img.lazcdn.com/us/domino/9ea23adb-75fe-4638-9876-f5679651c17e_BD-1976-688.jpg_1200x1200q80.jpg_.webp');"></div>
        <div class="slide bg-cover rounded-sm overflow-hidden bg-center h-[400px]" style="background-image: url('https://img.lazcdn.com/us/domino/8cd17564-ed57-438a-95b7-0d567238b85d_BD-1976-688.jpg_1200x1200q80.jpg_.webp');"></div>
    </div>
    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="next" onclick="moveSlide(1)">&#10095;</button>
</div>


<style>
    .slider {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 400px;
        border-radius: 6px;
        margin-top: 5px;
    }

    .slides {
        display: flex;
        transition: transform 0.5s ease;
        width: 100%;
        height: 100%;
    }

    .slide {
        flex: 0 0 100%;
        background-size: cover;
        background-position: center;
        height: 100%;
    }

    .prev, .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.1);
        color: #fff;
        border: none;
        padding: 10px;
        cursor: pointer;
        z-index: 10;
    }

    .prev {
        left: 10px;
    }

    .next {
        right: 10px;
    }

    /* Optional: Add hover effects for buttons */
    .prev:hover, .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }
</style>


<script>
    let currentSlide = 0;
    const slideInterval = 3000; // Time in milliseconds for autoplay
    let slideTimer;

    function moveSlide(step) {
        const slides = document.querySelector('.slides');
        const totalSlides = document.querySelectorAll('.slide').length;

        currentSlide += step;

        if (currentSlide >= totalSlides) {
            currentSlide = 0;
        } else if (currentSlide < 0) {
            currentSlide = totalSlides - 1;
        }

        slides.style.transform = `translateX(-${currentSlide * 100}%)`;

        resetAutoplay();
    }

    function resetAutoplay() {
        clearInterval(slideTimer);
        startAutoplay();
    }

    function startAutoplay() {
        slideTimer = setInterval(() => {
            moveSlide(1);
        }, slideInterval);
    }
    
    startAutoplay();
</script>

