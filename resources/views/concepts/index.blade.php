@extends('layouts.app')

@section('content')

<div class="container">
  @if( session()->has('info') )
    <div class="alert alert-success">{{ session('info') }}</div>
  @endif
    <div class="row justify-content-center">

        <!--div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div-->
        <div class="card">
            <table class="table">
              <thead class="card-header">
                <tr>
                  <th>ID</th>
                  <th>Detail</th>
                  <th>Price</th>
                  <th>Brand</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($concepts as $concept)
                <tr>
                    <td>{{ $concept->id }}</td>
                    <td><a href="#">{{ $concept->concept }}</a></td>
                    <td>{{ $concept->price }}</td>
                    <td>{{ $concept->brand }}</td>
                    <td>
                      <div class="btn-group btn-group-sm">
                        <a class="btn btn-primary btn-xs"
                              href="{{ route('concepts.edit', $concept->id) }}">Edit</a>
                      </div>
                    </td>
                </tr>
                @endforeach
              {{ $concepts->links() }}
            </tbody>
          </table>
          <div class="card-footer">
            {{ $concepts->sum('price')}}
          </div>
        </div>
    </div>
</div>
@endsection
