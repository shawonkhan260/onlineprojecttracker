

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Project Tracker login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('logintemplate/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('logintemplate/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('logintemplate/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('logintemplate/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('logintemplate/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('logintemplate/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('logintemplate/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('logintemplate/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter ">
		<div class="container-login100 bg-dark">
			<div class="wrap-login100 " style="box-shadow: 10px 10px 5px ">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="logintemplate/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
					<span class="login100-form-title">
						Member Login
					</span>
 
					<div class="wrap-input100 validate-input">
						<input class="input100 @error('email') is-invalid @enderror"  placeholder="Email" id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
					</div>

                

					<div class="wrap-input100 validate-input" >
						<input class="input100 @error('password') is-invalid @enderror" placeholder="Password" id="password" type="password" name="password" required autocomplete="current-password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

                    @if (Route::has('password.request'))
					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="{{ route('password.request') }}">
							Username / Password?
						</a>
					</div>
                    @endif
                    @if (Route::has('register'))
                    <div class="text-center p-t-136">
						<a class="txt2" href="{{ route('register') }}">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
                    @endif
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{asset('logintemplate/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logintemplate/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('logintemplate/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logintemplate/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logintemplate/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('logintemplate/js/main.js')}}"></script>

</body>
</html>
