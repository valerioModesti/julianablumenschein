const productsSlider = (() => {
    const SLIDE_DURATION = 1000;

    let target;
    let track;
    let singleProducts = [];
    let nextButton;
    let prevButton;
    let dots = [];
    let currentIndex = 0;
    let visualIndex = 1;
    let autoSlideTimer = null;
    let touchStartX = 0;
    let lastDirection = 1;
    let isAnimating = false;

    function init() {
        if (singleProducts.length <= 1) {
            return;
        }

        prepareProducts();
        createNavigation();
        createPagination();
        bindEvents();
        updateSlider();
        startAutoSlide();
    }

    function prepareProducts() {
        target.style.position = 'relative';
        target.style.overflow = 'hidden';
        target.style.transition = `height ${SLIDE_DURATION}ms cubic-bezier(0.22, 1, 0.36, 1)`;

        track = document.createElement('div');
        track.className = 'slider-track';
        track.style.display = 'flex';
        track.style.width = '100%';
        track.style.transition = `transform ${SLIDE_DURATION}ms cubic-bezier(0.22, 1, 0.36, 1)`;

        const lastProduct = singleProducts[singleProducts.length - 1];
        if (lastProduct) {
            const lastClone = lastProduct.cloneNode(true);
            lastClone.setAttribute('data-clone', 'last');
            styleSlide(lastClone);
            track.appendChild(lastClone);
        }

        singleProducts.forEach((product) => {
            styleSlide(product);
            track.appendChild(product);
        });

        const firstProduct = singleProducts[0];
        if (firstProduct) {
            const firstClone = firstProduct.cloneNode(true);
            firstClone.setAttribute('data-clone', 'first');
            styleSlide(firstClone);
            track.appendChild(firstClone);
        }

        target.appendChild(track);
    }

    function styleSlide(slide) {
        slide.style.position = 'relative';
        slide.style.flex = '0 0 100%';
        slide.style.width = '100%';
        slide.style.maxWidth = '100%';
        slide.style.margin = '0 auto';
        slide.style.opacity = '1';
        slide.style.transform = 'none';
        slide.style.transition = 'none';
        slide.style.visibility = 'visible';
        slide.style.pointerEvents = 'auto';
    }

    function bindEvents() {
        nextButton.addEventListener('click', () => {
            lastDirection = 1;
            goToSlide(currentIndex + 1);
        });

        prevButton.addEventListener('click', () => {
            lastDirection = -1;
            goToSlide(currentIndex - 1);
        });

        target.addEventListener('touchstart', (event) => {
            touchStartX = event.changedTouches[0].screenX;
        }, { passive: true });

        target.addEventListener('touchend', (event) => {
            const touchEndX = event.changedTouches[0].screenX;
            const swipeDistance = touchEndX - touchStartX;

            if (Math.abs(swipeDistance) < 50) {
                return;
            }

            lastDirection = swipeDistance < 0 ? 1 : -1;
            goToSlide(swipeDistance < 0 ? currentIndex + 1 : currentIndex - 1);
        }, { passive: true });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
            });
        });
    }

    function goToSlide(nextIndex) {
        if (isAnimating) {
            return;
        }

        const lastRealIndex = singleProducts.length - 1;
        const shouldResetToStart = nextIndex > lastRealIndex;
        const shouldResetToEnd = nextIndex < 0;

        if (shouldResetToStart) {
            currentIndex = 0;
            visualIndex = lastRealIndex + 2;
        } else if (shouldResetToEnd) {
            currentIndex = lastRealIndex;
            visualIndex = 0;
        } else {
            currentIndex = nextIndex;
            visualIndex = currentIndex + 1;
        }

        isAnimating = true;
        updateSlider();
        startAutoSlide();

        window.setTimeout(() => {
            if (shouldResetToStart) {
                currentIndex = 0;
                visualIndex = 1;
                track.style.transition = 'none';
                updateSlider();
                window.setTimeout(() => {
                    track.style.transition = `transform ${SLIDE_DURATION}ms cubic-bezier(0.22, 1, 0.36, 1)`;
                }, 20);
            } else if (shouldResetToEnd) {
                currentIndex = lastRealIndex;
                visualIndex = lastRealIndex + 1;
                track.style.transition = 'none';
                updateSlider();
                window.setTimeout(() => {
                    track.style.transition = `transform ${SLIDE_DURATION}ms cubic-bezier(0.22, 1, 0.36, 1)`;
                }, 20);
            }

            isAnimating = false;
        }, SLIDE_DURATION);
    }

    function startAutoSlide() {
        if (autoSlideTimer) {
            window.clearInterval(autoSlideTimer);
        }

        autoSlideTimer = window.setInterval(() => {
            goToSlide(currentIndex + 1);
        }, 8000);
    }

    function updateSlider() {
        if (track) {
            track.style.transform = `translateX(-${visualIndex * 100}%)`;
        }

        const maxHeight = singleProducts.reduce((max, product) => {
            return Math.max(max, product.offsetHeight || 0);
        }, 0);

        if (maxHeight > 0) {
            target.style.height = `${maxHeight + 25}px`;
        }

        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });

        window.dispatchEvent(new Event('resize'));
    }

    function createNavigation() {
        const navivgation = document.createElement('div');
        navivgation.className = 'slider-navigation';

        nextButton = document.createElement('button');
        nextButton.className = 'slider-button-next';
        nextButton.textContent = '→';
        nextButton.setAttribute('aria-label', 'Next product');

        prevButton = document.createElement('button');
        prevButton.className = 'slider-button-prev';
        prevButton.textContent = '←';
        prevButton.setAttribute('aria-label', 'Previous product');

        navivgation.appendChild(prevButton);
        navivgation.appendChild(nextButton);
        target.appendChild(navivgation);
    }

    function createPagination() {
        const pagination = document.createElement('div');
        pagination.className = 'slider-pagination';

        singleProducts.forEach((product, index) => {
            const dotElement = document.createElement('span');
            dotElement.className = 'slider-pagination-dot';
            dotElement.dataset.index = String(index);

            if (index === 0) {
                dotElement.classList.add('active');
            }

            pagination.appendChild(dotElement);
        });

        target.appendChild(pagination);
        dots = Array.from(document.querySelectorAll('.slider-pagination-dot'));
    }

    return {
        setup(config) {
            target = config.target;
            singleProducts = Array.from(config.singleProducts || []);
            init();
        }
    };
})();