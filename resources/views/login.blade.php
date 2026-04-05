<!DOCTYPE html>
<html>
    Nama: Annasya Maulafidatu Zahra, NIM: 2311102246 
<head>
    <title>Login</title>
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
    <h2>Login</h2> 

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p> 
    @endif

    <form action="/auth" method="POST"> 
        @csrf
        <div>
            <label>Email</label><br> 
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password</label><br> 
            <input type="password" name="password" required>
        </div>
        <button type="submit" class="btn-green">Login</button> 
    </form>

    <br>
    <a href="/registration">Belum punya akun? Yuk Register</a> 
</body>
</html>