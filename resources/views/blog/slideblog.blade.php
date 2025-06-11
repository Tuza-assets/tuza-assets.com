
<style>
    /* ... previous styles remain the same ... */

    .scroll-container {
        display: flex;
        overflow-x: auto;
        white-space: nowrap;
        scroll-behavior: smooth;
        padding: 1rem 0;
        scroll-snap-type: x mandatory; /* Add snap behavior */
        -webkit-overflow-scrolling: touch;
        margin-bottom: 20px;
    }

    .scroll-container .card {
        display: inline-block;
        width: 300px;
        margin-right: 1rem;
        scroll-snap-align: start; /* Add snap alignment */
        flex-shrink: 0; /* Prevent cards from shrinking */
    }

    /* Improve dots visibility and interaction */
    .dots-container {
        text-align: center;
        margin-top: 1rem;
        padding: 10px 0;
    }

    .dot {
        height: 10px;
        width: 10px;
        margin: 0 5px;
        background-color: #ddd;
        border-radius: 50%;
        display: inline-block;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .dot.active {
        background-color: orange;
        transform: scale(1.2);
    }
</style>

<section class="hero text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">TUZA ASSETS Ltd</h1>
        <p>{{ __('message.Blog') }}</p>
    </div>
</section>

@if ($blogs)
    <section class="position-relative py-5">
        <div class="container position-relative">
            <button class="nav-arrow left" onclick="scrollLeft()">‹</button>
            <div class="scroll-container" id="blogScrollContainer">
                @foreach ($blogs as $blog)
                    <div class="card h-100 text-white overflow-hidden" data-index="{{ $loop->index }}">
                        <!-- ... card content remains the same ... -->
                    </div>
                @endforeach
            </div>
            <button class="nav-arrow right" onclick="scrollRight()">›</button>
            <div class="dots-container" id="dotsContainer">
                @foreach ($blogs as $index => $blog)
                    <span class="dot {{ $index === 0 ? 'active' : '' }}" 
                          onclick="scrollToCard({{ $index }})" 
                          data-index="{{ $index }}">
                    </span>
                @endforeach
            </div>
        </div>
    </section>
@endif

<script>
    const scrollContainer = document.getElementById('blogScrollContainer');
    const dots = document.querySelectorAll('.dot');
    const cardWidth = 316; // 300px width + 16px margin-right
    let isScrolling = false;
    let scrollTimeout;

    function scrollLeft() {
        const currentScroll = scrollContainer.scrollLeft;
        const targetScroll = Math.max(0, currentScroll - cardWidth);
        scrollContainer.scrollTo({ left: targetScroll, behavior: 'smooth' });
    }

    function scrollRight() {
        const currentScroll = scrollContainer.scrollLeft;
        const maxScroll = scrollContainer.scrollWidth - scrollContainer.clientWidth;
        const targetScroll = Math.min(maxScroll, currentScroll + cardWidth);
        scrollContainer.scrollTo({ left: targetScroll, behavior: 'smooth' });
    }

    function scrollToCard(index) {
        const targetScroll = index * cardWidth;
        scrollContainer.scrollTo({ left: targetScroll, behavior: 'smooth' });
        updateActiveDot(index);
    }

    function updateActiveDot(index) {
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    // Debounced scroll handler
    function handleScroll() {
        if (!isScrolling) {
            isScrolling = true;
            
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                const scrollPosition = scrollContainer.scrollLeft;
                const index = Math.round(scrollPosition / cardWidth);
                updateActiveDot(index);
                isScrolling = false;
            }, 50);
        }
    }

    // Initialize
    function init() {
        scrollContainer.addEventListener('scroll', handleScroll);
        
        // Set initial active dot
        updateActiveDot(0);
        
        // Add intersection observer for better accuracy
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const index = parseInt(entry.target.dataset.index);
                    updateActiveDot(index);
                }
            });
        }, {
            root: scrollContainer,
            threshold: 0.5
        });

        // Observe all cards
        document.querySelectorAll('.card').forEach(card => {
            observer.observe(card);
        });
    }

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', init);
</script>