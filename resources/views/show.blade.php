@extends('layouts.default')
<style>
  h1 {
    text-align: center;
    font-size: 24px;
  }

  .form {
    width: 60%;
    margin: 20px auto;
  }

  .form-in {
    display: flex;
    width: 70%;
  }

  .form-right-one {
    display: flex;
    justify-content: space-between;
    width: 100%;
  }

  .form-right {
    /* display: flex; */
    width: 100%;
  }

  .last_name {
    width: 48%;
  }

  .first_name {
    width: 48%;
  }


  .mail {
    width: 100%;
  }

  .form-item-input-radio {
    display: inline-block;
    height: 30px;
    width: 30%;
    background: black;
    font-size: 12px;
  }

  .sample {
    margin: 0;
    color: gray;
  }

  .first_name p {
    margin: 0;
    color: gray;
  }

  .form-item {
    padding: 24px 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  .form-item-label {
    width: 30%;
    font-weight: bold;
    font-size: 16px;
  }

  .form-item-required {
    color: red;
  }

  .form-item-input {
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 0 10px;
    width: 100%;
    height: 48px;
    background: white;
    font-size: 18px;
  }

  .form-item-textarea {
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 0 10px;
    height: 200px;
    width: 100%;
    background: white;
    font-size: 18px;
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
@section('title','内容確認')

@section('content')
<form class="form" action="{{ route('send') }}" method="POST">
  <div class="form-item">
    <p class="form-item-label">お名前</p>
    <div class="form-in">
      {{ $inputs['last_name'] }} {{ $inputs['first_name'] }}
    </div>
  </div>
  <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
  <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">

  <div class="form-item">
    <p class="form-item-label">性別</p>
    <div class="form-in">
      {{ $inputs['gender'] }}
    </div>
  </div>
  <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">

  <div class="form-item">
    <p class="form-item-label">メールアドレス</p>
    <div class="form-in">
      {{ $inputs['email'] }}
    </div>
  </div>
  <input type="hidden" name="email" value="{{ $inputs['email'] }}">

  <div class="form-item">
    <p class="form-item-label">郵便番号</p>
    <div class="form-in">
      {{ $inputs['postcode'] }}
    </div>
  </div>
  <input type="hidden" name="postcode" value="{{ $inputs['postcode'] }}">

  <div class="form-item">
    <p class="form-item-label">住所</p>
    <div class="form-in">
      {{ $inputs['address'] }}
    </div>
  </div>
  <input type="hidden" name="address" value="{{ $inputs['address'] }}">

  <div class="form-item">
    <p class="form-item-label">建物名</p>
    <div class="form-in">
      {{ $inputs['building_name'] }}
    </div>
  </div>
  <input type="hidden" name="building_name" value="{{ $inputs['building_name'] }}">

  <div class="form-item">
    <p class="form-item-label">ご意見</p>
    <div class="form-in">
      {{ $inputs['opinion'] }}
    </div>
  </div>
  <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}">

  <button type="submit" name="action" class="form-btn" value="submit">
    送信
  </button>
  <button type="submit" name="action" class="form-btn" value="back" onclick="javascript:window.history.back(-1);return false;">
    修正する
  </button>
  @csrf
</form>
@endsection('content')