@extends('layouts.main')

@section('title')
    User | Payment
@endsection

@section('header')
    <div class="page-header" style="background-image: url('https://source.unsplash.com/1200x800?pay'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">PAYMENT</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="container shadow-lg p-3 rounded w-50 bg-gradient-success">
        <div class="col-lg-8 text-center m-auto">
            <div class="fs-6 text-light fw-bold">Selesaikan pembayaran Anda</div>
            <hr class="hr bg-light mt-2">
            <center>
                <button class="btn btn-dark mt-3 text-xs" id="pay-button">
                    <i class="fa-solid fa-credit-card me-1"></i>
                    Bayar
                </button>
            </center>
            <input type="hidden" name="" value="{{ $pay_token }}" id="payToken">
        </div>
    </div>
    <br><br><br>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        var payToken = document.getElementById('payToken').value;
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay(payToken, {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("Payment success!");
                    console.log(result);
                    window.location.replace("/user/rent");
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("Waiting your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("Payment failed!");
                    console.log(result);
                    window.location.replace("/user/rent/checkout");
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('You closed the popup without finishing the payment');
                }
            });
            // customer will be redirected after completing payment pop-up
        });
    </script>
@endsection
