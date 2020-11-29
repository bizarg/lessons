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

<notifications group="app"/>

@endsection

@section('js')
  <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $.ajax({
        url: '{{ route('api.articles.index') }}',
        type: 'get',
        success: function (response) {
            console.log(response);
        }
    })
      // $(document).ready(function () {
      //     var userId = Number(document.getElementById('id').value);
      //
      //     Echo.private('App.Domain.User.User.' + userId)
      //         .notification((notification) => {
      //             Vue.notify({
      //                 group: 'app',
      //                 title: notification.title,
      //                 text: notification.message,
      //                 type: 'success'
      //             });
      //
      //             $('.notify-counter').text(notification.unread)
      //         });
      //
      //     Echo.channel('chat')
      //         .listen('.chat', (e) => {
      //             console.log(e);
      //         });
      // });
  </script>
@endsection

