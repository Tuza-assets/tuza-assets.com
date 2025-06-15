<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 4 Modal with FAQ</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .icon-guide {
            position: fixed;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            padding: 10px;
            background-color: #FF6600;
            color: #fff;
            border-radius: 5px 0 0 5px;
            cursor: pointer;
            z-index: 2;
        }

        .icon-guide i {
            font-size: 24px;
        }

        .modal.right .modal-dialog {
            position: fixed;
            right: 2%;
            top: 50%;
            transform: translateY(-50%);
            margin: 0;
            height: 60%;
            width: 400px;
        }

        .modal.right .modal-content {
            height: 100%;
        }

        .modal-header,
        .modal-footer {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #fff;
            width: 100%;
        }

        .modal-body {
            height: calc(100% - 60px);
            overflow-y: auto;
        }

        .nav-tabs .nav-link {
            color: #000;
        }

        .nav-tabs .nav-link.active {
            color: #495057;
            background-color: #e9ecef;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        .nav-tabs {
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .modal.right .modal-dialog {
                width: 300px;
            }
        }
        
        
    button {
        color: black !important;
        ;
    }

    button:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: none !important;
        color: orange !important;

    }

    button.active {
        text-decoration: none !important;
        color: orange !important;

    }

    button:hover {
        text-decoration: none !important;
        color: orange !important;

    }
    </style>
</head>

