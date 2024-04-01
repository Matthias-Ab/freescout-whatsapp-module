@extends('layouts.app')

@section('title', 'Send WhatsApp Message')

@section('content')
    <h1>Send WhatsApp Message</h1>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('mywhatsappmodule.send.message') }}">
        @csrf

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3"></textarea>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="receiver_number">Receiver Number (International Format):</label>
            <input type="text" class="form-control @error('receiver_number') is-invalid @enderror" id="receiver_number" name="receiver_number" placeholder="e.g., +251912345678">
            @error('receiver_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
@endsection
