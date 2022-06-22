<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - PPDB Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="shortcut icon" href="images/logoo.png" type="image/x-icon">
</head>
<body>
    @include('sweetalert::alert') 
    <div class="container mt-4">
        <div class="row d-flex mt-3">
            <div class="col-md-7 col-sm-12 mx-auto justify-content-center align-items-center">
                <div class="card pt-4 mt-5">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="/images/jumbotron.png" height="140" class='mb-4'>
                            <h3>Sign Up</h3>
                            <p>Please fill the form to register.</p>
                        </div>
                        <form action="/register" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group position-relative has-icon-left">
                                        <div class="clearfix">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="position-relative">
                                            <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror" 
                                            placeholder="Name" required value="{{ old('name') }}">
                                            <div class="form-control-icon ml-5">
                                                <i class="fas fa-user-check text-light"></i>
                                            </div>
                                            @error('name')
                                            <div class="position-absolute mb-5 invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group position-relative has-icon-left">
                                        <div class="clearfix">
                                            <label for="nip">NIP</label>
                                        </div>
                                        <div class="position-relative">
                                            <input type="text" name="nip" id="nip" 
                                            class="form-control @error('nip') is-invalid @enderror"" 
                                            placeholder="NIP" required value="{{ old('nip') }}">
                                            <div class="form-control-icon ml-5">
                                                <i class="fab fa-keybase text-light"></i>
                                            </div>
                                            @error('nip')
                                            <div class="position-absolute mb-5 invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mt-3">
                                    <div class="form-group position-relative has-icon-left">
                                        <div class="clearfix">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="position-relative">
                                            <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" 
                                            placeholder="name@example.com" required value="{{ old('email') }}">
                                            <div class="form-control-icon ml-5">
                                                <i class="fas fa-envelope text-light"></i>
                                            </div>
                                            @error('email')
                                            <div class="position-absolute mb-5 invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mt-3">
                                    <div class="form-group position-relative has-icon-left">
                                        <div class="clearfix">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="position-relative">
                                            <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" 
                                            placeholder="Password" required>
                                            <div class="form-control-icon ml-5">
                                                <i id="eye" class="fa fa-eye text-light"></i>
                                            </div>
                                            @error('password')
                                            <div class="position-absolute mb-5 invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-end mt-3 mb-3">
                                Have an account? <a href="/" class="text-primary"> Sign In</a>
                            </div>
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        const password = document.getElementById("password");
        const eye = document.getElementById("eye");
        const icon = document.getElementById("eye");
        eye.addEventListener('click', function() {
          this.classList.toggle('active');
          if (this.classList.contains('active')) {
            icon.classList.replace('fa-eye', 'fa-eye-slash');
            password.setAttribute('type', 'text');
          } else {
            icon.classList.replace('fa-eye-slash', 'fa-eye');
            password.setAttribute('type', 'password');
          }
        })
      </script>
</body>
</html>