<body>

    <div class="icon-guide" id="icon" data-toggle="modal" data-target="#guideModal">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="green" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
        </svg>
        <span class="text-success">Guide</span>
    </div>

    <!-- Modal -->
    <div class="modal right fade" id="guideModal" tabindex="-1" role="dialog" aria-labelledby="guideModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content pl-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="guideModalLabel">Guide</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="help-tab" data-toggle="tab" href="#help" role="tab"
                                aria-controls="help" aria-selected="true">Help</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab"
                                aria-controls="faq" aria-selected="false">HOW IT WORKS</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="help" role="tabpanel"
                            aria-labelledby="help-tab">
                            <p>For the Landlords</p>
                            <p>If you are an approved user, Please use your sign in credentials.</p>
                            <p>If you are new:</p>
                            <ul>
                                <li>Create your account on Sign-up; fill in all the required details.</li>
                            </ul>
                            <p>Once your account is created we’ll send you the confirmation that your account is been
                                confirmed.</p>
                            <ul>
                                <li>We’ll contact you for the appointment for the Property inspection.</li>
                                <li>After the inspection team is done with the inspection, we’ll send you the inspection
                                    report.</li>
                                <li>General inspection report is free.</li>
                                <li>Only the detailed report is to be paid.</li>
                                <li>Creating an account is free.</li>
                                <li>Our Property Management package includes once a year free technical inspection.</li>
                                <li>First inspection is free of charge.</li>
                            </ul>
                        </div>
                        <!-- FAQ Section -->
                        <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                            <!-- FAQ content -->
                            <div id="faqAccordion">
                                <!-- FAQ 1 -->
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                Sing-up or Login on our Landlord Portal <i
                                                    class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            Given that our main idea is for the Landlord to reduce the time spent over
                                            his/her property, you will need to create your own account so that you can
                                            monitor all the activities on your property and the payments right on your
                                            pc or cell phone.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 2 -->
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                Free Technical Inspection of your property <i
                                                    class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            <p>We first make an appointment with you for the technical inspection by our
                                                own expert. This will be followed by a detailed report of the findings
                                                and advises in case the property does not meet the rental standards and
                                                Letting condition.</p>
                                            <p>Upon your approval, we will also provide you with comprehensive
                                                information about tenancy laws and regulations and will also issue
                                                substantiated rental advice based on our experience and the current
                                                market conditions.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 3 -->
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                Repair/ Remodeling / Cleaning <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            Positive impression from our Tenants is what keeps your property on the
                                            market. We therefore ensure the house is properly maintained to keep Tenants
                                            contented. If you wish to only insure the unoccupied and cleanliness of the
                                            property, the process ends on this and sign the terms of Property Management
                                            agreements.

                                            In case you would wish to rent out your property out, go further to the next
                                            step.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 4 -->
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseFour" aria-expanded="false"
                                                aria-controls="collapseFour">
                                                Professional pictures<i class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            As the next step, Tuza Assets will schedule a professional photoshoot. The
                                            eyes are always the first to judge. We take great care over this; after all,
                                            you want the presentation to stand out from the competition.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 5 -->
                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseFive" aria-expanded="false"
                                                aria-controls="collapseFive">
                                                Online advertisement <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            Tuza Assets will make a clear and complete internet presentation and list it
                                            across our media platforms including our listing on the website
                                            (www.tuza-assets.com), where the local potential and external potential
                                            Tenants traveling to Rwanda for a long or a short stay will have access to
                                            it.

                                            We take great care over this; after all, you want the presentation to stand
                                            out from the competition. One important aspect for Tuza-Assets is making
                                            sure our listings are up to date for potential tenants
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 6 -->
                                <div class="card">
                                    <div class="card-header" id="headingSix">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseSix" aria-expanded="false"
                                                aria-controls="collapseSix">
                                                Online advertisement<i class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            Tuza Assets will make a clear and complete internet presentation and list it
                                            across our media platforms, including our listing on the website
                                            (www.tuza-assets.com), where local and external potential tenants traveling
                                            to Rwanda for a long or short stay will have access to it.

                                            We take great care over this; after all, you want the presentation to stand
                                            out from the competition. One important aspect for Tuza-Assets is making
                                            sure our listings are up to date for potential tenants. Within managing your
                                            property, we minimize the risk of vacancy, as 1 month before the current
                                            tenant moves out, your property will be listed online.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 7 -->
                                <div class="card">
                                    <div class="card-header" id="headingSeven">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseSeven" aria-expanded="false"
                                                aria-controls="collapseSeven">
                                                Viewings <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            When a candidate wants to view the house, we will first check whether he /
                                            she meets your requirements and fits the property profile. We will do visits
                                            with candidates who meet the profile. One of our local subcontractor makes
                                            an appointment for a property visit. And will receive the candidates, show
                                            them around and answer questions. We keep you regularly informed of the
                                            progress, directly through your Landlord Portal, or by phone if you wish. We
                                            will ask for proof of income, copy of the ID, etc. We also verify the
                                            candidates with their employer when necessary. So we can be sure that the
                                            candidate has sufficient income, no wrong intentions and is reliable in
                                            terms of payment behavior. If there is several candidates who want to rent
                                            and that meet your requirements, we will nominate the candidates that we
                                            deem suitable and express our preference based on the documents, but also
                                            based on the behavior and appearance of the candidate. However, you decide
                                            who may rent the property.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 8 -->
                                <div class="card">
                                    <div class="card-header" id="headingEight">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseEight" aria-expanded="false"
                                                aria-controls="collapseEight">
                                                Establish the rental agreement <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            After you have agreed with the proposed candidate, we will prepare the
                                            rental agreement based on your situation.

                                            This draft rental agreement is first sent to you via your Landlord Portal
                                            for approval before the tenant will also be required to sign up on our
                                            platform for smooth communication for both payments and claims.

                                            He/she then thereafter receives the agreement via the Tenants Portal. As
                                            soon as both parties agree, we request you to sign the rental agreement
                                            digitally. The tenant also receives, together with the rental agreement, the
                                            terms and conditions, the payment overview for the first month’s rent, and
                                            the deposit are all already set up in the Tenant’s Portal for easy payment
                                            monitoring. We collect this amount so that we are certain that the first
                                            obligations are met. Check-in only happens after all payments are received.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 9 -->
                                <div class="card">
                                    <div class="card-header" id="headingNine">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseNine" aria-expanded="false"
                                                aria-controls="collapseNine">
                                                Check-in with key transfer and start inspection <i
                                                    class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            The transfer of the keys takes place after all documents have been signed
                                            and the first month’s rent and
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 10 -->
                                <div class="card">
                                    <div class="card-header" id="headingTen">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseTen" aria-expanded="false"
                                                aria-controls="collapseTen">
                                                Ongoing management | Peace of Mind (only with management package)<i
                                                    class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            <h5>Points Applicable for Clients with Property Management Service:</h5>

                                            <ul>
                                                <li>Property Management Landlord vs Tuza Assets</li>
                                                <li>Hold Key</li>
                                                <li>Tenant / Landlord customer service</li>
                                                <li>Tenant relationship</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 11 -->
                                <div class="card">
                                    <div class="card-header" id="headingEleven">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseEleven" aria-expanded="false"
                                                aria-controls="collapseEleven">
                                                Pre-check out Inspection <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            <h5>All points below are applicable for clients with Property Management
                                                service:</h5>

                                            <ul>
                                                <li>Property Management Landlord vs Tuza Assets</li>
                                                <li>Hold Key</li>
                                                <li>Tenant / Landlord customer service</li>
                                                <li>Tenant relationship</li>
                                                <li>Access to Tuza Assets CRM platform, reporting, issues, payments
                                                    monitoring, etc…</li>
                                                <li>Monthly rent collection (if required)</li>
                                                <li>Availability 24/7 for emergencies</li>
                                                <li>Maintenance, remodeling, and repairs (full transparency)</li>
                                                <li>Availability for on-request maintenance</li>
                                                <li>Lease expiring negotiations</li>
                                                <li>Pre-checkout inspection</li>
                                                <li>Check Out</li>
                                                <li>Rent arrears – start the process with debt collecting agency</li>
                                                <li>Start eviction process</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 12 -->
                                <div class="card">
                                    <div class="card-header" id="headingTwelve">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseTwelve" aria-expanded="false"
                                                aria-controls="collapseTwelve">
                                                Check - out <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            Tuza Assets’ local representative will check if all required actions agreed
                                            upon in the pre-checkout report were completed by the tenant, in order for
                                            tenants to collect their security deposit. Otherwise, Tuza Assets will
                                            advise the landlord on the required maintenance that should be deducted from
                                            the security deposit. Tuza Assets will take note of all utility services
                                            with pictures, collect the keys, and do a final report in order to avoid any
                                            disputes.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 13 -->
                                <div class="card">
                                    <div class="card-header" id="headingThirteen">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseThirteen" aria-expanded="false"
                                                aria-controls="collapseThirteen">
                                                Re - letting | Maximize ROI <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            Tuza Assets local representative will check if all required actions agreed
                                            on the pre-checkout report were completed by the tenant, in order for
                                            tenants to collect their security deposit. Otherwise, Tuza Assets will
                                            advise the landlord on the required maintenance that should be deducted from
                                            the security deposit. Tuza Assets will take note of all utility services
                                            with pictures, collect the keys, and do a final report in order to avoid any
                                            disputes.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#faqAccordion .btn-link').click(function() {
                var $this = $(this);
                var $icon = $this.find('.fas');
                var $collapse = $($this.data('target'));

                // Toggle the collapse
                $collapse.collapse('toggle');
                $collapse.on('shown.bs.collapse', function() {
                    $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
                }).on('hidden.bs.collapse', function() {
                    $icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
                });
            });
        });
    </script>

</body>

</html>
