<!DOCTYPE html>
<html>
<head>
    <title>Magazine Downloads</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Magazine Downloads</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Magazine Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subscribed</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($downloads as $index => $download)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $download->magazine ? $download->magazine->title : 'N/A' }}</td>
                    <td>{{ $download->name }}</td>
                    <td>{{ $download->email }}</td>
                    <td>{{ $download->subscribed ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
