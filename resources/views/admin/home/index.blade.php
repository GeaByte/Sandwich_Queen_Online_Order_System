@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
  <div class="card-header">
    Admin Panel - Home Page
  </div>
  <div class="card-body">
    Welcome to the admin panel of Sandwich Queen. This is your central hub for managing all aspects of our products.<br><br>
    We're excited to have you on board and trust that you'll find everything you need to effectively manage our products.<br><br>
    If you have any questions or need assistance, please don't hesitate to reach out to our support team.<br><br>
    Thank you for your dedication and hard work in helping to maintain our platform!
  </div>
</div>
<hr>
<div class="card">
  <div class="card-header">
    Admin Panel - User Manual
  </div>
    <div class="card-body">
      <ul>
        <li>Admin - Home: Currently viewing this page</li>
        <li>Admin - Products: Manage products</li>
        <li>User - Home: Return to user page</li>
      </ul>
    </div>
</div>
@endsection
