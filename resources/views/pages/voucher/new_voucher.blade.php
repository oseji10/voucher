<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Profile') }}</h5>
                </div>
                <form method="post" action="{{ route('voucher.upload') }}" >
                    <div class="card-body">
                            @csrf
                            @method('post')

                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('voucher_owner') ? ' has-danger' : '' }}">
                                <label>{{ _('Voucher Owner') }}</label>
                                <select name="voucher_owner" class="form-control{{ $errors->has('voucher_owner') ? ' is-invalid' : '' }}">
                                    <option value="SOML">SOML</option>
                                    <option value="PV">PV</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'voucher_owner'])
                            </div>

                            <div class="form-group{{ $errors->has('voucher_type') ? ' has-danger' : '' }}">
                                <label>{{ _('Voucher Type') }}</label>
                                <select name="voucher_type" class="form-control{{ $errors->has('voucher_type') ? ' is-invalid' : '' }}">
                                    <option value="Company">Company</option>
                                    <option value="Individual">Individual</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'voucher_type'])
                            </div>

                            <div class="form-group{{ $errors->has('payee') ? ' has-danger' : '' }}">
                                <label>{{ _('Payee Name') }}</label>
                                <input type="text" name="payee" class="form-control{{ $errors->has('payee') ? ' is-invalid' : '' }}" placeholder="{{ _('Payee') }}" >
                                @include('alerts.feedback', ['field' => 'payee'])
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ _('Station') }}</label>
                                <input type="text" name="station" class="form-control{{ $errors->has('station') ? ' is-invalid' : '' }}" placeholder="{{ _('Station') }}" >
                                @include('alerts.feedback', ['field' => 'station'])
                            </div>

                            <div class="form-group{{ $errors->has('head') ? ' has-danger' : '' }}">
                                <label>{{ _('Head') }}</label>
                                <input type="text" name="head" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Head') }}" ">
                                @include('alerts.feedback', ['field' => 'head'])
                            </div>

                            <div class="form-group{{ $errors->has('subhead') ? ' has-danger' : '' }}">
                                <label>{{ _('Subhead') }}</label>
                                <input type="text" name="subhead" class="form-control{{ $errors->has('subhead') ? ' is-invalid' : '' }}" placeholder="{{ _('Subhead') }}" >
                                @include('alerts.feedback', ['field' => 'subhead'])
                            </div>

                

                            <div class="form-group{{ $errors->has('head_description') ? ' has-danger' : '' }}">
                                <label>{{ _('Head Description') }}</label>
                                <input type="text" name="head_description" class="form-control{{ $errors->has('item') ? ' is-invalid' : '' }}" placeholder="{{ _('Head Description') }}" >
                                @include('alerts.feedback', ['field' => 'head_description'])
                            </div>

                            <div class="form-group{{ $errors->has('subhead_description') ? ' has-danger' : '' }}">
                                <label>{{ _('Subhead Description') }}</label>
                                <input type="text" name="subhead_description" class="form-control{{ $errors->has('subhead_description') ? ' is-invalid' : '' }}" placeholder="{{ _('Subhead Description') }}" >
                                @include('alerts.feedback', ['field' => 'subhead_description'])
                            </div>

                            <div class="form-group{{ $errors->has('item') ? ' has-danger' : '' }}">
                                <label>{{ _('Item') }}</label>
                                <input type="text" name="item" class="form-control{{ $errors->has('item') ? ' is-invalid' : '' }}" placeholder="{{ _('Item') }}" >
                                @include('alerts.feedback', ['field' => 'item'])
                            </div>

                            <div class="form-group{{ $errors->has('item_description') ? ' has-danger' : '' }}">
                                <label>{{ _('Item Description') }}</label>
                                <input type="text" name="item_description" class="form-control{{ $errors->has('item_description') ? ' is-invalid' : '' }}" placeholder="{{ _(' Description') }}" >
                                @include('alerts.feedback', ['field' => 'item_description'])
                            </div>


                            <div class="form-group{{ $errors->has('payee_address') ? ' has-danger' : '' }}">
    <label>{{ _('Payee Address') }}</label>
    <textarea name="payee_address" class="form-control{{ $errors->has('payee_address') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter payee address') }}"></textarea>
    @include('alerts.feedback', ['field' => 'payee_address'])
</div>

                            <div class="form-group{{ $errors->has('payment_date') ? ' has-danger' : '' }}">
                                <label>{{ _('Payment Date') }}</label>
                                <input type="date" name="payment_date" class="form-control{{ $errors->has('payment_date') ? ' is-invalid' : '' }}" placeholder="{{ _('Payment Date') }}" >
                                @include('alerts.feedback', ['field' => 'payment_date'])
                            </div>

                            <div id="dynamicFieldsContainer"></div>
<button id="addFieldsButton" class="btn btn-fill btn-secondary" type="button">Add Payment Items</button>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save Voucher') }}</button>
                    </div>
                </form>
            </div>

   
        </div>
        <!-- <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <img class="avatar" src="{{ asset('white') }}/img/emilyz.jpg" alt="">
                                <h5 class="title">{{ auth()->user()->name }}</h5>
                            </a>
                            <p class="description">
                                {{ _('Ceo/Co-Founder') }}
                            </p>
                        </div>
                    </p>
                    <div class="card-description">
                        {{ _('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <button class="btn btn-icon btn-round btn-facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-google">
                            <i class="fab fa-google-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
@endsection
<script>
$(document).ready(function() {
    $('#addFieldsButton').click(function() {
        $('#dynamicFieldsContainer').append(`
            <div class="form-group">
            <table>
            <tr>
            <td><label>Payment Description</label></td>
            
            <td><label>Payment Rate</label></td>

            <td><label>Payment Amount</label></td>
            </tr>

            <tr>
            <td><input width="40%" type="text" name="payment_description[]" class="form-control" placeholder="Payment Description"></td>
            
            <td><input width="40px" type="text" name="payment_rate[]" class="form-control" placeholder="Payment Rate"></td>
            <td><input width="40px" type="text" name="payment_amount[]" class="form-control" placeholder="Payment Amount"></td>
            </tr>
            </table>    
                
            
                
                

                </div>
       
        `);
    });
});
</script>