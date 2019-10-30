{{-- <div class="dropdown">
  <button class="btn btn-block btn-info dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Од
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
     
                        @for ($k = 1,$ide = 5; $k <= 5; $k++,$ide-- )

                            <a class="dropdown-item" href="#"> 
                            
                                <input type="checkbox"  id="defaultCheck" value="{{$ide}}" name="star"> 
                                <label for="defaultCheck">
                                
                                    @for ($i =$k; $i <= 5; $i++)
                                    <i class="far fa-star"></i>
                                    @endfor
                                </label>
                            </a>

                        @endfor    
                            
                        </div>
</div><br/> --}}

{{-- 
<!-- COLUMNS -->
<div class="dropdown">
  <button class="btn btn-info dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Multi - columns
  </button>
  <div class="dropdown-menu dropdown-multicol2" aria-labelledby="dropdownMenuButton">
    <div class="dropdown-col">
      <a class="dropdown-item" href="#">Oranges</a>
      <a class="dropdown-item" href="#">Bananas</a>
      <a class="dropdown-item" href="#">Apples</a>
          <input type="checkbox"  id="defaultCheck"  name="example2"> 
    </div>
    <div class="dropdown-col">
      <a class="dropdown-item" href="#">Potatoes</a>
      <a class="dropdown-item" href="#">Leeks</a>
      <a class="dropdown-item" href="#">Cauliflowers</a>
          <input type="checkbox"  id="defaultCheck"  name="example2"> 
    </div>
    <div class="dropdown-col">
      <a class="dropdown-item" href="#">Beef</a>
      <a class="dropdown-item" href="#">Pork</a>
      <a class="dropdown-item" href="#">Venison</a>
          <input type="checkbox"  id="defaultCheck"  name="example2"> 
    </div>
  </div>
</div>
 --}}
