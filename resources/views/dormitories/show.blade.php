@extends('app')

@section('title',$dormitory->name. '宿舍資料')

@section('dormitorysystem_theme',$dormitory->name.'的詳細資料')

@section('dormitorysystem_contents')
        <!-- 編號：{{ $dormitory->id }}<br> -->
        宿舍名稱：{{ $dormitory->name }}<br>
        舍監：{{ $dormitory->housemaster }}<br>
        聯絡資料：{{ $dormitory->contact }}<br>
        {{ $dormitory->name }}所有床位：<br>
        @foreach($beds as $bed)
            <tr>
                <td>{{ $bed->bedcode }}</td>
                <td>{{ $bed->floor }}</td>
                <td>{{ $bed->roomtype }}</td>
                <br>
            </tr>
        @endforeach

@endsection