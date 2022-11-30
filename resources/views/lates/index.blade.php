@extends('app')

@section('title','晚歸總資料管理')

@section('dormitorysystem_theme','晚歸總資料管理')

@section('dormitorysystem_contents')
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('lates.create') }} ">新增晚歸資料</a>
    </div>
        <table>
        <tr>
            <th>編號</th>
            <th>學生床位</th>
            <th>長期晚歸日起</th>
            <th>長期晚歸日訖</th>
            <th>長期晚歸原因</th>
            <th>單位名稱</th>
            <th>預計每日返回宿舍時間</th>
            <th>操作</th>
            <th>操作</th>
            <th>操作</th>
        </tr>
        @foreach($lates as $late)
            <tr>
                <td>{{ $late->id }}</td>
                <td>{{ $late->sbrecord->bed->bedcode }}</td>
                <td>{{ $late->start }}</td>
                <td>{{ $late->end }}</td>
                <td>{{ $late->reason }}</td>
                <td>{{ $late->company }}</td>
                <td align="center" valign="center">{{ $late->back_time }}</td>
                <td><font color=blue><a href="{{ route('lates.show',['id'=>$late->id]) }}">詳細資料</a></font></td>
                <td><font color=green><a href="{{ route('lates.examine',['id'=>$late->id]) }}">審核情形</a></font></td>
                <!-- <td><font color=red><a href="{{ route('lates.destroy',['id'=>$late->id]) }}">刪除資料</a></font></td> -->
                <td>
                    <form action="{{ url('/lates/delete', ['id' => $late->id]) }}" method="post">
                        <input class="btn btn-default" type="submit" value="刪除" />
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection