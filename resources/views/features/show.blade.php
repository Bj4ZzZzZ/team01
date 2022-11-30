@extends('app')

@section('title',$feature->sbrecord->student->name . '的照片資料')

@section('dormitorysystem_theme', $feature->sbrecord->student->name . '的詳細照片資料')

@section('dormitorysystem_contents')
        編號：{{$feature->id}}<br/>
        學生編號：{{$feature->sbrecord->student->name}}<br/>
        照片路徑：{{$feature->path . '.jpg'}}<br/>
        特徵值：{{$feature->feature}}<br/>
@endsection