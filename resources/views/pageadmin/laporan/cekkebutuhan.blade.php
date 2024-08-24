<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <style>
        @media print {

            /* CSS untuk mengatur tampilan saat dicetak */
            body {
                padding: 20px;
                font-family: Arial, sans-serif;
            }

            #table {
                border-collapse: collapse;
                width: 100%;
                margin-bottom: 20px;
            }

            #table th,
            #table td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }

            #table th {
                background-color: #f2f2f2;
            }
        }

        /* CSS tambahan untuk desain tabel */
        #table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0 auto;
            width: 100%;
        }

        #table th,
        #table td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        #table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        #table td {
            text-align: left;
        }
    </style>
</head>

<body>
    <table class="table table-borderless text-center"
        style="border-width:0px!important; border:none; text-align:center; width:100%">
        <tbody>
            <tr>
                <td>
                    <h4>
                        LAPORAN CEK KEBUTUHAN GIZI<br />
                        PADA BALITA <br>NUTRIGUIDE</h4>

                </td>
            </tr>
        </tbody>
    </table>

    <div
        style="background:#000000; cursor:text; height:4px; margin-bottom:0px; margin-left:0px; margin-right:0px; margin-top:0px; width:100%">
        &nbsp;</div>

    <div style="background:#000000; cursor:text; height:2px; margin-top:2px; width:100%">&nbsp;</div>
@if($cekData->isEmpty())
<div class="alert alert-info">Tidak ada data cek yang ditemukan.</div>
@else
<table id="table">
    <thead class="thead-dark">
        <tr>
            <th>Nama Lengkap Balita</th>
            <th>Rentang Umur</th>
            <th>Waktu Makan</th>
            <th>Menu</th>
            <th>Bahan Makanan</th>
            <th>Berat</th>
            <th>URT</th>
            <th>Energi (kcal)</th>
            <th>Karb. Hidrat (g)</th>
            <th>Protein (g)</th>
            <th>Lemak (g)</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cekData as $cek)
            @php
                $bahanCount = count($cek->bahan_makanan);
            @endphp
            @foreach($cek->bahan_makanan as $index => $bahan)
                <tr>
                    <!-- Display only once for the first item in the group -->
                    @if($index === 0)
                        <td rowspan="{{ $bahanCount }}">{{ $cek->dataBalita->nama_lengkap }}</td>
                        <td rowspan="{{ $bahanCount }}">{{ $cek->rentang_umur }}</td>
                        <td rowspan="{{ $bahanCount }}">{{ $cek->waktu_makan }}</td>
                        <td rowspan="{{ $bahanCount }}">{{ $cek->menu }}</td>
                    @endif
                    <td>{{ $bahan['nama'] }}</td>
                    <td>{{ $bahan['berat'] }}</td>
                    <td>{{ $bahan['urt'] }}</td>
                    <td>{{ $bahan['gizi']['e'] }}</td>
                    <td>{{ $bahan['gizi']['kh'] }}</td>
                    <td>{{ $bahan['gizi']['p'] }}</td>
                    <td>{{ $bahan['gizi']['l'] }}</td>
                    <td>{{ $bahan['keterangan'] }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
@endif
    <script>
        window.print();
    </script>
</body>

</html>