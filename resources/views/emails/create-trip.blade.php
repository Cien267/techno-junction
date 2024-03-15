<!DOCTYPE html>
<html>
<head>
    <title>Taixeviet.vn</title>
</head>
<body>
<style>
    .gmail-table {
        border: solid 2px #DDEEEE;
        border-collapse: collapse;
        border-spacing: 0;
        font: normal 14px Roboto, sans-serif;
    }

    .gmail-table tr td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
</style>
<h4>THÔNG TIN CHUYẾN ĐI</h4>
<table class="gmail-table">
    <tr>
        <td>Điểm đón</td>
        <td>Điểm đến</td>
        <td>Loại chuyến</td>
        <td>Thời gian đi</td>
        <td>Thời gian bán</td>
    </tr>
    <tr>
        <td>{{ $trip->place_start }}</td>
        <td>{{ $trip->place_end }}</td>
        <td>{{ $trip->type == 1 ? 'Ghép ghế - số ghế: '. $trip->seats : 'Trọn gói' }}</td>
        <td>{{ date('H:i d/m/Y', strtotime($trip->time_start)) }}</td>
        <td>{{ date('H:i d/m/Y', strtotime($trip->time_sell)) }}</td>
    </tr>

    <tr>
        <td>Loại xe</td>
        <td>Khách hàng</td>
        <td>Số điện thoại khách</td>
        <td>Khách trả</td>
        <td>Tiền cắt</td>
    </tr>
    <tr>
        <td>{{ $trip->car_type_id == 1 ? '5 Chỗ' : ($trip->car_type_id == 2 ? '7 Chỗ' : ($trip->car_type_id == 3 ? '16 Chỗ': '')) }}</td>
        <td>{{ $trip->guest->name }}</td>
        <td>{{ $trip->guest->phone }}</td>
        <td>{{ number_format($trip->money) }}</td>
        <td>{{ number_format($trip->money_discount) }}</td>
    </tr>
    <tr>
        <td>Điểm</td>
        <td>Phí hệ thống</td>
        <td>Lái xe bán</td>
        <td>SĐT lái xe bán</td>
        <td>Xe lái xe bán</td>
    </tr>
    <tr>
        <td>{{ number_format($trip->point) }}</td>
        <td>{{ number_format($trip->service_fee) }}</td>
        <td>{{ $trip->driverSell->name }}</td>
        <td>{{ $trip->driverSell->phone }}</td>
        <td>{{ $trip->driverSell->carlicense.' '.$trip->driverSell->model }}</td>
    </tr>
</table>

</body>
</html>