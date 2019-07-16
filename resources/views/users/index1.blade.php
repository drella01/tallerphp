@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('info'))
                        <div class="alert alert-success" role="alert">
                            {{ session('info') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div-->
        <div class="card">
            <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success" role="alert">
                    {{ session('info') }}
                </div>
            @endif
            </div>
            <table class="table">
              <thead class="card-header">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  @admin
                  <th>VAT</th>
                  <th>Actions</th>
                  @endadmin
                </tr>
              </thead>
              <tbody>
                @foreach ($clients as $client)
                  <tr>
                    <td>{{ $client->id }}</td>

                    <td>
                      <a href="{{ route('clients.show', $client->id) }}">{{ $client->name }}</a>
                    </td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->cars->pluck('model')->join(', ') }}</td>
                  @admin
                  <td>
                    <div class="btn-group btn-group-sm">
                      <a class="btn btn-primary btn-xs"
                          href="#">Edit</a>
                      <form style="display:inline"
                          action='#'
                          method="POST">
                        @csrf
                          <button class="btn-xs btn-danger" type="submit">Delete</button>
                      </form>
                    </div>
                  </td>
                  @endadmin
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection
