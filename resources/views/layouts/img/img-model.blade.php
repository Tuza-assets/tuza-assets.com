<style>
    .modal-header {
        border: none !important;
    }

    .modal-body {
        width: 100% !important;
        height: 90vh !important;
    }

    .carousel-inner {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
    }

    .carousel-inner .carousel-item img {
        height: 100% !important;
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
</style>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-fullscreen" role="document">
        <div class="modal-content" style="background-color: transparent !important;
            border: none !important;">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color:#F27405; color: white; border: none; padding: 5px 10px; border-radius: 4px;">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
            </div>
            <div class="modal-body px-4" style="padding-bottom: 10px;">
                <div id="carouselIndicators" class="carousel slide row" data-ride="carousel" style="height: 100%; ">
                    <div class="col-1">
                        <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                            <div class="carousel-control">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </div>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <div class="carousel-inner col-10" style="height: 100%; display: flex !important; justify-content: center !important; align-items: center !important;  ">
                        <div style="align-items: center; justify-content: center   ">
                            @foreach ($images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('public/' . (is_string($image) ? $image : $image['path'])) }}"
                                        alt="{{ $property->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-1">
                        <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
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
