<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <div id="wp-content">
            <table width="100%" style="text-align: center">
                <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('dau-check123.jpg') }}" width="140" align="center" height="auto"
                                style="width:7%;height:auto" alt="">
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- Header thông tin người dùng --}}
            <table width="100%" style="padding-top:10px" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <tr>
                        <td>
                            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
                                <tbody>
                                    <tr>
                                        <td width="100%">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>Xin chào
                                                            <strong>{{ request()->session()->get('name') }}</strong>,
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-bottom:10px">Đơn hàng của bạn đã được đặt
                                                            thành công vào <strong>{{ date('H:i:s d-m-Y ') }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Vui lòng đăng nhập <strong>ISMART </strong> để xác nhận đơn
                                                            hàng và kiểm tra sản phẩm, trong
                                                            vòng một vài tiếng sau khi bạn đặt hàng,
                                                            chúng tôi
                                                            sẽ
                                                            xử lý đơn hàng và giao kịp tiến độ trong
                                                            vòng 3 ngày,
                                                            sau 3 ngày nếu bạn không nhận được hàng thì
                                                            chúng tôi sẽ hủy và đền bù cho bạn
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="padding-top: 10px">
                                                            <table border="0" cellspacing="0" cellpadding="0"
                                                                align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td bgcolor="#EE4D2D"
                                                                            style="padding:8px 30px 8px 30px;border-radius:3px"
                                                                            align="center"><a
                                                                                style="font-size:14px;font-family:Helvetica,Arial,sans-serif;font-weight:normal;color:#ffffff;text-decoration:none;display:inline-block">
                                                                                Xác nhận đơn hàng </a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="width:100%;height:1px;display:block;padding-top:10px" align="center">
                                <div style="width:100%;max-width:600px;height:1px;border-top:1px solid #e0e0e0"></div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- Thông tin đơn hàng --}}
            <table width="100%">
                <tbody>
                    <tr>
                        <td>
                            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
                                <tbody>
                                    <tr>
                                        <td width="100%">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="text-align:left;font-family:Helvetica,arial,sans-serif;color:#1f1f1f;font-size:13px;font-weight:bold">
                                                            THÔNG TIN ĐƠN HÀNG - DÀNH CHO NGƯỜI MUA
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                            width="280">Mã đơn hàng:
                                                        </td>
                                                        <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                            width="280">
                                                            <strong>#TF-2801HH</strong>


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                            width="280">Ngày đặt hàng:
                                                        </td>
                                                        <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                            width="280">
                                                            <strong>{{ date('d-m-Y ') }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                            width="280">Tổng tiền:
                                                        </td>
                                                        <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                            width="280"><a
                                                                style="text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#ff5722;vertical-align:top;width:280px"><strong>{{ Cart::total() }}VNĐ</strong></a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>

            </table>
            {{-- Thông tin sản phẩm --}}
            <table width="100%">
                <tbody>
                    <tr>
                        <td>
                            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
                                <tbody>
                                    <tr>
                                        <td width="100%">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            @foreach (Cart::content() as $item)
                                                                <table width="560" align="center" border="0"
                                                                    cellpadding="0" cellspacing="0"
                                                                    style="border-top: 1px solid;padding:10px 0px">
                                                                    <tbody>

                                                                        <tr>
                                                                            <td width="560" height="140" align="left">
                                                                                <a href="" target="blank">
                                                                                    {{-- <img src="{{ asset($item->options->thumb) }}" --}}
                                                                                    <img src="{{ asset($item->options->thumb) }}"

                                                                                        alt="" border="0" width="140"
                                                                                        height="140"
                                                                                        style="display:block;border:none;outline:none;text-decoration:none"
                                                                                        class="CToWUd">
                                                                                </a>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                                <table width="560" align="center" cellpadding="0"
                                                                    cellspacing="0" border="0"
                                                                    style="table-layout:fixed">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="2" width="" height="20"
                                                                                style="font-size:1px;line-height:1px">
                                                                                &nbsp;</td>
                                                                        </tr>

                                                                        <tr>


                                                                            <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                                                width="280">Tên sản
                                                                                phẩm:</td>
                                                                            <td colspan="2"
                                                                                style="font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;text-align:left;padding-left:91px">
                                                                                <strong>{{ $item->name }}</strong>
                                                                            </td>
                                                                        </tr>



                                                                        <tr>
                                                                            <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                                                width="280">Giá:</td>
                                                                            <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;padding-left:91px"
                                                                                width="280">
                                                                                <strong>{{ number_format($item->price) }}VNĐ</strong>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                                                width="280">Số lượng:
                                                                            </td>
                                                                            <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;padding-left:91px"
                                                                                width="280">
                                                                                <strong>{{ $item->qty }}</strong>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                                                width="280">Tổng tiền:
                                                                            </td>
                                                                            <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;padding-left:91px"
                                                                                width="280">
                                                                                <strong>{{ number_format($item->total) }}VNĐ</strong>
                                                                            </td>
                                                                        </tr>



                                                                        <tr>
                                                                            <td width="100%" height="10"
                                                                                style="font-size:1px;line-height:1px">
                                                                                &nbsp;</td>
                                                                        </tr>




                                                                    </tbody>
                                                                </table>
                                                            @endforeach

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="width:100%;height:1px;display:block" align="center">
                <div style="width:100%;max-width:600px;height:1px;border-top:1px solid #e0e0e0"></div>
            </div>


            {{-- Tổng cộng  --}}
            <table width="100%">
                <tbody>
                    <tr>
                        <td>
                            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
                                <tbody>
                                    <tr>
                                        <td width="100%">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="text-align:left;font-family:Helvetica,arial,sans-serif;color:#1f1f1f;font-size:16px;font-weight:bold;height:10px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                            width="280">Tổng cộng:
                                                        </td>
                                                        <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top"
                                                            width="280">
                                                            <strong>{{ Cart::total() }}VNĐ</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="width:100%;height:1px;display:block" align="center">
                <div style="width:100%;max-width:600px;height:1px;border-top:1px solid #e0e0e0"></div>
            </div>


        </div>
    </div>

</body>

</html>
