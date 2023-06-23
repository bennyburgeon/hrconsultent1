@extends('core::layouts.app')
@section('title', __('Countries'))
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div>
        <a href="{{ route('settings.location.countries.create') }}" class="btn btn-primary">@lang('New Country')</a>
      </div>
      <form method="get" action="" class="my-3 my-lg-0 navbar-search">
          <div class="input-group">
              <input type="text" name="search" value="{{ \Request::get('search', '') }}" class="form-control bg-light border-0 small" placeholder="@lang('Search')" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                      <i class="fas fa-search fa-sm"></i>
                  </button>
              </div>
          </div>
      </form>
  </div>

<div class="row">
    <div class="col-md-12">
        @if($paginationData->count() > 0)
            <div class="card">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead class="thead-dark">
                            <tr>
                                <th>@lang('Country')</th>
                                <th>@lang('Default')</th>
                                <th>@lang('Active')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paginationData as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if($item->is_default)
                                        <span class="small text-success"><i class="fas fa-check-circle text-success"></i></span>
                                    @else
                                        <span class="small text-dander"><i class="fas fa-times-circle"></i></span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->is_active)
                                        <span class="small text-success"><i class="fas fa-check-circle text-success"></i></span>
                                    @else
                                        <span class="small text-dander"><i class="fas fa-times-circle"></i></span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('settings.location.country_details.edit', ['id' => $item->detail->id]) }}" class="btn btn-info">@lang('Detail')</a>
                                    <a href="{{ route('settings.location.countries.edit', ['id' => $item->id]) }}" class="btn btn-primary">@lang('Edit')</a>
                                    <form class="d-inline-block form-delete" action="{{ route('settings.location.countries.destroy', ['id' => $item->id]) }}" method="post" onsubmit="{{ 'return confirm(\''. __('Delete item ?') .'\')' }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-delete">@lang('Delete')</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <div class="mt-4">
            {{ $paginationData->appends( Request::all() )->links() }}
        </div>
        
        @if($paginationData->count() == 0)
        <div class="alert alert-primary text-center">
            <i class="fe fe-alert-triangle mr-2"></i> @lang('No results')
        </div>
        @endif
    </div>
    
</div>

@stop