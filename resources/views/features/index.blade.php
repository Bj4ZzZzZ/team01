@extends('app')

@section('title', '學生照片總資料管理')

@section('dormitorysystem_theme', '學生照片總資料管理')

@section('dormitorysystem_contents')
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('features.create') }} ">新增學生照片資料</a>
    </div>
        <table>
        <tr>
            <th>編號</th>
            <th>學生編號</th>
            <th>照片路徑</th>
            <th>操作</th>
            <th>操作</th>
        </tr>
        @foreach($features as $feature)
            <tr>
                <td align="center" valign="center">{{ $feature->id }}</td>
                <td align="center" valign="center">{{ $feature->sbrecord->student->name }}</td>
                <td align="center" valign="center">{{ $feature->path . '.jpg'}}</td>
                <td align="center" valign="center"><font color= blue><a href="{{ route('features.show',['id'=>$feature->id]) }}">詳細資料</a></font></td>
                <!-- <td><font color= red><a href="{{ route('features.destroy',['id'=>$feature->id]) }}">刪除資料</a></font></td> -->
                <td>
                    <form action="{{ url('/features/delete', ['id' => $feature->id]) }}" method="post">
                        <input class="btn btn-default" type="submit" value="刪除" />
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection