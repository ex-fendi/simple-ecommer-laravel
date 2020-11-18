
<div class="might-like-section" style="background-color:#eeeeee;">
    <div class="container">
        <h2>Produk Serupa</h2>
        <div class="row">
                @foreach($serupa as $produk)
                <div class="col-md-3 hvr-float-shadow">
                          <div class="product bg-white">
                            <div class="col-md-12 text-center mt-3">
                                    <img src="{{asset($produk->foto)}}" width="100%" height="200" alt="product">
                                    <h6 class="product-name"><strong><smalll> {{$produk->judul_produk}} </smalll></strong></h6>
                                    <p class="product-price">  {{formatRupiah($produk->harga_kambing)}}</p>
                            </div>
                            <div class="col-md-12 text-center mt-2 ">
                                <div class="bg-gradient-primary" style="padding: 10px;">
                                    
                                    <a  href="{{route('produk.detail', ['id'=>$produk->id])}}" class="form-control btn btn-success" role="button">Lihat Detail</a>
                                </div>
                            </div>
                    </div>  
                </div>    
                @endforeach
    
            </div>
    
    </div>
</div>
