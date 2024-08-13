@extends('layouts.main')

@section('title')
    Malang Camp | About Us
@endsection

@section('header')
    <div class="page-header" style="background-image: url('{{ asset('assets/img/hikers.jpg') }}'); height:43vh">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h3 class="text-white shadow-lg p-3">ABOUT US</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="container shadow-lg rounded bg-gradient-success">
        <div class="p-3">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="card shadow my-3">
                        <div class="m-auto p-3">
                            <img src="{{ asset('assets/img/LOGO-MC.jpg') }}" alt="Logo MC" class="img-fluid shadow"
                                style="width: 300px; height:200px">
                            <div class="fs-4 text-dark">
                                <span class="font-weight-bold text-success">MALANG</span>CAMP
                            </div>
                        </div>
                    </div>

                    <div class="text-light mb-4 fw-bold">
                        Malang Camp merupakan toko penyewaan alat-alat outdoor, berbasis di Malang. Kami mengembangkan
                        situs ini agar memudahkan pelanggan dalam menyewa alat-alat outdoor yang kami sediakan.
                        Karena kami percaya pelanggan kami membutuhkan segala kemudahan ini.
                    </div>
                    <figure>
                        <blockquote class="blockquote text-light fw-bold">
                            "Tidak Akan Meragukan Pelanggan, Meskipun Permintaannya Aneh-Aneh"
                        </blockquote>
                        <figcaption class="blockquote-footer text-dark fw-bold">
                            <cite title="Source Title">Malang Camp</cite>
                        </figcaption>
                    </figure>

                    <!--Google map-->
                    <hr class="border border-light border-2">
                    <div>
                        <h4 class="text-white p-3">Our Location</h4>
                        <div class="ratio ratio-16x9">
                            <iframe style="border-radius: 20px"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63218.62357015683!2d112.5592470666591!3d-7.981995812978612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629e3735ae75f%3A0xee89cfc2ab1a8d8d!2sMALANG%20CAMP%20(Rental%20Alat%20Camping)!5e0!3m2!1sen!2sid!4v1685659839575!5m2!1sen!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
