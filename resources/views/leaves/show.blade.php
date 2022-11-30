@extends('app')

@section('title',$leave->sbrecord->student->name. '的外宿資料')

@section('dormitorysystem_theme',$leave->sbrecord->student->name.'的詳細外宿資料')

@section('dormitorysystem_contents')
        編號：{{ $leave->id }}<br>
        學生床位：{{ $leave->sbrecord->bed->bedcode }}<br>
        外宿日起：{{ $leave->start }}<br>
        外宿日訖：{{ $leave->end }}<br>
        外宿原因：{{ $leave->reason }}<br>

@endsection
