<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="/images/favicon.png" type="">
    <title>Sriyani Text</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('userhome/css/bootstrap.css')}}"/>
    <!-- font awesome style -->
    <link href="{{asset('userhome/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{asset('userhome/css/style.css')}}" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="{{asset('userhome/css/responsive.css')}}" rel="stylesheet"/>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .biling,
        .payment {
            font-size: 24px;
            padding-bottom: 10px;
        }

        .pay-btn {
            margin-left: 200px;
        }
        .cardnumber_field{
            margin-top: 100px;
        }
    </style>
</head>

<body>

    <!-- header section strats -->
    @include('userHome.components.header')
    <!-- end header section -->

    <div class="container">


        @include('sweetalert::alert')

        <form role="form" action="{{route('stripe.post', $total_price)}}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">


            @csrf

            <div class="row mt-10">

                <div class="col-lg">

                    <div class="row-md-6">

                        <div class="col-lg mb-3">
                            <h1 class="biling">Billing Address</h1>
                            <label for="">Email</label>
                            <input type="email" name="email" required value="{{$user->email}}" />
                        </div>

                        <div class="col-lg mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" required value="{{$user->name}}" />
                        </div>

                        <div class="col-lg mb-3">
                            <label for="">Contact Number</label>
                            <input type="text" name="contactNumber" required value="{{$user->phone}}" />
                        </div>

                        <div class="col-lg mb-3">
                            <label for="">Address</label>
                            <input type="text" id="email" name="deliverAddress" required value="{{$user->address}}" />
                        </div>

                        <div class="col-lg mb-3">
                            <label for="">Description (optional)</label>
                            <textarea name="additional" rows="4" cols="50"></textarea>
                        </div>



                    </div>
                </div>

                <!-- card details -->

                <div class="col-lg">
                    <div class="row-md-6">

                        <div>
                            <div class='form-row row'>
                                <div class='col-lg form-group required'>
                                    <h1 class="payment">Payment</h1>
                                    <label class='control-label'>Name on Card</label>
                                    <input class='form-control' size='4' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-lg form-group required'>
                                    <label class='control-label'>Card Number</label>
                                    <input autocomplete='off' class='form-control card-number' size='20' placeholder="0000 0000 0000 0000" type='text' id="card-number">
                                    <span class="cardnumber_field">Enter the number without spacing or hyphens</span>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label>
                                    <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label>
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="pay-btn">
                                
                                    <input type="submit" class="btn" value="Pay Now Rs {{$total_price}}">
                                     
                            </div>
                        </div>


                    </div>
                </div>

            </div>



        </form>





    </div>

    <div class="cpy_ mt-20">
        <p class="mx-auto">© 2021 All Rights Reserved By <br>

            Sriyani Textile

        </p>
    </div>

    <!-- jQery -->
    <script src="{{asset('userhome/js/jquery-3.4.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('userhome/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('userhome/js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('userhome/js/custom.js')}}"></script>
</body>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
                Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });

    $('#card-number').on('keyup', function(e){
        var val = $(this).val();
        var newval = '';
        val = val.replace(/\s/g, '');
        for(var i=0; i < val.length; i++) {
            if(i%4 == 0 && i > 0) newval = newval.concat(' ');
            newval = newval.concat(val[i]);
        }
        $(this).val(newval);
    });
</script>



</html>