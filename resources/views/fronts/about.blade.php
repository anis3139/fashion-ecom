@extends('fronts.master')

@section('content')

<!-- banner -->
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
         <li>About</li>
      </ul>
   </div>
</div>
<!-- //short-->
<!--About -->
<section class="about py-lg-4 py-md-3 py-sm-3 py-3 mb-4">
   
   <div class="container" id="about">
         
         <div class="step-name">যোগাযোগ করুন নিম্নে বর্ণিত ঠিকানা সমূহেঃ</div> 
         <p>আমরা সবসময়ই সম্মানিত গ্রাহক এবং মার্চেন্টদের সকল প্রকার মতামত ও পরামর্শকে গুরুত্বের সাথে বিবেচনা করি। আমাদের সেবার মান উন্নয়নে আমরা জানতে চাই আপনার কথা ।</p>
      <div class="row">
         
            

                                                                                 
               
                                                          
                    <div class=" col-md-6" id=about_left>
                      
                        <div class="contact-info-div">
                            <div class="each-contact-info-wrapper">
                                                            
                                <h2>হেড অফিসঃ</h2>
                                <address>
                                  jogoot ডট কম<br>
                                    ৯৮/২ সেনপারা পবর্তা মিরপুর-১০ ঢাকা-১২১৬<br>                                                                                                                
                                   
                                </address>
                            </div>
                      
                            <div class="each-contact-info-wrapper">
                                <h2>অফিস সময়ঃ</h2>
                                <p>শনিবার থেকে বৃহস্পতিবার-সকাল ১০ টা থেকে সন্ধ্যা ৮ টা</p>
                            </div>
                            <div class="each-contact-info-wrapper">
                                <h2>কাস্টমার কেয়ার সার্ভিসঃ</h2>
                                <p style="margin-bottom: 0px;">সপ্তাহে ৭ দিন ২৪ ঘণ্টা</p>
                                <div>
                                    <p style="width: 80px; float: left;">ইমেইল করুন - </p>
                                    <div style="float:left"><a href="mailto:jogoot.com@gmail.com">jogoot.com@gmail.com</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-6" id="about_right">
                       
                            <div class="each-contact-info-wrapper">
                                <h2>মার্চেন্ট হিসেবে আপনার পন্যের অফার দিতে চাইলে যোগাযোগ করুনঃ</h2>
                                <a href="mailto:jogoot.com@gmail.com">jogoot.com@gmail.com</a>
                               
                                 <p>ফোনঃ  01891717189     </p>
                            </div>
                            <div class="each-contact-info-wrapper">
                                <h2>টেকনিক্যাল যেকোন তথ্য অথবা অনুসন্ধান এর জন্য যোগাযোগ করুনঃ</h2>
                                <a href="mailto:it@abedinbazar.com">jogoot.com@gmail.com</a>
                            </div>
                            <div class="each-contact-info-wrapper">
                                <h2>কাস্টমার সাপোর্ট এর জন্য যোগাযোগ করুনঃ</h2>
                                <a href="mailto:jogoot.com@gmail.com">jogoot.com@gmail.com</a>
                                <p>ফোনে অর্ডার, ডেলিভারী সংক্রান্ত তথ্য/আপনার পন্যের ডেলিভারী আপডেট জানতে যোগাযোগ করুনঃ</p>
                            </div>

                            <div class="d-block">
                                <div class="phone-icon">
                                   <img src="https://static.ajkerdeal.com/images/newsite/footer-phone.png" alt="Phone Details">01891717189</div>
                                
                            </div>
                        
                    </div>
              
                  

                  
                {{-- <div class="border-div" id="contactUsEmailDiv">
                    <div class="step-name">ই-মেইল করুন</div>                                                                                
                    <div class="sub-contents">
                        <span id="SystemMessageLabel" style="color:Red;"></span>
                        <span id="InformationLabel"></span>
                        
                        <div class="Contact-Us-Inputs-Wrapper">
                            <p>অনুসন্ধানের কারন</p>
                            <div class="Contact-Us-TextBox-Wrapper">
                                <select name="CallerContactReasonDropDownList" id="CallerContactReasonDropDownList" class="Contact-Us-TextBox">
                              <option value="1">ডেলিভারি সম্পর্কিত তথ্য</option>
                              <option value="2">ডিল সম্পর্কিত অনুসন্ধান</option>
                              <option value="3">বিক্রয়ত্তোর সেবা</option>
                              <option value="4">অভিযোগ</option>
                              <option value="5">অনলাইন পেমেন্ট সম্পর্কিত তথ্য</option>
                              <option value="7">পণ্য ক্রয়ের পদ্ধতি</option>
                              <option value="8">ক্যাশ অন ডেলিভারি সংক্রান্ত তথ্য</option>
                              <option value="9">রেজিস্ট্রেশন পদ্ধতি</option>
                              <option value="10">ফোনে অর্ডার দেয়ার পদ্ধতি</option>
                              <option value="6">অন্যান্য</option>

                              </select>
                            </div>
                        </div>                                            
                        <div class="Contact-Us-Inputs-Wrapper">
                            <p>ই-মেইল</p>
                            <div class="Contact-Us-TextBox-Wrapper">
                                <input name="customerEmailTextBox" type="text" id="customerEmailTextBox" class="Contact-Us-TextBox">
                                <input type="hidden" name="customerIdHiddenField" id="customerIdHiddenField" value="0">
                            </div>
                        </div>  
                        <div class="Contact-Us-Inputs-Wrapper">
                            <p>অনুসন্ধান</p>
                            <div class="Contact-Us-TextBox-Wrapper">
                                <textarea name="CommentsTextBox" rows="2" cols="20" id="CommentsTextBox" class="Contact-Us-TextBox"></textarea>
                            </div>
                        </div>
                        <div class="Contact-Us-Inputs-Wrapper">
                            <p>মোবাইল</p>
                            <div class="Contact-Us-TextBox-Wrapper">
                                <input name="customerMobileTextBox" type="text" id="customerMobileTextBox" class="Contact-Us-TextBox">
                                <span class="required">*</span>
                            </div>
                        </div>
                        
                        <div class="Contact-Us-Submit" style="padding-right: 102px;">
                            <input type="submit" name="submitButton" value="নিশ্চিত করুন" onclick="return checkForm();" id="submitButton" class="Contact-Us-Submit-button">
                        </div>
                    </div>                                        
                </div> --}}
               
                                                                                                                                          
       
      </div>
   </div>
</section>
<!--//about -->

    
@endsection

      

    
 
      
 