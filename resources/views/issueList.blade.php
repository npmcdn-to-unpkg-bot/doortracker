@extends('master')

@section('body')
    
    <h1 class="text-title">Issue List</h1>

   <div class="table-responsive">
       <table class="table table-hover">
           <thead>
               <tr>
                   <th>#</th>
                   <th>Name</th>
                   <th>Priority</th>
               </tr>
           </thead>
           <tbody>
               <tr>
                   <td></td>
               </tr>
           </tbody>
       </table>
   </div>


@endsection

@section('scripts')
    @parent
    
    <script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('assets/js/tmpl.js')}}"></script>
    <script src="{{asset('assets/js/call.js')}}"></script>
    <script src="{{asset('assets/js/api.js')}}"></script>

    <script>
        //api.path = "{{PATH}}/api/v1";
        api.path = '/api/v1';
        api.issue();
    </script>

@endsection

@section('styles')
    @parent

    <link rel='stylesheet' href="{{asset('assets/css/loader.css')}}">
    <link rel='stylesheet' href="{{asset('assets/css/table.css')}}">
    <link rel='stylesheet' href="{{asset('assets/css/tmpl.css')}}">
@endsection