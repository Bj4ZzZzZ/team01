@extends('app')

@section('title','點名總資料管理')

@section('dormitorysystem_theme','點名總資料管理')

@section('dormitorysystem_contents')
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('rollcalls.create') }} ">新增點名資料</a>
    </div>
        <table>
        <tr>
            <th>編號</th>
            <th>點名日期</th>
            <th>學生床位</th>
            <th>在場與否</th>
            <th>外宿</th>
            <th>晚歸</th>
            <th>操作</th>
            <th>操作</th>
        </tr>
        @foreach($rollcalls as $rollcall)
            <tr>
                <td>{{ $rollcall->id }}</td>
                <td>{{ $rollcall->date }}</td>
                <td>{{ $rollcall->sbrecord->bed->bedcode }}</td>
                @if ($rollcall->presence === 1)
                <td align="center" valign="center"><font color=green>{{ $rollcall->presence = "V" }}</font></td>
                @else 
                <td align="center" valign="center"><font color=red>{{ $rollcall->presence = "X" }} </font></td>
                @endif
                @if ($rollcall->leave === 1)
                <td align="center" valign="center"><font color=green>{{ $rollcall->leave = "V" }}</font></td>
                @else 
                <td align="center" valign="center"><font color=red>{{ $rollcall->leave = "X" }} </font></td>
                @endif
                @if ($rollcall->late === 1)
                <td align="center" valign="center"><font color=green>{{ $rollcall->late = "V" }}</font></td>
                @else 
                <td align="center" valign="center"><font color=red>{{ $rollcall->late = "X" }} </font></td>
                @endif
                <td align="center" valign="center"><font color=blue><a href="{{ route('rollcalls.show',[ 'id'=>$rollcall->id ]) }}">詳細資料</a></font></td>
                <!-- <td><font color=red><a href="{{ route('rollcalls.destroy',[ 'id'=>$rollcall->id ]) }}">刪除資料</a></font></td> -->
                <td>
                    <form action="{{ url('/rollcalls/delete', ['id' => $rollcall->id]) }}" method="post">
                        <input class="btn btn-default" type="submit" value="刪除" />
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
