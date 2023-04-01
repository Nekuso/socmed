<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Signup</title>
  @vite('resources/css/app.css')
</head>

<body>
  <section class="vh-auto" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/img1.jpg" alt="login form" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                  <form method="POST" action="{{ route('register') }}">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                      {{ Session::get('success') }}
                    </div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">
                      {{ Session::get('fail') }}
                    </div>
                    @endif
                    @csrf
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Register</span>
                    </div>

                    <h5 class="fw-normal mb-2 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                    <div class="form-outline mb-2">
                      <input type="text" id="fname" name="fname" class="form-control form-control-lg" value="{{ old('fname') }}" required />
                      <label class="form-label" for="fname">First Name</label>
                    </div>

                    <div class="form-outline mb-2">
                      <input type="text" id="mname" name="mname" class="form-control form-control-lg" value="{{ old('mname') }}" />
                      <label class="form-label" for="mname">Middle Name</label>
                    </div>

                    <div class="form-outline mb-2">
                      <input type="text" id="lname" name="lname" class="form-control form-control-lg" value="{{ old('lname') }}" required />
                      <label class="form-label" for="lname">Last Name</label>
                    </div>

                    <div class="form-outline mb-2">
                      <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" required />
                      <label class="form-label" for="email">Email address</label>
                    </div>

                    <div class="form-outline mb-2">
                      <input type="password" id="password" name="password" class="form-control form-control-lg" value="{{ old('password') }}" required />
                      <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="form-outline mb-2">
                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" value="{{ old('password_confirmation') }}" required />
                      <label class="form-label" for="password_confirmation">Verify Password</label>
                    </div>

                    <div class="pt-1 mb-2">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
                    </div>

                    <p class="mb-2 pb-lg-2" style="color: #393f81;">Don't have an account?
                      <a href="{{ route('login') }}" style="color: #393f81;">Back to login</a>
                    </p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>