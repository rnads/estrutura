@extends('layouts.admin.master')

@section('title')
ACL
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-md-10 col-lg-8">
			<div class="card shadow-lg">
				<div class="card-header d-flex flex-row align-items-center justify-content-between">
					<h2 class="h5 m-0">{{ __('acl::view.users_groups') }}</h2>
				</div>
				<div class="card-body">
					@include('acl::_msg')
					<div class="table-responsive">
						<table class="table table-middle table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>{{ __('acl::view.group') }}</th>
									<th>{{ __('acl::view.description') }}</th>
									<th class="text-center">{{ __('Usuários') }}</th>
									<td class="text-right">
										<a href="{{ route(aclPrefixRoutName() . 'create') }}"
											class="btn btn-primary btn-sm">
											{{ __('acl::view.new') }}
										</a>
									</td>
								</tr>
							</thead>
							<tbody>
								@foreach( $groups as $group )
								<tr>
									<td>{{ $group->id }}</td>
									<td>{{ $group->name }}</td>
									<td>{{ $group->description }}</td>
									<td class="text-center">{{ count($group->users) }}</td>
									<td class="text-right">
										<a href="{{ route(aclPrefixRoutName() . 'edit', ['id' => $group->id])  }}"
											class="btn btn-outline-warning btn-sm">
											<i class="fas fa-edit"></i>
										</a>
										<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
											data-target="#aclModal{{ $group->id }}">
											<i class="fas fa-trash-alt"></i>
										</button>
										@include('acl::_confirm-modal-delete')
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
</div>
@endsection
