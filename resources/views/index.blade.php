<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>DIGIBOOK</title>
</head>

<body>
    <div class="main">
        <!-- navbar -->
        <div class="navbar fixed-top">
            <div class="nav-item">
                <a class="item" href="/"><span>Home</span></a>
                <a class="item" href="/keranjang"><span>Keranjang</span></a>
                <a class="item" href="/profil"><span>Profil</span></a>
            </div>
            @auth
            <a class="logout" href="/logout"><span>LOG OUT</span></a>
            @endauth
            @guest
            <a class="logout" href="/login"><span>LOG IN</span></a>
            @endguest
            <div class="logo"></div>
            <span class="brand">Toko Buku Online<br />DIGIBOOK</span>
            @auth
            <div class="user">
                <img src="{{ asset('img/user.png') }}" alt="user.png" />
                <span class="username">{{Auth::user()->email}}</span>
            </div>
            @endauth
        </div>
        <!-- end-navbar -->

        <!-- kategori -->
        <div class="all btn button active-kategori rounded-pill">
            <span>All</span>
        </div>
        <div class="romance btn button rounded-pill">
            <span>Romance</span>
        </div>
        <div class="religion btn button rounded-pill">
            <span>Religion & Spirituality</span>
        </div>
        <div class="manga btn button rounded-pill">
            <span>Manga</span>
        </div>
        <div class="computer btn button rounded-pill">
            <span>Computers & Technology</span>
        </div>
        <div class="history btn button rounded-pill">
            <span>History</span>
        </div>
        <!-- end-kategori -->

        <!-- search -->
        <div class="search">
            <input class="input form-control mr-sm-2 rounded-pill" type="search" placeholder="Search..."
                aria-label="Search" />
        </div>
        <div class="submit">
            <button class="btn my-2 my-sm-0 rounded-pill" type="submit">
                <span>Search</span>
            </button>
        </div>
        <!-- end-search -->

        <!-- produk -->
        @foreach ($buku as $b)
        <div class="card produk">
            <img class="card-img-top" src="{{ asset('img/produk1.png') }}" alt="Card image cap" />
            <div class="card-body">
                <p class="card-text judul"><b>{{$b->nama}}</b></p>
                <p class="card-text penulis">{{$b->penulis}}</p>
                <p class="card-text kategori">{{$b->kategori}}</p>
                <p class="card-text kategori">Stok: {{$b->stok}}</p>
                <p class="card-text harga">IDR {{$b->harga}}</p><br>
                <form action="{{route('masuk_keranjang')}}" method="post">
                    @csrf
                    <input type="hidden" name="id_buku" value="{{$b->id}}">
                    <input type="hidden" name="stok" value="{{$b->stok}}">
                    <input type="hidden" name="harga" value="{{$b->harga}}">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]">
                                <i class="bi bi-dash"></i>
                            </button>
                        </span>
                        <input type="text" id="quant" name="quant[2]" class="form-control input-number" value="0" min="0" max="{{$b->stok}}">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                <i class="bi bi-plus"></i>
                            </button>
                        </span>
                    </div>
                    <button type="submit" id="tambah" class="tambah btn rounded-pill" disabled>
                        Tambah ke Keranjang
                    </button>
                </form>
            </div>
        </div>
        @endforeach
        <!-- end-produk -->

        <!-- js -->
        <script></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".button").each(function() {
                    $(this).click(function() {
                        $(this).addClass("active-kategori");
                        $(this).siblings().removeClass("active-kategori");
                    });
                });
            });
            $('.btn-number').click(function(e) {
                e.preventDefault();

                fieldName = $(this).attr('data-field');
                type = $(this).attr('data-type');
                // var input = $("input[name='" + fieldName + "']");
                var input = $(this).closest('div').find("input[name='"+fieldName+"']");
                var currentVal = parseInt(input.val());
                if (!isNaN(currentVal)) {
                    if (type == 'minus') {
                        if (currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                            $(this).closest('form').find('#tambah').attr('disabled', false);
                        }
                        if (parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                            $(this).closest('form').find('#tambah').attr('disabled', true);
                        }
                    } else if (type == 'plus') {
                        if (currentVal < input.attr('max')) {
                            input.val(currentVal + 1).change();
                            $(this).closest('form').find('#tambah').attr('disabled', false);
                        }
                        if (parseInt(input.val()) == input.attr('max')) {
                            $(this).attr('disabled', true);
                            $(this).closest('form').find('#tambah').attr('disabled', false);
                        }
                    }
                } else {
                    input.val(0);
                }
            });
            $('.input-number').focusin(function() {
                $(this).data('oldValue', $(this).val());
            });
            $('.input-number').change(function() {

                minValue = parseInt($(this).attr('min'));
                maxValue = parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());

                name = $(this).attr('name');
                if (valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    alert('Sorry, the minimum value was reached');
                    $(this).val($(this).data('oldValue'));
                }
                if (valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    alert('Sorry, the maximum value was reached');
                    $(this).val($(this).data('oldValue'));
                }


            });
            $(".input-number").keydown(function(e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        </script>
        <!-- end-js -->
    </div>
</body>

</html>