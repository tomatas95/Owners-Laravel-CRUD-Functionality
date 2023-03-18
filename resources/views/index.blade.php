@extends('components.layout')
@section('content')
<x-flash-message />
<div class="footer-container">
    <div class="footer">
      <div class="footer-content">
        <div class="footer-item">
          <i class="material-icons">phone</i>
          <a href="/" style="margin-right: 10px;">[[tel]]</a>
        </div>
        <div class="footer-item">
          <i class="material-icons">email</i>
          <a href="/">[[email]]</a>
        </div>
        <div class="footer-item">
          <p>&copy; 2023 [[copyright]]</p>
        </div>
      </div>
      <button id="close-footer"><i class="fas fa-times"></i></button>
    </div>  
  </div>
@endsection
