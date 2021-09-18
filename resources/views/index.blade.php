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

  .first_name .text-danger {
    color: red;
  }

  .last_name .text-danger {
    color: red;
  }

  .text-danger {
    color: red;
  }
</style>
@section('title','お問い合わせ')

@section('content')
<form class="form" action="/show" method="POST">
  <div class="form-item">
    <p class="form-item-label">
      お名前<span class="form-item-required">※</span>
    </p>
    <div class="form-in">
      <div class="form-right">
        <div class="form-right-one">
          <div class="last_name">
            <input type="text" name="last_name" class="form-item-input" value="{{ old('last_name') }}">
            <p class="sample">例)山田</p>
            @if($errors->has('last_name'))
            <p class="text-danger">{{ $errors->first('last_name')}}</p>
            @endif
          </div>
          <div class="first_name">
            <input type="text" name="first_name" class="form-item-input" value="{{ old('first_name') }}">
            <p class="sample">例)太郎</p>
            @if($errors->has('first_name'))
            <p class="text-danger">{{ $errors->first('first_name')}}</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-item">
    <p class="form-item-label">
      性別<span class="form-item-required">※</span>
    </p>
    <div class="form-in">
      <input type="radio" name="gender" class="form-item-input-radio" value="男性" checked="checked">男性
      <input type="radio" name="gender" class="form-item-input-radio" value="女性">女性
    </div>
  </div>
  <div class="form-item">
    <p class="form-item-label">
      メールアドレス<span class="form-item-required">※</span>
    </p>
    <div class="form-in">
      <div class="form-right">
        <input type="email" name="email" class="form-item-input" value="{{ old('email') }}">
        <p class="sample">例)test@example.com</p>
        @if($errors->has('email'))
        <p class="text-danger">{{ $errors->first('email')}}</p>
        @endif
      </div>
    </div>
  </div>
  <div class="form-item">
    <p class="form-item-label">
      郵便番号<span class="form-item-required">※</span>
    </p>
    <div class="form-in">
      <div class="form-right">
        <input type="text" name="postcode" pattern="\d{3}-\d{4}" class="form-item-input" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value="{{ old('postcode') }}">
        <p class="sample">例)123-4567</p>
        @if($errors->has('postcode'))
        <p class="text-danger">{{ $errors->first('postcode')}}</p>
        @endif
      </div>
    </div>
  </div>
  <div class="form-item">
    <p class="form-item-label">
      住所<span class="form-item-required">※</span>
    </p>
    <div class="form-in">
      <div class="form-right">
        <input type="text" name="address" class="form-item-input" value="{{ old('address') }}">
        <p class="sample">例)東京都渋谷区千駄ヶ谷1-2-3</p>
        @if($errors->has('address'))
        <p class="text-danger">{{ $errors->first('address')}}</p>
        @endif
      </div>
    </div>
  </div>
  <div class="form-item">
    <p class="form-item-label">
      建物名
    </p>
    <div class="form-in">
      <div class="form-right">
        <input type="text" name="building_name" class="form-item-input" value="{{ old('building_name') }}">
        <p class="sample">例)千駄ヶ谷マンション101</p>
        @if($errors->has('building_name'))
        <p class="text-danger">{{ $errors->first('building_name')}}</p>
        @endif
      </div>
    </div>
  </div>
  <div class="form-item">
    <p class="form-item-label">
      ご意見<span class="form-item-required">※</span>
    </p>
    <div class="form-in">
      <div class="form-right">
        <textarea name="opinion" class="form-item-textarea">{{ old('opinion') }}</textarea>
        @if($errors->has('opinion'))
        <p class="text-danger">{{ $errors->first('opinion')}}</p>
        @endif
      </div>
    </div>
  </div>
  <input type="submit" class="form-btn" value="確認">
  @csrf
</form>
@endsection('content')