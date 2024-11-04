<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #007acc;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            line-height: 1.5;
            margin: 10px 0;
        }
        .actions {
            text-align: center;
            margin-top: 20px;
        }
        a, button {
            margin: 0 5px;
            padding: 10px 15px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
            font-weight: bold; /* Menebalkan teks tombol */
        }
        a {
            background-color: #007acc; /* Warna latar belakang tombol untuk link */
        }
        a:hover {
            background-color: #005fa3; /* Warna saat hover untuk link */
            transform: translateY(-2px); /* Efek angkat saat hover */
        }
        button {
            background-color: #e74c3c; /* Warna latar belakang tombol hapus */
        }
        button:hover {
            background-color: #c0392b; /* Warna saat hover untuk tombol hapus */
            transform: translateY(-2px); /* Efek angkat saat hover */
        }
        .separator {
            margin: 20px 0;
            height: 1px;
            background-color: #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Detail Buku</h2>

    <p><strong>ID:</strong> {{ $book->id }}</p>
    <p><strong>Judul:</strong> {{ $book->title }}</p>
    <p><strong>Penulis:</strong> {{ $book->author }}</p>
    <p><strong>Genre:</strong> {{ $book->genre }}</p>
    <p><strong>Tahun Terbit:</strong> {{ $book->publication_year }}</p>
    <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
    <p><strong>Salinan Tersedia:</strong> {{ $book->copies_available }}</p>

    <div class="separator"></div>

    <div class="actions">
        <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
        <a href="{{ route('books.edit', $book->id) }}">Edit Buku</a>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus Buku</button>
        </form>
    </div>
</div>

</body>
</html>
