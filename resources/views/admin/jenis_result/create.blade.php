<x-admin>
    @section('title', 'Create Jenis Result')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Jenis Result</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.jenis_result.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('admin.jenis_result.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jenisResult">Jenis Result</label>
                                <input type="text" class="form-control" id="jenisResult" name="jenisResult"
                                    placeholder="Enter jenis parameter" required value="{{ old('jenisResult') }}">
                                @error('jenisResult')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Enter keterangan">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status"
                                    placeholder="Enter status" required value="{{ old('status') }}">
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="createdBy">Created By</label>
                                <input type="text" class="form-control" id="createdBy" name="createdBy"
                                    placeholder="Enter created by" required value="{{ old('createdBy') }}">
                                @error('createdBy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>
