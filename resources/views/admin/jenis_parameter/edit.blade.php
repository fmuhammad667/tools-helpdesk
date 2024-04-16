<x-admin>
    @section('title')
        {{ 'Edit Jenis Parameter' }}
    @endsection
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Jenis Parameter</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.jenis_parameter.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('admin.jenis_parameter.update', $jenisParameter->id) }}"
                        method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="jenisParameter" class="col-sm-2 col-form-label">Jenis Parameter</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jenisParameter" id="jenisParameter" value="{{ $jenisParameter->jenisParameter }}"
                                        class="form-control" required>
                                    @error('jenisParameter')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{ $jenisParameter->keterangan }}</textarea>
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="status" name="status"
                                        placeholder="Enter status" required value="{{ $jenisParameter->status }}">
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modifiedBy" class="col-sm-2 col-form-label">Modified By</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="modifiedBy" name="modifiedBy"
                                        placeholder="Enter modified by" required value="{{ $jenisParameter->modifiedBy }}">
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
