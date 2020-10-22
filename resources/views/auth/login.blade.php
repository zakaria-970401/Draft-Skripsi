<link href="/assets/asset_login/css/main.css" rel="stylesheet" id="style">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Login Siswa</div>
		</div>
		<br>
		<div class="login">
            <form action="{{route('login')}}" id="login" method="POST">
                @csrf
				<input type="text" placeholder="username" name="email" autofocus="on" autocomplete="off">
				<br>
				<br>
				<input type="password" placeholder="password" name="password" id="form-pw" autocomplete="off">
				<div class="row">
					<h2 style="color: black">
						<button type="button" id="btn_show"><i class="fa fa-eye"> <b>Lihat Password
						</i>
					 </h2>
				  </button>
					<h2 style="color: black">
						<button type="button" id="btn_hide"><i class="fa fa-eye"> <b>Sembunyikan Password
						</i>
					 </h2>
				  </button>
		 		</div>
			<br>
			<input type="button" value="Login" onclick="login()">
			<input type="button" value="Kembali" onclick="location.href='/';">
		</form>
	</div>

<script type="text/javascript">

$(document).ready(function(){		
		$('#pw-checkbox').click(function(){
			if($(this).is(':checked')){
				$('#password').attr('type','text');
			}else{
				$('#password').attr('type','password');
			}
		});
	});

		$('#btn_hide').hide()

		$("#btn_show").click(function(){
			$("#form-pw").attr("type", "text");
			$("#btn_show").hide();
			$("#btn_hide").show();
		});
		
		$("#btn_hide").click(function(){
			$("#form-pw").attr("type", "password");
			$("#btn_show").show();
			$("#btn_hide").hide();
		});

    function login() {
        document.getElementById("login").submit();
    }
</script>