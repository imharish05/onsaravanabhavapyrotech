@extends('layout.app')
@section('main_content')

  <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Customer</h4>

                                    </div>
                                    <div class="card-body">

                                         <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                {{-- <th>UserId</th> --}}
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Address</th>
                                                <th>City</th>
                                            </tr>
                                            </thead>


                                            <tbody>

                                                 <?php $i=1; ?>

                                                @foreach ($customer as $custo)
                                                 <tr>
                                                <td>{{ $i++ }}</td>
                                                {{-- <td>{{ $custo->user_id }}</td> --}}
                                                <td>{{ $custo->name }}</td>
                                                <td>{{ $custo->email }}</td>
                                                <td>{{$custo->phone_number  }}</td>
                                                <td>{{ $custo->address }}</td>
                                                <td>{{ $custo->city }}</td>

                                            </tr>

                                                @endforeach


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

@endsection
