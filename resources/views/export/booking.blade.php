<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report</title>
  <style>
    table {
      width: 100%;
    }
    table, td {
      border: 1px solid;
    }
  </style>
</head>
<body>
    <h1 style="text-align:center;">Booking Report</h1>
    <table>
      <thead>
        <tr>
          <td>No</td>
          <td>Booking Date</td>
          <td>Start Date</td>
          <td>End Date</td>
          <td>Customer</td>
          <td>Car</td>
          <td>Driver</td>
          <td>Total Price</td>
          <td>Status</td>
        </tr>
      </thead>
      <tbody>
        @foreach($bookings as $index => $booking)
          <tr>
            <td>{{ $index }}</td>
            <td>{{ $booking->booking_date }}</td>
            <td>{{ $booking->start_date }}</td>
            <td>{{ $booking->end_date }}</td>
            <td>{{ $booking->customer->name }}</td>
            <td>{{ $booking->car->name }}</td>
            <td>{{ $booking->driver->name }}</td>
            <td>{{ $booking->total_price }}</td>
            <td>{{ $booking->status }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
</body>
</html>