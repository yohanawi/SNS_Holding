  <!-- Side Buttons -->
  <div class="bottom-0 p-2 bg-white shadow-lg side-buttons position-fixed end-0 rounded-start">
      <div class="d-flex flex-column align-items-center">
          <a href="#" class="mb-2 text-center text-decoration-none text-dark">
              <img src="{{ url('images/subscribe.gif') }}" class="side-button img-fluid" alt="subscribe">
              <p class="mb-0 top_lable">Subscribe</p>
          </a>
          <a href="#" class="mb-2 text-center text-decoration-none text-dark">
              <img src="{{ url('images/chat.gif') }}" class="side-button img-fluid" alt="messages">
              <p class="mb-0 top_lable">Messages</p>
          </a>
          <a href="#" class="mb-2 text-center text-decoration-none text-dark" data-bs-toggle="modal"
              data-bs-target="#exampleModal4">
              <img src="{{ url('images/feedback_12761108.gif') }}" class="side-button img-fluid" alt="feedback">
              <p class="mb-2 top_lable">Feedback</p>
          </a>
          <a id="backToTop" href="#" class="text-center text-decoration-none text-dark">
              <img src="{{ url('images/Up.gif') }}" class="mb-2 side-button img-fluid" alt="page top">
          </a>
      </div>
  </div>
  <!-- Header with Call to Action -->
  <!--Top Bar-->
  <div class="container-fluid">
      <div class="row" style="background-color: #FFFFFF;">
          <div class="col-12 col-sm-4 col-md-3 d-flex justify-content-center align-items-center">
              <a href="#" class="flex-row d-flex justify-content-center align-items-center text-decoration-none"
                  data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <img src="{{ url('images/truck_16061040.gif') }}" class="img-fluid" id="Top_img"
                      alt="Free Shipping">
                  <p class="mt-2 text-left text-black fw-bold" id="Top_text">Free Shipping<br />
                      <span style="font-size: 10px;">Special for you</span>
                  </p>
              </a>
          </div>
          <div class="col-12 col-sm-1 d-none d-sm-flex justify-content-center align-items-center">
              <div class="fs-3" style="color: rgba(0, 0, 0, 0.411);">|</div>
          </div>
          <div class="col-12 col-sm-4 col-md-3 d-flex justify-content-center align-items-center">
              <a href="#" class="flex-row d-flex justify-content-center align-items-center text-decoration-none"
                  data-bs-toggle="modal" data-bs-target="#exampleModal2">
                  <img src="{{ url('images/present_16903788.gif') }}" class="img-fluid" id="Top_img"
                      alt="Free Returns">
                  <p class="mt-2 text-left text-black fw-bold" id="Top_text">Free Returns<br />
                      <span style="font-size: 10px;">Up to 90 days*</span>
                  </p>
              </a>
          </div>
          <div class="col-12 col-sm-1 d-none d-sm-flex justify-content-center align-items-center">
              <div class="fs-3" style="color: rgba(0, 0, 0, 0.411);">|</div>
          </div>
          <div class="col-12 col-sm-4 col-md-3 d-flex justify-content-center align-items-center">
              <a href="#" class="flex-row d-flex justify-content-center align-items-center text-decoration-none"
                  data-bs-toggle="modal" data-bs-target="#exampleModal3">
                  <img src="{{ url('images/dollar_7994412.gif') }}" class="img-fluid" id="Top_img"
                      alt="Free Adjustments">
                  <p class="mt-2 text-left text-black fw-bold" id="Top_text">Free Adjustments<br />
                      <span style="font-size: 10px;">Within 30 days</span>
                  </p>
              </a>
          </div>
      </div>
  </div>

  <!-- Modal 01 -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header d-flex align-items-center justify-content-center">
                  <h1 class="mx-auto modal-title fs-5" id="exampleModalLabel">Free Shipping</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <ul class="list">
                      <li>Free shipping on items shipped from Temu.</li>
                      <li>Free express shipping on items shipped from Temu over $129.</li>
                      <li>Get a $5.00 credit (standard shipping) or a $13.00 credit (express shipping) for late
                          delivery.</li>
                      <li>Free shipping is usually available for orders over $30 from a single provider but may
                          change from provider to provider.</li>
                      <li>Providers that ship from local warehouses offer free shipping when certain thresholds
                          are met. Free shipping is usually available for orders over $30 from a single provider
                          but may change from provider to provider.</li>
                      <li>Temu has free shipping thresholds only on orders shipped by Temu. These thresholds allow
                          us to offer a wider range of items, including smaller and more convenient sizes, as well
                          as prioritize more environmentally friendly shipping methods. Temu reserves the right to
                          adjust thresholds in specific events or circumstances. The applicable thresholds are
                          detailed before you submit your order.</li>
                  </ul>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                  <button type="button" class="btn btn-secondary w-50 w-sm-75 w-md-50" style="border-radius: 50px;"
                      data-bs-dismiss="modal">OK</button>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal 02 -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header d-flex align-items-center">
                  <h1 class="mx-auto modal-title fs-5" id="exampleModalLabel">Free Returns</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="p-3 rounded shadow-lg modal-body bg-body-tertiary">
                  <ul>
                      <li>You have the option to select ONE free return of one or multiple returnable
                          items for EVERY order! To avoid additional shipping costs and minimize the
                          environmental impact of multiple returns, we suggest that you select the items you wish
                          to
                          return together.
                      </li>
                      <li>The return window for most items is 90 days. All eligible items can be returned
                          within the return window in their original condition for a full refund.
                      </li>
                  </ul>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                  <button type="button" class="btn btn-secondary w-50 w-md-50" style="border-radius: 150px;"
                      data-bs-dismiss="modal">OK</button>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal 03 -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg"> <!-- Added modal-lg for larger screens -->
          <div class="modal-content">
              <div class="modal-header d-flex align-items-center">
                  <h1 class="mx-auto modal-title fs-5" id="exampleModalLabel">Price Adjustments</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <!-- Close button for accessibility -->
              </div>
              <div class="p-3 rounded shadow-lg modal-body bg-body-tertiary">
                  <ul>
                      <li>Items purchased from Temu are eligible for our price adjustment policy. Temu will
                          provide the price difference in the currency that the order was paid in if the list
                          price of the item purchased was reduced within 30 days of purchase in the same country
                          or region. The shipment of your order will not be affected by applying for a price
                          adjustment before you receive your item(s). You can request a price adjustment refund by
                          selecting the relevant order in 'Your Orders' and clicking on the 'Price adjustment'
                          button.</li>
                      <li>Items that are on clearance, promotions, or no longer available, etc., may not be
                          eligible for our price adjustment policy. Fees, including but not limited to shipping
                          fees, will be excluded from any price adjustment calculation. Temu reserves the right to
                          the final interpretation of our price adjustment policy, the right to modify the terms
                          of this policy at any time, and the right to deny any price adjustment at our sole
                          discretion.</li>
                  </ul>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                  <button type="button" class="btn btn-secondary w-50" style="border-radius: 150px;"
                      data-bs-dismiss="modal">OK</button>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal 04 -->
  <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header d-flex align-items-center justify-content-center">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <h5 class="text-center">We are here to improve your experience!</h5>
                  <p class="text-center text-mute" style="margin-bottom: 25px">Your feedback matters! Please tell us
                      what you think of our website below.</p>
                  <h6 class="text-center" style="margin-bottom: 35px;">How do you feel about your visit on our site
                      today?</h6>
                  <div class="container mt-5">
                      <div class="row justify-content-center">
                          <div class="col-md-12">
                              <div class="feedback-card">
                                  <h4 class="text-center">Please rate your experience</h4>
                                  <div class="row">
                                      <div class="text-center col">
                                          <input type="radio" name="rating" id="very_poor" autocomplete="off"
                                              class="d-none" onclick="showFeedbackForm()">
                                          <label for="very_poor" class="radio-label">Very Poor</label>
                                      </div>
                                      <div class="text-center col">
                                          <input type="radio" name="rating" id="poor" autocomplete="off"
                                              class="d-none" onclick="showFeedbackForm()">
                                          <label for="poor" class="radio-label">Poor</label>
                                      </div>
                                      <div class="text-center col">
                                          <input type="radio" name="rating" id="fair" autocomplete="off"
                                              class="d-none" onclick="showFeedbackForm()">
                                          <label for="fair" class="radio-label">Fair</label>
                                      </div>
                                      <div class="text-center col">
                                          <input type="radio" name="rating" id="good" autocomplete="off"
                                              class="d-none" onclick="showFeedbackForm2()">
                                          <label for="good" class="radio-label">Good</label>
                                      </div>
                                      <div class="text-center col">
                                          <input type="radio" name="rating" id="excellent" autocomplete="off"
                                              class="d-none" onclick="showFeedbackForm2()">
                                          <label for="excellent" class="radio-label">Excellent</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Feedback form for poor ratings -->
                  <div class="container mt-5 feedback-form" id="feedbackForm" style="display: none;">
                      <h5>Sorry to hear that! What was the problem?</h5>
                      <div class="flex-wrap btn-group btn-group-toggle d-flex" data-toggle="buttons">
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="problem" id="option1" autocomplete="off"
                                  onclick="showSpecificProblemSection1()"> Website experience
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="problem" id="option2" autocomplete="off"
                                  onclick="showSpecificProblemSection2()"> Promotions
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="problem" id="option3" autocomplete="off"
                                  onclick="showSpecificProblemSection3()"> Site search
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="problem" id="option4" autocomplete="off"
                                  onclick="showSpecificProblemSection4()"> Size chart
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="problem" id="option5" autocomplete="off"
                                  onclick="showSpecificProblemSection5()"> Shopping cart
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="problem" id="option6" autocomplete="off"
                                  onclick="showSpecificProblemSection6()"> Checkout
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="problem" id="option7" autocomplete="off"
                                  onclick="showSpecificProblemSection7()"> Delivery
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="problem" id="option8" autocomplete="off"
                                  onclick="showSpecificProblemSection8()"> Returns
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="problem" id="option9" autocomplete="off"
                                  onclick="showSpecificProblemSection9()"> Customer service
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="problem" id="option10" autocomplete="off"
                                  onclick="showSpecificProblemSection10()"> Other
                          </label>
                      </div>
                  </div>

                  <div class="mt-4" id="specificProblemSection1" style="display: none;">
                      <h6>Website experience</h6>
                      <p>What was the specific problem?</p>
                      <div class="flex-wrap btn-group btn-group-toggle d-flex" data-toggle="buttons">
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific1" autocomplete="off">
                              Poor search results
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific2" autocomplete="off">
                              Don't trust this site
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific3" autocomplete="off">
                              Lack of products
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific4" autocomplete="off">
                              Difficult to use
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific5" autocomplete="off">
                              Other
                          </label>
                      </div>
                      <div class="mt-4 form-group">
                          <textarea class="form-control" id="feedbackTextarea" rows="3" placeholder="Please tell us more!"></textarea>
                          <small class="text-right form-text text-muted">0 / 1000</small>
                      </div>
                  </div>

                  <div class="mt-4" id="specificProblemSection2" style="display: none;">
                      <h6>Promotions</h6>
                      <p>What was the problem with our coupon/promotions?</p>
                      <div class="flex-wrap btn-group btn-group-toggle d-flex" data-toggle="buttons">
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific1" autocomplete="off"> The
                              coupon amount was too small
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific2" autocomplete="off">
                              Don't know how to use my received coupons
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific3" autocomplete="off">
                              Other
                          </label>
                      </div>
                      <div class="mt-4 form-group">
                          <textarea class="form-control" id="feedbackTextarea" rows="3" placeholder="Please tell us more!"></textarea>
                          <small class="text-right form-text text-muted">0 / 1000</small>
                      </div>
                  </div>

                  <div class="mt-4" id="specificProblemSection3" style="display: none;">
                      <h6>Site search</h6>
                      <p>What weren't you able to find items that you liked?</p>
                      <div class="flex-wrap btn-group btn-group-toggle d-flex" data-toggle="buttons">
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific1" autocomplete="off">
                              Didn't like any of the items
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific2" autocomplete="off">
                              Results were irrelevant
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific3" autocomplete="off">
                              Too few items
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific4" autocomplete="off">
                              Other
                          </label>
                      </div>
                      <div class="mt-4 form-group">
                          <textarea class="form-control" id="feedbackTextarea" rows="3" placeholder="Please tell us more!"></textarea>
                          <small class="text-right form-text text-muted">0 / 1000</small>
                      </div>
                  </div>

                  <div class="mt-4" id="specificProblemSection4" style="display: none;">
                      <h6>Size chart</h6>
                      <p>What was the specific problem?</p>
                      <div class="flex-wrap btn-group btn-group-toggle d-flex" data-toggle="buttons">
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific1" autocomplete="off">
                              Can't find the size guide
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific2" autocomplete="off">
                              Can't find the size the model was wearing
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific3" autocomplete="off">
                              Other
                          </label>
                      </div>
                      <div class="mt-4 form-group">
                          <textarea class="form-control" id="feedbackTextarea" rows="3" placeholder="Please tell us more!"></textarea>
                          <small class="text-right form-text text-muted">0 / 1000</small>
                      </div>
                  </div>

                  <div class="mt-4" id="specificProblemSection5" style="display: none;">
                      <h6>Shopping cart</h6>
                      <p>What was the specific problem?</p>
                      <div class="flex-wrap btn-group btn-group-toggle d-flex" data-toggle="buttons">
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific1" autocomplete="off">
                              Couldn't delete multiple items together
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific2" autocomplete="off">
                              Limitations on adding items
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific3" autocomplete="off">
                              My shopping cart loads too slowly
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific4" autocomplete="off">
                              Other
                          </label>
                      </div>
                      <div class="mt-4 form-group">
                          <textarea class="form-control" id="feedbackTextarea" rows="3" placeholder="Please tell us more!"></textarea>
                          <small class="text-right form-text text-muted">0 / 1000</small>
                      </div>
                  </div>

                  <div class="mt-4" id="specificProblemSection6" style="display: none;">
                      <h6>Checkout</h6>
                      <p>What's your preferred payment method?</p>
                      <div class="flex-wrap btn-group btn-group-toggle d-flex" data-toggle="buttons">
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific1" autocomplete="off">
                              Card
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific2" autocomplete="off">
                              Paypal
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific3" autocomplete="off">
                              Klarna
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific4" autocomplete="off">
                              Afterpay
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific5" autocomplete="off">
                              Apple Pay
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific6" autocomplete="off">
                              Google Pay
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific7" autocomplete="off">
                              Other
                          </label>
                      </div>
                      <div class="mt-4 form-group">
                          <textarea class="form-control" id="feedbackTextarea" rows="3" placeholder="Please tell us more!"></textarea>
                          <small class="text-right form-text text-muted">0 / 1000</small>
                      </div>
                  </div>

                  <div class="mt-4" id="specificProblemSection7" style="display: none;">
                      <h6>Delivery</h6>
                      <p>What was the problem you experienced with our delivery service?</p>
                      <div class="flex-wrap btn-group btn-group-toggle d-flex" data-toggle="buttons">
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific1" autocomplete="off">
                              Too slow
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific2" autocomplete="off">
                              Hard to find tracking information
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific3" autocomplete="off">
                              No updates
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific4" autocomplete="off">
                              Other
                          </label>
                      </div>

                      <div class="mt-4 form-group">
                          <textarea class="form-control" id="feedbackTextarea" rows="3" placeholder="Please tell us more!"></textarea>
                          <small class="text-right form-text text-muted">0 / 1000</small>
                      </div>
                  </div>

                  <div class="mt-4" id="specificProblemSection8" style="display: none;">
                      <h6>Returns</h6>
                      <p>What was the reason for your return(s)?</p>
                      <div class="flex-wrap btn-group btn-group-toggle d-flex" data-toggle="buttons">
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific1" autocomplete="off">
                              Quality issue
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific2" autocomplete="off">
                              Missing item
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific3" autocomplete="off">
                              Inaccurate description
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific4" autocomplete="off">
                              Other
                          </label>
                      </div>

                      <div class="mt-4 form-group">
                          <textarea class="form-control" id="feedbackTextarea" rows="3" placeholder="Please tell us more!"></textarea>
                          <small class="text-right form-text text-muted">0 / 1000</small>
                      </div>
                  </div>

                  <div class="mt-4" id="specificProblemSection9" style="display: none;">
                      <h6>Customer service</h6>
                      <p>What areas of our customer service were you dissatisfies with?</p>
                      <div class="flex-wrap btn-group btn-group-toggle d-flex" data-toggle="buttons">
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific1" autocomplete="off">
                              Slow reply
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific2" autocomplete="off">
                              No reply
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific3" autocomplete="off">
                              Couldn't find customer service
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific4" autocomplete="off">
                              Can't solve the problem
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific5" autocomplete="off">
                              Couldn't understand my questions
                          </label>
                          <label class="m-1 btn btn-outline-secondary">
                              <input type="checkbox" name="specific-problem" id="specific6" autocomplete="off">
                              Other
                          </label>
                      </div>
                      <div class="mt-4 form-group">
                          <textarea class="form-control" id="feedbackTextarea" rows="3" placeholder="Please tell us more!"></textarea>
                          <small class="text-right form-text text-muted">0 / 1000</small>
                      </div>
                  </div>

                  <div class="mt-4" id="specificProblemSection10" style="display: none;">
                      <h6>Other</h6>
                      <p>Can you describe the problem?</p>
                      <div class="mt-4 form-group">
                          <textarea class="form-control" id="feedbackTextarea" rows="3" placeholder="Please tell us more!"></textarea>
                          <small class="text-right form-text text-muted">0 / 1000</small>
                      </div>
                  </div>

                  <!-- Feedback form for good ratings -->
                  <div class="container mt-5 feedback-form" id="feedbackForm2" style="display: none;">
                      <textarea name="good" id="good" class="form-control" rows="3" placeholder="Please tell us more!"></textarea>
                  </div>

                  <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-secondary w-50 w-sm-75 w-md-50"
                          style="border-radius: 50px;" data-bs-dismiss="modal">Share with SNS</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
