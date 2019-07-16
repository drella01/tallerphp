@csrf
<div class="container">
<p>
  <label for="name">
    Name
    <input class="form-control" type="text" name="name"  value="{{ auth()->user()->name ?? old('name')}}">
    {!! $errors->first('name', '<span class=error>:message</span>') !!}
  </label>
</p>
<p>
<label for="vat">
  Vat number
  <input class="form-control" type="text" name="vat" value="{{ $client->vat  ?? old('vat')}} ">
  {!! $errors->first('vat', '<span class=error>:message</span>') !!}
</label>
</p>
<p>
<label for="email">
  Email
  <input class="form-control" type="email" name="email" value={{ auth()->user()->email  ?? old('email') }}>
  {!! $errors->first('email', '<span class=error>:message</span>') !!}
</label>
</p>
<input class="btn btn-primary" type="submit"
value="{{ $btnText ?? 'Send'}}">
<hr>
</div>
