<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Transaksi</title>
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
        h2 {
            text-align: center;
            color: #007acc;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        select, input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
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
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #005f99;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Transaksi</h2>

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="member_id">Nama Anggota:</label>
            <select name="member_id" class="form-control" required>
                @foreach($members as $member)
                    <option value="{{ $member->id }}" {{ $transaction->member_id == $member->id ? 'selected' : '' }}>
                        {{ $member->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="book_id">Judul Buku:</label>
            <select name="book_id" class="form-control" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ $transaction->book_id == $book->id ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="borrowed_at">Tanggal Peminjaman:</label>
            <input type="date" name="borrowed_at" class="form-control" value="{{ old('borrowed_at', $transaction->borrowed_at) }}" required>
        </div>
        <div class="form-group">
            <label for="due_date">Tanggal Jatuh Tempo:</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $transaction->due_date) }}" required>
        </div>
        <div class="form-group">
            <label for="returned_at">Tanggal Pengembalian:</label>
            <input type="date" name="returned_at" class="form-control" value="{{ old('returned_at', $transaction->returned_at) }}">
        </div>
        <button type="submit">Update</button>
    </form>
</div>

<footer class="footer">
    &copy; {{ date('Y') }} Perpustakaan. Semua hak dilindungi.
</footer>

</body>
</html>
