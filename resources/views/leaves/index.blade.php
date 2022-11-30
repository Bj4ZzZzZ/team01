@extends('app')

@section('title','外宿總資料管理')

@section('dormitorysystem_theme','外宿總資料管理')

@section('dormitorysystem_contents')
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('leaves.create') }} ">新增外宿資料</a>
    </div>
        <table>
        <tr>
            <th>編號</th>
            <th>學生床位</th>
            <th>外宿日起</th>
            <th>外宿日訖</th>
            <th>外宿原因</th>
            <th>操作</th>
            <th>操作</th>
            <th>操作</th>
        </tr>
        @foreach($leaves as $leave)
            <tr>
                <td>{{ $leave->id }}</td>
                <td>{{ $leave->sbrecord->bed->bedcode }}</td>
                <td>{{ $leave->start }}</td>
                <td>{{ $leave->end }}</td>
                <td>{{ $leave->reason }}</td>
                <td><font color=blue><a href="{{ route('leaves.show',['id' => $leave->id]) }}">詳細資料</a></font></td>
                <td><font color=green><a href="{{ route('leaves.examine',['id' => $leave->id]) }}">審核情形</a></font></td>
                <!-- <td><font color=red><a href="{{ route('leaves.destroy',['id' => $leave->id]) }}">刪除資料</a></font></td> -->
                <td>
                    <form action="{{ url('/leaves/delete', ['id' => $leave->id]) }}" method="post">
                        <input class="btn btn-default" type="submit" value="刪除" />
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection