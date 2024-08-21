<!DOCTYPE html>
<html>

<head>
    <title>Laporan Ibu dan Balita</title>
    <style>
        @media print {
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
                        LAPORAN DATA IBU DAN BALITA<br />
                        PUSKESMAS XYZ</h4>
                    <p style="margin-left:0px; margin-right:0px">Alamat: Jl. Kesehatan No. 1, Kode Pos: 12345, No. Telp: 0123456789</p>
                </td>
            </tr>
        </tbody>
    </table>

    <div style="background:#000000; cursor:text; height:4px; margin-bottom:0px; margin-left:0px; margin-right:0px; margin-top:0px; width:100%">
        &nbsp;</div>
    <div style="background:#000000; cursor:text; height:2px; margin-top:2px; width:100%">&nbsp;</div>

    <table id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ibu</th>
                <th>NIP</th>
                <th>Alamat</th>
                <th>Nama Balita</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($ibuBalitas as $ibu)
                @foreach($ibu->dataBalitas as $balita)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $ibu->nama }}</td>
                        <td>{{ $ibu->nip }}</td>
                        <td>{{ $ibu->alamat }}</td>
                        <td>{{ $balita->nama_lengkap }}</td>
                        <td>{{ $balita->jenis_kelamin }}</td>
                        <td>{{ $balita->tanggal_lahir }}</td>
                        <td>{{ $balita->rentang_umur }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
