class SlideStories {
    /** @param {string} id */
    
    constructor(id) {
        this.slide = document.querySelector(`[data-slide=${id}]`)
        this.active = 0
        this.init(id)
    }

    /** @param {Number} index */
    activeSlide(index) {
        this.active = index
        this.items.forEach((item) => item.classList.remove('active'))
        this.items[index].classList.add('active')
        this.thumbItems.forEach((item) => item.classList.remove('active'))
        this.thumbItems[index].classList.add('active')
        this.autoSlide()
    }

    next() {
        if (this.active < this.items.length - 1) {
            this.activeSlide(this.active + 1)
        } else {
            this.activeSlide(0)
        }
    }

    prev() {
        if (this.active > 0) {
            this.activeSlide(this.active - 1)
        } else {
            this.activeSlide(this.items.length - 1)
        }
    }

    addNavigation() {
        const nextBtn = this.slide.querySelector('.slide-next')
        const prevBtn = this.slide.querySelector('.slide-prev')
        nextBtn.addEventListener('click', this.next)
        prevBtn.addEventListener('click', this.prev)
    }

    addThumbItems() {
        this.thumb.innerHTML = " ";
        this.items.forEach(() => (this.thumb.innerHTML += `<span class="slide-thumb-item"></span>`))
        this.thumbItems = Array.from(this.thumb.children)
    }

    autoSlide() {
        if(this.thumb.children.length > 0){
            clearTimeout(this.timeout)
            this.timeout = setTimeout(this.next, 5000)
        }
    }

    init(id) {
        this.next = this.next.bind(this)
        this.prev = this.prev.bind(this)
        this.items = this.slide.querySelectorAll('.slide-items > *')
        if(id == "slide1"){
            this.thumb = this.slide.querySelector('.slide-thumbs1')
        }else{
            this.thumb = this.slide.querySelector('.slide-thumbs')
        }
        this.addThumbItems()
        this.activeSlide(0)
        this.addNavigation()
    }
}


const story_slide = document.getElementById('story_slide');
const story_slide2 = document.getElementById('story_slide2');
const allSlide = document.querySelector('allSlide');

let elementsArray = document.querySelectorAll(".story_button");

elementsArray.forEach((item) => {
    
    item.addEventListener("click", () => {
        let slide = document.querySelector(`.${item.id}`);
        slide.style.display = 'grid';
        new SlideStories(item.id);
        const close_button_img = document.querySelector(`.${item.id} > img`);
        let slide_thumbs = document.querySelector('.slide-thumbs'); 
        close_button_img.addEventListener('click', () => {
            slide.style.display = 'none';
            slide_thumbs.innerHTML = "";
        })
    });
});