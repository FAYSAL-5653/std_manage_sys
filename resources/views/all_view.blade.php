<table>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Images</th>
        <th>Action</th>
    </tr>
    @foreach ($allEmployee as $emp)
        <tr>
            <td>{{ $emp->id }}</td>
            <td>{{ $emp->FirstName }}</td> <!-- Corrected spelling: FirstName -->
            <td>{{ $emp->LastName }}</td>
            <td>{{ $emp->Address }}</td> <!-- Corrected spelling: Address -->
            <td>{{ $emp->City }}</td>
            <td><img src="{{ $emp->images }}" alt="" style="width: 30px; height: 30px;"></td>
            <td>
                <button><a href="{{ route('update-employee', $emp->id) }}">update</a></button>
                <!-- Corrected route syntax -->
                <button><a href="{{ route('delete-employee', $emp->id) }}">delete</a></button>
                <!-- Corrected route syntax -->
            </td>
        </tr>
    @endforeach
</table>
