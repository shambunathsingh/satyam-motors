@extends('front.layout.app')

@section('content')
    <main>

        <section class="Terms-&-Conditions">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="loca">
                            <h6>HOME > <span>TERMS & CONDITIONS</span></h6>
                        </div>
                        <div class="terms">
                            <h2>
                                <h1>{{ $pages->name }}</h1>
                            </h2>
                            <p>
                                {!! $page_info->info !!}
                            </p>
                        </div>
                        {{-- <div class="terms">
                            <h2>Terms & Conditions</h2>
                            <p>www.carzex.com (“Website”) is an Internet-based portal owned and operated by M/S Carzex, a
                                company incorporated under the laws of India, with its office at New Delhi, India. Use of
                                the Website is offered to you conditioned on acceptance of all the terms, conditions, and
                                notices contained in these Terms, along with any amendments made by Carzex at its sole
                                discretion and posted on the Website.
                            </p>

                            <p><span class="underline">User Account, Password, and Security</span></p>
                            <ul>
                                <li>The Website requires you to register as a User by creating an Account in order to
                                    purchase coupons from the Website.
                                </li>
                                <li>You will receive a password and account designation upon completing the Website’s
                                    registration process.
                                </li>
                                <li>You will be responsible for maintaining the confidentiality of the password and the
                                    account and are fully responsible for all activities that occur under your password or
                                    account.
                                </li>
                                <li>You agree to (a) immediately notify Carzex of any unauthorized use of your password or
                                    account or any other breach of security, and (b) ensure that you exit from your account
                                    at the end of each session.
                                </li>
                                <li>Carzex cannot and will not be liable for any loss or damage arising from your failure to
                                    comply with this Section.
                                </li>
                            </ul>


                            <p><span class="underline">User Obligations</span></p>
                            <ul>
                                <li>You agree and undertake to use the Website only to post and upload material that is
                                    proper. By way of example, and not as a limitation, you agree and undertake that when
                                    using the Website, you will not:
                                </li>
                                <li>Defame, abuse, harass, stalk, threaten, or otherwise violate the legal rights of others;
                                </li>
                                <li>Publish, post, upload, distribute or disseminate any inappropriate, profane, defamatory,
                                    infringing, obscene, indecent, or unlawful topic, name, material, or information through
                                    any bookmark, tag, or keyword.
                                </li>
                                <li>Upload files that contain software or other material protected by intellectual property
                                    laws unless you own or control the rights thereto or have received all necessary
                                    consents
                                </li>
                                <li>Upload or distribute files that contain viruses, corrupted files, or any other similar
                                    software or programs that may damage the operation of the Website or another’s computer
                                </li>
                                <li>Conduct or forward surveys, contests, pyramid schemes, or chain letters;</li>
                                <li>Download any file posted by another user of a Service that you know, or reasonably
                                    should know, cannot be legally distributed in such manner;
                                </li>
                                <li>Falsify or delete any author attributions, legal or other proper notices or proprietary
                                    designations or labels of the origin or source of software or other material contained
                                    in a file that is uploaded;
                                </li>
                                <li>Violate any code of conduct or other guidelines, which may be applicable for or to any
                                    particular Service;
                                </li>
                                <li>Violate any applicable laws or regulations for the time being in force in or outside
                                    India;
                                </li>
                                <li>Violate any of the terms and conditions of this Agreement or any other terms and
                                    conditions for the use of the Website contained elsewhere herein
                                </li>
                                <li>Reverse engineer, modify copy, distribute, transmit, display, perform, reproduce,
                                    publish, license, create derivative works from, transfer, or sell any information or
                                    software obtained from the Website.
                                </li>
                                <li>Notwithstanding anything to contrary, Carzex is an entire liability to you shall be the
                                    refund of the money charged from you for any specific product, under which the unlikely
                                    liability arises.
                                </li>
                                <li>Under no circumstance shall Carzex be liable for any consequential, indirect, or remote
                                    loss that you or your friends and family may suffer.
                                </li>
                            </ul>


                            <p><span class="underline">Usage Conduct</span></p>
                            <p>You shall solely be responsible for maintaining the necessary computer equipment and Internet
                                connections that may be required to access, use and transact on the Website.
                            </p>
                            <p>You are also under an obligation to use this Website for reasonable and lawful purposes only,
                                and shall not indulge in any activity that is not envisaged through the Website.
                            </p>
                            <p>You shall use this Website, and any products purchased through it, for personal,
                                non-commercial use only and shall not re-sell the same to any other person.
                            </p>


                            <p><span class="underline">Intellectual Property Rights</span></p>
                            <p>Unless otherwise indicated or anything contained to the contrary or any proprietary material
                                owned by a third party and so expressly mentioned, Carzex owns all Intellectual Property
                                Rights to and into the trademarks “Carzex”, and the Website, including, without limitation,
                                any and all rights, title and interest in and to copyright, related rights, patents, utility
                                models, designs, know-how, trade secrets and inventions (patent pending), goodwill, source
                                code, meta tags, databases, text, content, graphics, icons, and hyperlinks. You acknowledge
                                and agree that you shall not use, reproduce or distribute any content from the Website
                                belonging to Carzex without obtaining authorization from Carzex.
                            </p>
                            <p>Notwithstanding the foregoing, it is expressly clarified that you will solely be responsible
                                for any content that you provide or upload when using any Service, including any text, data,
                                information, images, photographs, music, sound, video, or any other material which may be
                                accessible through your post, or any other content that you upload, transmit or store when
                                using the Website.
                            </p>


                            <p><span class="underline">Links to Third-Party Sites</span></p>
                            <p>Carzex will contain links to other websites (“Linked Sites”). The Linked Sites are not under
                                the control of Carzex, and Carzex is not responsible for the contents of any Linked Site,
                                including without limitation any link contained in a Linked Site, or any changes or updates
                                to a Linked Site. Carzex is not responsible for any form of transmission, whatsoever,
                                received by you from any Linked Site. Carzex provides links of online advertisements to you
                                only as a convenience and the inclusion of any link does not imply endorsement by or
                                affiliation with Carzex of the Linked Sites nor does it represent the advice, views,
                                opinions, or beliefs of Carzex. The users are requested to verify the accuracy of all
                                information on their own before undertaking any reliance on such information. In the event
                                that by accessing the Website or following links to third-party websites you are exposed to
                                content that you consider offensive or inappropriate, your only recourse will be to stop
                                using the Website.
                            </p>


                            <p><span class="underline">Disclaimer of Warranties & Liability</span></p>
                            <p>Carzex has endeavored to ensure that all the information on the Website is correct, but
                                Carzex neither warrants nor makes any representations regarding the quality, accuracy, or
                                completeness of any data, information, product, or Service. In no event shall Carzex be
                                liable for any direct, indirect, punitive, incidental, special, consequential damages or any
                                other damages. Neither shall Carzex be responsible for the delay or inability to use the
                                Website or related Functionalities, the provision of or failure to provide Functionalities,
                                or for any information, software, products, Functionalities, and related graphics obtained
                                through the Website, or otherwise arising out of the use of the website, whether based on
                                contract, tort, negligence, strict liability or otherwise. Further, Carzex shall not be held
                                responsible for the non-availability of the Website during periodic maintenance operations
                                or any unplanned suspension of access to the website that may occur due to technical reasons
                                or for any reason beyond Carzex’s control. The user understands and agrees that any material
                                and/or data downloaded or otherwise obtained through the Website is done entirely at their
                                own discretion and risk and they will be solely responsible for any damage to their computer
                                systems or loss of data that results from the download of such material and/or data.
                            </p>


                            <p><span class="underline">Indemnification</span></p>
                            <p>You agree to indemnify, defend and hold harmless Carzex from and against any and all losses,
                                liabilities, claims, damages, costs, and expenses (including legal fees and disbursements in
                                connection therewith and interest chargeable thereon) asserted against or incurred by Carzex
                                that arise out of, result from, or may be payable by virtue of, any breach or
                                non-performance of any representation, warranty, covenant or agreement made or obligation to
                                be performed by you pursuant to these Terms.
                            </p>


                            <p><span class="underline">Termination</span></p>
                            <p>Carzex may suspend or terminate your use of the Website or any Service at its sole and
                                absolute discretion.
                                Notwithstanding the foregoing sub-section above, these Terms will survive indefinitely
                                unless and until Carzex chooses to terminate them.
                            </p>
                            <p>If you or Carzex terminates your use of the Website, Carzex may delete any content or other
                                materials relating to your use of the Website and Carzex will have no liability to you or
                                any third party for doing so.
                            </p>


                            <p><span class="underline">Revisions to these Terms and Conditions</span></p>
                            <p>These Terms and Conditions may be revised at any time and from time to time by updating this
                                posting. You should visit this page from time to time to review the then-current Terms and
                                Conditions because they are binding on you. Certain provisions of these Terms and Conditions
                                may be superseded by legal notices or terms located on particular pages of this Web Site.
                            </p>


                            <p><span class="underline">Typographical Errors and Price Changes</span></p>
                            <p>In the event that an Carzex product is mistakenly listed at an incorrect price, Carzex
                                reserves the right to refuse or cancel any orders placed for products listed at the
                                incorrect price. If the manufacturer changes the product price Carzex reserves the right to
                                make similar equivalent changes. Carzex reserves the right to refuse or cancel any such
                                orders whether or not the order has been confirmed and your credit card charged. If your
                                credit card has already been charged for the purchase and your order is canceled, Carzex
                                shall issue a credit to your credit card account in the amount of the incorrect price.
                            </p>


                            <p><span class="underline">Reviews</span></p>
                            <p>Visitors may submit reviews so long as the content is not illegal, obscene, threatening,
                                defamatory, invasive of privacy, infringing of intellectual property rights, or otherwise
                                injurious to third parties or objectionable and does not consist of or contain software
                                viruses, political campaigning, commercial solicitation, chain letters, mass mailings, or
                                any form of “spam.” If you do submit material, and unless we indicate otherwise, you grant
                                Carzex, or its assigns, a nonexclusive, royalty-free, perpetual, irrevocable, and fully
                                sub-licensable right to use, reproduce, modify, adapt, publish, translate, create derivative
                                works from, distribute, and display such content throughout the world in any media. You
                                grant Carzex, or its assigns, the right to use the name that you submit in connection with
                                such content if they choose. You represent and warrant that you own or otherwise control all
                                of the rights to the content that you post; that the content is accurate; that use of the
                                content you supply does not violate this policy and will not cause injury to any person or
                                entity; and that you will indemnify Carzex for all claims resulting from content you supply.
                                Carzex has the right but not the obligation to monitor and edit or remove any activity or
                                content. Carzex takes no responsibility and assumes no liability for any content posted by
                                you or any third party.
                            </p>


                            <p><span class="underline">Privacy Policy</span></p>
                            <p>Your privacy is important to us. Please read our full privacy policy.</p>


                            <p><span class="underline">Governing Law</span></p>
                            <p>These terms shall be governed by and constructed in accordance with the laws of India without
                                reference to conflict of laws principles, and disputes arising in relation hereto shall be
                                subject to the exclusive jurisdiction of the courts at New Delhi, India.
                            </p>
                            <p class="italic">Any party seeking to report any violations of Carzex’s Terms and Conditions or
                                if you have any concerns or questions about these Terms and Conditions, please contact us
                                via e-mail at: carrzex@yahoo.com.
                            </p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>



        <!--  todo modal area start-->
        <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="modal_tab">
                                        <div class="tab-content product-details-large">
                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product1.jpg"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product2.jpg"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product3.jpg"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab4" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product5.jpg"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal_tab_button">
                                            <ul class="nav product_navactive owl-carousel" role="tablist">
                                                <li>
                                                    <a class="nav-link active" data-toggle="tab" href="#tab1"
                                                        role="tab" aria-controls="tab1" aria-selected="false"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                                        aria-controls="tab2" aria-selected="false"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link button_three" data-toggle="tab" href="#tab3"
                                                        role="tab" aria-controls="tab3" aria-selected="false"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
                                                        aria-controls="tab4" aria-selected="false"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="modal_right">
                                        <div class="modal_title mb-10">
                                            <h2>Handbag feugiat</h2>
                                        </div>
                                        <div class="modal_price mb-10">
                                            <span class="new_price">$64.99</span>
                                            <span class="old_price">$78.99</span>
                                        </div>
                                        <div class="modal_description mb-15">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                                laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti
                                                nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam,
                                                rerum vel recusandae </p>
                                        </div>
                                        <div class="variants_selects">
                                            <div class="variants_size">
                                                <h2>size</h2>
                                                <select class="select_option">
                                                    <option selected value="1">s</option>
                                                    <option value="1">m</option>
                                                    <option value="1">l</option>
                                                    <option value="1">xl</option>
                                                    <option value="1">xxl</option>
                                                </select>
                                            </div>
                                            <div class="variants_color">
                                                <h2>color</h2>
                                                <select class="select_option">
                                                    <option selected value="1">purple</option>
                                                    <option value="1">violet</option>
                                                    <option value="1">black</option>
                                                    <option value="1">pink</option>
                                                    <option value="1">orange</option>
                                                </select>
                                            </div>
                                            <div class="modal_add_to_cart">
                                                <form action="#">
                                                    <input min="1" max="100" step="2" value="1"
                                                        type="number">
                                                    <button type="submit">add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal_social">
                                            <h2>Share this product</h2>
                                            <ul>
                                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li class="pinterest"><a href="#"><i
                                                            class="fa fa-pinterest"></i></a>
                                                </li>
                                                <li class="google-plus"><a href="#"><i
                                                            class="fa fa-google-plus"></i></a></li>
                                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  todo modal area end-->

    </main>
@endsection
