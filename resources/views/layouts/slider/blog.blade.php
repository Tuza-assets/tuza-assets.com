<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

  <style> 

    swiper-container {
      width: 100%;
      height: 100%;
    }

    swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
     .append-buttons {
      text-align: center;
      margin-top: 20px;
    }

    .append-buttons a {
      display: inline-block;
      border: 1px solid #007aff;
      color: #007aff;
      text-decoration: none;
      padding: 4px 10px;
      border-radius: 4px;
      margin: 0 10px;
      font-size: 13px;
    }
    
  </style>
</head>

<body>
  <swiper-container class="mySwiper" init="false">
        @if ($blogs)
            @foreach ($blogs as $blog) 
            <swiper-slide>
                <div class="blog-card  p-3" >
                   {{"asdashd"}} 
                </div>
                </swiper-slide> 
           
            @endforeach
        @else
        <p>No blogs available.</p>
    @endif
  </swiper-container>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

  <script>
    const swiperEl = document.querySelector('swiper-container')
    Object.assign(swiperEl, {
      slidesPerView: 1,
      spaceBetween: 10,
      pagination: {
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 50,
        },
      },
    });
    swiperEl.initialize();
  </script>
</body>

</html>
