@extends('app')

@section('title', '學生總資料管理')

@section('dormitorysystem_theme', '學生總資料管理')

@section('dormitorysystem_contents')
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('students.create') }} ">新增學生資料</a>
    </div>
        <table>
        <tr>
            <th>編號</th>
            <th>學號</th>
            <th>班級</th>
            <th>姓名</th>
            <th>備註</th>
            <th>操作</th>
            <th>操作</th>
        </tr>
        @foreach($students as $student)
            <tr>
                <td align="center" valign="center">{{ $student->id }}</td>
                <td align="center" valign="center">{{ $student->number }}</td>
                <td align="center" valign="center">{{ $student->class }}</td>
                <td align="center" valign="center">{{ $student->name }}</td>
                <td align="center" valign="center">{{ $student->remark }}</td>
                <td align="center" valign="center"><font color= blue><a href="{{ route('students.show',['id'=>$student->id]) }}">詳細資料</a></font></td>
                <!-- <td><font color= red><a href="{{ route('students.destroy',['id'=>$student->id]) }}">刪除資料</a></font></td> -->
                <td>
                    <form action="{{ url('/students/delete', ['id' => $student->id]) }}" method="post">
                        <input class="btn btn-default" type="submit" value="刪除" />
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection