@csrf
<div class="container col-md-8">
    <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
      <label for='date'>
        <input type="date" name="date" value="date">
      </label>
    </div>
    <div class="form-group {{ $errors->has('car_id') ? 'has-error' : '' }}">
        <select name="car_id" class="form-control">
          <option value="">Select car</option>
          @foreach ($cars as $car)
          <option value="{{ $car->id }}">{{ $car->registration }} - {{ $car->model }}</option>
          @endforeach
        </select>
        {!! $errors->first('car_id', "<span class=help-block>:message</span>") !!}
    </div>
    <div class="form-group {{ $errors->has('concept_id') ? 'has-error' : '' }}">
        <select id="concept_id" name="concept_id" class="form-control">
          <option value="">Select concept</option>
          @foreach ($concepts as $concept)
          <option value="{{ $concept->id }}">
            {{ $concept->concept }} - {{ $concept->price }}
          </option>
          @endforeach
        </select>
        {!! $errors->first('concept_id', "<span class=help-block>:message</span>") !!}
    </div>
<p>
  <div class="form-group">
  <label for="units">
    Units
    <input class="form col-md-4" type="number" name="units" value="{{ 'units' or old('units') }}">
    {!! $errors->first('units', '<span class=error>:message</span>') !!}
  </label>
  <label for="discount">
    Discount
      <select id="discount" name="discount" class="form">
        <option value="">discount</option>
        @for ($discount=0; $discount <= 100; $discount+=5)
            <option value="{{ $discount }}">
              {{ $discount.'%' }}
            </option>
        @endfor
      </select>
    </label>
  </div>
</p>
<p>
    <label for="remark">
        Remarks
        <input class="form-control" type="text-area" name="remark">
        {!! $errors->first('units', '<span class=error>:message</span>') !!}
    </label>
</p>
<input class="btn btn-primary" type="submit"
value="{{ $btnText ?? 'Send'}}">
<hr>
</div>
