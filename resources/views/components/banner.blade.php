<div class="message-container">
    @if ($message = Session::get('success'))
        <div id="success-message" class="alert alert-success mt-2 p-4 bg-green-100 border border-green-400 text-green-700 rounded shadow-lg relative">
            {{ $message }}
            <div class="time-indicator bg-green-400 absolute bottom-0 left-0 h-1"></div>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div id="error-message" class="alert alert-danger mt-2 p-4 bg-red-100 border border-red-400 text-red-700 rounded shadow-lg relative">
            {{ $message }}
            <div class="time-indicator bg-red-400 absolute bottom-0 left-0 h-1"></div>
        </div>
    @endif
</div>

<style>
    .message-container {
        position: fixed;
        top: 80px;
        right: 10px;
        z-index: 50;
        width: auto;
        display: flex;
        justify-content: center;
    }

    .time-indicator {
        animation: increase-width 5s linear forwards;
    }

    @keyframes increase-width {
        from {
            width: 0;
        }
        to {
            width: 100%;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        setTimeout(() => {
            let successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }

            let errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>
