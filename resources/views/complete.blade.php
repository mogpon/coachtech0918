@extends('layouts.default')
<style>
  .comp {
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .form-btn {
    border-radius: 6px;
    margin: 32px auto 0;
    padding-top: 20px;
    padding-bottom: 20px;
    width: 280px;
    display: block;
    background: black;
    color: #fff;
    font-weight: bold;
    font-size: 20px;
    border: none;
    cursor: pointer;
  }
</style>
@section('content')
<div class="comp">
  <p>ご意見いただきありがとうございました。</p>
  <button type="submit" name="action" class="form-btn" value="back">
    トップページへ
  </button>
  @csrf
</div>
@endsection('content')