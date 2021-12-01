@extends('utama.layout')
@section('title', 'Home')
@section('konten')
<!-- kategori -->
<div class="pt-3 me-5" style="width: fit-content; text-align: end;">
    <form action="{{route('index')}}" method="post" class="row">
        @csrf
        <select class="form-select my-1 col mx-3 w-auto" name="kategori" id="kategori">
            <option value="">Silahkan pilih kategori buku</option>
            <option value="">Semua</option>
            @foreach($kategori as $k)
            <option value="{{$k->kategori}}">{{$k->kategori}}</option>
            @endforeach
        </select>
        <input class="input form-control my-1 col mx-3 w-auto rounded-pill" name="search" type="search"
            placeholder="Masukkan judul buku" aria-label="Search" />
        <input type="submit" value="Submit" class="btn rounded-pill my-1 col mx-3 px-3"
            style="background-color: #f0914d; color: white;">
    </form>
</div>
<!-- end-kategori -->

<!-- produk -->
<div class="" style="margin-top: 2rem!important">
    @foreach ($buku as $b)
    <div class="card produk">
        @php $no_gambar = 'img/produk' . $b->id . '.jpg'; @endphp
        <img class="card-img-top" src="{{ asset($no_gambar) }}" alt="Card image cap" />
        <div class="card-body">
            <p class="card-text judul"><b>{{$b->nama}}</b></p>
            <p class="card-text penulis">{{$b->penulis}}</p>
            <p class="card-text kategori">{{$b->kategori}}</p>
            <p class="card-text kategori">Stok: <span
                    class="fw-bold {{$b->stok <= 3 ? 'text-danger' : ''}}">{{$b->stok}}</span></p>
            <p class="card-text harga">IDR {{number_format($b->harga, 0, ",", ".")}}</p><br>
            @auth
            <form action="{{route('masuk_keranjang')}}" method="post">
                @csrf
                <input type="hidden" name="id_buku" value="{{$b->id}}">
                <input type="hidden" name="stok" value="{{$b->stok}}">
                <input type="hidden" name="harga" value="{{$b->harga}}">
                @if ($b->stok == 0)
                <h4 class="fw-bold text-danger">Stok Habis!</h4>
                @else
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]">
                            <i class="bi bi-dash"></i>
                        </button>
                    </span>
                    <input type="text" id="quant" name="quant[2]" class="form-control input-number" value="0" min="0"
                        max="{{$b->stok}}">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                            <i class="bi bi-plus"></i>
                        </button>
                    </span>
                </div>
                <button type="submit" id="tambah" class="tambah btn rounded-pill" disabled>
                    Tambah ke Keranjang
                </button>
                @endif
            </form>
            @endauth
        </div>
    </div>
    @endforeach
    <div class="pb-5 d-flex flex-row-reverse pe-5 me-5">
        {{$buku->links()}}
    </div>
</div>
<!-- end-produk -->

<!-- js -->
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
    var input = $(this).closest('div').find("input[name='" + fieldName + "']");
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
@endsection