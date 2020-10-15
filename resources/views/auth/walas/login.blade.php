<link href="/assets/asset_login/css_admin/main.css" rel="stylesheet" id="style">


<title>Login | Wali Kelas </title>
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
        <form method="POST" action="{{route('walas.login.submit')}}">
            @csrf
            <div>
                <h1>Wali Kelas Login</h1>
            </div>
            <div>
                <br>
                <br>
                <input type="text" placeholder="Masukan Email" required id="username" name="email" autofocus="on"/>
                <input type="password" placeholder="Masukan Password" required="" id="password" name="password" />
            </div>
                <input type="submit" value="Login" />
                <div>
                </div>
            </form><!-- form -->
        </section><!-- content -->
    </div><!-- container -->
    </body>
