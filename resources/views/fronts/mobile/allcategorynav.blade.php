@extends('fronts.master')


@section('content')

<div class="container" id="allcats">

    <div class="row">
    <span ><img src="https://static.ajkerdeal.com/images/all-cat-icon.svg"></span> সকল ক্যাটাগরি </div>

            <div class="all-cat-text" >


                      
                    
                      
                <div id="wrapper1">
                    {{-- toggoler nav --}}
                    <nav class="navbar navbar-expand-sm navbar-light ">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                      </button>
                    
                {{-- toggoler nav --}}
                  @foreach($allcategory as $v_allcategory)
              
    
                        <div id="vfx1">
    
                      <ul class="using navbar-nav">
                              
                    <li class="pad nav-item" style="border-bottom: 1px solid #fff"><a href="#"><span span="color: #1d1b1b;" >{{ $v_allcategory->category_name  }}<i class="fas fa-angle-down"></i></span></a>
                        <ul>
                        
                                
                              @foreach($v_allcategory->subCategory as $value)
                                  <div class="sub-l1">
                      <h3><a href="{{ url('/sub-category') }}/{{ $value->id }}"  class="text-white">{{ $value->subCategory_name }} </a></h3>
                                    
                                  @foreach($value->thirdCategory as $my )
                                    <ul>
                        <li class="nav-item"><a href="{{ url('/sub-category-last') }}/{{ $my->id }}" style="display:none;">{{ $my->thirdCategoryName }}</a></li>
                                    </ul>
                                    @endforeach
                                  </div>
                                @endforeach
                                
                               
                             
                            
                          </li>	
                          </ul>	
                        </div>
            
    
                        @endforeach
                    
                  
                      <!-- sub-end -->
                        <!-- sub menu -->
         
                  <!-- sub-end -->
                
                
                </nav>
    
                  </div>
              </div>
								
                    
                    
     </div>
    </div>
    
{{-- <div class="controler">
  <div class="row">
   
    <div id="vfx">
      <ul class="using">
          
        <li class="pad" style="border-bottom: 1px solid #fff"><a href="#"><span>{{ $v_allcategory->category_name }}</span></a>
          <ul>
          <div class="sub-wrapper-vfx">
            <div class="sub-con">
              <div class="sub-hol">
            @foreach($v_allcategory->subCategory as $value)
                <div class="sub-l">
<h3><a href="{{ url('/sub-category') }}/{{ $value->id }}">{{ $value->subCategory_name }}</a></h3>
                  
                @foreach($value->thirdCategory as $my )
                  <ul>
      <li><a href="{{ url('/sub-category-last') }}/{{ $my->id }}">{{ $my->thirdCategoryName }}</a></li>
                  </ul>
                  @endforeach
                </div>
             
              
              </div>
            </div>
          </div>
           </li>	
          </ul>	
    </div>
  </div>
</div> --}}






@endsection

