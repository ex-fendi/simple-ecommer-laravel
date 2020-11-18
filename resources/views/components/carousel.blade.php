<template>
<div class="row">
<div class="col-md-8">
  <div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          
          {{--  banner carousel ukran 1600 x 640 px  --}}

          <img src="{{asset('assets/banner/banner2.jpg')}}" class="d-block w-100" alt="carousel" style="height: 308px; border-radius: 5px;">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/banner/banner2.jpg')}}" class="d-block w-100" alt="carousel" style="height: 308px; border-radius: 5px;">
            <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('assets/img/1.jpeg')}}" class="d-block w-100" alt="carousel" style="height: 308px; border-radius: 5px;">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<div class="col-md-4">

  
  {{--  banner carousel ukran 1600 x 640 px  --}}

  <div class="row">
    <div class="col-md-12">
        <img src="{{asset('assets/banner/banner2.jpg')}}" style="height: 150px; border-radius: 5px;">
    </div>
    
    <div class="col-md-12">
        <img src="{{asset('assets/banner/banner2.jpg')}}" style="height: 150px;border-radius: 5px;">
    </div>
  </div>
</div>
</div>
</template>