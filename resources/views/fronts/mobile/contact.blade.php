
      @extends('fronts.master')


@section('content')



<div class="inner_page-banner one-img">
</div>
<!--//banner -->
<!-- short -->
<div class="using-border py-3">
   <div class="inner_breadcrumb  ml-4">
      <ul class="short_ls">
         <li>
            <a href="index.php">Home</a>
            <span>/ /</span>
         </li>
         <li>Contact</li>
      </ul>
   </div>
</div>
<!-- //short-->
<!--contact -->
<section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
   <div class="container py-lg-5 py-md-4 py-sm-4 py-3" id="header_top">
      <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Contact US</h3>
      <div class="contact-list-grid">
         <form action="#" method="post">
            <div class=" agile-wls-contact-mid">
               <div class="form-group contact-forms">
                  <input type="text" class="form-control" placeholder="Name">
               </div>
               <div class="form-group contact-forms">
                  <input type="email" class="form-control" placeholder="Email">
               </div>
               <div class="form-group contact-forms">
                  <input type="text" class="form-control" placeholder="Mobile Number">
               </div>
               <div class="form-group contact-forms">
                  <textarea class="form-control" rows="3"></textarea>
               </div>
               <button type="submit" class="btn btn-block sent-butnn">Send</button>
            </div>
         </form>
      </div>
   </div>
   <!--//contact-map -->
</section>
<!--subscribe-address-->
<section class="subscribe">
   <div class="container" id="contract_map">
   <div class="row">
      <div class="col-lg-6 col-md-6 map-info-right px-0">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.365644668798!2d90.36623381445688!3d23.805593492583633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d6c4a167db%3A0x71ea54794cfde7fb!2sAbedin+Fashion!5e0!3m2!1sen!2sbd!4v1563359793498!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="col-lg-6 col-md-6 address-w3l-right text-center text-dark">
         <div class="address-gried ">
            <span class="far fa-map"></span>
            <h6>৯২/১ সেনপাড়া , পর্বতা মিরপুর-১০ ঢাকা -১২১৬<br>Dhaka 1216
            <h6>
         </div>
         <div class="address-gried mt-3">
            <span class="fas fa-phone-volume"></span>
            <h6>+88 01713334477<br>+8801797587488</h6>
         </div>
         <div class=" address-gried mt-3">
            <span class="far fa-envelope"></span>
            <h6><a href="mailto:info@example.com">abedinbazarbd@gmail.com</a>
               <br><a href="mailto:info@example.com">abedincomination@gmail.com</a>
            </h6>
         </div>
      </div>
   </div>
 </div>
</section>


<div class="clear"></div>

@endsection



