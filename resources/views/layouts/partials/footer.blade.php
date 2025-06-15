<!-- resources/views/layouts/partials/footer.blade.php -->

<style>
    .social-icons {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin-bottom: 20px;
    }

    .social-icons a {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 50px;/ height: 50px;
        text-align: center;
    }

    .social-icons a i {
        color: #FE6900;
        /* Sets the icon color */
        font-size: 24px;
        /* Sets the icon size */
    }
</style>

<footer class="py-4" style="background-color: #000000; color: white; padding:20px">
    <div class="" style="padding-left: 0 !important;">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('welcome') }}"><img src="{{ asset('assets/images/footerlogo.jpg') }}" alt="Logo"
                        class="mb-3 img-" style="width: 100%"></a>
                <div class="social-icons">
                    <a href="https://www.facebook.com/tuzaassets" target="_blank" class="p-1 bg-white d-inline-block ">
                        <i class="fab fa-facebook" style="color: #FE6900; font-size: 2rem;"></i>
                    </a>
                    <a href="https://youtube.com/@TUZA-ASSETS?si=yWjH1omJ-OoSUO9H" target="_blank"
                        class="p-1 bg-white d-inline-block text-red">
                        <i class="fab fa-youtube" style="color: #FE6900; font-size: 2rem;"></i>
                    </a>
                    <a href="https://www.instagram.com/tuza_assets_ltd/" target="_blank"
                        class="p-1 bg-white d-inline-block text-red">
                        <i class="fab fa-instagram" style="color: #FE6900; font-size: 2rem;"></i>
                    </a>
                    <a href="https://x.com/EricSekanyana?t=f5nAoCnikt89MZNTVcLMSg&s=09" target="_blank"
                        class="p-1 bg-white d-inline-block text-red">
                        <i class="fab fa-twitter" style="color: #FE6900; font-size: 2rem;"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/tuza-assets/" target="_blank"
                        class="p-1 bg-white d-inline-block text-red">
                        <i class="fab fa-linkedin" style="color: #FE6900; font-size: 2rem;"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-3 lg:pl-5">
                <h5 class="mb-3" style="color: #FE6900; font-weight: bold;">{{ __('footer.services') }}</h5>
                <ul class="list-unstyled">
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right:4px;"><a
                            href="{{ route('blogs') }}"
                            style="color: white; text-decoration: none;">{{ __('footer.design_construction') }}</a></li>
                    <!--<li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right:4px;"><a href="#" style="color: white; text-decoration: none;" class="mt-2">{{ __('footer.marketing_advertising') }}</a></li>-->
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right:4px;"><a
                            href="{{ route('property-inspection') }}"
                            style="color: white; text-decoration: none;">{{ __('footer.maintenance_remodel') }}</a>
                    </li>
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right:4px;"><a
                            href="{{ route('rental-collection') }}"
                            style="color: white; text-decoration: none;">{{ __('footer.rent_collection') }}</a></li>
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="{{ route('tenant.view') }}"
                            style="color: white; text-decoration: none;">{{ __('footer.tenant_relationship') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5 class="mb-3" style="color: #ff6600; font-weight: bold;">{{ __('footer.diplomat') }}</h5>
                <ul class="list-unstyled">
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="{{ route('Bestkeptsecret') }}"
                            style="color: white; text-decoration: none;">{{ __('footer.Bestkeptsecret') }}</a></li>
                </ul>
                <h5 class="mb-3" style="color: #ff6600; font-weight: bold;">{{ __('footer.for_diaspora') }}</h5>
                <ul class="list-unstyled">
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="{{ route('diaspora') }}"
                            style="color: white; text-decoration: none;">{{ __('footer.rwanda_diaspora') }}</a></li>
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="{{ route('diplomats') }}"
                            style="color: white; text-decoration: none;">{{ __('footer.diplomats') }}</a></li>
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="{{ route('all_property') }}"
                            style="color: white; text-decoration: none;">{{ __('footer.tenants') }}</a></li>
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="https://loancalculator.tuza-assets.com/en"
                            style="color: white; text-decoration: none;">{{ __('footer.loan_calculator') }}</a></li>
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="{{ route('insurance&secturity.view') }}"
                            style="color: white; text-decoration: none;">{{ __('footer.insurance_security') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="mb-3" style="color: #ff6600; font-weight: bold;">{{ __('footer.contact') }}</h5>
                <ul class="list-unstyled">
                    <li><img src="{{ asset('assets/images/2.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="tel:+17047746456"
                            style="color: white; text-decoration: none;">{{ __('footer.usa') }}</a></li>
                    <li><img src="{{ asset('assets/images/2.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="tel:+15819979608"
                            style="color: white; text-decoration: none;">{{ __('footer.canada') }}</a></li>
                    <li><img src="{{ asset('assets/images/2.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="tel:+31 6 86495035"
                            style="color: white; text-decoration: none;">{{ __('footer.europe') }}</a></li>
                    <li><img src="{{ asset('assets/images/2.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="tel:+250785519538"
                            style="color: white; text-decoration: none;">{{ __('footer.rwanda') }}</a></li>
                    <li><img src="{{ asset('assets/images/2.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="tel:+8618805158975"
                            style="color: white; text-decoration: none;">{{ __('footer.central_asia') }}</a></li>
                    <li><img src="{{ asset('assets/images/3.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="mailto:info@tuza-assets.com"
                            style="color: white; text-decoration: none;">{{ __('footer.email') }}</a></li>
                    <li><img src="{{ asset('assets/images/4.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="#" style="color: white; text-decoration: none;">{{ __('footer.tin') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5 class="mb-3" style="color: #ff6600; font-weight: bold;">{{ __('footer.for_landlord') }}</h5>
                <ul class="list-unstyled">
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="https://tuza-assets.com/en/Property_Management"
                            style="color: white; text-decoration: none;">{{ __('footer.Find_Tenant') }}</a></li>
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="https://bid.tuza-assets.com/"
                            style="color: white; text-decoration: none;">{{ __('footer.Sale_property') }}</a></li>
                    <!--<li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a href="{{ route('propertyonsell.all') }}" style="color: white; text-decoration: none;">{{ __('footer.House_Sell') }}</a></li>-->
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="{{ route('new-propertyonsell') }}"
                            style="color: white; text-decoration: none;">{{ __('footer.House_Sell') }}</a></li>
                    <li><img src="{{ asset('assets/images/1.svg') }}" alt="icon" style="margin-right: 4px;"><a
                            href="{{ route('BuyPlot') }}"
                            style="color: white; text-decoration: none;">{{ __('message.buy_plot') }}</a></li>
                </ul>
            </div>
        </div>
        <hr style="background-color: #fff;">
        <div class=" row">
            <div class="text-left col-lg-4" style="color: #ffffff">
                <p> © {{ date('Y') }} {{ __('footer.copyright') }}</p>
            </div>
            <div class="pr-5 text-center col-8">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="{{ route('Contact') }}"
                            style="color: white;">{{ __('footer.contact_us') }}</a></li>
                    <li class="list-inline-item"><a href="{{ route('site-map') }}"
                            style="color: white;">{{ __('footer.sitemap') }}</a></li>
                    <li class="list-inline-item"><a href="{{ route('policy') }}"
                            style="color: white;">{{ __('footer.privacy_policy') }}</a></li>
                    <li class="list-inline-item"><a href="{{ route('terms-and-conditions') }}"
                            style="color: white;">{{ __('footer.terms_conditions') }}</a></li>
                    <li class="list-inline-item"><a href="{{ route('faqs') }}"
                            style="color: white;">{{ __('footer.faqs') }}</a></li>
                    <li class="list-inline-item"><a href="{{ route('disclaimer') }}"
                            style="color: white;">{{ __('footer.disclaimer') }}</a></li>
                </ul>
            </div>

        </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.addEventListener("scroll", function() {
            var header = document.getElementById('main-header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('modal');
        var icon = document.getElementById('icon');
        var close = document.getElementById('close');

        // When the icon is clicked, open the modal
        icon.onclick = function() {
            modal.style.display = 'block';
        }

        // When the close button is clicked, close the modal
        close.onclick = function() {
            modal.style.display = 'none';
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const images = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "bg1.jpg", "bg6.jpg", "bg4.jpg"];
        let currentIndex = 0;
        const hero = document.querySelector(".hero");

        // Preload images
        function preloadImages() {
            images.forEach((image) => {
                const img = new Image();
                img.src = `{{ asset('assets/images/') }}/${image}`;
            });
        }

        // Change background with fade effect
        function changeBackground() {
            hero.classList.add("fade-out"); // Add fade-out class

            setTimeout(() => {
                hero.style.backgroundImage =
                    `url('{{ asset('assets/images/') }}/${images[currentIndex]}')`;
                hero.classList.remove("fade-out"); // Remove fade-out class
                currentIndex = (currentIndex + 1) % images.length;
            }, 1000); // Match the timeout with the CSS transition duration
        }

        // Preload images and start the background changer
        preloadImages();
        setInterval(changeBackground, 5000); // Change image every 5 seconds
    });
</script>

</body>

</html>
