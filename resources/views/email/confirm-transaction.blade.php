@include('layouts.head-content')

@php
    use Carbon\Carbon;
@endphp

<div class="container">
    <div class="card">
        <div class="card-body" style="font-weight:bold; font-family:cursive;">
            <div class="title h5 mb-3" style="font-weight: bolder; color:darkgreen; font-size:x-large">Transaksi Anda
                telah dikonfirmasi
            </div><br>
            <div class="detail">
                <div class="h6 mb-2" style="font-weight: bolder; margin-bottom:10px;color:black; font-size:large">
                    Informasi sewa :</div>
                <div class="row justify-content-center">
                    <div class="col-8 text-center">
                        <div class="small fw-bold mb-1" style="color:black">ID Sewa : {{ $rent->rent_id }}</div>
                        <div class="small fw-bold mb-1" style="color:black">Durasi : {{ $rent->duration }} hari</div>
                        <div class="small fw-bold mb-1" style="color:black">Mulai Sewa :
                            {{ Carbon::parse($rent->rent_start)->locale('id_ID')->isoFormat('dddd, D MMMM Y H:m') }}
                        </div>
                        <div class="small fw-bold mb-1" style="color:black">Akhir Sewa :
                            {{ Carbon::parse($rent->rent_end)->locale('id_ID')->isoFormat('dddd, D MMMM Y H:m') }}
                        </div>
                        <div class="small fw-bold mb-3"
                            style="margin-bottom:10px; color:black; text-transform:capitalize;">Metode
                            Pembayaran
                            :
                            {{ $rent->payment_method }}
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row h6"
                                    style="font-weight:bolder; margin-bottom:6px; color:black; font-size:large">Berikut
                                    detail sewa Anda :</div>
                                <table style="border:0;border-radius:6px; background-color:rgb(187, 238, 112)"
                                    cellspacing=2>
                                    <thead>
                                        <tr>
                                            <th style="font-weight: bolder;padding: 10px; color:black;">Item</th>
                                            <th style="font-weight: bolder;padding: 10px; color:black;">Jumlah</th>
                                            <th style="font-weight: bolder;padding: 10px; color:black;">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rentProducts as $row)
                                            <tr style="font-size:small;text-align:center">
                                                <td style="padding: 10px;">
                                                    {{-- <img src="storage/{{ $row->product->image }}" alt="Item Image"
                                                        style="width:40px; height:40px"> --}}
                                                    <small style="color:black;">{{ $row->product->name }}</small>
                                                </td>
                                                <td style="padding: 10px;">
                                                    <small style="color:black;">{{ $row->quantity }} pcs</small>
                                                </td>
                                                <td style="padding: 10px;">
                                                    <small
                                                        style="color:black;">Rp{{ number_format($row->total_price, 2, ',', '.') }}</small>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td style="padding: 10px;"></td>
                                            <td style="font-weight: bolder; padding: 10px; color:black;">
                                                Total Bayar :
                                            </td>
                                            <td style="padding: 10px;">
                                                <small style="color:black;">
                                                    Rp{{ number_format($rentProducts->sum('total_price') * $rent->duration, 2, ',', '.') }}
                                                </small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h3 style="color:rgb(0, 0, 0); font-size:large; margin-top:8px">Silahkan hubungi
                                    <span>
                                        <a href="https://api.whatsapp.com/send/?phone=6285755222360&text&type=phone_number&app_absent=0"
                                            style="text-decoration: none; color:rgb(109, 170, 48)">+6285755222360
                                        </a>
                                    </span>
                                    untuk proses lebih lanjut.
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.foot-content')
