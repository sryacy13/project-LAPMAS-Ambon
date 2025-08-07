<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengaduan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border:1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Laporan Pengaduan</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Nama Pengadu</th>
                <th>Isi Laporan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengaduans as $key => $pengaduan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $pengaduan->created_at }}</td>
                    <td>{{ $pengaduan->user->name }}</td>
                    <td>{{ $pengaduan->judul }}</td>
                    <td>{{ $pengaduan->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
