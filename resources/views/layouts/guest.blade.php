<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{env('APP_NAME')}} | Recover Your Lost Assets Today, Reclaim your peace of mind</title>

    <meta name="description" content="Skysafeline Asset Recovery specializes in recovering lost assets from online scams and cyber fraud. Trust our experienced professionals to help you reclaim what's rightfully yours.">
    <meta name="keywords" content="asset recovery, online scams, cyber fraud, financial fraud, cryptocurrency tracing, online grooming investigations, social media investigation, corporate due diligence, scam victims, victim assistance">
    <meta name="author" content="Skysafeline Asset Recovery Team">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Skysafeline Asset Recovery | Reclaim Your Lost Assets Today">
    <meta property="og:description" content="Skysafeline Asset Recovery specializes in recovering lost assets from online scams and cyber fraud. Trust our experienced professionals to help you reclaim what's rightfully yours.">
    <meta property="og:image" content="{{asset('cyber-recovery.png')}}">
    <meta property="og:url" content="{{route('home')}}">
    <meta name="twitter:card" content="Skysafeline Asset Recovery specializes in recovering lost assets from online scams and cyber fraud. Trust our experienced professionals to help you reclaim what's rightfully yours">
    <meta name="twitter:title" content="Skysafeline Asset Recovery | Reclaim Your Lost Assets Today">
    <meta name="twitter:description" content="Skysafeline Asset Recovery specializes in recovering lost assets from online scams and cyber fraud. Trust our experienced professionals to help you reclaim what's rightfully yours.">
    <meta name="twitter:image" content="{{asset('cyber-recovery.png')}}">
    <meta name="language" content="English">
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon" />
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/tailwind.css" />

    <!-- ==== WOW JS ==== -->
    <script src="assets/js/wow.min.js"></script>

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
      new WOW().init();
    </script>

  </head>

  <body>
<body >

    {{$slot}}

    @include('layouts.partials.guest.footer')

    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
      // ==== for menu scroll
      const pageLink = document.querySelectorAll(".ud-menu-scroll");

      pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
          e.preventDefault();
          document.querySelector(elem.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
            offsetTop: 1 - 60,
          });
        });
      });

      // section menu active
      function onScroll(event) {
        const sections = document.querySelectorAll(".ud-menu-scroll");
        const scrollPos =
          window.pageYOffset ||
          document.documentElement.scrollTop ||
          document.body.scrollTop;

        for (let i = 0; i < sections.length; i++) {
          const currLink = sections[i];
          const val = currLink.getAttribute("href");
          const refElement = document.querySelector(val);
          const scrollTopMinus = scrollPos + 73;
          if (
            refElement.offsetTop <= scrollTopMinus &&
            refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
          ) {
            document
              .querySelector(".ud-menu-scroll")
              .classList.remove("active");
            currLink.classList.add("active");
          } else {
            currLink.classList.remove("active");
          }
        }
      }

      window.document.addEventListener("scroll", onScroll);

      // Testimonial
      const testimonialSwiper = new Swiper(".testimonial-carousel", {
        slidesPerView: 1,
        spaceBetween: 30,

        // Navigation arrows
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },

        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1280: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
        },
      });
    </script>

    @livewireScripts

</body>

</html>
