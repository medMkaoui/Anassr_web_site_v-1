// Wow Animation JS Start
new WOW().init(); 
// Wow Animation JS Start
// Testimonial Slider JS Start

$('.testimonial-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<button class="slick-arrow prev-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    nextArrow: '<button class="slick-arrow next-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    dots: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 8000,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
            }
        }
      
  ]
  });
  // Testimonial Slider JS End

  //scroll js start
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
  
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
  });
    //scroll js end

    //pup_up scroll js start
let span = document.querySelector(".up");

window.onscroll = function () {
  // console.log(this.scrollY);
  // if (this.scrollY >= 1000) {
  //   span.classList.add("show");
  // } else {
  //   span.classList.remove("show");
  // }
  this.scrollY >= 500 ? span.classList.add("show") : span.classList.remove("show");
};

span.onclick = function () {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
};


//carousel start

$('.servece-slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: '<button class="slick-arrow prev-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    nextArrow: '<button class="slick-arrow next-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    dots: true,
    arrows: false,
    autoplay: false,
    autoplaySpeed: 2000,
    responsive: [
      {
          breakpoint: 992,
          settings: {
              slidesToShow: 2,
          }
      },
      {
          breakpoint: 768,
          settings: {
              slidesToShow: 2,
          }
      },
      {
        breakpoint: 426,
        settings: {
            slidesToShow: 1,
        }
    }
  ]
  });
//carousel end

//pagination start

const pages = document.querySelectorAll(".page-content .page");
const pageNumbersContainer = document.querySelector(".page-numbers-container");

if (pageNumbersContainer) {

	const createPagination = () => {
	    pages.forEach((p, i) => {
	        const pageNumber = document.createElement("div");
	        pageNumber.classList.add("page-number");
	        pageNumber.textContent = i + 1;
	        pageNumber.addEventListener("click", () => {
	            activatePage(i);
	        })

	        pageNumbersContainer.appendChild(pageNumber);
	    })

	    document.querySelector(".page-number").classList.add("active");
	}

	createPagination();

	const pageNumbers = document.querySelectorAll(".page-numbers-container .page-number");

	const activatePage = (pageNumber) => {
	    pages.forEach(p => {
	        p.classList.remove("active");
	    })

	    pages[pageNumber].classList.add("active");

	    pageNumbers.forEach(p => {
	        p.classList.remove("active");
	    })

	    pageNumbers[pageNumber].classList.add("active");

	    window.scroll(0, 0);
	}
	
}

//pagination end


//navbar start 

const targetDiv = document.getElementById("nav_mob");
const btn = document.getElementById("icon_bar");
const btn_close = document.getElementById("icon_close");



btn.onclick = function () {
    
    targetDiv.style.display = "grid";
    btn.style.display = "none";
};
btn_close.onclick = function () {
    targetDiv.style.display = "none";
    btn.style.display = "block";
};

function showMOb() {
    if (window.innerWidth < 991) { // If media query matches
        
        btn.style.display="block";
        
    }
  }
function myFunction() {
    if (window.innerWidth > 991) { // If media query matches
       
        targetDiv.style.display = "none";
    }
  }
  
 
  window.addEventListener('resize', myFunction);
  window.addEventListener('resize', showMOb);
//navbar end 