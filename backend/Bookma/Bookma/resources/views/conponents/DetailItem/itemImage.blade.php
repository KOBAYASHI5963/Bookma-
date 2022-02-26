<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  @foreach($book->BookImages as $index => $BookImage)
    @if($index == 0)
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{$BookImage->book_images_url}}" alt="">
    </div>
    @else
    <div class="carousel-item">
      <img class="d-block w-100" src="{{$BookImage->book_images_url}}" alt="">
    </div>
    @endif
  @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
