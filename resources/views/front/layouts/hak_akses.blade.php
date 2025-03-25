<form action="{{ route('roles.assign') }}" method="POST">
    @csrf
    @method('POST')
    <label>Username:</label>
    <input type="text" name="username" required>

    <label>Description:</label>
    <input type="text" name="description" required>

    <label>Group:</label>
    <ul>
        @foreach ($roles as $role)
            <li>
                <input type="checkbox" name="roles[]" value="{{ $role->id }}"> {{ $role->name }}
                <ul>
                    @foreach ($role->permissions as $permission)
                        <li>
                            <input type="checkbox" name="permissions[{{ $role->id }}][]" value="{{ $permission->id }}">
                            {{ $permission->name }}
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

    <button type="submit">Simpan</button>
</form>
