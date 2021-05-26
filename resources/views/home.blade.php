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

    <form id="message-store" action="{{route('api.messages.store')}}">
      <input type="text" name="message">
      <input type="text" name="room" value="2">
      <input type="submit" value="send">
    </form>

<notifications group="app"/>

@endsection

@section('js')
  <script>
      // $.ajaxSetup({
      //     headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      //         'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //     }
      // });

    axios.get('/api/articles').then(
        response => (console.log(response))
    );

    {{--$.ajax({--}}
    {{--    url: '{{ route('api.articles.index') }}',--}}
    {{--    type: 'get',--}}
    {{--    success: function (response) {--}}
    {{--        console.log(response);--}}
    {{--    }--}}
    {{--})--}}
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

