@extends('layouts.master', ['title' => 'Data Member'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary text-light">Data Member</div>

            <div class="card-body mt-3">
                <a href="{{ route('member.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Member</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th class="text-center" style="width: 120px;">Kode Member</th>
                                <th style="width: 250px;">Nama Member</th>
                                <th>Telp</th>
                                <!-- <th>Disc</th> -->
                                <!-- <th style="width: 200px;">Member Sejak</th> -->
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($members as $member)
                            <tr>
                                <td></td>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center text-dark">
                                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($member->kode_member, 'C128')}}" alt="barcode" width="120" />
                                    <small>{{ $member->kode_member }}</small>
                                </td>
                                <td>{{ $member->nama_member }}</td>
                                <td>{{ $member->telp }}</td>
                                <!-- <td>{{ $member->disc }}%</td> -->
                                <!-- <td>{{ $member->created_at->diffForHumans() }}</td> -->
                                <td>
                                    <a href="{{ route('member.show', $member->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('member.print', $member->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></a>
                                    <a href="{{ route('member.edit', $member->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                    @if(auth()->user()->level == 'admin')
                                    <a href="{{ route('member.history', $member->id) }}" class="btn btn-sm btn-info"><i class="fas fa-cash-register"></i></a>
                                    <form action="{{ route('member.destroy', $member->id) }}" method="post" class="delete-form" style="display: inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop