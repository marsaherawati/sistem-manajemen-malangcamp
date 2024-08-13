@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background: rgb(140, 255, 129);
        }

        .container {
            padding: 15px;
        }

        th {
            padding: 15px;
        }

        td {
            vertical-align: middle;
        }

        hr {
            background: rgb(0, 0, 0);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mb-4 justify-content-center" style="margin-bottom: 20px">
            <div class="col-lg-4">
                <div class="card shadow bg-gray-300">
                    <div class="card-body d-flex gap-2">
                        <div class="col-md-4" style="text-align: center">
                            <img src="assets/img/LOGO-MC.jpg" alt="Logo MC" class="img-fluid rounded"
                                style="width:150px;height:100px">
                        </div>
                        <div class="col-lg-6 my-auto" style="text-align: center">
                            <div class="fs-5" style="font-weight:bold; margin-top:5px"><span
                                    class="text-dark fw-bold">MALANG<span class="text-success fw-bold"
                                        style="color:rgb(18, 145, 14)">CAMP</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-5">
                <div class="card shadow bg-gray-400">
                    <div class="card-body fw-bold">
                        <div class="mb-2 h6" style="font-weight:bold">Informasi Sewa</div>
                        <hr>
                        <div class="small text-dark mt-2">ID Sewa : <span class="text-xs">{{ $rent->rent_id }}</span>
                        </div>
                        <div class="small text-dark">Durasi : <span class="text-xs">{{ $rent->duration }} hari</span>
                        </div>
                        <div class="small text-dark">Mulai Sewa :
                            <span class="text-xs">
                                {{ Carbon::parse($rent->rent_start)->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY HH:mm') }}
                            </span>
                        </div>
                        <div class="small text-dark">Akhir Sewa :
                            <span class="text-xs">
                                {{ Carbon::parse($rent->rent_end)->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY HH:mm') }}
                            </span>
                        </div>
                        <div class="small text-dark">Status : <span class="text-xs">{{ $rent->status }}</span></div>
                        <div class="small text-dark">Metode Pembayaran : <span class="text-xs"
                                style="text-transform: uppercase">{{ $rent->payment_method }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top:15px">
            <div class="col-lg-10">
                <div class="card shadow bg-gray-400">
                    <div class="card-body">
                        <div class="mb-2 h6"style="font-weight:bold">Detail Sewa</div>
                        <hr class="hr bg-dark w-50 mt-0 mb-1">
                        <div class="table-responsive p-3">
                            <table class="table align-items-center mb-0 p-3" id="rentDetail">
                                <thead>
                                    <tr class="table-success">
                                        <th>
                                            Item
                                        </th>
                                        <th>
                                            Product
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Subtotal
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rentProducts as $row)
                                        <tr>
                                            <td style="text-align: center">
                                                <span>{{ $loop->iteration }}</span>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <img src="storage/{{ $row->product->image }}" alt="Item Image"
                                                    style="width:40px; height:40px">
                                                <span style="vertical-align: middle">{{ $row->product->name }}</span>
                                            </td>
                                            <td style="text-align: center">
                                                <span>{{ $row->quantity }}</span>
                                            </td>
                                            <td style="text-align: center">
                                                <span>Rp{{ number_format($row->total_price, 2, ',', '.') }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: center; padding:10px; font-weight:bold">
                                            Total Bayar :
                                        </td>
                                        <td style="text-align: center; padding:10px">
                                            Rp{{ number_format($rentProducts->sum('total_price'), 2, ',', '.') }} x
                                            {{ $rent->duration }} hari =
                                            Rp{{ number_format($rentProducts->sum('total_price') * $rent->duration, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
