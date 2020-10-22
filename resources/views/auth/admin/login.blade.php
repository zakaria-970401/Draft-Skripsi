<link href="/assets/asset_login/css_admin/main.css" rel="stylesheet" id="style">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<title>Login | Admin </title>
<br>
<br>
<br>
<br>
<br>
<body>
    <div class="container">
        <section id="content">
            <img src="/assets/images/avatars/logo.png" style="width: 260px" alt="">
            <br>
            <br>
        <form method="POST" action="{{route('admin.login.submit')}}">
            @csrf
            <h1>Admin Login</h1>
            <div>               
            </div>
            <div>
                <br>
                <br>
                <input type="text" placeholder="Masukan Email" required id="username" name="email" autofocus="on" autocomplete="off" />
                <input type="password" placeholder="Masukan Password" required="" id="password" name="password" autocomplete="off"  />  
            </div>
            <div class="row">
                    <input type="checkbox" id="pw-checkbox">Lihat Password
                </div>
                <input type="submit" value="Login" />
                <div>
                </div>
            </form><!-- form -->
        </section><!-- content -->
    </div><!-- container -->
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
    </script>
    </body>

