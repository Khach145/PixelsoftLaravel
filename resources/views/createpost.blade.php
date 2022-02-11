@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center align-items-center flex-column">
        @if(session()->has('message'))
            <h4 style="color: #157347">
                {{ session()->get('message') }}
            </h4>
        @endif
        <div style="margin-top: 70px; width: 500px ">


            <form action="{{url('/createPost')}}"
                  style="display: flex;
                  flex-direction: column;
                  align-items: center; "
                  method="post">
                @csrf
                <h3>Create new Post</h3>
                <div style="display: flex;
                            flex-direction: column;
                             width: 100%">
                    <input type="text"
                           placeholder="Title"
                           name="title"
                           style="border-radius: 5px;
                                  border-color: #d3d3d3;
                                   height: 40px">
                    <input type="text"
                           placeholder="Your thoughts?"
                           name="description"
                           style="height: 130px;
                                  margin-top: 20px;
                                  border-radius: 5px;
                                  border-color: #d3d3d3;">
                    <input type="submit" style="margin-top: 20px;
                                   border-radius: 5px;
                                   height: 40px;" value="Post">
                </div>
            </form>
        </div>
            <a style="text-decoration: none; color: white"
                               href="{{ url('/import') }}">
                                <button style="margin-top: 20px;
                                                height: 35px; width: 200px;
                                                 background-color: slategray;
                                                 border-radius: 15px;
                                                display: flex;
                                                justify-content: center;
                                                 align-items: center">
                                    Import
                                </button>
                </a>

        </div>

    @endsection
