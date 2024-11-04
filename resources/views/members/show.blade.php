<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Anggota</title>
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
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            color: #007acc;
            margin-bottom: 20px;
        }
        .detail {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .detail strong {
            color: #007acc;
        }
        .actions {
            margin-top: 20px;
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        a, button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        a {
            background-color: #007acc;
            color: white;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }
        a:hover {
            background-color: #005f99;
        }
        button {
            background-color: #e74c3c;
            color: white;
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
    <h1>Detail Anggota</h1>
</div>

<div class="container">
    <h2>Informasi Anggota</h2>

    <div class="detail">
        <p><strong>ID:</strong> {{ $member->id }}</p>
        <p><strong>Nama:</strong> {{ $member->name }}</p>
        <p><strong>Email:</strong> {{ $member->email }}</p>
        <p><strong>Telepon:</strong> {{ $member->phone }}</p>
        <p><strong>Jenis Keanggotaan:</strong> {{ $member->membership_type }}</p>
        <p><strong>Alamat:</strong> {{ $member->address ?? 'Tidak ada' }}</p>
    </div>

    <div class="actions">
        <a href="{{ route('members.index') }}">Kembali ke Daftar Anggota</a>
        <a href="{{ route('members.edit', $member->id) }}">Edit Anggota</a>
        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus Anggota</button>
        </form>
    </div>
</div>

<footer>
    &copy; {{ date('Y') }} Perpustakaan. Semua hak dilindungi.
</footer>

</body>
</html>
