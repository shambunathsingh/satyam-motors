@extends('admin.layout.app')


<style>
    #option-setting-multiple {
        display: none;
    }
</style>

@section('content')
    <form action="{{ route('admin.ecommerce.update_product_option', ['id' => $option->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="main-panel">

            <ol class="breadcrumb">
                <li class="breadcrumb-item "><span style="color: black; margin-right: 3px;"><i
                            class="fa fa-home"></i></span>Dashboard</li>

                <li class="breadcrumb-item"><a href="{{ route('admin.ecommerce.product') }}"
                        style="color: black; margin-right: 3px;">Ecommerce</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.ecommerce.product_option') }}"
                        style="color: black; margin-right: 3px;">Product
                        options</a></li>
                <li class="breadcrumb-item active">Edit option {{ $option->name }}
                </li>
            </ol>

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

            <div id="main">

                <div class="row">
                    <div class="col-md-9">
                        <div class="main-form">
                            <div class="form-body">
                                <div class="form-group mb-3">

                                    <label for="name" class="control-label required" aria-required="true">Name</label>
                                    <input class="form-control" placeholder="Name" data-counter="120"
                                        value="{{ $option->name }}" name="name" type="text" id="name">



                                </div>


                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4>
                                    <span> Option value</span>
                                </h4>
                            </div>
                            <div class="widget-body">
                                <div class="col-md-12 option-setting-tab" style="" id="option-setting-multiple">
                                    <table class="table table-bordered setting-option">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Label</th>
                                                <th scope="col">Price</th>
                                                <th scope="col" colspan="2">Price Type</th>
                                            </tr>
                                        </thead>
                                        <tbody class="option-sortable ui-sortable" style="">
                                            <tr class="option-row ui-sortable-handle" data-index="0" style="">
                                                <td class="text-center">
                                                    <i class="fa fa-sort"></i>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control option-label"
                                                        name="options[0][option_value]" value=""
                                                        placeholder="Please fill label">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control affect_price is-valid"
                                                        name="options[0][affect_price]" value=""
                                                        placeholder="Please fill affect price" aria-invalid="false">
                                                </td>
                                                <td>
                                                    <select class="form-select affect_type" name="options[0][affect_type]"
                                                        aria-invalid="false">
                                                        <option value="0">Fixed</option>
                                                        <option value="1">Percent</option>
                                                    </select>
                                                </td>
                                                <td style="width: 50px">
                                                    <button class="btn btn-default remove-row" data-index="0"><i
                                                            class="fa fa-trash" style="color: red!important;"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info mt-3 add-new-row" id="add-new-row">Add
                                        new row</button>
                                </div>

                                <div class="empty" id="chooseType">Please choose option type!</div>

                            </div>
                        </div>



                    </div>
                    <div class="col-md-3 right-sidebar d-flex flex-column-reverse flex-md-column">
                        <div class="form-actions-wrapper">
                            <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
                                <div class="widget-title">
                                    <h4>
                                        <span>Publish</span>
                                    </h4>
                                </div>
                                <div class="widget-body">
                                    <div class="btn-set">
                                        <button type="submit" name="submit" value="save" class="btn btn-info">
                                            <i class="fa fa-save"></i> Save &amp; Exit
                                        </button>
                                        &nbsp;
                                        <button type="submit" name="submit" value="apply" class="btn btn-success">
                                            <i class="fa fa-check-circle"></i> Save
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-side-meta-boxes">

                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="option_type" class="control-label required"
                                            aria-required="true">Type</label></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="ui-select-wrapper form-group ">
                                        <select class="form-control option-type ui-select is-valid" v-pre=""
                                            id="option_type" name="option_type" aria-invalid="false"
                                            aria-describedby="option_type-error">
                                            <option value="N/A">Please select option</option>
                                            <optgroup label="Text">
                                                <option value="field">
                                                    Field</option>
                                            </optgroup>
                                            <optgroup label="Select">
                                                <option value="dropdown">
                                                    Dropdown</option>
                                                <option value="checkbox">
                                                    Checkbox</option>
                                                <option value="radiobutton">
                                                    RadioButton</option>
                                            </optgroup>
                                        </select><span id="option_type-error" class="invalid-feedback"
                                            style="display: inline;"></span>
                                        <svg class="svg-next-icon svg-next-icon-size-16">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                </path>
                                            </svg>
                                        </svg>
                                    </div>




                                </div>
                            </div>
                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="required" class="control-label">Is
                                            required?</label></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" value="1"
                                            {{ $option->is_required == '1' ? 'checked' : '' }} name="is_required"
                                            id="flexSwitchCheckChecked">
                                        <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label> -->
                                    </div>




                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectElement = document.getElementById('option_type');
            selectElement.addEventListener('change', function() {
                var selectedOption = selectElement.value;
                var optionSettingMultiple = document.getElementById('option-setting-multiple');
                var chooseType = document.getElementById('chooseType');

                if (selectedOption === 'dropdown' || selectedOption === 'checkbox' || selectedOption ===
                    'radiobutton') {
                    optionSettingMultiple.style.display = 'block';
                    chooseType.style.display = 'none';
                } else {
                    optionSettingMultiple.style.display = 'none';
                    chooseType.style.display = 'block';
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#add-new-row').click(function() {
        // Get the current number of rows
        var rowCount = $('.option-sortable .option-row').length;

        // Generate the HTML for the new row
        var newRow = `
        <tr class="option-row ui-sortable-handle" data-index="${rowCount}" style="">
            <td class="text-center">
                <i class="fa fa-sort"></i>
            </td>
            <td>
                <input type="text" class="form-control option-label"
                    name="options[${rowCount}][option_value]" value=""
                    placeholder="Please fill label">
            </td>
            <td>
                <input type="number" class="form-control affect_price"
                    name="options[${rowCount}][affect_price]" value=""
                    placeholder="Please fill affect price">
            </td>
            <td>
                <select class="form-select affect_type" name="options[${rowCount}][affect_type]">
                    <option value="0">Fixed</option>
                    <option value="1">Percent</option>
                </select>
            </td>
            <td style="width: 50px">
                <button class="btn btn-default remove-row" data-index="${rowCount}"><i
                        class="fa fa-trash" style="color: red!important;"></i></button>
            </td>
        </tr>`;

        // Append the new row to the table body
        $('.option-sortable').append(newRow);
    });

    // Delegate event for removing rows
    $(document).on('click', '.remove-row', function() {
        $(this).closest('.option-row').remove();
    });
});
</script>
@endsection
