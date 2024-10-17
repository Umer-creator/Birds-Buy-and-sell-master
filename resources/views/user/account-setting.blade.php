@extends('layouts.user')
@section('user')
    <x-app-layout>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')
                    <x-jet-section-border />
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.update-password-form')
                    </div>
                @endif


            </div>
        </div>
    </x-app-layout>
@endsection


{{-- @extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Passowrd</h4>
                    <form class="cmxform" id="signupForm" method="get" action="#" novalidate="novalidate">
                        <fieldset>
                            <div class="form-group">
                                <label for="cpassword">Current Password</label>
                                <input id="cpassword" class="form-control" name="cpassword" type="text">
                            </div>
                            <div class="form-group ">
                                <label for="password">Password</label>
                                <input id="password" class="form-control form-control-danger valid validate-equalTo-blur"
                                    name="password" type="password" aria-invalid="false"><label id="password-error"
                                    class="error mt-2 text-danger" for="password" style="display: none;"></label>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password">Confirm password</label>
                                <input id="confirm_password" class="form-control form-control-danger valid"
                                    name="confirm_password" type="password" aria-invalid="true">
                            </div>

                            <input class="btn btn-primary" type="submit" value="Submit">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
