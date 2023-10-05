<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Kebutuhan Kalori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <center>
                        <img src="{{ URL::asset('image/login.png'); }}" width="200" height="100" alt="">
                        <h2 class="mt-3 font-weight-bold">Sistem Informasi</h2>
                        <h2>Kebutuhan Kalori Pada Pasien</h2>
                    </center>
                    <hr class="my-4">
                    <h4 class="text-center mb-4">Selamat Datang</h4>
                    @if(Session::has('salah'))
                        <div class="alert alert-danger text-center" role="alert">
                            Username atau Password yang Anda masukan Salah
                        </div>
                    @endif
                    <form action="{{ route('actionlogin') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">Show</button>
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-block" style="background-color: #ff6347; color: white;">Log In</button>
                        </div>
                    </form>
                    <a href="{{route('register')}}">register</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Show' : 'Hide';
    });
</script>
</body>
</html>
