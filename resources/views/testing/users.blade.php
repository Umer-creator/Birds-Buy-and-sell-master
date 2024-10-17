<h1>Users<h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Address</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ optional($user->address)->country }}</td>

                </tr>
            @endforeach

        </table>
