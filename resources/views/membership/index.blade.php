@extends('layouts.app')

@section('template_title')
    Membership
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Membership') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('memberships.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Payment</th>
										<th>Ccn</th>
										<th>Duration</th>
										<th>Id Pay</th>
										<th>Id User</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($memberships as $membership)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $membership->payment }}</td>
											<td>{{ $membership->ccn }}</td>
											<td>{{ $membership->duration }}</td>
											<td>{{ $membership->id_pay }}</td>
											<td>{{ $membership->id_user }}</td>

                                            <td>
                                                <form action="{{ route('memberships.destroy',$membership->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('memberships.show',$membership->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('memberships.edit',$membership->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $memberships->links() !!}
            </div>
        </div>
    </div>
@endsection
