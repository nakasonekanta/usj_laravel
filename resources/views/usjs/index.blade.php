@extends('layouts.app')
 
@section('content')

<!-- usj登録用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('usjs.errors')
 
    <!-- 新usjフォーム -->
    <form action="{{ url('usj') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
 
        <!-- usj名 -->
        <div class="form-group">
            <label for="usj-name" class="col-sm-3 control-label">Usj</label>
 
            <div class="col-sm-6">
                <input type="text" name="name" id="usj-name" class="form-control">
            </div>
        </div>
 
        <!-- usj追加ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Usj
                </button>
            </div>
        </div>
    </form>
</div>
 
<!-- usj一覧表示 -->
@if (count($usjs) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Current Usjs
    </div>
 
    <div class="panel-body">
        <table class="table table-striped usj-table">
 
            <!-- テーブルヘッダ -->
            <thead>
                <th>usj</th>
                <th>&nbsp;</th>
            </thead>
 
            <!-- テーブル本体 -->
            <tbody>
                @foreach ($usjs as $usj)
                <tr>
                    <!-- タスク名 -->
                    <td class="table-text">
                        <div>{{ $usj->name }}</div>
                    </td>
 
                    <td>
                        <!-- TODO: 削除ボタン -->
                        <form action="{{ url('usj/'.$usj->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
 
                            <button type="submit" id="delete-task-{{ $usj->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>削除
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection