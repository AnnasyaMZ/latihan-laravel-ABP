<!DOCTYPE html>
<html>
      
<head>
    <title>Registration</title>
    <style>
    
        .btn-green {
            background-color: #28a745; 
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-green:hover {
            background-color: #218838;
        }
        form div {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    Nama: Annasya Maulafidatu Zahra, NIM: 2311102246 
    <h2>Registration</h2> 

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p> 
    @endif

    <form action="/register" method="POST"> 
        @csrf
        <div>
            <label>Email</label><br> 
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Nama</label><br> 
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Password</label><br> 
            <input type="password" name="password" required>
        </div>
        <button type="submit" class="btn-green">Register</button> 
    </form>

    <br>
    <a href="/login">Sudah punya akun? Yuk Login</a> 
</body>
</html>