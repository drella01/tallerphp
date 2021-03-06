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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Cars</th>
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
                      {{ $client->vat }}
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm">
                      <a class="btn btn-primary btn-xs"
                          href="{{ route('clients.edit', $client->id) }}">Edit</a>
                      <form style="display:inline"
                          action="{{ route('clients.destroy', $client->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                          <button class="btn-xs btn-danger" type="submit">Delete</button>
                      </form>
                    </div>
                  </td>
                  @endadmin
                </tr>
              @endforeach
              {{ $clients->links() }}
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection
