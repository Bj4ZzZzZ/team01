@extends('app')

@section('title',$bed->bedcode. '床位資料')

@section('dormitorysystem_theme',$bed->bedcode. '的詳細資料')

@section('dormitorysystem_contents')
        編號：{{ $bed->id }}<br>
        床位代碼：{{ $bed->bedcode }}<br>
        宿別：{{ $bed->dormitory->name }}<br>
        樓層：{{ $bed->floor }}<br>
        住房類型：{{ $bed->roomtype }}<br>
@endsection