@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.0-rc.0/web3.min.js"></script>
    <title>Document</title>

</head>
<body>

<div class="container d-flex ">
    <div style="margin-right: 150px">
        <h2>
            {{  Auth::user()->name }}
        </h2>
        <p style="color: #4a5568">
            {{  Auth::user()->email }}
        </p>
      <div>
          <button>
              <a style="text-decoration: none; color: black" href="{{url('/create/post')}}">create post</a>
          </button>

      </div>

    </div>

    <div style="display: flex; flex-wrap: wrap">

            @foreach($posts as $post )

                <div style="height: 180px;
                     width: 700px;
                      border: 0.5px solid rebeccapurple;
                      padding: 10px; margin: 10px;
                      overflow: scroll ">
                    <div>
                        <h2>{{$post->title}}</h2>
                    </div>
                    <div style=" max-width: 330px">
                        <p style="
                                display:flex; flex-wrap: wrap;
                                max-width: 100%">
                               {{$post->description}}
                        </p>
                    </div>
                    <div>
                        <p>{{$post->created_at}}</p>
                    </div>

                    @if($post->imported == true)
                        <p><strong>Creator:</strong>Admin</p>
                    @endif

                </div>

            @endforeach
                <div class="d-flex justify-content-center">{!! $posts->links() !!}</div>
    </div>

    <div style="height: 40px;
                margin-top: 40px;
                display:flex;
                flex-direction: column;
                justify-content: center;
                align-items: center">

            <h5>Sort by</h5>
            <a style="text-decoration: none;
                      color: black"
               href="{{ url('/home/desc') }}">
                <button style="width: 70px">
                    Newest
                </button>
            </a>
            <a href="{{ url('/home/asc') }}">
                <button style="width: 70px;
                        margin-top: 10px">
                    Oldest
                </button>
            </a>
    </div>
</div>

</body>
</html>
@endsection



