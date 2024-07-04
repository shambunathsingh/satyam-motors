@extends('admin.layout.app')

@section('content')
<form>

    <div class="page-content " style="min-height: 758px;">

        <div id="main">


            <div class="breadcambarea">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><span style="color: black; margin-right: 3px;"><i
                                class="fa fa-home"></i></span>Dashboard</li>

                    <li class="breadcrumb-item ">Reports</li>
                    <li class="breadcrumb-item ">Marketplace

                    </li>
                    <li class="breadcrumb-item ">Settings</li>


                </ol>
                <div class="table-wrapper">
                </div>

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="container p-4 px-5">
                    <div class="row">
                        <div class="col-md-4">
                            <h2 class="fs-5">Settings for Marketplace</h2>
                            <p>Setup commission fee</p>
                        </div>
                        <div class="col-md-8">
                            <div class="wrapper-content pd-all-20">
                                <div class="form-group">
                                    <label for="defaultCommission">Default commission fee (%), suggest: 2 or 3</label>
                                    <input type="number" class="form-control" id="defaultCommission" placeholder="0">
                                </div>
                                <div class="form-group">
                                    <label>Enable commission fee for each category?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="enableCategoryCommission"
                                            id="enableCategoryCommissionYes" value="yes">
                                        <label class="form-check-label" for="enableCategoryCommissionYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="enableCategoryCommission"
                                            id="enableCategoryCommissionNo" value="no" checked>
                                        <label class="form-check-label" for="enableCategoryCommissionNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="feeWithdrawal">Fee withdrawal (Fixed amount)</label>
                                    <input type="number" class="form-control" id="feeWithdrawal" placeholder="0">
                                </div>
                                <div class="form-group">
                                    <label>Check valid signature in vendor's earnings</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="checkSignature"
                                            id="checkSignatureYes" value="yes" checked>
                                        <label class="form-check-label" for="checkSignatureYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="checkSignature"
                                            id="checkSignatureNo" value="no">
                                        <label class="form-check-label" for="checkSignatureNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Vendor verification (Vendor just can post their product listing after getting
                                        verified)</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vendorVerification"
                                            id="vendorVerificationYes" value="yes" checked>
                                        <label class="form-check-label" for="vendorVerificationYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vendorVerification"
                                            id="vendorVerificationNo" value="no">
                                        <label class="form-check-label" for="vendorVerificationNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable product approval</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="productApproval"
                                            id="productApprovalYes" value="yes" checked>
                                        <label class="form-check-label" for="productApprovalYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="productApproval"
                                            id="productApprovalNo" value="no">
                                        <label class="form-check-label" for="productApprovalNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Hide store phone number?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hidePhoneNumber"
                                            id="hidePhoneNumberYes" value="yes">
                                        <label class="form-check-label" for="hidePhoneNumberYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hidePhoneNumber"
                                            id="hidePhoneNumberNo" value="no" checked>
                                        <label class="form-check-label" for="hidePhoneNumberNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Hide store email?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hideStoreEmail"
                                            id="hideStoreEmailYes" value="yes">
                                        <label class="form-check-label" for="hideStoreEmailYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hideStoreEmail"
                                            id="hideStoreEmailNo" value="no" checked>
                                        <label class="form-check-label" for="hideStoreEmailNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Allow vendor manage shipping?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="manageShipping"
                                            id="manageShippingYes" value="yes">
                                        <label class="form-check-label" for="manageShippingYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="manageShipping"
                                            id="manageShippingNo" value="no" checked>
                                        <label class="form-check-label" for="manageShippingNo">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-8">
                    <button type="submit" class="btn btn-info">Save settings</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection