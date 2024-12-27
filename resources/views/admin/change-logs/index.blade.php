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

<div class="table-responsive container-change-logs container-sm p-0">
    <p class="fs-3 fw-bold">Sản phẩm</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="serial" style="max-width: 40px">ID</th>
                <th scope="table" style="max-width: 100px">Bảng</th>
                <th scope="old_value" style="max-width: 140px">Giá trị cũ</th>
                <th scope="new_value" style=" max-width: 140px">Giá trị mới</th>
                <th scope="change_by" style="max-width: 50px">Thay đổi bởi</th>
                <th scope="time" style="max-width: 50px">Thời gian</th>
                <th scope="activity" style="max-width: 50px">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($changeLogs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->table_name }}</td>
                <td>
                    @if($log->old_value)
                    <pre>{{ json_encode(json_decode($log->old_value), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                    @else
                    N/A
                    @endif
                </td>
                <td>
                    @if($log->new_value)
                    <pre>{{ json_encode(json_decode($log->new_value), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                    @else
                    N/A
                    @endif
                </td>
                <td>{{ $log->employee ? $log->employee->name : 'N/A' }}</td>
                <td>{{ $log->changed_at }}</td>
                <td class="text-center">
                    <form action="{{ route('change-logs.revert', $log->id) }}" method="POST">
                        @csrf
                        <button class="btn_revert p-0" type="submit"><i class="bi bi-recycle"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $changeLogs->links() }}
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin/change-logs/index.css') }}">
@endpush

@push('scripts') <script>
document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(event) {
                if (!confirm('Bạn có chắc chắn muốn khôi phục?')) {
                    event.preventDefault();
                }
            }

        );
    }

);
</script>
@endpush
