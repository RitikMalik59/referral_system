@extends('layouts.app')

@section('content')
<h2 class="display-6 text-center mt-5">Referral Form</h2>


<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-3">
                <h2>Create An Account</h2>
                <p>Please fill this form to register with us</p>
                <form action="/adduser" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">Name:<sup>*</label>
                        <input type="text" name="name" class="form-control form-control-lg " required>
                        <span class="invalid-feedback"><br /></span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Referral ID:<sup>*</label>
                        <select class="col-md-4 form-select form-control-sm" name="refer_id" aria-label="Default select example">
                            <option selected value="">Select Referral ID:</option>
                            @if (count($users_data) > 0)
                            @foreach ($users_data as $user)
                            <option value="{{$user['user_id']}}">{{$user['name']}}</option>
                            @endforeach
                            @else
                            <option value="">No Referral available</option>
                            @endif
                        </select>
                        <span class="invalid-feedback"><br /></span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Amount:<sup>*</sup></label>
                        <input type="number" name="amount" class="form-control form-control-lg " required>
                        <span class="invalid-feedback"><br /></span>
                    </div>
                    <div class="row mb-3">
                        <div class="col d-grid gap-2">
                            <input type="submit" class="btn btn-success" name="registor_user" value="Submit">
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="table">
            <table class="table table-hover table-striped caption-top mt-5">
                <caption class="text-center fw-bold">List of Users</caption>
                <thead>
                    <tr>
                        <th class="text-center" scope="col">User ID</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Refer ID</th>
                        <th class="text-center" scope="col">Amount</th>
                        <th class="text-center" scope="col">Wallet</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @if (count($users_data) > 0)

                    @foreach ($users_data as $user)
                    <tr>
                        <th class="text-center" scope="row">{{ $user->user_id }}</th>
                        <th class="text-center" scope="row">{{ $user->name }}</th>
                        <th class="text-center" scope="row">{{ $user->refer_id ?? '-' }}</th>
                        <th class="text-center" scope="row">{{ $user->amount }}</th>
                        <th class="text-center" scope="row">{{ $user->wallet }}</th>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <th>No User Data Available.</th>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>



@endsection