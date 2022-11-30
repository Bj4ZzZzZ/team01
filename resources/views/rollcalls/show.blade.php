@extends('app')

@section('title',$rollcall->sbrecord->student->name. '的點名資料')

@section('dormitorysystem_theme',$rollcall->sbrecord->student->name.'的詳細點名資料')

@section('dormitorysystem_contents')
        編號：{{ $rollcall->id }}<br>
        點名日期：{{ $rollcall->date }}<br>
        學生床位：{{ $rollcall->sbrecord->bed->bedcode }}<br>
        @if ($rollcall->presence === 1)
        在場與否：{{ $rollcall->presence = "是" }} <br>
        @else 
        在場與否：{{ $rollcall->presence = "否" }} <br>
        @endif
        外宿：{{ $rollcall->leave }}<br>
        晚歸：{{ $rollcall->late }}<br>

@endsection