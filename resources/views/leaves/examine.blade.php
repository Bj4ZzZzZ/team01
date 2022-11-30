@extends('app')

@section('title',$leave->sbid. '的審核情況')

@section('dormitorysystem_theme',$leave->sbid.'的審核情況')

@section('dormitorysystem_contents')
        樓長審核：{{ $leave->floorhead_check }}</br>
        宿舍輔導員審核：{{ $leave->housemaster_check }}</br>

@endsection
