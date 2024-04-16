<x-admin>
    @section('title', 'Aplikasi')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Aplikasi Table</h3>
            <div class="card-tools">
                <a href="{{ route('admin.aplikasi.create') }}" class="btn btn-sm btn-info">New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="aplikasiTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Aplikasi</th>
                        <th>Nama Modul</th>
                        <th>Keterangan</th>
                        <th>URL</th>
                        <th>Jenis Result</th>
                        <th>Jenis Parameter</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Created By</th>
                        <th>Modified On</th>
                        <th>Modified By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aplikasis as $aplikasi)
                        <tr>
                            <td>{{ $aplikasi->id }}</td>
                            <td>{{ $aplikasi->namaAplikasi }}</td>
                            <td>{{ $aplikasi->namaModul }}</td>
                            <td>{{ $aplikasi->keterangan }}</td>
                            <td>{{ $aplikasi->url }}</td>
                            <td>{{ $aplikasi->jenisResult->jenisResult }}</td>
                            <td>{{ $aplikasi->jenisParameter->jenisParameter }}</td>
                            <td>{{ $aplikasi->status }}</td>
                            <td>{{ \Carbon\Carbon::parse($aplikasi->createdOn)->format('d/m/Y') ?: '-' }}</td>
                            <td>{{ $aplikasi->createdBy }}</td>
                            <td>{{ $aplikasi->modifiedOn ? \Carbon\Carbon::parse($aplikasi->modifiedOn)->format('d/m/Y') : '-' }}</td>
                            <td>{{ $aplikasi->modifiedBy ?: '-' }}</td>
                            <td>
                                <a href="{{ route('admin.aplikasi.edit', $aplikasi->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.aplikasi.destroy', $aplikasi->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
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
                $('#aplikasiTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
