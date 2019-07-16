@csrf
<div class="container col-md-8">
<p>
  <label for="concept">
    Description
    <p class="form-control">{{ $concept->concept ?? old('concept')}}</p>
  </label>
</p>
<p>
<label for="price">
  Price
  <input class="form-control" type="decimal" name="price" value="{{ $concept->price  ?? old('price')}} ">
  {!! $errors->first('price', '<span class=error>:message</span>') !!}
</label>
<label for="discount">
  Discount %
  <input class="form-control col-md-4" list="discount" name="discount" placeholder="disc">
  <datalist id="discount">
    @for ($discount=0; $discount <= 100; $discount+=5)
      <option value="{{ $discount }}">{{ $discount.'%' }}</option>
    @endfor
  </datalist>
</label>
</p>
<p>
<label for="brand">
  Brand
  <output class="form-control">{{ $concept->brand  ?? old('brand') }}</output>
</label>
</p>
<p>{{ $concept->discount($discount) }}</p>
<input class="btn btn-primary" type="submit"
value="{{ $btnText ?? 'Send'}}">
<hr>
</div>
