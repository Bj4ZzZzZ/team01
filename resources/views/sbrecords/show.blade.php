@extends('app')

@section('title',$sbrecord->student->name. '的資料')

@section('dormitorysystem_theme',$sbrecord->student->name.'的詳細資料')

@section('dormitorysystem_contents')
        編號：{{ $sbrecord->id }}<br>
        學年：{{ $sbrecord->school_year }}<br>
        學期：{{ $sbrecord->semester }}<br>
        學生姓名：{{ $sbrecord->student->name }}<br>
        床位：{{ $sbrecord->bed->bedcode }}<br>
        @if ($sbrecord->floor_head === 1)
        樓長：{{ $sbrecord->floor_head = "是" }}<br>
        @else
        樓長：{{ $sbrecord->floor_head = "否" }}<br>
        @endif
        負責的樓層：{{ $sbrecord->responsible_floor }}<br>

@endsection