@extends('master.admin')

@section('title', 'Log')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Bảng</th>
            <th>Cột</th>
            <th>Giá trị cũ</th>
            <th>Giá trị mới</th>
            <th>Thay đổi bởi</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($changeLogs as $log)
        <tr>
            <td>{{ $log->id }}</td>
            <td>{{ $log->table_name }}</td>
            <td>{{ $log->column_name }}</td>
            <td>{{ $log->old_value }}</td>
            <td>{{ $log->new_value }}</td>
            <td>{{ $log->changed_by }}</td>
            <td>{{ $log->changed_at }}</td>
            <td>
                <form action="{{ route('change-logs.revert', $log->id) }}" method="POST">
                    @csrf
                    <button type="submit">Khôi phục</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $changeLogs->links() }}
@endsection