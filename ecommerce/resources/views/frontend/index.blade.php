@extends('layouts.front')

@section('title')
Welcome to TOBA AGRO
@endsection

@section('content')
@include('layouts.inc.slider')
<div class="py-5">
    <div class="container">
        @guest
        <!-- Responsive Image Gallery -->
        <div class="image-container">

            <div class="row row-cols-2 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card" style="border:1px solid black;height:69em; ">
                        <img src="{{ asset('assets/images/kemirii.jpeg') }}" alt="Gambar 3" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Kemiri</h5>
                            <p class="card-text">Kemiri adalah jenis biji-bijian yang berasal dari pohon kemiri,
                                yang tumbuh di wilayah tropis seperti Asia Tenggara. Biji kemiri memiliki kulit keras
                                berwarna cokelat dan daging dalam yang berwarna putih. Kemiri memiliki rasa yang kaya,
                                dengan sentuhan manis dan sedikit pahit. Biji kemiri umumnya digunakan sebagai bumbu dalam
                                masakan, baik digiling menjadi pasta atau diolah menjadi bubuk. Kemiri sering digunakan dalam
                                hidangan tradisional seperti rendang, gulai, dan kari untuk memberikan aroma dan rasa yang khas.
                                Selain itu, kemiri juga dikenal karena kandungan lemak sehatnya dan sering digunakan dalam
                                produk perawatan kulit dan rambut.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="border:1px solid black;height:60em; ">
                        <img src="{{ asset('assets/images/pemilik usaha.jpeg') }}" alt="Gambar 3" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Pemilik Usaha</h5>
                            <p class="card-text">Nama:Ebenezer Aritonang<br>
                                Tempat,Tanggal&Lahir:Sidikalang, 17 November 1977<br>
                                Start Buka Usaha : 05 Januari 2013<br>
                                Daerah Pengiriman Barang : Jawa, Batam, Sumatra Utara<br>
                                Lokasi Usaha : Sitorang, Kecamatan Silaen, Kabupaten Toba
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="border:1px solid black;height:69em; ">
                        <img src="{{ asset('assets/images/kacangmerah.jpeg') }}" alt="Gambar 3" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Kacang Merah</h5>
                            <p class="card-text">Kacang merah adalah jenis kacang-kacangan yang dikenal karena warnanya
                                yang merah gelap dan bentuknya yang bulat. Kacang merah memiliki cita rasa khas dan tekstur yang kenyal. Kacang ini
                                merupakan sumber protein nabati yang baik dan mengandung serat yang tinggi, menjadikannya makanan yang sangat bergizi.
                                Kacang merah sering digunakan dalam berbagai hidangan, seperti sup, chili con carne, dan salad. Kacang merah juga populer
                                di berbagai masakan tradisional, seperti nasi goreng dan makanan khas Meksiko seperti burrito dan enchilada.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Responsive Image Gallery -->
        @endguest
        <div class="row pb-5 mt-5">
            <h2>All Product</h2>
            @foreach ($featured_category as $prod)
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <!-- Card-->
                <div class="card rounded shadow-sm border-0">
                    <div class="card-body p-4">
                        <a href="{{ url('category/' . $prod->slug . '/' . $prod->slug) }}">
                            <img src="{{ asset('assets/uploads/category/' . $prod->image) }}" alt="" class="img-fluid d-block mx-auto mb-3">
                        </a>
                        <h5> <a href="{{ url('category/' . $prod->slug . '/' . $prod->slug) }}" class="text-dark">{{ $prod->name }}</a></h5>
                        <p class="small text-muted font-italic">{{ $prod->description }}</p>
                        <p class="small text-muted font-italic fw-bold">Rp {{ $prod->selling_price }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>© 2023 TOBA AGRO. Sitorang Punya <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
        </svg></p>
</footer>
<!-- End of Footer -->
@endsection