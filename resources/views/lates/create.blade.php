@extends('app')

@section('title', '新增資料')

@section('dormitorysystem_theme', '新增晚歸資料系統')

@section('dormitorysystem_contents')
    {!! Form::open(['url'=>'lates/store'])!!}
    <div>
        {!! Form::label('sbid','學生床位')!!}
        {!! Form::select('sbid',$sbrecords)!!}
    </div>
    <div>
        {!! Form::label('start','長期晚歸日起')!!}
        {!! Form::date('start',null)!!}
    </div>
    <div>
        {!! Form::label('end','長期晚歸日訖')!!}
        {!! Form::date('end',null)!!}
    </div>
    <div>
        {!! Form::label('reason','長期晚歸原因')!!}
        {!! Form::text('reason',null)!!}
    </div>    
    <div>
        {!! Form::label('company','單位名稱')!!}
        {!! Form::text('company',null)!!}
    </div>
    <div>
        {!! Form::label('contact','單位連絡電話')!!}
        {!! Form::text('contact',null)!!}
    </div>    
    <div>
        {!! Form::label('address','單位聯絡地址')!!}
        {!! Form::text('address',null)!!}
    </div>
    <div>
        {!! Form::label('back_time','預計每日返回宿舍時間')!!}
        {!! Form::time('back_time',null)!!}
    </div>    
    <div>
        {!! Form::label('filename_path','佐證圖檔路徑')!!}
        {!! Form::file('filename_path')!!}
    </div>    
    <div>
        {!! Form::submit("新增晚歸資料")!!}
    </div>
    {!! Form::close()!!}
@endsection