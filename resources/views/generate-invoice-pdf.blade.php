<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        @page {
            margin: 0;
        }

        /* PAGE 1 */
        .pg1 {
            padding: 16px;
            border: 1px solid gray;
        }

        .toppart {
            margin: 0px auto;
            padding-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgb(5, 5, 5);
        }

        .crftnb h4 {
            font-size: 21px;
        }

        .crftnb {
            line-height: 7px;
        }

        .table_component {
            overflow: auto;
            width: 100%;

        }

        .table_component table {
            border: 1px solid #dededf;
            height: 100%;
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            border-spacing: 0px;
            text-align: left;

        }

        .table_component caption {
            caption-side: top;
            text-align: center;
        }

        .table_component th {
            border: 1px solid #dededf;
            background-color: #eceff1;
            color: #000000;
            padding: 13px;
        }

        .table_component td {
            border: 1px solid #dededf;
            background-color: #ffffff;
            color: #000000;
            padding: 11px;
        }


        /* PAGE 2 */
        .pg2 {
            padding: 16px;
            border: 1px solid gray;
        }

        .toppart {
            margin: 0px auto;
            padding-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgb(5, 5, 5);
        }


        .crftnb h4 {
            font-size: 21px;
        }

        .crftnb {
            line-height: 7px;
        }


        .imgbx {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin-top: 36px;
            flex-wrap: wrap;

        }

        .imgb {
            width: 48%;
            height: 240px;
            border: 1px solid rgb(128, 128, 128);
        }

        .img1 img {
            width: 100%;
            height: 195px;
            /* background-color: rgb(201, 202, 202); */
        }

        .imgb p {
            margin-top: 10px;
            font-weight: 600;
        }


        /* PAGE 3 */
        .pg2 {
            padding: 16px;
            border: 1px solid gray;
        }

        .toppart {
            margin: 0px auto;
            padding-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgb(5, 5, 5);
        }


        .crftnb h4 {
            font-size: 21px;
        }

        .crftnb {
            line-height: 7px;
        }

        .imgbx {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin-top: 36px;
            flex-wrap: wrap;

        }

        .imgb {
            width: 48%;
            height: 240px;
            border: 1px solid rgb(128, 128, 128);
        }

        .img1 img {
            width: 100%;
            height: 240px;
            /* background-color: rgb(201, 202, 202); */
        }

        .imgb p {
            margin-top: 10px;
            font-weight: 600;
        }

        .dclmnt {
            margin-top: 45px;
        }

        .dclmnt p {
            font-size: 20px;
            /* line-height: 16px; */
        }


        /* PAGE 4 */
        .pg2 {
            padding: 16px;
            border: 1px solid gray;
        }

        .toppart {
            margin: 0px auto;
            padding-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgb(5, 5, 5);
        }

        .btnprt {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            /* margin-top: 20px; */
        }

        .tpprt {
            /* border: 1px solid red; */
            display: flex;
            justify-content: space-between;
        }

        .lftprt {
            width: 49%;
            /* border: 1px solid green; */
        }

        .rghtprt {
            width: 49%;
            /* border: 1px solid #00ff00; */
        }

        .cls1 {
            display: flex;
            justify-content: space-evenly;
        }

        .icntxbxarea {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .icnbx {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: space-between; */
            align-items: center;
            /* border: 1px solid red; */
            width: 45%;
            margin: 6px auto;
        }

        .icnbxx {
            display: flex;
            /* justify-content: space-between; */
            align-items: center;
            /* border: 1px solid red; */
            /* align-items: flex-start; */
            width: 45%;
            /* padding-left: 20px; */
            margin: 6px auto;
            flex-wrap: wrap;
        }

        .icnbxx p i {
            margin-right: 7px;
        }

        .icnbx p i {
            margin-right: 7px;
        }

        .icntx {
            line-height: 8px;
        }

        .cls1 p {
            background-color: gray;
            width: 100px;
            padding: 4px;
            text-align: center;
        }

        .cls1 h4 {
            /* font-size: 30px; */
        }

        .thrdfrdprt {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            border: 1px solid rgb(0, 0, 0);
        }

        .thrdbx {
            border: 1px solid black;
            /* width: 24%; */
            width: 300px;
            line-height: 8px;
        }

        .thrdbxl {
            border: 1px solid black;
            /* width: 24%; */
            width: 100%;
            line-height: 8px;
        }

        .frthhdn {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            background-color: #dadada;
            padding: 4px;
        }

        .fght span {
            background-color: #adadad;
            padding: 4px;
        }

        .progress {
            border: 1px solid #444444;
        }

        .progress-bar {
            background-color: #adadad;
        }

        .pgtt {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pgrsbrar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .frthprtr {
            margin-top: 20px;
            /* border: 1px solid black; */
        }

        .containerer {
            margin: 7px auto;
            width: 46%;
        }

        .pgtt {
            margin-bottom: -17px;
        }

        .pgtt h4 {
            background-color: #adadad;
            padding: 4px;
        }

        .sixthprt {
            display: flex;
            justify-content: space-between;
        }

        .gtfhb {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .boxd {
            width: 70px;
            height: 30px;
            background-color: rgb(175, 175, 175);
            border: 1px solid whitesmoke;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>

    {{-- Page 1 --}}
    <section class="pg1">

        <div class="toppart">
            <div class="logo">
                <img src="{{ $logo }}" alt="">
            </div>

            <div class="crftnb">
                <h4>Vehicle Inspection Report</h4>
                <p><strong>Certificate No:- </strong> <span>RFGUR89547979</span></p>
            </div>
        </div>
        <div class="table_component" role="region" tabindex="0">
            <table>
                <caption>
                    <h3><b>Vahan Details</b><br></h3>
                </caption>
                <thead>
                    <tr>
                        <th>Field Name</th>
                        <th>Field Value</th>
                        <th>Field Name</th>
                        <th>Field Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Registration Number</b></td>
                        <td>{{ $product['reg_no'] }}</td>
                        <td>
                            <div><b>Manufacturing Date</b></div>
                        </td>
                        <td>{{ $product['manfacture_date'] }}</td>
                    </tr>
                    <tr>
                        <td><b>Registered RTO</b></td>
                        <td>{{ $product['reg_rto'] }}</td>
                        <td>
                            <div><b>Registration date</b></div>
                        </td>
                        <td>{{ $product['reg_date'] }}</td>
                    </tr>
                    <tr>
                        <td><b>Owner Name</b></td>
                        <td>{{ $product['owner_name'] }}</td>
                        <td>
                            <div><b>PC Blacklist Status</b></div>
                        </td>
                        <td>{{ $product['rc_blacklist_status'] }}</td>
                    </tr>
                    <tr>
                        <td><b>Order Count</b></td>
                        <td>7678989</td>
                        <td>
                            <div><b>Fitness Up to</b></div>
                        </td>
                        <td>sfdarfesdt4wty</td>
                    </tr>
                    <tr>
                        <td><b>Owner Permanent<br>Address</b></td>
                        <td>ummy text of the printing and typesetting industry. Lorem Ipsum has been the</td>
                        <td>
                            <div><b>Name of Financier</b></div>
                        </td>
                        <td>fasgsdghsdfhg</td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Owner Present<br>Address</b></p>
                        </td>
                        <td>dummy text of the printing and typesetting industry. Lorem Ipsum has been the</td>
                        <td><b>Insurer</b></td>
                        <td>dgsfygsghsryh</td>
                    </tr>
                    <tr>
                        <td><b>Vehicle Name</b></td>
                        <td>{{ $product['name'] }}</td>
                        <td><b>Policy Number</b></td>
                        <td>dgtsgsfy4w563</td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Model</b><br></p>
                        </td>
                        <td>{{ $product['model'] }}</td>
                        <td>
                            <div><b>Insurance Valid Up to</b></div>
                        </td>
                        <td>4t6w4654</td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Vehicle Category</b><br></p>
                        </td>
                        <td>{{ $category->first() }}</td>
                        <td>
                            <div><b>PUCC Number</b></div>
                        </td>
                        <td>wt64646</td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Vehicle Class</b><br></p>
                        </td>
                        <td>{{ $product['vehicle_class'] }}</td>
                        <td>
                            <div><b>PUCC Valid Up to</b></div>
                        </td>
                        <td>erytztg</td>
                    </tr>
                    <tr>
                        <td><b>Wheel Base</b></td>
                        <td>{{ $product['wheel_base'] }}</td>
                        <td>
                            <div><b>NP issued By</b></div>
                        </td>
                        <td>yue5y7u5e</td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Chassis Number</b><br></p>
                        </td>
                        <td>{{ $product['chasis_no'] }}</td>
                        <td>
                            <div><b>Permit Issue Date</b></div>
                        </td>
                        <td>sdgrytr</td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Engine Number</b><br></p>
                        </td>
                        <td>{{ $product['engine_no'] }}</td>
                        <td>
                            <div><b>Permit Numb</b></div>
                        </td>
                        <td>6w46t4ww</td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Car Color</b><br></p>
                        </td>
                        <td>tye6576yhtdryuh5e</td>
                        <td>
                            <div><b>Permiz Type</b></div>
                        </td>
                        <td>4w5twq346wq34</td>
                    </tr>
                    <tr>
                        <td><b>Fuel Type</b></td>
                        <td>{{ $product['fuel_type'] }}</td>
                        <td>
                            <div><b>Permiz Type</b></div>
                        </td>
                        <td>w4y64wtwzsa</td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Fuel Norms</b><br></p>
                        </td>
                        <td>{{ $product['fuel_norm'] }}</td>
                        <td>
                            <div><b>Permit Valid From</b></div>
                        </td>
                        <td>wtw45t4€at</td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Engine Capacity</b><br></p>
                        </td>
                        <td>drtgsg</td>
                        <td>
                            <div><b>Permit Vaid Upto</b></div>
                        </td>
                        <td>4y6t4wts</td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Gross Vehicle Weight</b><br></p>
                        </td>
                        <td>xdgfxdsdfy4w6y</td>
                        <td>
                            <div><b>RC Tax Upto</b></div>
                        </td>
                        <td>wtw46w6</td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Seating Capacity</b><br></p>
                        </td>
                        <td>yeryryw4etw</td>
                        <td><b>Body Type</b></td>
                        <td>w4et6wtywety</td>
                    </tr>
                    <tr>
                        <td><b>Sleeper Capacity</b></td>
                        <td>wetwetgruyhreue5tu</td>
                        <td></td>
                        <td>wetw564</td>
                    </tr>
                    <!-- <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> -->
                </tbody>
            </table>
        </div>

        <div class="btnprt">
            <div class="doi">
                <p>Date of inspection:- <span>{{ $date }} | {{ $time }}</span></p>
            </div>
            <div class="pgnb">
                <p>Page: <span>1 Of 4</span></p>
            </div>
            <div class="logo">
                <img src="{{ $logo }}" alt="">
            </div>
        </div>
    </section>

    {{-- Page 2 --}}
    <section class="pg2 page-break">
        <div class="toppart">
            <div class="logo">
                <img src="{{ $logo }}" alt="">
            </div>

            <div class="crftnb">
                <h4>Vehicle Inspection Report</h4>
                <p><strong>Certificate No:- </strong> <span>RFGUR89547979</span></p>
            </div>
        </div>


        <div class="mdlimgprt">
            <div class="imgbx">
                @foreach ($internalImages as $image)
                    {{-- <img src="{{ $image }}" alt="Internal Product Image" style="width: 100px; height: auto;" /> --}}
                    <div class="imgb">
                        <div class="img1">
                            <img src="{{ $image }}" alt="">
                        </div>
                    </div>
                @endforeach
                {{-- <div class="imgb">
                    <div class="img1">
                        <img src="https://picsum.photos/seed/picsum/" alt="">
                    </div>
                    <p>Lorem, ipsum dolor.</p>
                </div> --}}
            </div>

            {{-- <div class="imgbx">
                <div class="imgb">
                    <div class="img1">
                        <img src="https://picsum.photos/seed/picsum/" alt="">
                    </div>
                    <p>Lorem, ipsum dolor.</p>
                </div>
                <div class="imgb">
                    <div class="img1">
                        <img src="https://picsum.photos/seed/picsum/" alt="">
                    </div>
                    <p>Lorem, ipsum dolor.</p>
                </div>
            </div> --}}

            {{-- <div class="imgbx">
                <div class="imgb">
                    <div class="img1">
                        <img src="https://picsum.photos/seed/picsum/" alt="">
                    </div>
                    <p>Lorem, ipsum dolor.</p>
                </div>
                <div class="imgb">
                    <div class="img1">
                        <img src="https://picsum.photos/seed/picsum/" alt="">
                    </div>
                    <p>Lorem, ipsum dolor.</p>
                </div>
            </div> --}}

            {{-- <div class="imgbx">
                <div class="imgb">
                    <div class="img1">
                        <img src="https://picsum.photos/seed/picsum/" alt="">
                    </div>
                    <p>Lorem, ipsum dolor.</p>
                </div>
                <div class="imgb">
                    <div class="img1">
                        <img src="https://picsum.photos/seed/picsum/" alt="">
                    </div>
                    <p>Lorem, ipsum dolor.</p>
                </div>
            </div> --}}

        </div>



        <div class="btnprt">
            <div class="doi">
                <p>Date of inspection:- <span>{{ $date }} | {{ $time }}</span></p>
            </div>
            <div class="pgnb">
                <p>Page: <span>2 Of 4</span></p>
            </div>
            <div class="logo">
                <img src="{{ $logo }}" alt="">
            </div>
        </div>
    </section>

    {{-- Page 3 --}}
    <section class="pg2 page-break">
        <div class="toppart">
            <div class="logo">
                <img src="{{ $logo }}" alt="">
            </div>

            <div class="crftnb">
                <h4>Vehicle Inspection Report</h4>
                <p><strong>Certificate No:- </strong> <span>RFGUR89547979</span></p>
            </div>
        </div>


        <div class="mdlimgprt">
            <div class="imgbx">
                @foreach ($externalImages as $image)
                    {{-- <img src="{{ $image }}" alt="External Product Image" style="width: 100px; height: auto;" /> --}}
                    <div class="imgb">
                        <div class="img1">
                            <img src="{{ $image }}" alt="">
                        </div>
                    </div>
                @endforeach
                {{-- <div class="imgb">
                    <div class="img1">
                        <img src="https://picsum.photos/seed/picsum/" alt="">
                    </div>
                    <p>Lorem, ipsum dolor.</p>
                </div> --}}
            </div>

            {{-- <div class="imgbx">
                <div class="imgb">
                    <div class="img1">
                        <img src="https://picsum.photos/seed/picsum/" alt="">
                    </div>
                    <p>Lorem, ipsum dolor.</p>
                </div>
                <div class="imgb">
                    <div class="img1">
                        <img src="https://picsum.photos/seed/picsum/" alt="">
                    </div>
                    <p>Lorem, ipsum dolor.</p>
                </div>
            </div> --}}

            {{-- <div class="imgbx">
                <div class="imgb">
                    <div class="img1">
                        <img src="https://picsum.photos/seed/picsum/" alt="">
                    </div>
                    <p>Lorem, ipsum dolor.</p>
                </div>

            </div> --}}



            <div class="dclmnt">
                <p><strong>Desclimar:</strong> <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea dolores
                        quisquam natus eius odit obcaecati, similique fuga officia reiciendis et, a, expedita mollitia
                        tempore nostrum alias deseruntLorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                        dolores quisquam natus eius odit obcaecati, similique fuga officia reiciendis et, a, expedita
                        mollitia tempore nostrum alias deseruntLorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ea dolores quisquam natus eius odit obcaecati, similique fuga officia reiciendis et, a, expedita
                        mollitia tempore nostrum alias deserunt vero. Molestiae, nihil!</span></p>
                <p><strong>Note:</strong> <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea dolores
                        quisquam natus eius odit obcaecati, similique fuga officia reiciendis et</span></p>
            </div>

        </div>



        <div class="btnprt">
            <div class="doi">
                <p>Date of inspection:- <span>{{ $date }} | {{ $time }}</span></p>
            </div>
            <div class="pgnb">
                <p>Page: <span>3 Of 4</span></p>
            </div>
            <div class="logo">
                <img src="{{ $logo }}" alt="">
            </div>
        </div>
    </section>

    {{-- Page 4 --}}
    <section class="pg2 page-break">
        <div class="toppart">
            <div class="logo">
                <img src="{{ $logo }}" alt="">
            </div>

            <div class="crftnb">
                <h4>Vehicle Inspection Report</h4>
                <p><strong>Certificate No:- </strong> <span>RFGUR89547979</span></p>
            </div>
        </div>




        <div class="mdlprt">
            <div class="tpprt">
                <div class="lftprt">
                    <h2>{{ $product->name }}</h2>
                    <div class="img">
                        <img src="{{ asset('uploads/' . $product->featured_image) }}" alt="" width="100%"
                            height="300px" style="background-color: #00ff00;">
                    </div>
                </div>

                <div class="rghtprt">
                    <div class="cls1">
                        <p>Commercial</p>
                        <h2>16 Lacs*
                        </h2>
                    </div>


                    <div class="icntxbxarea">
                        <div class="icnbx">
                            <p><i class="fa-solid fa-location-pin"></i></p>
                            <div class="icntx">
                                <strong>{{ $product->reg_rto }}</strong>
                                <p>RTO</p>
                            </div>
                        </div>

                        <div class="icnbxx">
                            <p><i class="fa-solid fa-id-card"></i></p>
                            <div class="icntx">
                                <strong>{{ $product->reg_no }}</strong>
                                <p>Reg No.</p>
                            </div>
                        </div>
                    </div>
                    <div class="icntxbxarea">
                        <div class="icnbx">
                            <p><i class="fa-solid fa-calendar-days"></i></p>
                            <div class="icntx">
                                <strong>{{ $product->manfacture_date }}</strong>
                                <p>Manufacturing Date</p>
                            </div>
                        </div>

                        <div class="icnbxx">
                            <p><i class="fa-solid fa-calendar-days"></i></p>
                            <div class="icntx">
                                <strong>{{ $product->reg_date }}</strong>
                                <p>Registration Date</p>
                            </div>
                        </div>
                    </div>

                    <div class="icntxbxarea">
                        <div class="icnbx">
                            <p><i class="fa-solid fa-user"></i></p>
                            <div class="icntx">
                                <strong>Lorem. lorem</strong>
                                <p>No. of Owners</p>
                            </div>
                        </div>

                        <div class="icnbxx">
                            <p><i class="fa-solid fa-gauge"></i></p>
                            <div class="icntx">
                                <strong>Lorem. lorem</strong>
                                <p>Odometer Reading</p>
                            </div>
                        </div>
                    </div>

                    <div class="icntxbxarea">
                        <div class="icnbx">
                            <p><i class="fa-solid fa-gas-pump"></i></p>
                            <div class="icntx">
                                <strong>{{ $product->fuel_type }}</strong>
                                <p>Fuel Type</p>
                            </div>
                        </div>

                        <div class="icnbxx">
                            <p><i class="fa-solid fa-gear"></i></p>
                            <div class="icntx">
                                <strong>Lorem. lorem</strong>
                                <p>Transmission</p>
                            </div>
                        </div>
                    </div>

                    <div class="icntxbxarea">
                        <div class="icnbx">
                            <p><i class="fa-solid fa-palette"></i></p>
                            <div class="icntx">
                                <strong>Lorem. lorem</strong>
                                <p>Color</p>
                            </div>
                        </div>

                        <div class="icnbxx">
                            <p><i class="fa-solid fa-car"></i></p>
                            <div class="icntx">
                                <strong>{{ $category->first() }}</strong>
                                <p>Vehicle Type</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="thrdfrdprt">
            <div class="thrdbx">
                <h2>{{ $product->engine_no }}</h2>
                <p>Engine Number</p>
            </div>
            <div class="thrdbx">
                <h2>{{ $product->chasis_no }}</h2>
                <p>Chasis Number</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.</h2>
                <p>Loan No/Ref No</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>RC Available</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>Type of Insurance</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>Insurance Validity Date</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>Insurance Expiry Date</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>Is the car under Hypothecation</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>If Yes Name of the Financer</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>CNG LPG Fitment</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>CNG LPG Fitment Endorsement RC</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>CNG LPG Removal</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>Road tax paid</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>Road tax validity</p>
            </div>
            <div class="thrdbx">
                <h2>{{ $product->owner_name }}</h2>
                <p>Customer Name</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>Client Name</p>
            </div>
            <div class="thrdbx">
                <h2>Lorem, ipsum dolor.
                </h2>
                <p>Key Available</p>
            </div>
        </div>
        <div class="thrdbxl">
            <h2>Lorem, ipsum dolorm, ipsum dolorm, ipsum dolorm, ipsum dolorm, ipsum dolorm, ipsum dolorm,
            </h2>
            <p>Yard location/Inspection Site</p>
        </div>


        {{-- <div class="frthprtr">
            <div class="frthhdn">
                <div class="onfgt">
                    <h3><strong>Summary</strong></h3>
                </div>
                <div class="fght">
                    <h3><strong>Overall Score <span>8/10</span></strong></h3>
                </div>
            </div>



            <div class="pgrsbrar">
                <div class="containerer">
                    <div class="pgtt">
                        <h3>Progress Bar With Label</h3>
                        <h4>8/10</h4>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                            aria-valuemax="100" style="width:70%">
                            70%
                        </div>
                    </div>
                </div>

                <div class="containerer">
                    <div class="pgtt">
                        <h3>Progress Bar With Label</h3>
                        <h4>8/10</h4>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                            aria-valuemax="100" style="width:70%">
                            70%
                        </div>
                    </div>
                </div>
            </div>

            <div class="pgrsbrar">
                <div class="containerer">
                    <div class="pgtt">
                        <h3>Progress Bar With Label</h3>
                        <h4>8/10</h4>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                            aria-valuemax="100" style="width:70%">
                            70%
                        </div>
                    </div>
                </div>

                <div class="containerer">
                    <div class="pgtt">
                        <h3>Progress Bar With Label</h3>
                        <h4>8/10</h4>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                            aria-valuemax="100" style="width:70%">
                            70%
                        </div>
                    </div>
                </div>
            </div>





        </div> --}}


        {{-- <div class="sixthprt">
            <div class="gtfhb">
                <div class="boxd"></div>
                <h3>good</h3>
            </div>

            <div class="gtfhb">
                <div class="boxd"></div>
                <h3>Poor</h3>
            </div>


            <div class="gtfhb">
                <div class="boxd"></div>
                <h3>good</h3>
            </div>

            <div class="gtfhb">
                <div class="boxd"></div>
                <h3>Poor</h3>
            </div>
        </div> --}}




        <div class="btnprt">
            <div class="doi">
                <p>Date of inspection:- <span>{{ $date }} | {{ $time }}</span></p>
            </div>
            <div class="pgnb">
                <p>Page: <span>4 Of 4</span></p>
            </div>
            <div class="logo">
                <img src="{{ $logo }}" alt="">
            </div>
        </div>
    </section>
</body>

</html>
