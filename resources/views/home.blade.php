@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
    </div>
</div>
{{--{{ dd($user->id) }}--}}
<input type="hidden" id="id" value="{{ $user->id }}">

@endsection

@section('js')
  <script>
      $(document).ready(function () {
          var userId = Number(document.getElementById('id').value);
          console.log(userId);

          Echo.private('App.User.' + userId)
              .notification((notification) => {
                  console.log(notification,1);
              });

          Echo.channel('chat')
              .listen('.chat', (e) => {
                  console.log(e,8);
              });
      });
  </script>
@endsection

