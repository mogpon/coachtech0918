@extends('layouts.default')
<style>
  table {
    width: 88%;
    margin: 20px auto;
  }

  th {
    border-bottom: 1px solid black;
    padding: 5px 20px;
  }

  td {
    padding: 5px 20px;
    text-align: center;
  }


  h1 {
    text-align: center;
    font-size: 24px;
  }

  .form {
    width: 70%;
    margin: 20px auto;
    border: 1px solid black;
    padding: 35px 50px;
  }

  .form-in {
    display: flex;
    width: 70%;
  }

  .form-item {
    padding: 10px 0;
    width: 50%;
    display: flex;
    /* justify-content: space-between; */
  }

  .form-item-label {
    width: 30%;
    font-weight: bold;
    font-size: 16px;
  }

  .form-item-label2 {
    width: 30%;
    font-weight: bold;
    font-size: 16px;
    text-align: end;
    margin-right: 10px;
  }

  .form-item-input {
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 0 10px;
    width: 100%;
    height: 40px;
    background: white;
    font-size: 18px;
    margin-left: 10px;
  }

  .form-btn {
    border-radius: 6px;
    margin: 5px auto 0;
    padding-top: 10px;
    padding-bottom: 10px;
    width: 140px;
    display: block;
    background: black;
    color: #fff;
    font-weight: bold;
    font-size: 15px;
    border: none;
    cursor: pointer;
  }

  .two_items {
    display: flex;
    justify-content: space-between;
  }

  .page {
    width: 68%;
    margin: 0 auto;
  }

  .form-item-input-radio {
    height: 15px;
    background: black;
  }

  .pagination {
    display: flex;
    justify-content: end;
  }

  .page li {
    list-style: none;
    padding: 5px 8px;
    border: 1px solid black;
  }

  .page a {
    text-decoration: none;
    color: black;
  }

  .pagination a:hover {
    background-color: #efefef;
  }

  .pagination .active {
    color: white;
    background: black;
  }

  .link {
    text-align: center;
  }

  .text-white {
    color: black;
    font-size: 15px;
  }

  .btn_2 {
    border-radius: 6px;
    background: black;
    padding: 5px 10px;
    color: #fff;
    border: none;
    cursor: pointer;
    font-weight: bold;
  }
</style>
@section('title', '管理システム')

@section('content')
<form class="form" action="find" method="GET">
  @csrf
  <div class="two_items">
    <div class="form-item">
      <label class="form-item-label">お名前</label>
      <div class="form-in">
        <input class="form-item-input" type="text" name="last_name" value="{{$last_name}}">
      </div>
    </div>
    <div class="form-item">
      <label class="form-item-label2">性別</label>
      <input class="form-item-input-radio" type="radio" name="gender" value="0" checked="checked">全て
      <input class="form-item-input-radio" type="radio" name="gender" value="1">男
      <input class="form-item-input-radio" type="radio" name="gender" value="2">女
    </div>
  </div>
  <div class="form-item">
    <label class="form-item-label">登録日</label>
    <div class="form-in">
      <input class="form-item-input" type="date" name="date" value="{{$created_at}}"></input>
    </div>
  </div>
  <div class="form-item">
    <label class="form-item-label">メールアドレス</label>
    <div class="form-in">
      <input class="form-item-input" type="email" name="email" value="{{$email}}">
    </div>
  </div>
  <input class="form-btn" type="submit" value="検索">
  <div class="link">
    <a href="find" class="text-white">リセット</a>
  </div>
</form><br>
@if (@isset($items))
<table>
  <tr>
    <th>ID</th>
    <th>お名前</th>
    <th>性別</th>
    <th>メールアドレス</th>
    <th>ご意見</th>
    <th> </th>
  </tr>
  <div class="page">
    {{ $items->links() }}
  </div>
  @foreach ($items as $item)
  <tr>
    <td> {{$item->id}} </td>
    <td> {{$item->last_name}} {{$item->first_name}}</td>
    <td> {{$item->gender}} </td>
    <td> {{$item->email}} </td>
    <td> {{\Illuminate\Support\Str::limit($item->opinion,25,'...')}} </td>
    <form action="/find" method="post">
      @csrf
      <td>
        <input type="submit" value="削除" class="btn_2">
        <input type="hidden" value="{{$item->id}}" name="id">
      </td>
    </form>
  </tr>
  @endforeach
</table>
@endif
@endsection