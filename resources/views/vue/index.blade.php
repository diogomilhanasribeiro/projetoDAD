@extends('master')

@section('title', 'Administrator')

@section('content')
    <router-link to="/users">Administrator</router-link> -
    <router-link to="/logout">Logout</router-link> -
    <router-link to="/profile">Profile</router-link> - 
    <router-link to="/password">Password Change</router-link> 

    <router-view></router-view>

    
@endsection

@section('pagescript')
<script src="js/app.js"></script>

<!-- <script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="/js/vueapp.js"></script>
 -->
 @stop  
