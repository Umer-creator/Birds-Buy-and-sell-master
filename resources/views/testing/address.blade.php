<h1>Addres<h1>
        <table>
            <tr>
                <th>Address</th>
                <th>User</th>
            </tr>
            @foreach ($addresses as $address)
                <tr>
                    <td>{{ $address->country }}</td>
                    <td>{{ optional($address->user)->name }}</td>
                </tr>
            @endforeach

        </table>
