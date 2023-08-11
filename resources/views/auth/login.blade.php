

<head>
	<title>Account</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('design/css/login.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="container" id="container">
		<div class="row">
			<div class="form-container sign-up-container">
				<form method="post" action="{{ route('register') }}">
				@csrf
					<h1>Create Account</h1>
					<div class="social-container">
						<a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></i></a>
						<a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></i></a>
						<a href="#" class="social"><i class="fa fa-linkedin" aria-hidden="true"></i></i></a>
					</div>
					<span>or use your email for registration</span>
          			<input type="text" placeholder="Username" name="name" id="name" required autofocus autocomplete="name"/>
					<input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username"/>
					<input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
										placeholder="Password"
                                        required autocomplete="new-password"/>
					<input type="password" placeholder="Password Confirm" name="password_confirmation" id="password_confirmation" required autocomplete="new-password"/>
					<button type="submit">Sign Up</button>
					<p id="mobile_para">To keep connected with us,please login</p>
					<button class="ghost_mobile" id="signIn_mobile">Sign In</button>
				</form>
			</div>
			<div class="form-container sign-in-container">
				<form method="post" action="{{ route('login') }}">
				@csrf
					<h1>Sign in</h1>
					<span>or use your account</span>
					<input type="email" placeholder="Email" name="email" id="email" required autofocus autocomplete="username"/>
					<input type="password" placeholder="Password" name="password" id="password" required autocomplete="current-password" />
					<a href="#">Forgot your password?</a>
					<button type="submit">Sign In</button>
					<p id="mobile_para">Don't have an account? Sign up here !!</p>
					<button class="ghost_mobile" id="signUp_mobile mt-5">Sign Up</button>
				</form>
			</div>
			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overlay-left">
						<h1>Halo!</h1>
						<p>Masukkan data personal anda dan jelajahi bergabagai Buku Disini !</p>
						<button class="ghost" id="signIn">Sign In</button>
					</div>
					<div class="overlay-panel overlay-right">
						<h1>Selamat Datang Kembali!</h1>
						<p>Untuk tetap terkoneksi denganku pastikan masuk dengan data akunmu ya!</p>
						<button class="ghost" id="signUp">Sign Up</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script>
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');
		const signUpButton_mobile = document.getElementById('signUp_mobile');
		const signInButton_mobile = document.getElementById('signIn_mobile');


		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
		});

		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});

		signUpButton_mobile.addEventListener('click', () => {
			container.classList.add("right-panel-active");
		});

		signInButton_mobile.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});
	</script>
</body>