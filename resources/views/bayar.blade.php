<!DOCTYPE html>
<html>

<head>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/assets/css/main.css">
    <link href="{{ asset('css/main1.css') }}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https: //cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <div class="main">

        <!-- navbar -->
        <div class="navbar fixed-top">
            <div class="nav-item">
                <a class="item" href=""><span>Home</span></a>
                <a class="item" href=""><span>Kategori</span></a>
                <a class="item" href=""><span>Keranjang</span></a>
                <a class="item" href=""><span>Profil</span></a>
            </div>
            <div class="logout">
                <a class="item" href=""><span>LOG OUT</span></a>
            </div>
            <div class="logo">
                <a href="https://imgbb.com/"><img src="https://i.ibb.co/3mR2Kt9/DIGIBOOK-logos-2.png"
                        alt="DIGIBOOK-logos-2" border="0"></a>
            </div>

            <span class="brand">Toko Buku Online<br>DIGIBOOK</span>
            <div class="user">
                <img src="" alt="" />
                <span class="email">user@gmail.com</span>
            </div>
        </div>
        <!-- end-navbar -->

        <!-- kategori -->

        <section id="dir" class="dir">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol>
                        <li><a href="">Kategori</a></li>
                        <li><a href="">Pemesanan</a></li>
                        <li style="color:  #F0914D;">Pembayaran</li>
                    </ol>
                </div>
            </div>
        </section><!-- AKHIR AKTOR -->

        <div class="container-pembayaran">
            <div class="gap-content" id="index-dataBayar">
                <img src="https://i.ibb.co/gWCq6KY/image-2.png" alt="image-2" id="img-buku" border="0">
                <div class="dataPembayaran">
                    <h2>Catatan Tentang Hujan</h2>
                    <h4>Anindya Frista</h4>
                    <span>Romance</span>
                    <span style="color:#FF3535">IDR 89.000</span>
                    <table>
                        <tr>
                            <td>
                                <b>Id Buku</b>
                            </td>
                            <td> : </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <b>Status</b>
                            </td>
                            <td> : </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <b>Jumlah</b>
                            </td>
                            <td> : </td>
                            <td></td>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td>
                                    <b>Cara Pembayaran</b><br><br><br>
                                </td>
                                <td>
                                    <select class="form-control" id="Select" required name="pembayaran">
                                        <option>--</option>
                                        <option>OVO</option>
                                        <option>Debit ATM</option>
                                        <option>M-Banking</option>
                                    </select>
                                </td>
                            </div>
                        </tr>
                    </table>
                    <button type="button" data-toggle="modal" data-target="#pay" style="background-color:#F0914D; margin:1em;padding:1em 4em 1em 3em;border-radius:25px;
                                cursor:pointer; ">
                        <i class="nav-icon fas fa-pencil-alt"
                            style="text-decoration: none; color: #FFFFFF ;font-style: normal;font-weight: 500;font-size: 18px;">Check
                            Out!</i>
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="padding:5em; ">
                    <img src="https://i.ibb.co/1mCxR59/sign.png"
                        style="width:200px; margin-left:5.5em;margin-bottom:1em;" alt="sign" border="0">
                    <div class="body" style="font-weight: bold;">
                        <h1>Pembayaran Sukses</h1>
                        <span style="margin-left: 6em;">Pembelian buku anda berhasil </span><br>
                        <span style="margin-left: 1em;">silahkan klik selesai untuk kembali ke halaman utama</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="submit" data-dismiss="modal">
                            <a href="">
                                selesai
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
</body>

</html>