@extends('core::layouts.app')

@section('title', __('Create Company'))

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@lang('Create Company')</h1>
   
</div>
<div class="row">
    <div class="col-md-12">

        <form role="form" method="post" enctype="multipart/form-data" action="{{route('settings.companies.store')}}">
            @csrf
            @method('POST')
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label mb-2">@lang('Employer')</div>
                                <select name="user_id" class="form-control" required="">
                                    @foreach($employers as $item)
                                        <option value="{{ $item->id }}">{{ $item->name ."-". $item->email }}</option>
                                    @endforeach
                                </select>
                                
                                <small class="help-block text-warning">@lang('Select a employer for company')</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-label mb-2">@lang('Company Logo')</div>
                                <div class="custom-file">
                                    <input type="file" class="" name="logo" accept="image/*">
                                </div>
                                <small class="help-block">@lang('Recommended size: :size', ['size' => '100x100'])</small>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-label">@lang('Active')</div>
                                <label class="custom-switch">
                                    <input type="checkbox" name="is_active" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">@lang('Allow active company')</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-label">@lang('Is Featured?')</div>
                                <label class="custom-switch">
                                    <input type="checkbox" name="is_featured" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">@lang('Is Featured?')</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Company Name')</label>
                                <input type="text" name="company_name" value="" class="form-control" placeholder="" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Company Email')</label>
                                <input type="email" name="company_email" value="" class="form-control" placeholder="" required="">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Company CEO')</label>
                                <input type="text" name="company_ceo" value="" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Industry')</label>
                                <select name="industry_id" class="form-control" required="">
                                    @foreach($industries as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Ownership')</label>
                                <select name="ownership_type_id" class="form-control" required="">
                                    @foreach($ownershipType as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('No of Employees')</label>
                                <select name="no_of_employees" class="form-control" required="">
                                    @foreach(getNumEmployees() as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('No of Office')</label>
                                <select name="no_of_offices" class="form-control" required="">
                                    @foreach(getNumOffices() as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Established')</label>
                                <select name="established_in" class="form-control" required="">
                                    @foreach(getEstablishedIn() as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">@lang('Description')</label>
                                 <textarea name="description" id="company_description" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    
                     <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label class="form-label">@lang('Address')</label>
                                <input type="text" name="location" value="" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">@lang('City')</label>
                                <select name="city_id" class="form-control" required="">
                                    @foreach($cities as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Website URL')</label>
                                <input type="url" name="website" value="" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Phone')</label>
                                <input type="text" name="phone" value="" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Fax')</label>
                                <input type="text" name="fax" value="" class="form-control" placeholder="">
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Facebook Link')</label>
                                <input type="url" name="facebook" value="" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Twitter link')</label>
                                <input type="url" name="twitter" value="" class="form-control" placeholder="" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Linkedin link')</label>
                                <input type="url" name="linkedin" value="" class="form-control" placeholder="" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Youtube link')</label>
                                <input type="url" name="youtube" value="" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Pinterest link')</label>
                                <input type="url" name="pinterest" value="" class="form-control" placeholder="" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="d-flex">
                        <button class="btn btn-primary ml-auto">@lang('Save')</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    
</div>

@stop

@push('scripts')
<script src="{{ Module::asset('jobs:js/companies.js') }}"></script>
@endpush