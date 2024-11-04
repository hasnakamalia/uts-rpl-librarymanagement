<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #1a73e8;
            margin-bottom: 20px;
        }
        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .navigation {
            text-align: center;
            margin-bottom: 20px;
        }
        .navigation a {
            padding: 8px 15px;
            margin: 0 5px;
            font-size: 0.9rem;
            color: #fff;
            background-color: #1a73e8;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .navigation a:hover {
            background-color: #1669c1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #1a73e8;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a, button {
            padding: 8px 12px;
            margin-right: 5px;
            font-size: 0.9rem;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            border: none;
        }
        a {
            background-color: #1a73e8;
        }
        button {
            background-color: #ea4335;
        }
        a:hover {
            background-color: #1669c1;
        }
        button:hover {
            background-color: #d23f31;
        }
        .actions {
            display: flex;
            gap: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Transaksi</h1>

    <!-- Bagian Navigasi untuk fitur tambahan -->
    <div class="navigation">
        <a href="{{ route('transactions.create') }}">Pinjam Buku</a>
        <a href="{{ route('members.create') }}">Daftar Member Baru</a>
        <a href="{{ route('books.index') }}">Lihat Daftar Buku</a>
    </div>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->member->name }}</td>
                <td>{{ $transaction->book->title }}</td>
                <td>{{ $transaction->borrowed_at }}</td>
                <td>{{ $transaction->due_date }}</td>
                <td>{{ $transaction->returned_at ?? 'Belum Dikembalikan' }}</td>
                <td class="actions">
                    <a href="{{ route('transactions.show', $transaction->id) }}">Lihat</a>
                    <a href="{{ route('transactions.edit', $transaction->id) }}">Edit</a>
                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
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

</body>
</html>
