<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="{{ asset('css/regis-login.css') }}" rel="stylesheet" />

    <title>Digibook - Login</title>
</head>

<body>
    <div class="container">
        <a href="/">
            <div class="bg">
                <img src="https://i.ibb.co/M5D4hDh/Group-100.png" alt="Group-100" border="0">
            </div>
        </a>
        <div class="content">
            <a href="/" style="text-decoration:none; color: #8692A6; margin-top:em;">
                <p style="margin-top: 2em;margin-left:-5em;">&#10094 Back</p>
            </a>
            <h2
                style="font-size:30pt;margin-top: 3em;margin-bottom: 0.5em; color: #303030;font-weight: bold;font-style:normal;">
                Login To Your Account</h2>
            <form class="form-login" method="post" action="{{route('login')}}">
                @csrf
                <label
                    style="color: #696F79;font-style: normal;font-weight: 500; font-size: 16px;">Email</label><br><br>
                <input type="text" class="t-input" name="email" placeholder="Enter Email" id="email" value=""
                    required><br>
                <label
                    style="color: #696F79;font-style: normal;font-weight: 500; font-size: 16px;">Password</label><br><br>
                <input type="Password" class="t-input" placeholder="Enter Password" name="password" required><br><br>
                <button type="submit" class="submit-button" name="submit-regis">
                    <p style="text-decoration: none; color: #FFFFFF;font-style: normal;font-weight: 500;font-size: 16px;">
                        Login </p>
                </button><br><br>
                <p class="toregis" style="color:#696F79;">Dont Have an Account ?
                    <a href="/register" style=""> Registrasi </a>
                </p>
                <i class="bi bi-file-lock"
                    style="font-style: normal;font-weight: normal;font-size: 12px;line-height: 15px;color: #8692A6; text-align:center;">Your
                    Info is safely secured</i>
            </form>
        </div>
    </div>
</body>

</html>