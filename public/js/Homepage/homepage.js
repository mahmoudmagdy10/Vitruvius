// Initialize Swiper
AOS.init({
    duration: 800,
  });

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    autoplay: true,
    speed: 800,
    breakpoints: {
      // when window width is >= 320px
      576: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      // when window width is >= 480px
      768: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      // when window width is >= 640px
      991: {

        slidesPerView: 3,
        spaceBetween: 20
      },
    }
    ,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  // start dark mode
  let check = document.getElementById("check");
  let road = document.querySelector(".road-map");
  if (localStorage.getItem("darkMode") === null) {
      localStorage.setItem("darkMode", "false");
  }
  checkstatus();
  function checkstatus() {
      if (localStorage.getItem("darkMode") === "true") {
          check.checked = true;
          document.body.style.cssText = "color:white;background-color:#212121e6";
          check.classList = "fa-solid fa-sun";
          document.querySelector(".section").style.color = "color:var(--bg-color)";
      } else {
          check.checked = false;
          document.body.style.cssText = "color:black; background-color:#fff";
          check.classList = "fa-solid fa-moon";
          document.querySelector(".section").style.color = "color:var( --tex-color) background-color:#ddd";
      };
  };

