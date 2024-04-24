<x-admin>
    @section('title')
        {{ 'Edit Aplikasi' }}
    @endsection

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Aplikasi</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.aplikasi.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('admin.aplikasi.update', $aplikasi->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="namaAplikasi" class="col-sm-2 col-form-label">Nama Aplikasi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namaAplikasi" id="namaAplikasi" value="{{ $aplikasi->namaAplikasi }}" class="form-control" required>
                                    @error('namaAplikasi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namaModul" class="col-sm-2 col-form-label">Nama Modul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namaModul" id="namaModul" value="{{ $aplikasi->namaModul }}" class="form-control" required>
                                    @error('namaModul')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{ $aplikasi->keterangan }}</textarea>
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="urls" class="col-sm-2 col-form-label">URL</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="urls" name="urls[]" rows="3" required>@foreach ($aplikasi->urls as $url){{ $url }}&#10;@endforeach</textarea>
                                    @error('urls')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_result" class="col-sm-2 col-form-label">Jenis Result</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="jenis_result" name="jenis_result" required>
                                        @foreach ($jenisResults as $jenisResult)
                                            <option value="{{ $jenisResult->id }}" {{ $aplikasi->jenis_result == $jenisResult->id ? 'selected' : '' }}>{{ $jenisResult->jenisResult }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis_result')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_parameter" class="col-sm-2 col-form-label">Jenis Parameter</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="jenis_parameter" name="jenis_parameter" required>
                                        @foreach ($jenisParameters as $jenisParameter)
                                            <option value="{{ $jenisParameter->id }}" {{ $aplikasi->jenis_parameter == $jenisParameter->id ? 'selected' : '' }}>{{ $jenisParameter->jenisParameter }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis_parameter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="status" name="status" required value="{{ $aplikasi->status }}">
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modifiedBy" class="col-sm-2 col-form-label">Modified By</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="modifiedBy" name="modifiedBy" required value="{{ $aplikasi->modifiedBy }}">
                                    @error('modifiedBy')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>
