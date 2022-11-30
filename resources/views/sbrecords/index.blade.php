@extends('app')

@section('title','學生床位總資料管理')

@section('dormitorysystem_theme','學生床位總資料管理')

@section('dormitorysystem_contents')
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('sbrecords.create') }} ">新增學生床位資料</a>
    </div>
        <table>
        <tr>
            <th>編號</th>
            <th>學年</th>
            <th>學期</th>
            <th>學生姓名</th>
            <th>床位</th>
            <th>樓長</th>
            <th>負責的樓層</th>
            <th>操作</th>
            <th>操作</th>
        </tr>
        @foreach($sbrecords as $sbrecord)
            <tr>
                <td align="center" valign="center">{{ $sbrecord->id }}</td>
                <td>{{ $sbrecord->school_year }}</td>
                <td align="center" valign="center">{{ $sbrecord->semester }}</td>
                <td>{{ $sbrecord->student->name }}</td>
                <td>{{ $sbrecord->bed->bedcode }}</td>
                @if ($sbrecord->floor_head === 1)
                <td align="center" valign="center"><font color=green>{{ $sbrecord->floor_head = "V" }}</font></div></td>
                @else 
                <td align="center" valign="center"><font color=red>{{ $sbrecord->floor_head = "X" }} </font></td>
                @endif
                <td align="center" valign="center">{{ $sbrecord->responsible_floor }}</td>
                <td><font color=blue><a href="{{ route('sbrecords.show',['id'=>$sbrecord->id]) }}">詳細資料</a></font></td>
                <!-- <td><font color=red><a href="{{ route('sbrecords.destroy',['id'=>$sbrecord->id]) }}">刪除資料</a></font></td> -->
                <td>
                    <form action="{{ url('/sbrecords/delete', ['id' => $sbrecord->id]) }}" method="post">
                        <input class="btn btn-default" type="submit" value="刪除" />
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    </table>
@endsection