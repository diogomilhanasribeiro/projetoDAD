@extends('master')

@section('title', 'Administrator')

@section('content')
    <router-link to="/users">Administrator</router-link> -
    <router-link to="/logout">Logout</router-link> -
    <router-link to="/profile">Profile</router-link> - 
    <router-link to="/changePassword">Change Password</router-link> -
    <router-link to="/forgotPassword">Forgot Password</router-link> -
    <router-link to="/adminEmail">Configure Admin Email</router-link> -
    <router-link to="/platEmail">Configure Platform Email</router-link> 


    <router-view></router-view>

    
@endsection

@section('pagescript')
<script src="js/app.js"></script>

<!-- <script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="/js/vueapp.js"></script>
 -->
 @stop  
