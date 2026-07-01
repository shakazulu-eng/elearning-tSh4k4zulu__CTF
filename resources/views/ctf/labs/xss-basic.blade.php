<x-app-layout>

<div class="container">

    <h2>Reflected XSS Challenge</h2>

    <p>
        Search functionality below reflects user input.
        Analyze the behavior and identify the flag.
    </p>

    <form method="GET">
        <input
            type="text"
            name="q"
            value="{{ request('q') }}"
            class="border p-2"
        >

        <button type="submit">
            Search
        </button>
    </form>

    <div class="mt-4">
        Search Result:
        {{ request('q') }}
    </div>

    @if(request('q') === 'xss-found')
        <div class="mt-4 p-3 border">
            Flag:
            flag{xss_beginner}
        </div>
    @endif

</div>

</x-app-layout>
