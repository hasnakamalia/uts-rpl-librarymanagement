<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 15px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Buku</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Judul:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required>

        <label for="author">Penulis:</label>
        <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" required>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="{{ old('genre', $book->genre) }}" required>

        <label for="publication_year">Tahun Terbit:</label>
        <input type="number" name="publication_year" id="publication_year" min="1900" max="{{ date('Y') }}" value="{{ old('publication_year', $book->publication_year) }}" required>

        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}">

        <label for="copies_available">Salinan Tersedia:</label>
        <input type="number" name="copies_available" id="copies_available" value="{{ old('copies_available', $book->copies_available) }}" required>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <a class="back-link" href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
</div>

</body>
</html>
