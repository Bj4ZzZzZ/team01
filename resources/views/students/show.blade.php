@extends('app')

@section('title',$student->name . '學生資料')

@section('dormitorysystem_theme', $student->name . '的詳細資料')

@section('dormitorysystem_contents')
        學生編號  {{$student->id}}<br/>
        學號  {{$student->number}}<br/>
        班級 {{$student->class}}<br/>
        姓名  {{$student->name}}<br/>
        地址  {{$student->address}}<br/>
        電話  {{$student->phone}}<br/>
        國籍  {{$student->nationality}}<br/>
        關係人  {{$student->guardian}}<br/>
        稱謂  {{$student->salutation}}<br/>
@endsection
