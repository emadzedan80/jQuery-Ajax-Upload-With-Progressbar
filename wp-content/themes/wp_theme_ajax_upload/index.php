<?php get_header(); ?>

<section class="m-5">
      <div class="container p-5">
            <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="text-center">Version 2</h2>
                        <h3 class="text-center">jQuery Ajax With Progressbar</h3>
                        <h4 class="text-center">Upload & Save To Google Sheet Using Zapier</h4>
                        <form id="jquery-hr-form" enctype="multipart/form-data">
                              <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                          <div class="file-upload-container">
                                                <div class="file-drop-area">
                                                      <span class="fake-btn">Choose C.V.</span>
                                                      <span class="file-msg">Or Drag & Drop C.V. Here</span>
                                                      <input class="file-input" type="file" id="file-cv" name="file-cv" accept=".doc, .docx, .pdf">
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                          <div class="file-upload-container">
                                                <div class="file-drop-area">
                                                      <span class="fake-btn">Choose Cover Letter</span>
                                                      <span class="file-msg">Or Drag & Drop Cover Letter Here</span>
                                                      <input class="file-input" type="file" id="file-cover-letter" name="file-cover-letter"  accept=".doc, .docx, .pdf">
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email">
                              </div>
                              <div class="form-group">
                                    <label for="first-name">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="first-name" name="first-name">
                              </div>
                              <div class="form-group">
                                    <label for="last-name">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="last-name" name="last-name">
                              </div>
                              <div class="form-group">
                                    <label for="verify">Verify <span class="text-danger">*</span></label>
                                    <div id="verify"></div>
                                    <input type="hidden" id="token" name="token">
                              </div>
                              <div class="progress progress-all-files mb-2">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                              </div>
                              <div id="approvedFiles" class="mb-2">

                              </div>
                              <div id="error-message" class="text-danger mb-2">

                              </div>
                              <div id="success-message" class="text-success mb-2">

                              </div>
                              <!-- this is how you define a nonce -->
                              <?php wp_nonce_field("my_form_nonce","my-form-nonce"); ?>
                              <button type="submit" form="jquery-hr-form" value="Submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
                        </form>
                  </div>
            </div>
      </div>
</section>
<?php the_content(); ?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script type="text/javascript">
      var widgetId1;
      var onloadCallback = function() {
      //alert("grecaptcha is ready!");
      widgetId1 = grecaptcha.render('verify', {
            'sitekey': '6Lcl4rUUAAAAAHRtLiCaeutVfBzHGQLb_JbHrzOL',
            'theme': 'light'
      });
  };
</script>
<?php get_footer(); ?>