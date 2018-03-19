<?php

  session_start();


  function getTitle() {
    echo 'Create a New Item';
  }

  include 'partials/head.php';

 ?>

</head>
<body>

  <?php include 'partials/header.php';?>




  <h1 hidden>Create Item</h1>

  <section class="hero">
    <div class="hero-body">
      <div class="container">
        <div class="columns">
          <div class="column is-12">
            <h3 class="title has-text-grey has-text-centered">Create a new item for the catalog</h3>
          </div>
        </div>
        <div class="columns">
          <div class="column is-10 is-offset-1">
            <form id="createitemForm" method="POST" enctype="multipart/form-data" action="assets/creatingitem.php" class="box">
              <div class="columns">
                <div class="column is-6">
                  <div class="field">
                    <p><label class="has-text-weight-bold">Product Name</label></p>
                    <input class="input control" name="name" id="itemName" placeholder="What's it called?" type="text" autocomplete="off" required>
                  </div>
                  <div class="field">
                    <p><label class="has-text-weight-bold">Image</label></p>
                    <div class="file has-name is-fullwidth">
                      <label class="file-label">
                        <input class="file-input" name="image" id="itemImage" type="file">
                        <span class="file-cta">
                          <span class="file-icon">
                            <i class="fas fa-upload"></i>
                          </span>
                          <span class="file-label">
                            Browse..
                          </span>
                        </span>
                        <span class="file-name">
                        </span>
                      </label>
                    </div>
                  </div>
                  <div class="field is-horizontal">
                    <div class="field-body">
                      <div class="field">
                        <p><label class="has-text-weight-bold">Price</label></p>
                        <input class="input control" name="price" id="itemPrice" placeholder="How much is it?" type="number" step=".01" min="0" autocomplete="off" required>
                      </div>
                      <div class="field">
                        <p><label class="has-text-weight-bold">Stock</label></p>
                        <input class="input control" name="stock" id="itemStock" placeholder="How many you've got?" type="number" step="1" min="0"  autocomplete="off" required>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <p><label class="has-text-weight-bold">Description</label></p>
                    <textarea class="textarea control" name="description" id="itemDescription" placeholder="What does it look like?" rows="8" cols="80"></textarea>
                  </div>
                </div>
                <div class="column is-6">
                  <div class="field">
                    <p><label class="has-text-weight-bold">Release Date</label></p>
                    <input class="input control" name="release-date" id="itemDate" placeholder="When was this released?" type="date" autocomplete="off">
                  </div>
                  <?php
                  require 'connect.php';

                  $sql = "SELECT * FROM rarities";
                  $result = mysqli_query($conn, $sql);

                  echo '
                  <div class="field">
                  <p><label class="has-text-weight-bold">Rarity</label></p>
                  <div class="select control is-fullwidth">
                  <select name="rarity">
                  <option selected></option>
                  ';

                  while ($rarity = mysqli_fetch_assoc($result)) {
                    extract($rarity);
                    echo '
                    <option value ="'.$rarity.'">'.$rarity.'</option>
                    ';
                  }

                  echo '
                  </select>
                  </div>
                  </div>
                  ';

                  ?>

                  <div class="field">
                    <p><label class="has-text-weight-bold">Series</label></p>
                    <input class="input control" name="series" placeholder="i.e. Funko POP! Disney" type="text" required>
                  </div>
                  <div class="field">
                    <p><label class="has-text-weight-bold">Brand</label></p>
                    <input class="input control" name="brand" placeholder="i.e. Disney" type="text" required>
                  </div>
                  <div class="field">
                    <p><label class="has-text-weight-bold">Sub-brand</label></p>
                    <input class="input control" name="sub-brand" placeholder="i.e. Moana" type="text" required>
                  </div>

                  <p> </p>
                  <hr>

                  <div class="field is-grouped is-grouped-right">
                    <p class="control">
                      <input type="number" name="id" id="id" value="<?php echo $last_id ?>" hidden>
                      <?php
                        if(isset($_SERVER['HTTP_REFERER'])) {
                          echo '
                            <a href="'.$_SERVER['HTTP_REFERER'].'">
                            <button class="button is-dark is-outlined">Back</button>
                            </a>
                          ';
                        }
                      ?>
                      <input class="button is-primary" name="submit" id="submit" type ="submit" value="Create item">
                    </p>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php

  include 'partials/footer.php';

  include 'partials/foot.php';

  mysqli_close($conn);

?>

<script>

$('#itemImage').change(function() {
  var filename = $(this).val();
  var lastIndex = filename.lastIndexOf("\\");
  if (lastIndex >= 0) {
      filename = filename.substring(lastIndex + 1);
  }
  $('.file-name').html(filename);
});

</script>

</body>
</html>
