<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubscriberController extends Controller
{
    /**
     * Used to save subscriber emails from our newsletter
     * @param \App\Http\Requests\SubscriberRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe(SubscriberRequest $request): RedirectResponse
    {

        // Get the validated email address from the request
        $email = $request->validated('email');
        // Create an instance of the email validator
        $validator = new EmailValidator();
        // Configure multiple validations to apply (RFCValidation and DNSCheckValidation)
        $multipleValidations = new MultipleValidationWithAnd([
            new RFCValidation(),
            new DNSCheckValidation()
        ]);
        if ($validator->isValid($email, $multipleValidations)) {
            $subscriber = Subscriber::create($request->validated());

            return Redirect::back()->with('good', 'Vous avez été inscrit avec succès à la newsletter.');
        } else {
            return Redirect::back()->with('bad', 'Il  a eu une erreur, ou votre email est invalid');
        }

    }
}
