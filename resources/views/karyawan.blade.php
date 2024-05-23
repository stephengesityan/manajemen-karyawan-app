@extends('layouts.main')
@section('content')
    <button type="button" class="btn btn-success text-capitalize my-3" data-bs-toggle="modal" data-bs-target="#addModal">
        add data <i class="bi bi-plus"></i>
    </button>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-center text-capitalize">no</th>
                <th class="text-center text-capitalize">nama</th>
                <th class="text-center text-capitalize">alamat</th>
                <th class="text-center text-capitalize">jabatan</th>
                <th class="text-center text-capitalize">gaji</th>
                <th class="text-center text-capitalize">status</th>
                <th class="text-center text-capitalize">tanggal lahir</th>
                <th class="text-center text-capitalize">mulai kerja</th>
                <th class="text-center text-capitalize">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $index => $karyawan)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $karyawan->nama }}</td>
                    <td class="text-center">{{ $karyawan->alamat }}</td>
                    <td class="text-center">{{ $karyawan->jabatan }}</td>
                    <td class="text-center">{{ $karyawan->gaji }}</td>
                    <td class="text-center">{{ $karyawan->status }}</td>
                    <td class="text-center">{{ $karyawan->tanggal_lahir }}</td>
                    <td class="text-center">{{ $karyawan->mulai_kerja }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $karyawan->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $karyawan->id }}">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </td>
                </tr>

                {{-- edit modal --}}
                <div class="modal fade" id="editModal{{ $karyawan->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('karyawan.edit', $karyawan->id) }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label text-capitalize">nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" required
                                            value="{{ $karyawan->nama }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label text-capitalize">alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control" required
                                            value="{{ $karyawan->alamat }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jabatan" class="form-label text-capitalize">jabatan</label>
                                        <input type="text" name="jabatan" id="jabatan" class="form-control" required
                                            value="{{ $karyawan->jabatan }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gaji" class="form-label text-capitalize">gaji</label>
                                        <input type="number" name="gaji" id="gaji" class="form-control" required
                                            value="{{ $karyawan->gaji }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="col-form-label text-capitalize">status</label>
                                        <select class="form-select" name="status" id="status">
                                            <option value="" disabled selected>Pilih Status</option>
                                            <option value="aktif" {{ $karyawan->status == 'aktif' ? 'selected' : '' }}>
                                                Aktif</option>
                                            <option value="cuti" {{ $karyawan->status == 'cuti' ? 'selected' : '' }}>
                                                Cuti</option>
                                            <option value="magang" {{ $karyawan->status == 'magang' ? 'selected' : '' }}>
                                                Magang
                                            </option>
                                            <option value="kontrak" {{ $karyawan->status == 'kontrak' ? 'selected' : '' }}>
                                                Kontrak
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lahir" class="form-label text-capitalize">tanggal lahir</label>
                                        <input type="date" name="tanggal_lahir" id="lahir" class="form-control"
                                            required value="{{ $karyawan->tanggal_lahir }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="masuk" class="form-label text-capitalize">mulai kerja</label>
                                        <input type="date" name="mulai_kerja" id="masuk" class="form-control"
                                            required value="{{ $karyawan->mulai_kerja }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- delete modal --}}
                <div class="modal fade" id="deleteModal{{ $karyawan->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-capitalize">anda yakin ingin menghapus data ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        id="delete-record{{ $karyawan->id }}">Ya,
                                        Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {{-- add modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('karyawan.add') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label text-capitalize">nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label text-capitalize">alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label text-capitalize">jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control" value="Karyawan"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="gaji" class="form-label text-capitalize">gaji</label>
                            <input type="number" name="gaji" id="gaji" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label text-capitalize">status</label>
                            <select name="status" class="form-select" id="status" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="cuti">Cuti</option>
                                <option value="magang">Magang</option>
                                <option value="kontrak">Kontrak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label text-capitalize">tanggal lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="mulai_kerja" class="form-label text-capitalize">mulai kerja</label>
                            <input type="date" name="mulai_kerja" id="mulai_kerja" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
