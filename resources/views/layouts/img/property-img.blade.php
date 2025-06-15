<style>
    .modal-header {
        border: none !important;
    }

    .modal-body {
        width: 100% !important;
    }

    .carousel-inner {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
    }

    .carousel-inner .carousel-item img {
        height: 83vh !important;
        width: auto !important;
        margin: 0px 60px 0px 60px !important;
        padding: 0 !important;
    }

    .carousel-control {
        width: 50px !important;
        height: 50px !important;
        background-color: orangered !important;
        border-radius: 50% !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: auto !important;
       
    }
    
.modal-xl {
    width: 100%;
    max-width: 1450px;
}

    
</style>


<!-- Modal -->
<div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModal2Label" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-fullscreen">
    <div class="modal-content" style="background-color: transparent !important;
            border: none !important;">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color: orange; color: white; border: none; padding: 5px 10px; border-radius: 4px;">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
      </div>
      <div class="modal-body ">
        <div id="carouselExampleControls" class="carousel slide row" data-ride="carousel">
            <div class="col-1">
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <div class="carousel-control">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                   </div>
                <span class="sr-only">Previous</span>
              </a>
            </div>
            
            
          <div class="carousel-inner  col-10" style="display: flex !important; justify-content: center !important; align-items: center !important;">
               <div style="align-items: center; justify-content: center   " >
                    <div class="carousel-item active" >
                      <img src="{{ $property['thumbnail']['image'] }}" alt="Property Image">
                    </div>
                    @if(isset($property['property_images']))
                        @foreach($property['property_images'] as $image)
                            <div class="carousel-item">
                              <img src="{{ $image['image'] }}" alt="Additional Property Image">
                            </div>
                        @endforeach
                    @endif
                </div>
          </div>
          
          <div class="col-1">
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <div class="carousel-control">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </div>    
                <span class="sr-only">Next</span>
              </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>