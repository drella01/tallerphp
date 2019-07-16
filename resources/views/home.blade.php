@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                  <th>Roles</th>
                  @admin
                  <th>Actions</th>
                  @endadmin
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>

                    <td>
                      <a href="#">{{ $user->name }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                  @admin
                  <td>
                    <div class="btn-group btn-group-sm">
                      <a class="btn btn-primary btn-xs"
                          href="#">Edit</a>
                      <form style="display:inline"
                          action={{ route('users.destroy', $user->id) }}
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
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection
