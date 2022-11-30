@extends('app')

@section('title',$late->sbrecord->student->name. '的晚歸資料')

@section('dormitorysystem_theme',$late->sbrecord->student->name.'的詳細晚歸資料')

@section('dormitorysystem_contents')
        編號：{{ $late->id }}</br>
        學生床位：{{ $late->sbrecord->bed->bedcode }}</br>
        長期晚歸日起：{{ $late->start }}</br>
        長期晚歸日訖：{{ $late->end }}</br>
        長期晚歸原因：{{ $late->reason }}</br>
        單位名稱：{{ $late->company }}</br>
        單位連絡電話：{{ $late->contact }}</br>
        單位聯絡地址：{{ $late->address }}</br>
        預計每日返回宿舍時間：{{ $late->back_time }}</br>
        佐證圖檔路徑：{{ $late->filename_path }}</br>

@endsection