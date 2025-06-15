
            <div class="slider">
                <div class="slide-track d-flex">
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/sliko.png') }}"  alt="" />
                        <div class="hover-content">{{ __('logo.services.inspection') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/radiant.png') }}"  alt="" />
                        <div class="hover-content">{{ __('logo.services.insurance') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/stractorr.png') }}"  alt="" />
                        <div class="hover-content">{{ __('logo.services.design') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/lighting.png') }}"  alt="" />
                        <div class="hover-content">{{ __('logo.services.lighting') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/consenet.png') }}"  alt="" />
                        <div class="hover-content">{{ __('logo.services.consultancy') }}</div>
                    </div>
                    <!-- Duplicate slides for continuous loop -->
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/sliko.png') }}"  alt="" />
                        <div class="hover-content">{{ __('logo.services.inspection') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/radiant.png') }}"  alt="" />
                        <div class="hover-content">{{ __('logo.services.insurance') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/stractorr.png') }}"  alt="" />
                        <div class="hover-content">{{ __('logo.services.design') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/lighting.png') }}"  alt="" />
                        <div class="hover-content">{{ __('logo.services.lighting') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/consenet.png') }}"  alt="" />
                        <div class="hover-content">{{ __('logo.services.consultancy') }}</div>
                    </div>
                </div>
            </div>
    
<style>
    @-webkit-keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(calc(-250px * 8)); /* Adjust for the number of slides */
        }
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(calc(-250px * 8)); /* Adjust for the number of slides */
        }
    }

    .slider {
        background: transparent;
        height: 120px;
        margin: auto;
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    .slider::before,
    .slider::after {
        background: transparent;
        content: "";
        height: 120px;
        position: absolute;
        width: 200px;
        z-index: 2;
    }

    .slider::after {
        right: 0;
        top: 0;
        transform: rotateZ(180deg);
    }

    .slider::before {
        left: 0;
        top: 0;
    }

    .slider .slide-track {
        -webkit-animation: scroll 40s linear infinite;
        animation: scroll 40s linear infinite;
        display: flex;
        width: calc(250px * 20); /* Adjust for the number of slides times 2 */
    }

    .slider .slide {
        height: 120px;
        width: 200px;
        position: relative;
    }

    .slide img {
        display: block;
        width: 100%;
        height: 100%;
    }

    .slide .hover-content {
        display: none;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: auto;
        background-color: #FF6600; /* Corrected syntax for 20% opacity */
        color: black;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 10px;
        box-sizing: border-box;
        text-transform: uppercase;
        cursor:pointer;
    }

    .slide:hover img {
        display: none;
    }

    .slide:hover .hover-content {
        display: flex;
    }

    .d-flex {
        display: flex;
        gap: 2rem;
    }
</style>