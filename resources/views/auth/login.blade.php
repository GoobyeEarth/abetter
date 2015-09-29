{{-- resources/views/auth/login.blade.php --}}
 
@extends('parts.layout')
 
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">ログイン画面</div>
        <div class="panel-body">
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>エラー:</strong> 入力が正しくありません。<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
 
          <form class="form-horizontal" role="form" method="POST" action="/auth/login">
            {{-- CSRF対策--}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
            <div class="form-group">
              <label class="col-md-4 control-label">メール</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
              </div>
            </div>
 
            <div class="form-group">
              <label class="col-md-4 control-label">パスワード</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password">
              </div>
            </div>
 
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember"> 自動ログイン
                  </label>
                </div>
              </div>
            </div>
 
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                  ログイン
                </button>
 
              </div>
            </div>
          </form>
          
        </div><!-- .panel-body -->
      </div><!-- .panel -->
    </div><!-- .col -->
  </div><!-- .row -->
</div><!-- .container-fluid -->
@endsection