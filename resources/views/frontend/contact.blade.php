@extends('layouts.website')
@section('title', 'Contact Us | Develop by Muktar Hussain')

@section('content')
<div class="container-fluid bg-light">
    <div class="container">
        <div class="row py-5">
            <h3>Contact Us</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure soluta sed itaque ullam illum placeat
                cupiditate
                pariatur saepe similique. Blanditiis soluta voluptates unde omnis animi officia assumenda quia earum fug
                <p>
        </div>
    </div>
</div>

<!-- Start Contact Form Sction -->
<div class="container">
    <div class="row">
        <div class="col-md-7 mb-4">
            <div class="comment-form-wrap pt-5">
                <form action="{{route('contact.store')}}" method="POST" class="p-5 bg-light rounded">
                    @if($errors)
                    @foreach($errors->all() as $error)
                    <li class="text-danger font-weight-bold">{{$error}}</li>
                    @endforeach
                    @endif
                    @csrf
                    <h3 class="mb-2">Get In Touch</h3>
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                    </div>

                    @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                </form>
            </div>
        </div>
        <div class="col-md-5 pt-5">
            <div class="address rounded p-4 bg-light">

                <h3 class="mb-2">Address</h3>
                <p>Address: {{$setting->address}}</p>
                <p>Phone:<a href="tel:3072489"> {{$setting->phone}}</a></p>
                <p>Phone:<a href="mailto:contact@gmail.com"> {{$setting->email}}</a></p>

            </div>
        </div>
    </div>
    <!-- End Contact Form Sction -->
</div>

<div class="container-fluid map p-0 mt-5">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7237.582601747703!2d91.86330910341344!3d24.905099431844633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3750552700bfdb4f%3A0x369ba0b482046794!2sAmbarkhana%2C%20Sylhet!5e0!3m2!1sen!2sbd!4v1665769728415!5m2!1sen!2sbd"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
@endsection