<link href="/assets/asset_login/css/main.css" rel="stylesheet" id="style">
<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Login Siswa</div>
		</div>
		<br>
		<div class="login">
            <form action="{{route('login')}}" id="login" method="POST">
                @csrf
				<input type="text" placeholder="username" name="email"><br>
				<input type="password" placeholder="password" name="password"><br>
				<input type="button" value="Login" onclick="login()">
				<input type="button" value="Kembali" onclick="location.href='/';">
            </form>
        </div>

<script>
    function login() {
        document.getElementById("login").submit();
    }
</script>