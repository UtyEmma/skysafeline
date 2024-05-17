<?php

namespace App\Livewire;

use Illuminate\Support\HtmlString;
use Livewire\Component;

class SubmitRequestForm extends Component {

    public $name, $email, $phone, $company, $amount, $details, $currency;

    public $countries = [];

    public $status, $message;

    public function rules(){
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'company' => 'required|string',
            'amount' => 'required|numeric',
            'details' => 'required|string'
        ];
    }

    function mount(){
        $this->countries = config('countries');
    }

    function submit(){
        $this->reset(['status', 'message']);
        $this->validate();

        $email = env('EMAIL_ADDRESS');
        $company_name = env('COMPANY_NAME');

        notify("{$company_name}: Your request has been recieved")
            ->greeting("Hello {$this->name},")
            ->line("Thank you for reaching out to {$company_name}.")
            ->line('We have received your submission and are committed to assisting you in reclaiming your lost assets. Your case is important to us, and we understand the urgency of your situation.')
            ->line('Here are the details you submitted:')
            ->line(new HtmlString("<strong>Name:</strong> {$this->name}"))
            ->line(new HtmlString("<strong>Email Address:</strong> {$this->email}"))
            ->line(new HtmlString("<strong>Phone Number:</strong> {$this->phone}"))
            ->line(new HtmlString("<strong>Company:</strong> {$this->company}"))
            ->line(new HtmlString("<strong>Currency:</strong> {$this->currency}"))
            ->line(new HtmlString("<strong>Amount:</strong> {$this->amount}"))
            ->line(new HtmlString("<strong>Details:</strong> {$this->details}"))
            ->line('Rest assured that our team of experienced professionals is already reviewing your case and will reach out to you within the next few hours.')
            ->line("In the meantime, if you have any additional information or questions, please don't hesitate to reach out to us at {$email}.")
            ->line("Thank you for choosing {$company_name}. We look forward to working with you to achieve a successful recovery.")
            ->line("Best regards")
            ->mail($this->email);

        notify("Important: Incoming Asset recovery Request")
            // ->greeting('Hi there,')
            ->line('A new submission for asset recovery has been recieved. Here are the details of the submission:')
            ->line(new HtmlString("<strong>Name:</strong> {$this->name}"))
            ->line(new HtmlString("<strong>Email Address:</strong> {$this->email}"))
            ->line(new HtmlString("<strong>Phone Number:</strong> {$this->phone}"))
            ->line(new HtmlString("<strong>Company:</strong> {$this->company}"))
            ->line(new HtmlString("<strong>Currency:</strong> {$this->currency}"))
            ->line(new HtmlString("<strong>Amount:</strong> {$this->amount}"))
            ->line(new HtmlString("<strong>Details:</strong> {$this->details}"))
            ->replyTo($this->email, $this->name)
            ->mail($email);

        $this->reset();

        $this->status = 'green-600';
        $this->message = "Your Request has been submitted successfully! Our team will get in touch with you.";
    }

    public function render() {
        return view('livewire.submit-request-form');
    }
}
