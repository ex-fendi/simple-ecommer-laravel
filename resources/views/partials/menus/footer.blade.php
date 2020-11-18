<!-- Footer -->
    {{-- <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; 2019 <a href="#">E-COMMERCE DESA DERMAJI</a>.</span> All rights reserved. |
        <strong><a href="http://www.lantipsoft.com">Pasir Technology</a>.</strong> All rights reserved.
      </div>
    </div> --}}

<div class="container">
    <div class="row">
        <div class=" col-sm-4 col-md col-sm-4  col-12 col">
            <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
            <!--headin5_amrc-->
            <p class="mb10">
            {{$general->slogan}}</p>
            <p><i class="fa fa-location-arrow"></i> {{$general->alamat}} </p>
            <p><i class="fa fa-phone"></i>  {{$general->telp}} </p>
            <p><i class="fa fa fa-envelope"></i> {{$general->email}}  </p>
        </div>
        
        <div class=" col-sm-4 col-md  col-6 col text-center">
            Social Media
            <ul class="social_footer_ul">
                    <li><a href="{{$general->fb}}" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                    <li><a href="{{$general->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{$general->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{{$general->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                </ul>
        <!--footer_ul_amrc ends here-->
        </div>
        
        <div class=" col-sm-4 col-md  col-6 col">
            <h5 class="headin5_amrc col_white_amrc pt2">Blog</h5>
            <!--headin5_amrc-->
            <ul class="footer_ul_amrc">
                <li><a class="text-white" href="{{$general->blog}}">{{$general->nama_blog}}</a></li>
            </ul>
        <!--footer_ul_amrc ends here-->
        </div>
    </div>
</div>
    
<div class="container">
   
    <p class="text-center">Copyright @2019 | Designed by {{$general->nama_site}}</p>
    
    <!--social_footer_ul ends here-->
</div>
