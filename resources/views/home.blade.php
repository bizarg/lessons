@extends('layouts.app')

@section('content')


    <div class="col-md-8">
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
    </div>

<input type="hidden" id="id" value="{{ $user->id }}">

@endsection

@section('js')
  <script>
      $(document).ready(function () {
          var userId = Number(document.getElementById('id').value);

          Echo.private('App.Domain.User.User.' + userId)
              .notification((notification) => {
                  console.log(notification);
              });

          Echo.channel('chat')
              .listen('.chat', (e) => {
                  console.log(e);
              });
      });
  </script>
@endsection

