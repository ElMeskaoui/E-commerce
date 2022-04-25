<!DOCTYPE html>
<html>
   <head>
      <title>Stripe Payment Page - HackTheStuff</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <style type="text/css">
         .panel-title {
         display: inline;
         font-weight: bold;
         }
         .display-table {
         display: table;
         }
         .display-tr {
         display: table-row;
         }
         .display-td {
         display: table-cell;
         vertical-align: middle;
         width: 61%;
         }
      </style>
   </head>
   <body>
      <div class="container">
         
         <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <a class="btn btn-primary" href="{{ route('products.list') }}" role="button">Home</a>

               <h1>Payment Details</h1>
               <div class="panel panel-default credit-card-box">
                  <div class="panel-heading display-table" >
                     <div class="row display-tr" >
                        <h3 class="panel-title display-td" ></h3>
                        <div class="display-td" >                            
                           <img class="img-responsive pull-right" src="https://www.google.com/url?sa=i&url=http%3A%2F%2Ft3.gstatic.com%2Fimages%3Fq%3Dtbn%3AANd9GcSJHbnfk81kA_5mIj81yhRy3R2LRx3S11OyMjC68QeONsOp5DXx&psig=AOvVaw1-jyAuGR1mEsPuLloPZT5U&ust=1647901162310000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCLDPza_c1fYCFQAAAAAdAAAAABAN">
                        </div>
                     </div>
                  </div>
                  <div class="panel-body">
                     @if (Session::has('success'))
                     <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                     </div>
                     @endif
                     <form
                        role="form"
                        action="{{ route('stripe.post') }}"
                        method="post"
                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        @csrf
                        <div class='form-row row'>
                           <div class='col-xs-12 form-group required'>
                              <label class='control-label'>Name on Card</label> <input
                                 class='form-control' size='4' type='text'>
                           </div>
                        </div>
                        <div class='form-row row'>
                           <div class='col-xs-12 form-group card required'>
                              <label class='control-label'>Card Number</label> <input
                                 autocomplete='off' class='form-control card-number' size='20'
                                 type='text'>
                           </div>
                        </div>
                        <div class='form-row row'>
                           <div class='col-xs-12 col-md-4 form-group cvc required'>
                              <label class='control-label'>CVC</label> <input autocomplete='off'
                                 class='form-control card-cvc' placeholder='ex. 311' size='4'
                                 type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Month</label> <input
                                 class='form-control card-expiry-month' placeholder='MM' size='2'
                                 type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Year</label> <input
                                 class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                 type='text'>
                           </div>
                        </div>
                        <div class='form-row row'>
                           <div class='col-md-12 error form-group hide'>
                              {{-- <div class='alert-danger alert'>Please correct the errors and try
                                 again.
                              </div> --}}
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-xs-12">
                            <input type="hidden" name="amount" value="{{Cart::getTotal()}}" class="w-6 text-center bg-gray-300" />
                              <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ({{$request->amount}} €)</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
   </script>
</html>