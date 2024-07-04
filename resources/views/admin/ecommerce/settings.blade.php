@extends('admin.layout.app')

@section('content')
<form action="" method="post" enctype="multipart/form-data">
     @csrf

     <div class="main-panel">
          <div class="pagesbodyarea">
               <div class="pageinfo">
                    <ul class="d-flex">
                         <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i
                                        class="fa-solid fa-house"> </i>
                                   Dashboard
                                   /</a>
                         </li>
                         <li><a class="breadcrumb-item">Ecommerce
                                   /</a>
                         </li>
                         <li><a href="{{ route('admin.ecommerce.settings') }}" class="breadcrumb-item">Settings
                                   /</a>
                         </li>
                         <li><a class="breadcrumb-item">Basic settings</a>
                         </li>
                    </ul>
               </div>



               @if ($errors->any())
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                         @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif

               @if (session('success'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif


               <!-- todo edit main body ara -->

               <div class="row">
                    <div class="col-4">
                         <div class="annotated-section-description pd-all-20 p-none-t">
                              <h2 class="fs-4" style="font-size: 16px;">Basic information</h2>
                              <p class="color-note">This address will appear on your invoice and will be used to
                                   calculate your shipping price.</p>
                         </div>
                    </div>
                    <div class="col-md-8">
                         <div class="custom p-4">
                              <div class="tab-content">
                                   <div class="wrapper-content pd-all-20">
                                        <div class="form-group">
                                             <label for="shopName">Shop name</label>
                                             <input type="text" class="form-control" id="shopName" name="shopName"
                                                  value="Nest">
                                        </div>
                                        <div class="form-group">
                                             <label for="company">Company</label>
                                             <input type="text" class="form-control" id="company" name="company">
                                        </div>
                                        <div class="form-group">
                                             <label for="phone">Phone</label>
                                             <input type="text" class="form-control" id="phone" name="phone"
                                                  value="18006268">
                                        </div>
                                        <div class="form-group">
                                             <label for="email">Email</label>
                                             <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                             <label for="address">Address</label>
                                             <input type="text" class="form-control" id="address" name="address"
                                                  value="North Link Building, 10 Admiralty Street">
                                        </div>
                                        <div class="form-group mb-3 row">
                                             <div class="col-md-4">
                                                  <div class="form-group mb-3">
                                                       <label for="store_country"
                                                            class="text-title-field">Country</label>
                                                       <div class="ui-select-wrapper form-group ">
                                                            <select class=" ui-select" id="store_country"
                                                                 name="store_country">
                                                                 <option value="">Select country...</option>
                                                                 <option value="AF">Afghanistan</option>
                                                                 <option value="AX">Åland Islands</option>
                                                                 <option value="AL">Albania</option>
                                                                 <option value="DZ">Algeria</option>
                                                                 <option value="AS">American Samoa</option>
                                                                 <option value="AD">Andorra</option>
                                                                 <option value="AO">Angola</option>
                                                                 <option value="AI">Anguilla</option>
                                                                 <option value="AQ">Antarctica</option>
                                                                 <option value="AG">Antigua and Barbuda</option>
                                                                 <option value="AR">Argentina</option>
                                                                 <option value="AM">Armenia</option>
                                                                 <option value="AW">Aruba</option>
                                                                 <option value="AU">Australia</option>
                                                                 <option value="AT">Austria</option>
                                                                 <option value="AZ">Azerbaijan</option>
                                                                 <option value="BS">Bahamas</option>
                                                                 <option value="BH">Bahrain</option>
                                                                 <option value="BD">Bangladesh</option>
                                                                 <option value="BB">Barbados</option>
                                                                 <option value="BY">Belarus</option>
                                                                 <option value="BE">Belgium</option>
                                                                 <option value="PW">Belau</option>
                                                                 <option value="BZ">Belize</option>
                                                                 <option value="BJ">Benin</option>
                                                                 <option value="BM">Bermuda</option>
                                                                 <option value="BT">Bhutan</option>
                                                                 <option value="BO">Bolivia</option>
                                                                 <option value="BQ">Bonaire, Saint Eustatius and Saba
                                                                 </option>
                                                                 <option value="BA">Bosnia and Herzegovina</option>
                                                                 <option value="BW">Botswana</option>
                                                                 <option value="BV">Bouvet Island</option>
                                                                 <option value="BR">Brazil</option>
                                                                 <option value="IO">British Indian Ocean Territory
                                                                 </option>
                                                                 <option value="BN">Brunei</option>
                                                                 <option value="BG">Bulgaria</option>
                                                                 <option value="BF">Burkina Faso</option>
                                                                 <option value="BI">Burundi</option>
                                                                 <option value="KH">Cambodia</option>
                                                                 <option value="CM">Cameroon</option>
                                                                 <option value="CA">Canada</option>
                                                                 <option value="CV">Cape Verde</option>
                                                                 <option value="KY">Cayman Islands</option>
                                                                 <option value="CF">Central African Republic</option>
                                                                 <option value="TD">Chad</option>
                                                                 <option value="CL">Chile</option>
                                                                 <option value="CN">China</option>
                                                                 <option value="CX">Christmas Island</option>
                                                                 <option value="CC">Cocos (Keeling) Islands</option>
                                                                 <option value="CO">Colombia</option>
                                                                 <option value="KM">Comoros</option>
                                                                 <option value="CG">Congo (Brazzaville)</option>
                                                                 <option value="CD">Congo (Kinshasa)</option>
                                                                 <option value="CK">Cook Islands</option>
                                                                 <option value="CR">Costa Rica</option>
                                                                 <option value="HR">Croatia</option>
                                                                 <option value="CU">Cuba</option>
                                                                 <option value="CW">Curaçao</option>
                                                                 <option value="CY">Cyprus</option>
                                                                 <option value="CZ">Czech Republic</option>
                                                                 <option value="DK">Denmark</option>
                                                                 <option value="DJ">Djibouti</option>
                                                                 <option value="DM">Dominica</option>
                                                                 <option value="DO">Dominican Republic</option>
                                                                 <option value="EC">Ecuador</option>
                                                                 <option value="EG">Egypt</option>
                                                                 <option value="SV">El Salvador</option>
                                                                 <option value="GQ">Equatorial Guinea</option>
                                                                 <option value="ER">Eritrea</option>
                                                                 <option value="EE">Estonia</option>
                                                                 <option value="ET">Ethiopia</option>
                                                                 <option value="FK">Falkland Islands</option>
                                                                 <option value="FO">Faroe Islands</option>
                                                                 <option value="FJ">Fiji</option>
                                                                 <option value="FI">Finland</option>
                                                                 <option value="FR">France</option>
                                                                 <option value="GF">French Guiana</option>
                                                                 <option value="PF">French Polynesia</option>
                                                                 <option value="TF">French Southern Territories</option>
                                                                 <option value="GA">Gabon</option>
                                                                 <option value="GM">Gambia</option>
                                                                 <option value="GE">Georgia</option>
                                                                 <option value="DE">Germany</option>
                                                                 <option value="GH">Ghana</option>
                                                                 <option value="GI">Gibraltar</option>
                                                                 <option value="GR">Greece</option>
                                                                 <option value="GL">Greenland</option>
                                                                 <option value="GD">Grenada</option>
                                                                 <option value="GP">Guadeloupe</option>
                                                                 <option value="GU">Guam</option>
                                                                 <option value="GT">Guatemala</option>
                                                                 <option value="GG">Guernsey</option>
                                                                 <option value="GN">Guinea</option>
                                                                 <option value="GW">Guinea-Bissau</option>
                                                                 <option value="GY">Guyana</option>
                                                                 <option value="HT">Haiti</option>
                                                                 <option value="HM">Heard Island and McDonald Islands
                                                                 </option>
                                                                 <option value="HN">Honduras</option>
                                                                 <option value="HK">Hong Kong</option>
                                                                 <option value="HU">Hungary</option>
                                                                 <option value="IS">Iceland</option>
                                                                 <option value="IN">India</option>
                                                                 <option value="ID">Indonesia</option>
                                                                 <option value="IR">Iran</option>
                                                                 <option value="IQ">Iraq</option>
                                                                 <option value="IE">Ireland</option>
                                                                 <option value="IM">Isle of Man</option>
                                                                 <option value="IL">Israel</option>
                                                                 <option value="IT">Italy</option>
                                                                 <option value="CI">Ivory Coast</option>
                                                                 <option value="JM">Jamaica</option>
                                                                 <option value="JP">Japan</option>
                                                                 <option value="JE">Jersey</option>
                                                                 <option value="JO">Jordan</option>
                                                                 <option value="KZ">Kazakhstan</option>
                                                                 <option value="KE">Kenya</option>
                                                                 <option value="KI">Kiribati</option>
                                                                 <option value="KW">Kuwait</option>
                                                                 <option value="XK">Kosovo</option>
                                                                 <option value="KG">Kyrgyzstan</option>
                                                                 <option value="LA">Laos</option>
                                                                 <option value="LV">Latvia</option>
                                                                 <option value="LB">Lebanon</option>
                                                                 <option value="LS">Lesotho</option>
                                                                 <option value="LR">Liberia</option>
                                                                 <option value="LY">Libya</option>
                                                                 <option value="LI">Liechtenstein</option>
                                                                 <option value="LT">Lithuania</option>
                                                                 <option value="LU">Luxembourg</option>
                                                                 <option value="MO">Macao</option>
                                                                 <option value="MK">North Macedonia</option>
                                                                 <option value="MG">Madagascar</option>
                                                                 <option value="MW">Malawi</option>
                                                                 <option value="MY">Malaysia</option>
                                                                 <option value="MV">Maldives</option>
                                                                 <option value="ML">Mali</option>
                                                                 <option value="MT">Malta</option>
                                                                 <option value="MH">Marshall Islands</option>
                                                                 <option value="MQ">Martinique</option>
                                                                 <option value="MR">Mauritania</option>
                                                                 <option value="MU">Mauritius</option>
                                                                 <option value="YT">Mayotte</option>
                                                                 <option value="MX">Mexico</option>
                                                                 <option value="FM">Micronesia</option>
                                                                 <option value="MD">Moldova</option>
                                                                 <option value="MC">Monaco</option>
                                                                 <option value="MN">Mongolia</option>
                                                                 <option value="ME">Montenegro</option>
                                                                 <option value="MS">Montserrat</option>
                                                                 <option value="MA">Morocco</option>
                                                                 <option value="MZ">Mozambique</option>
                                                                 <option value="MM">Myanmar</option>
                                                                 <option value="NA">Namibia</option>
                                                                 <option value="NR">Nauru</option>
                                                                 <option value="NP">Nepal</option>
                                                                 <option value="NL">Netherlands</option>
                                                                 <option value="NC">New Caledonia</option>
                                                                 <option value="NZ">New Zealand</option>
                                                                 <option value="NI">Nicaragua</option>
                                                                 <option value="NE">Niger</option>
                                                                 <option value="NG">Nigeria</option>
                                                                 <option value="NU">Niue</option>
                                                                 <option value="NF">Norfolk Island</option>
                                                                 <option value="MP">Northern Mariana Islands</option>
                                                                 <option value="KP">North Korea</option>
                                                                 <option value="NO">Norway</option>
                                                                 <option value="OM">Oman</option>
                                                                 <option value="PK">Pakistan</option>
                                                                 <option value="PS">Palestinian Territory</option>
                                                                 <option value="PA">Panama</option>
                                                                 <option value="PG">Papua New Guinea</option>
                                                                 <option value="PY">Paraguay</option>
                                                                 <option value="PE">Peru</option>
                                                                 <option value="PH">Philippines</option>
                                                                 <option value="PN">Pitcairn</option>
                                                                 <option value="PL">Poland</option>
                                                                 <option value="PT">Portugal</option>
                                                                 <option value="PR">Puerto Rico</option>
                                                                 <option value="QA">Qatar</option>
                                                                 <option value="RE">Reunion</option>
                                                                 <option value="RO">Romania</option>
                                                                 <option value="RU">Russia</option>
                                                                 <option value="RW">Rwanda</option>
                                                                 <option value="BL">Saint Barthélemy</option>
                                                                 <option value="SH">Saint Helena</option>
                                                                 <option value="KN">Saint Kitts and Nevis</option>
                                                                 <option value="LC">Saint Lucia</option>
                                                                 <option value="MF">Saint Martin (French part)</option>
                                                                 <option value="SX">Saint Martin (Dutch part)</option>
                                                                 <option value="PM">Saint Pierre and Miquelon</option>
                                                                 <option value="VC">Saint Vincent and the Grenadines
                                                                 </option>
                                                                 <option value="SM">San Marino</option>
                                                                 <option value="ST">São Tomé and Príncipe</option>
                                                                 <option value="SA">Saudi Arabia</option>
                                                                 <option value="SN">Senegal</option>
                                                                 <option value="RS">Serbia</option>
                                                                 <option value="SC">Seychelles</option>
                                                                 <option value="SL">Sierra Leone</option>
                                                                 <option value="SG" selected="selected">Singapore
                                                                 </option>
                                                                 <option value="SK">Slovakia</option>
                                                                 <option value="SI">Slovenia</option>
                                                                 <option value="SB">Solomon Islands</option>
                                                                 <option value="SO">Somalia</option>
                                                                 <option value="ZA">South Africa</option>
                                                                 <option value="GS">South Georgia/Sandwich Islands
                                                                 </option>
                                                                 <option value="KR">South Korea</option>
                                                                 <option value="SS">South Sudan</option>
                                                                 <option value="ES">Spain</option>
                                                                 <option value="LK">Sri Lanka</option>
                                                                 <option value="SD">Sudan</option>
                                                                 <option value="SR">Suriname</option>
                                                                 <option value="SJ">Svalbard and Jan Mayen</option>
                                                                 <option value="SZ">Swaziland</option>
                                                                 <option value="SE">Sweden</option>
                                                                 <option value="CH">Switzerland</option>
                                                                 <option value="SY">Syria</option>
                                                                 <option value="TW">Taiwan</option>
                                                                 <option value="TJ">Tajikistan</option>
                                                                 <option value="TZ">Tanzania</option>
                                                                 <option value="TH">Thailand</option>
                                                                 <option value="TL">Timor-Leste</option>
                                                                 <option value="TG">Togo</option>
                                                                 <option value="TK">Tokelau</option>
                                                                 <option value="TO">Tonga</option>
                                                                 <option value="TT">Trinidad and Tobago</option>
                                                                 <option value="TN">Tunisia</option>
                                                                 <option value="TR">Turkey</option>
                                                                 <option value="TM">Turkmenistan</option>
                                                                 <option value="TC">Turks and Caicos Islands</option>
                                                                 <option value="TV">Tuvalu</option>
                                                                 <option value="UG">Uganda</option>
                                                                 <option value="UA">Ukraine</option>
                                                                 <option value="AE">United Arab Emirates</option>
                                                                 <option value="GB">United Kingdom (UK)</option>
                                                                 <option value="US">United States (US)</option>
                                                                 <option value="UM">United States (US) Minor Outlying
                                                                      Islands
                                                                 </option>
                                                                 <option value="UY">Uruguay</option>
                                                                 <option value="UZ">Uzbekistan</option>
                                                                 <option value="VU">Vanuatu</option>
                                                                 <option value="VA">Vatican</option>
                                                                 <option value="VE">Venezuela</option>
                                                                 <option value="VN">Vietnam</option>
                                                                 <option value="VG">Virgin Islands (British)</option>
                                                                 <option value="VI">Virgin Islands (US)</option>
                                                                 <option value="WF">Wallis and Futuna</option>
                                                                 <option value="EH">Western Sahara</option>
                                                                 <option value="WS">Samoa</option>
                                                                 <option value="YE">Yemen</option>
                                                                 <option value="ZM">Zambia</option>
                                                                 <option value="ZW">Zimbabwe</option>
                                                            </select>
                                                            <svg class="svg-next-icon svg-next-icon-size-16">
                                                                 <svg xmlns="http://www.w3.org/2000/svg"
                                                                      viewBox="0 0 20 20">
                                                                      <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                                      </path>
                                                                 </svg>
                                                            </svg>
                                                       </div>
                                                  </div>
                                             </div>

                                             <div class="col-sm-4">
                                                  <div class="form-group mb-3">
                                                       <label for="store_state" class="text-title-field">State</label>
                                                       <input type="text" class="next-input" name="store_state"
                                                            id="store_state" value="Singapore" spellcheck="false"
                                                            data-ms-editor="true" autocomplete="off">
                                                  </div>
                                             </div>

                                             <div class="col-sm-4">
                                                  <div class="form-group mb-3">
                                                       <label for="store_city" class="text-title-field">City</label>
                                                       <input type="text" class="next-input" name="store_city"
                                                            id="store_city" value="Singapore" spellcheck="false"
                                                            data-ms-editor="true">
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="taxId">Tax ID</label>
                                             <input type="text" class="form-control" id="taxId" name="taxId">
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-4">
                         <div class="annotated-section-description pd-all-20 p-none-t">
                              <h2 class="fs-4" style="font-size: 16px;">Standard & Format</h2>
                              <p class="color-note">Standards and formats are used to calculate things like product
                                   prices, shipping weights, and order times.</p>
                         </div>
                    </div>


                    <div class="col-md-8">
                         <div class="custom p-4">
                              <div class="tab-content">
                                   <div class="wrapper-content pd-all-20">
                                        <label class="next-label">Edit order code format (optional)</label>
                                        <p class="type-subdued">The default order code starts at: number. You can
                                             change
                                             the
                                             start or end string to create the order code you want, for example
                                             "DH-:
                                             number"
                                             or ": number-A"</p>
                                        <div class="row">
                                             <div class="col-sm-6 mb-3">
                                                  <div class="form-group mb-3">
                                                       <label class="text-title-field" for="store_order_prefix">Start
                                                            with</label>
                                                       <div class="next-input--stylized">
                                                            <span
                                                                 class="next-input-add-on next-input__add-on--before">#</span>
                                                            <input type="text" class="next-input next-input--invisible"
                                                                 name="store_order_prefix" id="store_order_prefix"
                                                                 value="" spellcheck="false" data-ms-editor="true">
                                                       </div>
                                                  </div>
                                                  <p class="setting-note mb0">Your order code will be shown <span
                                                            class="sample-order-code">#<span
                                                                 class="sample-order-code-prefix"></span>10000000<span
                                                                 class="sample-order-code-suffix"></span></span>
                                                  </p>
                                             </div>
                                             <div class="col-sm-6 mb-3">
                                                  <div class="form-group mb-3">
                                                       <label for="store_order_suffix" class="text-title-field">End
                                                            with</label>
                                                       <input type="text" class="next-input" name="store_order_suffix"
                                                            id="store_order_suffix" value="" spellcheck="false"
                                                            data-ms-editor="true">
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="row">
                                             <div class="col-sm-6">
                                                  <div class="form-group mb-3">
                                                       <label for="store_weight_unit" class="text-title-field">Unit
                                                            of
                                                            weight</label>
                                                       <div class="ui-select-wrapper form-group ">
                                                            <select class=" ui-select" id="store_weight_unit"
                                                                 name="store_weight_unit">
                                                                 <option value="g" selected="selected">Gram (g)
                                                                 </option>
                                                                 <option value="kg">Kilogram (kg)</option>
                                                                 <option value="lb">Pound (lb)</option>
                                                                 <option value="oz">Ounce (oz)</option>
                                                            </select>
                                                            <svg class="svg-next-icon svg-next-icon-size-16">
                                                                 <svg xmlns="http://www.w3.org/2000/svg"
                                                                      viewBox="0 0 20 20">
                                                                      <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                                      </path>
                                                                 </svg>
                                                            </svg>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-sm-6">
                                                  <div class="form-group mb-3">
                                                       <label for="store_width_height_unit"
                                                            class="text-title-field">Unit
                                                            length / height</label>
                                                       <div class="ui-select-wrapper form-group ">
                                                            <select class=" ui-select" id="store_width_height_unit"
                                                                 name="store_width_height_unit">
                                                                 <option value="cm" selected="selected">Centimeter
                                                                      (cm)
                                                                 </option>
                                                                 <option value="m">Meter (m)</option>
                                                                 <option value="inch">Inch</option>
                                                            </select>
                                                            <svg class="svg-next-icon svg-next-icon-size-16">
                                                                 <svg xmlns="http://www.w3.org/2000/svg"
                                                                      viewBox="0 0 20 20">
                                                                      <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                                      </path>
                                                                 </svg>
                                                            </svg>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

               <hr>

               <div class="row">
                    <div class="col-4">
                         <div class="annotated-section-description pd-all-20 p-none-t">
                              <h2 class="fs-4">Currencies</h2>
                              <p class="color-note">List of currencies using on website</p>
                         </div>
                    </div>
                    <div class="col-8">
                         <div class="custom p-4">
                              <div class="tab-content">
                                   <div class="wrapper-content pd-all-20">
                                        <div class="form-group">
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="autoDetectCurrency"
                                                       id="autoDetectYes" value="yes">
                                                  <label class="form-check-label" for="autoDetectYes">Yes</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="autoDetectCurrency"
                                                       id="autoDetectNo" value="no" checked>
                                                  <label class="form-check-label" for="autoDetectNo">No</label>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label>Add a space between price and currency?</label><br>
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="spaceBetween"
                                                       id="spaceYes" value="yes">
                                                  <label class="form-check-label" for="spaceYes">Yes</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="spaceBetween"
                                                       id="spaceNo" value="no" checked>
                                                  <label class="form-check-label" for="spaceNo">No</label>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="thousandsSeparator">Thousands separator</label>
                                             <select class="form-control" id="thousandsSeparator">
                                                  <option value=",">Comma (,)</option>
                                                  <option value=".">Period (.)</option>
                                             </select>
                                        </div>
                                        <div class="form-group">
                                             <label for="decimalSeparator">Decimal separator</label>
                                             <select class="form-control" id="decimalSeparator">
                                                  <option value=".">Period (.)</option>
                                                  <option value=",">Comma (,)</option>
                                             </select>
                                        </div>
                                        <div class="form-group">
                                             <label for="apiKey">API Exchange Rates Key</label>
                                             <input type="text" class="form-control" id="apiKey">
                                        </div>
                                        <div class="table-responsive">
                                             <table class="table">
                                                  <thead class="thead-light">
                                                       <tr>
                                                            <th>Code</th>
                                                            <th>Symbol</th>
                                                            <th>Number of decimals</th>
                                                            <th>Exchange rate</th>
                                                            <th>Position of symbol</th>
                                                            <th>Is default?</th>
                                                            <th>Remove</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody id="currencyTable">
                                                       <tr>
                                                            <td><input type="text" class="form-control" value="USD">
                                                            </td>
                                                            <td><input type="text" class="form-control" value="$"></td>
                                                            <td><input type="number" class="form-control" value="2">
                                                            </td>
                                                            <td><input type="number" class="form-control" value="1">
                                                            </td>
                                                            <td>
                                                                 <select class="form-control">
                                                                      <option value="before" selected>Before number
                                                                      </option>
                                                                      <option value="after">After number</option>
                                                                 </select>
                                                            </td>
                                                            <td><input type="radio" name="defaultCurrency"
                                                                      style="margin: 10px;"></td>
                                                            <td>
                                                                 <div class="btn bg-danger btn-danger"><i
                                                                           class="fa fa-trash"></i></div>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td><input type="text" class="form-control" value="INR">
                                                            </td>
                                                            <td><input type="text" class="form-control" value="₹"></td>
                                                            <td><input type="number" class="form-control" value="2">
                                                            </td>
                                                            <td><input type="number" class="form-control" value="83.38">
                                                            </td>
                                                            <td>
                                                                 <select class="form-control">
                                                                      <option value="before" selected>Before number
                                                                      </option>
                                                                      <option value="after">After number</option>
                                                                 </select>
                                                            </td>
                                                            <td><input type="radio" name="defaultCurrency"
                                                                      style="margin: 10px;"></td>
                                                            <td>
                                                                 <div class="btn bg-danger btn-danger"><i
                                                                           class="fa fa-trash"></i></div>
                                                            </td>
                                                       </tr>
                                                  </tbody>
                                             </table>
                                        </div>

                                        <div class="help-ts">
                                             <i class="fa fa-info-circle"></i>
                                             <span>Please check list currency code here:
                                                  https://en.wikipedia.org/wiki/ISO_4217</span>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="addCurrencyButton">Add a new
                                             currency</button>

                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <hr>

               <div class="row">
                    <div class="col-4">
                         <div class="annotated-section-description pd-all-20 p-none-t">
                              <h2 class="fs-4">Store locators</h2>

                              <p class="color-note">All the lists of your chains, main stores, branches,
                                   etc. The
                                   locations can be used to track sales and to help us configure tax
                                   rates to charge
                                   when selling products.</p>
                         </div>
                    </div>
                    <div class="col-8">
                         <div class="custom p-4">
                              <div class="tab-content">
                                   <div class="flexbox-annotated-section-content">
                                        <div class="wrapper-content pd-all-20">
                                             <table class="table">
                                                  <thead class="thead-light">

                                                       <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Primary?</th>
                                                            <th style="width: 120px;" class="text-end">&nbsp;
                                                            </th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <tr>
                                                            <td>
                                                                 Test
                                                            </td>
                                                            <td>
                                                                 <a href="mailto:Test@admin.com">Test@admin.com</a>
                                                            </td>
                                                            <td>
                                                                 18006268
                                                            </td>
                                                            <td>
                                                                 <span>North Link Building, 10 Admiralty
                                                                      Street</span>,
                                                                 <span>Singapore</span>,
                                                                 <span>Singapore</span>,
                                                                 <span>SG</span>
                                                            </td>
                                                            <td>
                                                                 Yes
                                                            </td>
                                                            <td class="text-end">
                                                                 <button type="button"
                                                                      class="btn btn-primary btn-small btn-trigger-show-store-locator">
                                                                      <i class="fa fa-edit"></i>
                                                                 </button>
                                                            </td>
                                                       </tr>
                                                  </tbody>
                                             </table>

                                             <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                  data-bs-target="#exampleModal">
                                                  Add new
                                             </a>
                                             <p style="margin-top: 10px">Or <a href="#" data-bs-toggle="modal"
                                                       data-bs-target="#change-primary-store-locator-modal">change
                                                       default store
                                                       locator</a></p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               
               <div class="row my-5">
                    <div class="col-4">
                    </div>
                    <div class="col-8">
                         <button class="btn btn-info" type="submit">Save settings</button>
                    </div>
               </div>
          </div>
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header bg-info">
                    <h4 class="modal-title">
                         <strong>Add location</strong>
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
               </div>

               <div class="modal-body with-padding">
                    <form method="POST" action="#" accept-charset="UTF-8">
                         <div class="next-form-section">
                              <div class="next-form-grid">
                                   <div class="next-form-grid-cell mb-2">
                                        <label class="text-title-field">Store name</label>
                                        <input type="text" class="next-input" name="name" placeholder="Store name"
                                             value="">
                                   </div>
                                   <div class="next-form-grid-cell mb-2">
                                        <label class="text-title-field">Phone</label>
                                        <input type="text" class="next-input" name="phone" placeholder="Phone" value="">
                                   </div>
                              </div>
                              <div class="next-form-grid">
                                   <div class="next-form-grid-cell mb-2">
                                        <label class="text-title-field">Email</label>
                                        <input type="text" class="next-input" name="email" placeholder="Email" value="">
                                   </div>
                              </div>
                              <div class="next-form-grid">
                                   <div class="next-form-grid-cell mb-2">
                                        <label class="text-title-field">Address</label>
                                        <input type="text" class="next-input" name="address" placeholder="Address"
                                             value="" spellcheck="false" data-ms-editor="true">
                                   </div>
                              </div>
                              <div class="next-form-grid">
                                   <div class="next-form-grid-cell mb-2">
                                        <label class="text-title-field" for="store_country">Country</label>
                                        <div class="ui-select-wrapper">
                                             <select name="country" class="ui-select" id="store_country"
                                                  data-type="country">
                                                  <option value="" selected="">Select country...</option>
                                                  <option value="AF">Afghanistan</option>
                                                  <option value="AX">Åland Islands</option>
                                                  <option value="AL">Albania</option>
                                                  <option value="DZ">Algeria</option>
                                                  <option value="AS">American Samoa</option>
                                                  <option value="AD">Andorra</option>
                                                  <option value="AO">Angola</option>
                                                  <option value="AI">Anguilla</option>
                                                  <option value="AQ">Antarctica</option>
                                                  <option value="AG">Antigua and Barbuda</option>
                                                  <option value="AR">Argentina</option>
                                                  <option value="AM">Armenia</option>
                                                  <option value="AW">Aruba</option>
                                                  <option value="AU">Australia</option>
                                                  <option value="AT">Austria</option>
                                                  <option value="AZ">Azerbaijan</option>
                                                  <option value="BS">Bahamas</option>
                                                  <option value="BH">Bahrain</option>
                                                  <option value="BD">Bangladesh</option>
                                                  <option value="BB">Barbados</option>
                                                  <option value="BY">Belarus</option>
                                                  <option value="BE">Belgium</option>
                                                  <option value="PW">Belau</option>
                                                  <option value="BZ">Belize</option>
                                                  <option value="BJ">Benin</option>
                                                  <option value="BM">Bermuda</option>
                                                  <option value="BT">Bhutan</option>
                                                  <option value="BO">Bolivia</option>
                                                  <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                                  <option value="BA">Bosnia and Herzegovina</option>
                                                  <option value="BW">Botswana</option>
                                                  <option value="BV">Bouvet Island</option>
                                                  <option value="BR">Brazil</option>
                                                  <option value="IO">British Indian Ocean Territory</option>
                                                  <option value="BN">Brunei</option>
                                                  <option value="BG">Bulgaria</option>
                                                  <option value="BF">Burkina Faso</option>
                                                  <option value="BI">Burundi</option>
                                                  <option value="KH">Cambodia</option>
                                                  <option value="CM">Cameroon</option>
                                                  <option value="CA">Canada</option>
                                                  <option value="CV">Cape Verde</option>
                                                  <option value="KY">Cayman Islands</option>
                                                  <option value="CF">Central African Republic</option>
                                                  <option value="TD">Chad</option>
                                                  <option value="CL">Chile</option>
                                                  <option value="CN">China</option>
                                                  <option value="CX">Christmas Island</option>
                                                  <option value="CC">Cocos (Keeling) Islands</option>
                                                  <option value="CO">Colombia</option>
                                                  <option value="KM">Comoros</option>
                                                  <option value="CG">Congo (Brazzaville)</option>
                                                  <option value="CD">Congo (Kinshasa)</option>
                                                  <option value="CK">Cook Islands</option>
                                                  <option value="CR">Costa Rica</option>
                                                  <option value="HR">Croatia</option>
                                                  <option value="CU">Cuba</option>
                                                  <option value="CW">Cura&amp;ccedil;ao</option>
                                                  <option value="CY">Cyprus</option>
                                                  <option value="CZ">Czech Republic</option>
                                                  <option value="DK">Denmark</option>
                                                  <option value="DJ">Djibouti</option>
                                                  <option value="DM">Dominica</option>
                                                  <option value="DO">Dominican Republic</option>
                                                  <option value="EC">Ecuador</option>
                                                  <option value="EG">Egypt</option>
                                                  <option value="SV">El Salvador</option>
                                                  <option value="GQ">Equatorial Guinea</option>
                                                  <option value="ER">Eritrea</option>
                                                  <option value="EE">Estonia</option>
                                                  <option value="ET">Ethiopia</option>
                                                  <option value="FK">Falkland Islands</option>
                                                  <option value="FO">Faroe Islands</option>
                                                  <option value="FJ">Fiji</option>
                                                  <option value="FI">Finland</option>
                                                  <option value="FR">France</option>
                                                  <option value="GF">French Guiana</option>
                                                  <option value="PF">French Polynesia</option>
                                                  <option value="TF">French Southern Territories</option>
                                                  <option value="GA">Gabon</option>
                                                  <option value="GM">Gambia</option>
                                                  <option value="GE">Georgia</option>
                                                  <option value="DE">Germany</option>
                                                  <option value="GH">Ghana</option>
                                                  <option value="GI">Gibraltar</option>
                                                  <option value="GR">Greece</option>
                                                  <option value="GL">Greenland</option>
                                                  <option value="GD">Grenada</option>
                                                  <option value="GP">Guadeloupe</option>
                                                  <option value="GU">Guam</option>
                                                  <option value="GT">Guatemala</option>
                                                  <option value="GG">Guernsey</option>
                                                  <option value="GN">Guinea</option>
                                                  <option value="GW">Guinea-Bissau</option>
                                                  <option value="GY">Guyana</option>
                                                  <option value="HT">Haiti</option>
                                                  <option value="HM">Heard Island and McDonald Islands</option>
                                                  <option value="HN">Honduras</option>
                                                  <option value="HK">Hong Kong</option>
                                                  <option value="HU">Hungary</option>
                                                  <option value="IS">Iceland</option>
                                                  <option value="IN">India</option>
                                                  <option value="ID">Indonesia</option>
                                                  <option value="IR">Iran</option>
                                                  <option value="IQ">Iraq</option>
                                                  <option value="IE">Ireland</option>
                                                  <option value="IM">Isle of Man</option>
                                                  <option value="IL">Israel</option>
                                                  <option value="IT">Italy</option>
                                                  <option value="CI">Ivory Coast</option>
                                                  <option value="JM">Jamaica</option>
                                                  <option value="JP">Japan</option>
                                                  <option value="JE">Jersey</option>
                                                  <option value="JO">Jordan</option>
                                                  <option value="KZ">Kazakhstan</option>
                                                  <option value="KE">Kenya</option>
                                                  <option value="KI">Kiribati</option>
                                                  <option value="KW">Kuwait</option>
                                                  <option value="XK">Kosovo</option>
                                                  <option value="KG">Kyrgyzstan</option>
                                                  <option value="LA">Laos</option>
                                                  <option value="LV">Latvia</option>
                                                  <option value="LB">Lebanon</option>
                                                  <option value="LS">Lesotho</option>
                                                  <option value="LR">Liberia</option>
                                                  <option value="LY">Libya</option>
                                                  <option value="LI">Liechtenstein</option>
                                                  <option value="LT">Lithuania</option>
                                                  <option value="LU">Luxembourg</option>
                                                  <option value="MO">Macao</option>
                                                  <option value="MK">North Macedonia</option>
                                                  <option value="MG">Madagascar</option>
                                                  <option value="MW">Malawi</option>
                                                  <option value="MY">Malaysia</option>
                                                  <option value="MV">Maldives</option>
                                                  <option value="ML">Mali</option>
                                                  <option value="MT">Malta</option>
                                                  <option value="MH">Marshall Islands</option>
                                                  <option value="MQ">Martinique</option>
                                                  <option value="MR">Mauritania</option>
                                                  <option value="MU">Mauritius</option>
                                                  <option value="YT">Mayotte</option>
                                                  <option value="MX">Mexico</option>
                                                  <option value="FM">Micronesia</option>
                                                  <option value="MD">Moldova</option>
                                                  <option value="MC">Monaco</option>
                                                  <option value="MN">Mongolia</option>
                                                  <option value="ME">Montenegro</option>
                                                  <option value="MS">Montserrat</option>
                                                  <option value="MA">Morocco</option>
                                                  <option value="MZ">Mozambique</option>
                                                  <option value="MM">Myanmar</option>
                                                  <option value="NA">Namibia</option>
                                                  <option value="NR">Nauru</option>
                                                  <option value="NP">Nepal</option>
                                                  <option value="NL">Netherlands</option>
                                                  <option value="NC">New Caledonia</option>
                                                  <option value="NZ">New Zealand</option>
                                                  <option value="NI">Nicaragua</option>
                                                  <option value="NE">Niger</option>
                                                  <option value="NG">Nigeria</option>
                                                  <option value="NU">Niue</option>
                                                  <option value="NF">Norfolk Island</option>
                                                  <option value="MP">Northern Mariana Islands</option>
                                                  <option value="KP">North Korea</option>
                                                  <option value="NO">Norway</option>
                                                  <option value="OM">Oman</option>
                                                  <option value="PK">Pakistan</option>
                                                  <option value="PS">Palestinian Territory</option>
                                                  <option value="PA">Panama</option>
                                                  <option value="PG">Papua New Guinea</option>
                                                  <option value="PY">Paraguay</option>
                                                  <option value="PE">Peru</option>
                                                  <option value="PH">Philippines</option>
                                                  <option value="PN">Pitcairn</option>
                                                  <option value="PL">Poland</option>
                                                  <option value="PT">Portugal</option>
                                                  <option value="PR">Puerto Rico</option>
                                                  <option value="QA">Qatar</option>
                                                  <option value="RE">Reunion</option>
                                                  <option value="RO">Romania</option>
                                                  <option value="RU">Russia</option>
                                                  <option value="RW">Rwanda</option>
                                                  <option value="BL">Saint Barth&amp;eacute;lemy</option>
                                                  <option value="SH">Saint Helena</option>
                                                  <option value="KN">Saint Kitts and Nevis</option>
                                                  <option value="LC">Saint Lucia</option>
                                                  <option value="MF">Saint Martin (French part)</option>
                                                  <option value="SX">Saint Martin (Dutch part)</option>
                                                  <option value="PM">Saint Pierre and Miquelon</option>
                                                  <option value="VC">Saint Vincent and the Grenadines</option>
                                                  <option value="SM">San Marino</option>
                                                  <option value="ST">S&amp;atilde;o Tom&amp;eacute; and
                                                       Pr&amp;iacute;ncipe</option>
                                                  <option value="SA">Saudi Arabia</option>
                                                  <option value="SN">Senegal</option>
                                                  <option value="RS">Serbia</option>
                                                  <option value="SC">Seychelles</option>
                                                  <option value="SL">Sierra Leone</option>
                                                  <option value="SG">Singapore</option>
                                                  <option value="SK">Slovakia</option>
                                                  <option value="SI">Slovenia</option>
                                                  <option value="SB">Solomon Islands</option>
                                                  <option value="SO">Somalia</option>
                                                  <option value="ZA">South Africa</option>
                                                  <option value="GS">South Georgia/Sandwich Islands</option>
                                                  <option value="KR">South Korea</option>
                                                  <option value="SS">South Sudan</option>
                                                  <option value="ES">Spain</option>
                                                  <option value="LK">Sri Lanka</option>
                                                  <option value="SD">Sudan</option>
                                                  <option value="SR">Suriname</option>
                                                  <option value="SJ">Svalbard and Jan Mayen</option>
                                                  <option value="SZ">Swaziland</option>
                                                  <option value="SE">Sweden</option>
                                                  <option value="CH">Switzerland</option>
                                                  <option value="SY">Syria</option>
                                                  <option value="TW">Taiwan</option>
                                                  <option value="TJ">Tajikistan</option>
                                                  <option value="TZ">Tanzania</option>
                                                  <option value="TH">Thailand</option>
                                                  <option value="TL">Timor-Leste</option>
                                                  <option value="TG">Togo</option>
                                                  <option value="TK">Tokelau</option>
                                                  <option value="TO">Tonga</option>
                                                  <option value="TT">Trinidad and Tobago</option>
                                                  <option value="TN">Tunisia</option>
                                                  <option value="TR">Turkey</option>
                                                  <option value="TM">Turkmenistan</option>
                                                  <option value="TC">Turks and Caicos Islands</option>
                                                  <option value="TV">Tuvalu</option>
                                                  <option value="UG">Uganda</option>
                                                  <option value="UA">Ukraine</option>
                                                  <option value="AE">United Arab Emirates</option>
                                                  <option value="GB">United Kingdom (UK)</option>
                                                  <option value="US">United States (US)</option>
                                                  <option value="UM">United States (US) Minor Outlying Islands</option>
                                                  <option value="UY">Uruguay</option>
                                                  <option value="UZ">Uzbekistan</option>
                                                  <option value="VU">Vanuatu</option>
                                                  <option value="VA">Vatican</option>
                                                  <option value="VE">Venezuela</option>
                                                  <option value="VN">Vietnam</option>
                                                  <option value="VG">Virgin Islands (British)</option>
                                                  <option value="VI">Virgin Islands (US)</option>
                                                  <option value="WF">Wallis and Futuna</option>
                                                  <option value="EH">Western Sahara</option>
                                                  <option value="WS">Samoa</option>
                                                  <option value="YE">Yemen</option>
                                                  <option value="ZM">Zambia</option>
                                                  <option value="ZW">Zimbabwe</option>
                                             </select>
                                             <svg class="svg-next-icon svg-next-icon-size-16">
                                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                       <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                                  </svg>
                                             </svg>
                                        </div>
                                   </div>
                              </div>
                              <div class="next-form-grid">
                                   <div class="row">
                                        <div class="col-md-6">
                                             <div class="next-form-grid-cell mb-2">
                                                  <label class="text-title-field" for="store_state">State</label>
                                                  <input type="text" class="next-input" name="state" id="store_state"
                                                       value="" spellcheck="false" data-ms-editor="true">
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="next-form-grid-cell mb-2">
                                                  <label class="text-title-field" for="store_city">City</label>
                                                  <input type="text" class="next-input" name="city" id="store_city"
                                                       value="" spellcheck="false" data-ms-editor="true">
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="form-group mb-3">
                                   <label class="next-label">
                                        <input type="checkbox" value="1" name="is_shipping_location" checked="">
                                        Store name?
                                   </label>
                              </div>
                         </div>
                    </form>
               </div>

               <div class="modal-footer">
                    <button type="button" class="float-start btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="float-end btn btn-info" id="add-store-locator-button">Save
                         location</button>
               </div>
          </div>

     </div>
</div>

<style>
     .thead-light {
          background-color: #36c6d3;
     }

     .thead-light tr th {
          font-size: 16px;
          color: #fff !important;

     }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     $(document).ready(function () {
          $('#addCurrencyButton').click(function () {
               var newRow = `
                    <tr>
                        <td><input type="text" class="form-control" value=""></td>
                        <td><input type="text" class="form-control" value=""></td>
                        <td><input type="number" class="form-control" value="2"></td>
                        <td><input type="number" class="form-control" value=""></td>
                        <td>
                            <select class="form-control">
                                <option value="before" selected>Before number</option>
                                <option value="after">After number</option>
                            </select>
                        </td>
                        <td><input type="radio" name="defaultCurrency" style="margin: 10px;"></td>
                        <td>
                            <div class="btn bg-danger btn-danger"><i class="fa fa-trash"></i></div>
                        </td>
                    </tr>`;
               $('#currencyTable').append(newRow);
          });

          // Event delegation for dynamically added delete buttons
          $('#currencyTable').on('click', '.btn-danger', function () {
               $(this).closest('tr').remove();
          });
     });
</script>
@endsection