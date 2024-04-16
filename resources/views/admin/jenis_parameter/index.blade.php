<x-admin>
    @section('title', 'Jenis Parameter')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Jenis Parameter Table</h3>
            <div class="card-tools">
                <a href="{{ route('admin.jenis_parameter.create') }}" class="btn btn-sm btn-info">New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="jenisParameterTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jenis Parameter</th>
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
                    @foreach ($jenisParameters as $jenisParameter)
                        <tr>
                            <td>{{ $jenisParameter->id }}</td>
                            <td>{{ $jenisParameter->jenisParameter }}</td>
                            <td>{{ $jenisParameter->keterangan }}</td>
                            <td>{{ $jenisParameter->status }}</td>
                            <td>{{ \Carbon\Carbon::parse($jenisParameter->createdOn)->format('d/m/Y') ?: '-' }}</td>
                            <td>{{ $jenisParameter->createdBy }}</td>
                            <td>{{ $jenisParameter->modifiedOn ? \Carbon\Carbon::parse($jenisParameter->modifiedOn)->format('d/m/Y') : '-' }}</td>
                            <td>{{ $jenisParameter->modifiedBy ?: '-' }}</td>
                            <td>
                                <a href="{{ route('admin.jenis_parameter.edit', $jenisParameter->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.jenis_parameter.destroy', $jenisParameter->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
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
                $('#jenisParameterTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
