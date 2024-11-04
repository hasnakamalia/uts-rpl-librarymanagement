<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #007acc;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .alert {
            padding: 10px;
            color: #fff;
            background-color: #4CAF50;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
        a {
            color: #007acc;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 10px;
            display: inline-block;
            padding: 8px 12px;
            border: 1px solid #007acc;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #007acc;
            color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #007acc;
            color: white;
        }
        .actions {
            display: flex;
            gap: 8px;
            justify-content: center;
        }
        button {
            padding: 8px 12px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #c0392b;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Daftar Anggota Perpustakaan</h1>
</div>

<div class="container">
    <h2>Daftar Anggota</h2>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('members.create') }}">Tambah Anggota</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Jenis Keanggotaan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->phone }}</td>
                <td>{{ $member->membership_type }}</td>
                <td>{{ $member->address ?? 'Tidak ada' }}</td>
                <td class="actions">
                    <a href="{{ route('members.show', $member->id) }}">Lihat</a>
                    <a href="{{ route('members.edit', $member->id) }}">Edit</a>
                    <a href="{{ route('transactions.create', ['member_id' => $member->id]) }}" class="button">Pinjam Buku</a>
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<footer>
    &copy; {{ date('Y') }} Perpustakaan. Semua hak dilindungi.
</footer>

</body>
</html>
