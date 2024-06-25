<x-layout>

    <h2>please verify your email </h2>

    <p>did not get the email</p>
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf

        <button type="submit">send again</button>
    </form>
   
</x-layout>