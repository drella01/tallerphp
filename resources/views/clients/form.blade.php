@csrf
<div class="container">
<p>
  <label for="name">
    Name
    @if(auth()->user()->isAdmin())
        <input class="form-control" type="text" name="name"  value="{{ $client->name ?? old('name')}}">
        {!! $errors->first('name', '<span class=error>:message</span>') !!}
    @else
        <input class="form-control" type="text" name="name"  value="{{ $name ?? old('name')}}">
        {!! $errors->first('name', '<span class=error>:message</span>') !!}
    @endif
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
  @if(auth()->user()->isAdmin())
        <input class="form-control" type="text" name="email"  value="{{ $client->email ?? old('email')}}">
        {!! $errors->first('email', '<span class=error>:message</span>') !!}
    @else
        <input class="form-control" type="text" name="email"  value="{{ $email ?? old('email')}}">
        {!! $errors->first('email', '<span class=error>:message</span>') !!}
    @endif
</label>
</p>
<input class="btn btn-primary" type="submit"
value="{{ $btnText ?? 'Send'}}">
<hr>
</div>
