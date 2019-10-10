@extends('layouts.frontLayout.front_design')
@section('content')





<form>
 <div class="container">

  <div class="row">
    <div class="col">
      <select id="country" name="country" class="form-control ">
        @foreach ($destination  as $dis)
          <option value="{{ $dis->name }}"  selected >{{ $dis->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="col">
      calendari
    </div>

  </div>
</form>
<form>
 <div class="row">
    <div class="col">
      <input type="number" class="form-control"  name="quantity" min="1" max="5" placeholder="өрөөний тоо">
    </div>

   <div class="col">
      <input type="number" class="form-control"  name="quantity" min="1" max="5" placeholder="хүний тоо">
    </div>
<button type="submit" class="btn btn-primary">Sign in</button>


  </div>

  </div>
</form>

 @endsection