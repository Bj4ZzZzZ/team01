@extends('app')

@section('title', '床位總資料管理')

@section('dormitorysystem_theme', '床位總資料管理')

@section('dormitorysystem_contents')
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('beds.create') }} ">新增床位資料</a>
    </div>
        <table>
        <tr>
            <th>編號</th>
            <th>床位代碼</th>
            <th>宿別</th>
            <th>樓層</th>
            <th>住房類型</th>
            <th>操作</th>
            <th>操作</th>
        </tr>
        @foreach($beds as $bed)
            <tr>
                <td>{{ $bed->id }}</td>
                <td>{{ $bed->bedcode }}</td>
                <td>{{ $bed->dormitory->name }}</td>
                <td>{{ $bed->floor }}</td>
                <td>{{ $bed->roomtype }}</td>
                <td><font color=blue><a href="{{ route('beds.show',['id'=>$bed->id]) }}">詳細資料</a></font></td>
                <!-- <td><font color=red><a href="{{ route('beds.destroy',['id'=>$bed->id]) }}">刪除資料</a></font></td> -->
                <td>
                    <form action="{{ url('/beds/delete', ['id' => $bed->id]) }}" method="post">
                        <input class="btn btn-default" type="submit" value="刪除" />
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
