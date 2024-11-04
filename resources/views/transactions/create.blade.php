<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman Buku</title>
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
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #007acc;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }
        select, input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        select:focus, input[type="date"]:focus {
            border-color: #007acc;
            outline: none;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007acc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #005fa3;
        }
        .optional {
            color: #999;
            font-size: 0.9em;
        }
        .add-member {
            text-align: center;
            margin-bottom: 20px;
        }
        .add-member a {
            color: #007acc;
            font-weight: bold;
            text-decoration: none;
            border: 1px solid #007acc;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .add-member a:hover {
            background-color: #e8f5ff;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Peminjaman Buku</h2>

    <div class="add-member">
        <a href="{{ route('members.create') }}">Daftar Anggota Baru</a>
    </div>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="member_id">Nama Anggota:</label>
            <select name="member_id" class="form-control" required>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="book_id">Judul Buku:</label>
            <select name="book_id" class="form-control" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="borrowed_at">Tanggal Peminjaman:</label>
            <input type="date" name="borrowed_at" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="due_date">Tanggal Jatuh Tempo:</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="returned_at">Tanggal Pengembalian <span class="optional">(Opsional)</span>:</label>
            <input type="date" name="returned_at" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

</body>
</html>
