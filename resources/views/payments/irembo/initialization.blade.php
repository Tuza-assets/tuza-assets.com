@extends('layouts.dashboard.app-payment')

@section('content')
    <div class="py-5 mt-5 bg-white container-fluid">
        <div class="row">
            <div class="container p-3 mx-auto">
                <!-- Check Out Start -->
                <div class="check-out pt_40 pb_70"
                    style="height: 100vh;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            flex-direction: column">
                    <h1> Continue with IremboPay</h1> <br>
                    <div class="payment-order-button">
                        <button type="button" onclick="makePayment()">Pay now</button>
                    </div>
                </div>
                <!-- Check Out End -->

                <script src="https://dashboard.sandbox.irembopay.com/assets/payment/inline.js"></script>
                {{-- <script src="https://dashboard.irembopay.com/assets/payment/inline.js"></script> --}}

                @php
                    $invoice = session()->get('invoiceNumber', 'default');
                    $route = route('irembo.payment.callback');
                @endphp

                <script>
                    function makePayment() {
                        IremboPay.initiate({
                            publicKey: "pk_live_1261034952bf4ac5ae65488ccf1e9ae1",
                            invoiceNumber: "{{ $invoice }}",
                            locale: IremboPay.locale.EN,
                            callback: (err, resp) => {
                                if (!err) {
                                    window.location.href = "{{ $route }}";
                                    IremboPay.closeModal();
                                } else {
                                    console.error("Error during payment:", err);
                                }
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
