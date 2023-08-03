$('.slick').slick({
    dots: false,
    infinite: true,
	touchThreshold : 100,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 3,
	centerMode: true,
	nextArrow: '<i class="fa fa-arrow-right slick-next" aria-hidden="true"></i>',
	prevArrow: '<i class="fa fa-arrow-left slick-prev" aria-hidden="true"></i>',
    responsive: [{
            breakpoint: 1100,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});