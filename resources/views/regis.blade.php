<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="{{ asset('css/regis-login.css') }}" rel="stylesheet" />

    <title>Digibook - Registrasi</title>
</head>

<body>
    <div class="container">
        <a href="">
            <div class="bg">
                <img src="https://i.ibb.co/M5D4hDh/Group-100.png" alt="Group-100" border="0">
            </div>
        </a>
        <div class="content">
            <a href="javascript:history.back()" style="text-decoration:none; color: #8692A6; margin-top:em;">
                <p style="margin-top: 2em;margin-left:-5em;">&#10094 Back</p>
            </a>

            <h2
                style="font-size:30pt;margin-top: 3em;margin-bottom: 0.5em; color: #303030;font-weight: bold;font-style:normal;">
                Register Account</h2>
            <h4 style="color: #8692A6; margin-bottom:2em;">For the purpose of School regulation, your details are
                required.</h4>

            <form class="form-login" method="post" action="{{route('proses_register')}}">
                @csrf
                <label
                    style="color: #696F79;font-style: normal;font-weight: 500; font-size: 16px;">Email</label><br><br>
                <input type="email" class="t-input" name="email" placeholder="Enter Email" id="email" required><br>

                <label
                    style="color: #696F79;font-style: normal;font-weight: 500; font-size: 16px;">Password</label><br><br>
                <input type="Password" class="t-input" placeholder="Enter Password" name="password" required><br>

                <label style="color: #696F79;font-style: normal;font-weight: 500; font-size: 16px;">Nama
                    Lengkap</label><br><br>
                <input type="text" class="t-input" name="nama" placeholder="Enter Nama Lengkap" id="nama" required><br>

                <label
                    style="color: #696F79;font-style: normal;font-weight: 500; font-size: 16px;">Alamat</label><br><br>
                <input type="text" class="t-input" name="alamat" placeholder="Enter Alamat" id="alamat" required><br>

                <button type="submit" class="submit-button" name="submit-regis">
                    <p
                        style="text-decoration: none; color: #FFFFFF;font-style: normal;font-weight: 500;font-size: 16px;">
                        Register Account </p>
                </button>
            </form>
        </div>
    </div>

</body>

</html>