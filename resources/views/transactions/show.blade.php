<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #007acc;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
            line-height: 1.6;
            color: #333;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        a {
            text-decoration: none;
            color: #007acc;
            font-weight: bold;
            transition: color 0.3s;
        }
        a:hover {
            color: #005f99;
        }
        button {
            padding: 10px 15px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Detail Transaksi</h1>

    <p><strong>ID Transaksi:</strong> {{ $transaction->id }}</p>
    <p><strong>Nama Anggota:</strong> {{ $transaction->member->name }}</p>
    <p><strong>Judul Buku:</strong> {{ $transaction->book->title }}</p>
    <p><strong>Tanggal Peminjaman:</strong> {{ $transaction->borrowed_at }}</p>
    <p><strong>Tanggal Jatuh Tempo:</strong> {{ $transaction->due_date }}</p>
    <p><strong>Tanggal Pengembalian:</strong> {{ $transaction->returned_at ?? 'Belum Dikembalikan' }}</p>

    <div class="actions">
        <a href="{{ route('transactions.index') }}">Kembali ke Daftar Transaksi</a>
        <a href="{{ route('transactions.edit', $transaction->id) }}">Edit Transaksi</a>
        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus Transaksi</button>
        </form>
    </div>
</div>

</body>
</html>
