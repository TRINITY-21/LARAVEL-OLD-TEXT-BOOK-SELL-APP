@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        {!! Form::open(['action' => 'BooksController@postcheckout', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'checkout-form']) !!}
        <h1 class="text-dark text-center">Checkout</h1>
     <div class="form-group">
        {{Form::label('name', 'Name',['class' => 'text-dark'])}}
        {{Form::text('name', auth()->user()->name, ['class' => 'form-control', 'placeholder' => 'Name', 'required', ])}}
     </div>
     <div class="form-group">
        {{Form::label('address', 'Address',['class' => 'text-dark'])}}
        {{Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address', 'required'])}}
     </div>
     <div class="form-group">
         {{Form::label('Phone', 'Phone',['class' => 'text-dark'])}}
         {{Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone', 'required'])}}
      </div>
     <div class="form-group">
        {{Form::label('card', 'Programme',['class' => 'text-dark'])}}
        {{Form::text('card', null, ['class' => 'form-control', 'placeholder' => 'Programme', 'required'])}}
     </div>
     <label for="card-element">
          {{-- Level --}}
          </label>

{{--           <div id="card-element">
 --}}            <!-- A Stripe Element will be inserted here. -->
{{--           </div>
 --}}{{--           <div id="card-errors" role="alert"></div>
 --}}     


 <br>
     <h5 class="text-dark">Total price: GHC{{$total}}</h5>
     {{Form::submit('Request Book', ['class'=>'btn btn-success'])}}
     {!! Form::close() !!}
    </div>
</div>
@include('inc.footer')
@endsection

{{-- 
@section('scripts') --}}
{{-- <script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
var stripe = Stripe("pk_test_BDgKbWoRtIHEvKye0zKXEW1i");

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
    base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
            color: "#aab7c4"
        }
    },
    invalid: {
        color: "#fa755a",
        iconColor: "#fa755a"
    }
};

// Create an instance of the card Element.
var card = elements.create("card", {hidePostalCode: true, style: style });

card.mount("#card-element");

// Handle real-time validation errors from the card Element.
card.addEventListener("change", function(event) {
    var displayError = document.getElementById("card-errors");
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = "";
    }
});

// Handle form submission.
var form = document.getElementById("checkout-form");
form.addEventListener("submit", function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById("card-errors");
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
        }
    });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById("checkout-form");
    var hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("name", "stripeToken");
    hiddenInput.setAttribute("value", token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}

</script> --}}
{{-- @endsection --}}