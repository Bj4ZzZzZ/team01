@extends('app')

@section('title', '新增資料')

@section('dormitorysystem_theme', '新增宿舍資料系統')

@section('dormitorysystem_contents')
    {!! Form::open(['url'=>'dormitories/store'])!!}
    <div>
        {!! Form::label('name','宿舍名稱')!!}
        {!! Form::text('name',null)!!}
    </div>
    <div>
        {!! Form::label('housemaster','舍監')!!}
        {!! Form::text('housemaster',null)!!}
    </div>
    <div>
        {!! Form::label('contact','聯絡資料')!!}
        {!! Form::text('contact',null)!!}
    </div>
    <div>
        {!! Form::submit("新增宿舍資料")!!}
    </div>
    {!! Form::close()!!}
@endsection