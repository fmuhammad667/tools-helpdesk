<x-admin>
    @section('title', 'Create Aplikasi')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Aplikasi</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.aplikasi.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('admin.aplikasi.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="namaAplikasi">Nama Aplikasi</label>
                                <input type="text" class="form-control" id="namaAplikasi" name="namaAplikasi"
                                    placeholder="Enter nama aplikasi" required value="{{ old('namaAplikasi') }}">
                                @error('namaAplikasi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="namaModul">Nama Modul</label>
                                <input type="text" class="form-control" id="namaModul" name="namaModul"
                                    placeholder="Enter nama modul" required value="{{ old('namaModul') }}">
                                @error('namaModul')
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
                                <label for="url">URL</label>
                                <input type="text" class="form-control" id="url" name="url"
                                    placeholder="Enter URL" required value="{{ old('url') }}">
                                @error('url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis_result">Jenis Result</label>
                                <select class="form-control" id="jenis_result" name="jenis_result" required>
                                    <option value="">-- Select Jenis Result --</option>
                                    @foreach($jenisResults as $jenisResult)
                                        <option value="{{ $jenisResult->id }}">{{ $jenisResult->jenisResult }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_result')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis_parameter">Jenis Parameter</label>
                                <select class="form-control" id="jenis_parameter" name="jenis_parameter" required>
                                    <option value="">-- Select Jenis Parameter --</option>
                                    @foreach($jenisParameters as $jenisParameter)
                                        <option value="{{ $jenisParameter->id }}">{{ $jenisParameter->jenisParameter }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_parameter')
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
