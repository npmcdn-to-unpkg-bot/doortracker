@extends('base')

@section('body')
    
    <h1> Issues </h1>
    
    <div class='table'>
        <div class='row'>
            <div class='cell'>#</div>
            <div class='cell'>Name</div>
            <div class='cell'>Priority</div>
        </div>

        <div data-tmpl-container='issue-row'>
            <div class='cell'>
                <div class='loading'></div>
            </div>
        </div>
    </div>


    <div class='tmpl' data-tmpl='issue-row'>
        <div class='row'>
            <div class='cell'>{id}</div>
            <div class='cell'>{name}</div>
            <div class='cell'>{priority}</div>
        </div>
    </div>


@endsection

@section('scripts')
    @parent
    
    <script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('assets/js/tmpl.js')}}"></script>
    <script src="{{asset('assets/js/call.js')}}"></script>
    <script src="{{asset('assets/js/api.js')}}"></script>

    <script>
        api.path = "{{PATH}}/api/v1";
        api.issue();
    </script>

@endsection

@section('styles')
    @parent

    <link rel='stylesheet' href="{{asset('assets/css/loader.css')}}">
    <link rel='stylesheet' href="{{asset('assets/css/table.css')}}">
    <link rel='stylesheet' href="{{asset('assets/css/tmpl.css')}}">
@endsection