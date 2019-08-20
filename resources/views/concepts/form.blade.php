@csrf
<div class="container">
@if (!$concept->id)
<p>
    <label for="image">
    <input type="file" name="image" accept="image/*">
        {!! $errors->first('image', '<span class=error>:message</span>') !!}
    </label>
</p>
<p>
    <label for="concept">
        Description
    <input class="form-control" type="text" name="concept" value={{ $concept->concept ?? old('concept') }}>
    </label>
</p>
<p>
    <label for="brand">
      Marca
    <input class="form-control" type="text" name="brand" value={{ $concept->brand  ?? old('brand') }}>
    </label>
</p>
@endif
<p>
    <label for="price">
        Price
    <input class="form-control" type="decimal" name="price" value="{{ $concept->price  ?? old('price') }} ">
        {!! $errors->first('price', '<span class=error>:message</span>') !!}
    </label>
</p>
<input class="btn btn-primary" type="submit"
value="{{ $btnText ?? 'Send'}}">
<hr>
</div>
