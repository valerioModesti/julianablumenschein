const productsSlider = (() => {
    let target;
    let singleProducts = [];
    let nextButton;
    let prevButton;
    let dot;
    let currentIndex = 0;
    
    function init(){
        if (singleProducts.length <= 1) { return; }
        createStylesheet();
        createNavigation();
        createPagination();
        startSlider();
    }

    function startSlider(){
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
    }

    function updateSlider(){
        singleProducts.forEach((product, index) => {
            product.style.display = index === currentIndex ? 'block' : 'none';
        });
        const dots = document.querySelectorAll('.swiper-pagination-dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    function createStylesheet(){
        const style = document.createElement('style');
        style.innerHTML = `
            .swiper-navigation {
                display: flex;
                justify-content: space-between;
                margin-top: 10px;
            }
            .swiper-button-next, .swiper-button-prev {
                background-color: #000AA;
                color: #fff;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
            }
            .swiper-pagination {
                display: flex;
                justify-content: center;
                margin-top: 10px;
            }
            .swiper-pagination-dot {
                width: 10px;
                height: 10px;
                background-color: #000;
                border-radius: 50%;
                margin: 0 5px;
                cursor: pointer;
            }
            .swiper-pagination-dot.active {
                background-color: #fff;
            }
        `;
        document.head.appendChild(style);
    }

    function createNavigation(){
        const navivgation = document.createElement('div');
        navivgation.className = 'swiper-navigation';
        nextButton = document.createElement('button');
        nextButton.className = 'swiper-button-next';
        prevButton = document.createElement('button');
        prevButton.className = 'swiper-button-prev';
        navivgation.appendChild(nextButton);
        navivgation.appendChild(prevButton);
        target.appendChild(navivgation);
    }
    
    function createPagination(){
        const pagination = document.createElement('div');
        pagination.className = 'swiper-pagination';
        singleProducts.forEach((product, index) => {
            dot = document.createElement('span');
            dot.className = 'swiper-pagination-dot';
            if(index === 0){
                dot.classList.add('active');
            }
            pagination.appendChild(dot);
        });
        target.appendChild(pagination);
    }

    return{
        setup(config){
            target = config.target;
            singleProducts = config.singleProducts;
            init();
        }
    }
})();

/*
productsSlider.setup({
    target: document.querySelector('.woocommerce'),
    singleProducts: document.querySelectorAll('.single-product'),
});
*/