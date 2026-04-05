<!DOCTYPE html>
<html>
     Nama: Annasya Maulafidatu Zahra, NIM: 2311102246 
<head>
    <title>Home</title>
    <style>
        
        .btn-blue {
            background-color: #007bff; 
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
        }
        .btn-blue:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <h2>Selamat datang, {{ $user->name }}</h2> 

    <a href="/logout" class="btn-blue">Logout</a> 
</body>
</html>