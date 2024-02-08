<div style="text-align: center">
    Credentials for <b>{{ $user->first_name }}</b>
    <br>
    <b>
        <p>{{ $user->position }}</p>
    </b>
    <br>
    Username: {{ $user->username }}
    <br>
    Email: {{ $user->email }}
    <br>
    Password: {{ $plainPassword }}
</div>
