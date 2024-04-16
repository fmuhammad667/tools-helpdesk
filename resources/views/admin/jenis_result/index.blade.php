<x-admin>
    @section('title', 'Jenis Result')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Jenis Result Table</h3>
            <div class="card-tools">
                <a href="{{ route('admin.jenis_result.create') }}" class="btn btn-sm btn-info">New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="jenisResultTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jenis Result</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Created By</th>
                        <th>Modified On</th>
                        <th>Modified By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenisResults as $jenisResult)
                        <tr>
                            <td>{{ $jenisResult->id }}</td>
                            <td>{{ $jenisResult->jenisResult }}</td>
                            <td>{{ $jenisResult->keterangan }}</td>
                            <td>{{ $jenisResult->status }}</td>
                            <td>{{ \Carbon\Carbon::parse($jenisResult->createdOn)->format('d/m/Y') ?: '-' }}</td>
                            <td>{{ $jenisResult->createdBy }}</td>
                            <td>{{ $jenisResult->modifiedOn ? \Carbon\Carbon::parse($jenisResult->modifiedOn)->format('d/m/Y') : '-' }}</td>
                            <td>{{ $jenisResult->modifiedBy ?: '-' }}</td>
                            <td>
                                <a href="{{ route('admin.jenis_result.edit', $jenisResult->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.jenis_result.destroy', $jenisResult->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
        <script>
            $(function() {
                $('#jenisResultTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
