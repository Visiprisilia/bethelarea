@extends('template')
@section('container')

<!-- Page Heading -->

<div class="row">

    <div class="col-lg-4 order-lg-2">

        <div class="card shadow mb-4">
            <div class="card-profile-image mt-4">
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My Account</h6>
            </div>

            <div class="card-body">

                <form>
                @foreach ($user as $item)
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" value="{{$item->name}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" >Email</label>
                                    <input type="email" id="email" class="form-control" name="email" value="{{$item->email}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" >Password</label>
                                    <input type="text" id="password" class="form-control" name="password" value="{{$item->password}}">
                                </div>
                            </div>
                        </div>






                    </div>
            </div>

            <!-- Button -->
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
            </form>

        </div>

    </div>

</div>

@endforeach
@endsection