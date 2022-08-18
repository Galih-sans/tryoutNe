<html>

<head>
    <meta charset="utf-8">
    <title>form-v1 by Colorlib</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="css/opensans-font.css">
    <link rel="stylesheet" type="text/css"
        href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="<?=  base_url('assets-user/css/style.css')?>">
    </head>

<body>
    <div class="page-content">
        <div class="form-v1-content">
            <div class="wizard-form">
                <form class="form-register" action="#" method="post">
                    <div id="form-total" role="application" class="wizard clearfix vertical">
                        <div class="steps clearfix">
                            <ul role="tablist">
                                <li role="tab" aria-disabled="false" class="first done" aria-selected="false"><a
                                        id="form-total-t-0" href="#form-total-h-0" aria-controls="form-total-p-0">
                                        <div class="title">
                                            <p class="step-icon"><span>01</span></p>
                                            <span class="step-text">Peronal Infomation</span>
                                        </div>
                                    </a></li>
                                <li role="tab" aria-disabled="false" class="current" aria-selected="true"><a
                                        id="form-total-t-1" href="#form-total-h-1" aria-controls="form-total-p-1"><span
                                            class="current-info audible"> </span>
                                        <div class="title">
                                            <p class="step-icon"><span>02</span></p>
                                            <span class="step-text">School Account</span>
                                        </div>
                                    </a></li>
                                <li role="tab" aria-disabled="false" class="last"><a id="form-total-t-2"
                                        href="#form-total-h-2" aria-controls="form-total-p-2">
                                        <div class="title">
                                            <p class="step-icon"><span>03</span></p>
                                            <span class="step-text">Set Goals</span>
                                        </div>
                                    </a></li>
                            </ul>
                        </div>
                        <div class="content clearfix">

                            <h2 id="form-total-h-0" tabindex="-1" class="title">
                                <p class="step-icon"><span>01</span></p>
                                <span class="step-text">Peronal Infomation</span>
                            </h2>
                            <section id="form-total-p-0" role="tabpanel" aria-labelledby="form-total-h-0" class="body"
                                aria-hidden="true" style="display: none;">
                                <div class="inner">
                                    <div class="wizard-header">
                                        <h3 class="heading">Peronal Infomation</h3>
                                        <p>Please enter your infomation and proceed to the next step so we can build
                                            your accounts. </p>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>First Name</legend>
                                                <input type="text" class="form-control" id="first-name"
                                                    name="first-name" placeholder="First Name" required="">
                                            </fieldset>
                                        </div>
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Last Name</legend>
                                                <input type="text" class="form-control" id="last-name" name="last-name"
                                                    placeholder="Last Name" required="">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <fieldset>
                                                <legend>Your Email</legend>
                                                <input type="text" name="your_email" id="your_email"
                                                    class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
                                                    placeholder="example@email.com" required="">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <fieldset>
                                                <legend>Phone Number</legend>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    placeholder="+1 888-999-7777" required="">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row form-row-date">
                                        <div class="form-holder form-holder-2">
                                            <label class="special-label">Birth Date:</label>
                                            <select name="month" id="month">
                                                <option value="MM" disabled="" selected="">MM</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                            </select>
                                            <select name="date" id="date">
                                                <option value="DD" disabled="" selected="">DD</option>
                                                <option value="Feb">Feb</option>
                                                <option value="Mar">Mar</option>
                                                <option value="Apr">Apr</option>
                                                <option value="May">May</option>
                                            </select>
                                            <select name="year" id="year">
                                                <option value="YYYY" disabled="" selected="">YYYY</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <input type="text" class="form-control input-border" id="ssn" name="ssn"
                                                placeholder="SSN" required="">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <h2 id="form-total-h-1" tabindex="-1" class="title current">
                                <p class="step-icon"><span>02</span></p>
                                <span class="step-text">School Account</span>
                            </h2>
                            <section id="form-total-p-1" role="tabpanel" aria-labelledby="form-total-h-1"
                                class="body current" aria-hidden="false" style="">
                                <div class="inner">
                                    <div class="wizard-header">
                                        <h3 class="heading">School account</h3>
                                        <p>Please enter your infomation and proceed to the next step so we can build
                                            your accounts.</p>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-1">
                                            <input type="text" name="find_bank" id="find_bank"
                                                placeholder="Find Your school" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-row-total">
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2 form-holder-3">
                                                <input type="radio" class="radio" name="" id="bank-1"
                                                    value="bank-1" checked="">
                                                <label class="bank-images label-above bank-1-label" for="bank-1">
                                                    <img src="images/form-v1-1.png" alt="">
                                                </label>
                                                <input type="radio" class="radio" name="" id="bank-2"
                                                    value="bank-2">
                                                <label class="bank-images label-above bank-2-label" for="bank-2">
                                                    <img src="images/form-v1-2.png" alt="">
                                                </label>
                                                <input type="radio" class="radio" name="" id="bank-3"
                                                    value="bank-3">
                                                <label class="bank-images label-above bank-3-label" for="bank-3">
                                                    <img src="images/form-v1-3.png" alt="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2 form-holder-3">
                                                <input type="radio" class="radio" name="" id="bank-4"
                                                    value="bank-4">
                                                <label class="bank-images bank-4-label" for="bank-4">
                                                    <img src="images/form-v1-4.png" alt=">
                                                </label>
                                                <input type="radio" class="radio" name="" id="bank-5"
                                                    value="bank-5">
                                                <label class="bank-images bank-5-label" for="bank-5">
                                                    <img src="images/form-v1-5.png" alt=">
                                                </label>
                                                <input type="radio" class="radio" name="" id="bank-6"
                                                    value="bank-6">
                                                <label class="bank-images bank-6-label" for="bank-6">
                                                    <img src="images/form-v1-6.png" alt="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <h2 id="form-total-h-2" tabindex="-1" class="title">
                                <p class="step-icon"><span>03</span></p>
                                <span class="step-text">Set Goals</span>
                            </h2>
                            <section id="form-total-p-2" role="tabpanel" aria-labelledby="form-total-h-2" class="body"
                                aria-hidden="true" style="display: none;">
                                <div class="inner">
                                    <div class="wizard-header">
                                        <h3 class="heading">Set  Goals</h3>
                                        <p>Please enter your infomation and proceed to the next step so we can build
                                            your accounts.</p>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <input type="radio" class="radio" name="radio1" id="plan-1" value="plan-1">
                                            <label class="plan-icon plan-1-label" for="plan-1">
                                                <img src="images/form-v1-icon-2.png" alt="pay-1">
                                            </label>
                                            <div class="plan-total">
                                                <span class="plan-title">Specific Plan</span>
                                                <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat
                                                    consequat mauris nunc congue nisi.</p>
                                            </div>
                                            <input type="radio" class="radio" name="radio1" id="plan-2" value="plan-2">
                                            <label class="plan-icon plan-2-label" for="plan-2">
                                                <img src="images/form-v1-icon-2.png" alt="pay-1">
                                            </label>
                                            <div class="plan-total">
                                                <span class="plan-title">Medium Plan</span>
                                                <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat
                                                    consequat mauris nunc congue nisi.</p>
                                            </div>
                                            <input type="radio" class="radio" name="radio1" id="plan-3" value="plan-3"
                                                checked="">
                                            <label class="plan-icon plan-3-label" for="plan-3">
                                                <img src="images/form-v1-icon-3.png" alt="pay-2">
                                            </label>
                                            <div class="plan-total">
                                                <span class="plan-title">Special Plan</span>
                                                <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat
                                                    consequat mauris nunc congue nisi.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="actions clearfix">
                            <ul role="menu" aria-label="Pagination">
                                <li class="" aria-disabled="false"><a href="#previous" role="menuitem">Back Step</a>
                                </li>
                                <li aria-hidden="false" aria-disabled="false"><a href="#next" role="menuitem"><i
                                            class="zmdi zmdi-arrow-right"></i></a></li>
                                <li aria-hidden="true" style="display: none;"><a href="#finish" role="menuitem"><i
                                            class="zmdi zmdi-check"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets-user/js/jquery.steps.js')?>"></script>
    <script src="<?= base_url('assets-user/js/main.js')?>"></script>


</body>

</html>