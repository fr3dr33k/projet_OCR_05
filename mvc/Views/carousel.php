<?php 

echo '
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="assets/media/slide1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="assets/media/slide2.jpg" class="d-block w-100" alt="...">
     
    </div>
    <div class="carousel-item">
      <img src="assets/media/slide3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </a>
</div> '; 

?>