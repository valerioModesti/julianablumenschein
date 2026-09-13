const productsSlider = (() => {
    let target;
    let singleProducts = [];
    let nextButton;
    let prevButton;
    let dots;
    let dot;
    let currentIndex = 0;
    
    function init(){
        if (singleProducts.length <= 1) { return; }
        createNavigation();
        createPagination();
        startSlider();
    }

    function startSlider(){
        let touchStartX = 0;

        singleProducts.forEach((product, index) => {
            product.style.display = index === currentIndex ? 'block' : 'none';
        });
        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % singleProducts.length;
            updateSlider();
        });
        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + singleProducts.length) % singleProducts.length;
            updateSlider();
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

            currentIndex = swipeDistance < 0
                ? (currentIndex + 1) % singleProducts.length
                : (currentIndex - 1 + singleProducts.length) % singleProducts.length;
            updateSlider();
        }, { passive: true });
        dots.forEach((e) => { 
            e.addEventListener('click', (event) => {
                const clickedDotIndex = Array.from(dot.parentNode.children).indexOf(event.target);
                if (clickedDotIndex !== -1) {
                    currentIndex = clickedDotIndex;
                    updateSlider();
                }
            })
        });
    }

    function updateSlider(){
        singleProducts.forEach((product, index) => {
            product.style.display = index === currentIndex ? 'block' : 'none';
        });
        window.dispatchEvent(new Event('resize'));
        const dots = document.querySelectorAll('.slider-pagination-dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    function createNavigation(){
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
    
    function createPagination(){
        const pagination = document.createElement('div');
        pagination.className = 'slider-pagination';
        singleProducts.forEach((product, index) => {
            dot = document.createElement('span');
            dot.className = 'slider-pagination-dot';
            if(index === 0){
                dot.classList.add('active');
            }
            pagination.appendChild(dot);
        });
        target.appendChild(pagination);
        dots = document.querySelectorAll('.slider-pagination-dot');
    }

    return{
        setup(config){
            target = config.target;
            singleProducts = config.singleProducts;
            init();
        }
    }
})();