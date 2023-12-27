<div class="sidebar">
        <div class="btn">
            <a href="{{ route('profile') }}" class="profile">Notatki</a>
            <a href="{{ route('new') }}" class="add-new">Nowa notatka</a> <!-- Modified this line -->

        </div>
        <form method="Get" action="{{ route('logout') }}">
    @csrf
    <button class="log-out" type="submit">Wyloguj się</button>
</form>
    </div>