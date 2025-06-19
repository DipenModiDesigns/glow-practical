const productSliderCover = document.querySelector("#productSlider.splide");
if (productSliderCover) {
    let productSlider = new Splide( '#productSlider', {
        type   : 'loop',
        perPage: 4,
        perMove: 1,
        autoplay: true,
        interval: 4000,
        pagination: false,
        arrows: false,

        breakpoints: {
            1100: {
                perPage: 2,
            },
            640: {
                perPage: 1,
            }
    }
    } );
    let productSliderBar = productSlider.root.querySelector( '.productSlider-progress-bar' );

    productSlider.on( 'mounted move', function () {
        let end  = productSlider.Components.Controller.getEnd() + 1;
        let rate = Math.min( ( productSlider.index + 1 ) / end, 1 );
        productSliderBar.style.width = String( 100 * rate ) + '%';
    } );

    productSlider.mount();
}


const siteNavigation = document.getElementById('site-navigation');
const menuToggle = document.getElementById('menuToggle');
const masthead = document.getElementById('masthead');

if (siteNavigation && menuToggle) {
    menuToggle.addEventListener('click', function() {
        // siteNavigation.classList.toggle('toggled');
        if (siteNavigation.classList.contains('toggled')) {
            siteNavigation.classList.remove('toggled');
            menuToggle.classList.remove('menuActive');
            masthead.classList.remove('menuOpen');
            document.body.style.overflow = '';
        } else {
            siteNavigation.classList.add('toggled');
            menuToggle.classList.add('menuActive');
            masthead.classList.add('menuOpen');
            document.body.style.overflow = 'hidden';
            window.scrollTo(0, 0);
        }
    });

    // Close the menu when a link is clicked
    const menuLinks = siteNavigation.querySelectorAll('a');
    menuLinks.forEach(link => {
        link.addEventListener('click', function() {
            siteNavigation.classList.remove('toggled');
            menuToggle.setAttribute('aria-expanded', 'false');
        });
    });
}