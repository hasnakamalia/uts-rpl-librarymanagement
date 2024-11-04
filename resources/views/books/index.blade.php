<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
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
        a {
            color: #007acc;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }
        a:hover {
            background-color: #005fa3;
            transform: translateY(-2px);
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
            transition: background-color 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }
        .add-book {
            display: block;
            margin: 20px 0;
            text-align: center;
            font-weight: bold;
            color: #007acc;
            text-decoration: none;
            border: 1px solid #007acc;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .add-book:hover {
            background-color: #e8f5ff;
            text-decoration: underline;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Daftar Buku Perpustakaan</h1>
</div>

<div class="container">
    <h2>Daftar Buku</h2>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a class="add-book" href="{{ route('books.create') }}"><i class="fas fa-plus"></i> Tambah Buku</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Genre</th>
                <th>Tahun Terbit</th>
                <th>ISBN</th>
                <th>Salinan Tersedia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->genre }}</td>
                <td>{{ $book->publication_year }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->copies_available }}</td>
                <td class="actions">
                    <a href="{{ route('books.show', $book->id) }}">Lihat</a>
                    <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                    <a href="{{ route('transactions.create', ['book_id' => $book->id]) }}" class="pinjam-button">Pinjam</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
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
