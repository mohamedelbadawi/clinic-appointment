@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-7 col-auto">
                        <h3 class="page-title">Doctors</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Doctors</li>
                        </ul>
                    </div>
                    <div class="col-sm-5 col">
                        <a href="#Add_Doctors_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>doctor</th>
                                            <th>Member Since</th>
                                            <th>Earned</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="{{ asset('assets/img/doctors/' . $doctor->image) }}"
                                                                alt="User Image"></a>
                                                        <a href="profile.html">Dr. {{ $doctor->name }}</a>
                                                    </h2>
                                                </td>
                                                <td>{{ $doctor->speciality->name }}</td>

                                                <td>{{ $doctor->created_at }}</td>

                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                                            href="#{{ str_replace(' ', '', $doctor->name . $doctor->id) }}">
                                                            <i class="fe fe-pencil"></i> Edit
                                                        </a>
                                                        <a data-toggle="modal"
                                                            href="#{{ str_replace(' ', '', $doctor->name . $doctor->id . '_del') }}"
                                                            class="btn btn-sm bg-danger-light">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>


                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <div class="float-right">
                                                    {!! $doctors->links('pagination::bootstrap-4') !!}
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @foreach ($doctors as $doctor)
        <!-- Edit Details Modal -->
        <div class="modal fade" id="{{ str_replace(' ', '', $doctor->name . $doctor->id) }}" aria-hidden="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Specialities</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('doctors.update', $doctor->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="d-flex flex-wrap">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ $doctor->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Speciality</label>
                                    <select class=" select form-control" name="speciality_id">
                                        <option>choose speciality</option>
                                        @foreach ($specialites as $specialty)
                                            <option value="{{ $specialty->id }}" @selected($doctor->speciality_id ==$specialty->id)>
                                                {{ $specialty->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label for="about">About</label>
                                    <textarea name="about" id="" cols="55" class="form-control" rows="5"
                                        style="resize: none">{{ $doctor->about }}</textarea>
                                </div>

                                <div class="col-12 ">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>


                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Details Modal -->

        <!-- Delete Modal -->
        <div class="modal fade" id="{{ str_replace(' ', '', $doctor->name . $doctor->id . '_del') }}"
            aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <!--	<div class="modal-header">
                                                                                                                    <h5 class="modal-title">Delete</h5>
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>-->
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-primary">Yes </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Modal -->
    @endforeach


    <!-- Add Modal -->
    <div class="modal fade" id="Add_Doctors_details" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex flex-wrap">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Speciality</label>
                                <select class=" select form-control" name="speciality_id">
                                    <option selected>choose speciality</option>
                                    @foreach ($specialites as $specialty)
                                        <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="about">About</label>
                                <textarea name="about" id="" cols="55" class="form-control" rows="5" style="resize: none"></textarea>
                            </div>

                            <div class="col-12 ">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
